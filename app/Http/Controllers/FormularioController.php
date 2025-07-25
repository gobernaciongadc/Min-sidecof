<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Formulario;
use App\Models\Metalico;
use App\Models\Minero;
use App\Models\Municipio;
use App\Models\Nometalico;
use App\Models\Numeracion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Para utilizar PDF
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
// Para Generar QR
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class FormularioController
 * @package App\Http\Controllers
 */
class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formularios = Formulario::paginate();
        return view('dashboard/formulario.index', compact('formularios'))
            ->with('i', (request()->input('page', 1) - 1) * $formularios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mensaje = null;

        $alta = null;

        $comercios = 'Interno';

        // Pasando varias variables por un arreglo asociativo
        $formulario = new Formulario();
        $metales = Metalico::where('estado', 'Habilitado')
            ->where('tipo_mercado', 'Interno')->get();;
        $nometales = Nometalico::where('estado', 'Habilitado')
            ->where('tipo_mercado', 'Interno')->get();;
        $municipios = Municipio::all();

        $user = Auth::user(); // Accede al usuario autenticado

        $alta = $user->estado;

        // Mensaje de caducidad a 5 dias del reistro del NIM
        $user = User::find($user->id);
        if ($user->name_bd == 'empresas') {

            $empresa = Empresa::find($user->id_login);
            $fechaCaducidad = $empresa->fecha_caducidad;

            $fechaActual = new DateTime();

            $fechaInicio = Carbon::parse($fechaActual);
            $fechaFin = Carbon::parse($fechaCaducidad);

            $diasRestantes = ceil($fechaInicio->diffInHours($fechaFin) / 24);

            // Si la fecha de caducidad es anterior a la fecha actual, la diferencia será negativa
            if ($fechaFin < $fechaInicio) {
                $diasRestantes = -$diasRestantes;
            }
            if ($diasRestantes > 0 && $diasRestantes <= 5) {
                // Mensaje para advertir que está a punto de vencer
                $mensaje = "Su registro NIM ya esta a punto de vencer en: " . $diasRestantes . ' Dia(s), Regularice su registro a la brevedad posible.';
            } elseif ($diasRestantes < 0) {
                // Mensaje para indicar que ya venció
                $mensaje = "Su registro NIM ya vencio, Regularice su registro a la brevedad posible.";
            }
        }

        // Devuelve la cantidad de formularios puestos en escena
        $staging = Formulario::where('staging', 0)
            ->where('users_id', $user->id)
            ->get(); // Devuelve un objeto
        // Convierte el resultado en un array
        $stagingArray = $staging->toArray();
        $cantStaging = count($stagingArray);
        $tipo = 'create';

        if ($user->name_bd == 'empresas') {
            $empresa = Empresa::where('id', $user->id_login)
                ->first(); // Devuelve un objeto
        } else {
            // Carga datos al formulario solo si es RUIM / empresa/cooperativa
            $empresa = json_decode(json_encode([
                'nombres' => '',
                'ruim' => '',
                'nro_nit' => '',
                'nro_nim' => '',
                'municipio' => json_decode(json_encode([
                    'codigo' => '',
                    'municipio' => ''
                ]))
            ]));
        }

        return view('dashboard/formulario.create', compact('formulario', 'metales', 'nometales', 'municipios', 'cantStaging', 'tipo', 'empresa', 'mensaje', 'alta', 'comercios'));
    }


    // Se agrego recientemente
    public function createTipos($opcion)
    {

        $mensaje = null;
        $alta = null;
        $empresa = null;
        $minero = null;
        $municipiosCoincidentes = null;

        if ($opcion == 'interno') {
            $comercios = 'Interno';
            $metales = Metalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Interno')->get();
            $nometales = Nometalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Interno')->get();
        } else {
            $comercios = 'Externo';

            $metales = Metalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Externo')->get();
            $nometales = Nometalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Externo')->get();
        }

        // Pasando varias variables por un arreglo asociativo
        $formulario = new Formulario();

        $municipios = Municipio::all();

        $listMineros = Minero::where('user_active', 1)->get();

        $user = Auth::user(); // Accede al usuario autenticado
        $nameBd = $user->name_bd;
        $alta = $user->estado;
        // Mensaje de caducidad a 5 dias del reistro del NIM
        $user = User::find($user->id);
        if ($user->name_bd == 'empresas') {
            $empresa = Empresa::find($user->id_login);
            $fechaCaducidad = $empresa->fecha_caducidad;
            $fechaActual = new DateTime();
            $fechaInicio = Carbon::parse($fechaActual);
            $fechaFin = Carbon::parse($fechaCaducidad);
            $diasRestantes = ceil($fechaInicio->diffInHours($fechaFin) / 24);
            // Si la fecha de caducidad es anterior a la fecha actual, la diferencia será negativa
            if ($fechaFin < $fechaInicio) {
                $diasRestantes = -$diasRestantes;
            }
            if ($diasRestantes > 0 && $diasRestantes <= 5) {
                // Mensaje para advertir que está a punto de vencer
                $mensaje = "Su registro NIM ya esta a punto de vencer en: " . $diasRestantes . ' Dia(s), Regularice su registro a la brevedad posible.';
            } elseif ($diasRestantes < 0) {
                // Mensaje para indicar que ya venció
                $mensaje = "Su registro NIM ya vencio, Regularice su registro a la brevedad posible.";
            }
        }

        if ($user->name_bd == 'mineros') {
            $minero = Minero::find($user->id_login);
            $fechaCaducidad = $minero->fecha_caducidad;
            $fechaActual = new DateTime();
            $fechaInicio = Carbon::parse($fechaActual);
            $fechaFin = Carbon::parse($fechaCaducidad);
            $diasRestantes = ceil($fechaInicio->diffInHours($fechaFin) / 24);
            // Si la fecha de caducidad es anterior a la fecha actual, la diferencia será negativa
            if ($fechaFin < $fechaInicio) {
                $diasRestantes = -$diasRestantes;
            }
            if ($diasRestantes > 0 && $diasRestantes <= 5) {
                // Mensaje para advertir que está a punto de vencer
                $mensaje = "Su registro NIM ya esta a punto de vencer en: " . $diasRestantes . ' Dia(s), Regularice su registro a la brevedad posible.';
            } elseif ($diasRestantes < 0) {
                // Mensaje para indicar que ya venció
                $mensaje = "Su registro NIM ya vencio, Regularice su registro a la brevedad posible.";
            }
        }

        // Devuelve la cantidad de formularios puestos en escena
        $staging = Formulario::where('staging', 0)
            ->where('users_id', $user->id)
            ->get(); // Devuelve un objeto
        // Convierte el resultado en un array
        $stagingArray = $staging->toArray();
        $cantStaging = count($stagingArray);
        $tipo = 'create';
        // Carga datos al formulario solo si es RUIM / empresa/cooperativa
        if ($user->name_bd == 'empresas') {
            $empresa = Empresa::where('id', $user->id_login)
                ->first(); // Devuelve un objeto

            $idsEmpresa = explode(',', $empresa->n_municipios); // Resultado: ['1', '2', '6']
            $municipiosCoincidentes = [];

            foreach ($municipios as $municipio) {
                if (in_array($municipio['id'], $idsEmpresa)) {
                    $municipiosCoincidentes[] = $municipio;
                }
            }
        }
        // Carga datos al formulario solo si es RUIM / empresa/cooperativa
        if ($user->name_bd == 'mineros') {
            $minero = Minero::where('id', $user->id_login)
                ->first(); // Devuelve un objeto
        }

        // dd($metales, $nometales);

        return view('dashboard/formulario.create', compact('formulario', 'metales', 'nometales', 'municipios', 'cantStaging', 'tipo', 'empresa', 'mensaje', 'alta', 'comercios', 'opcion', 'minero', 'nameBd', 'listMineros', 'municipiosCoincidentes'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1.- Recoger los datos del request
        $paramsArray = $request->all();

        // dd($paramsArray);

        // 2.- Validación de comercio
        if ($request->comercio == 'Interno') {
            $request->validate(Formulario::$rules);
        } else {
            $request->validate(Formulario::$rules_externo);
        }

        // 3.- Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no autenticado.');
        }

        // 4.- Agregar el user_id
        $paramsArray['users_id'] = $user->id;

        // 5.- Verificar que users_id está en el array antes de insertar
        // dd($paramsArray); // <- Revisa si ahora aparece "users_id"

        // 6.- Insertar en la base de datos
        $formulario = Formulario::create($paramsArray);

        return redirect()->route('admin.staging')
            ->with('success', 'El Formulario 101 se ha creado correctamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $datos)
    {

        $formulario = Formulario::find($id);
        return view('dashboard/formulario.show', compact('formulario', 'datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // dd($id);

        $mensaje = null;
        $alta = null;
        $municipiosCoincidentes = null;
        $empresa = null;
        $formulario = Formulario::find($id);

        $opcion = $formulario->comercio;
        $comercios = $formulario->comercio;

        // dd($opcion, $comercios);

        $metales = Metalico::all();
        $nometales = Nometalico::all();
        $municipios = Municipio::all();
        $tipo = 'edit';
        $cantStaging = 0;

        $user = Auth::user(); // Accede al usuario autenticado
        $alta = $user->estado;
        $nameBd = $user->name_bd;

        $metales = Metalico::where('estado', 'Habilitado')
            ->where('tipo_mercado', 'Interno')->get();
        $nometales = Nometalico::where('estado', 'Habilitado')
            ->where('tipo_mercado', 'Interno')->get();

        // Mensaje de caducidad a 5 dias del reistro del NIM
        $user = User::find($user->id);
        if ($user->name_bd == 'empresas') {

            $metales = Metalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Externo')->get();
            $nometales = Nometalico::where('estado', 'Habilitado')
                ->where('tipo_mercado', 'Externo')->get();

            $empresa = Empresa::find($user->id_login);

            $idsEmpresa = explode(',', $empresa->n_municipios); // Resultado: ['1', '2', '6']
            $municipiosCoincidentes = [];

            foreach ($municipios as $municipio) {
                if (in_array($municipio['id'], $idsEmpresa)) {
                    $municipiosCoincidentes[] = $municipio;
                }
            }

            // dd($formulario);

            $fechaCaducidad = $empresa->fecha_caducidad;

            $fechaActual = new DateTime();

            $fechaInicio = Carbon::parse($fechaActual);
            $fechaFin = Carbon::parse($fechaCaducidad);

            $diasRestantes = ceil($fechaInicio->diffInHours($fechaFin) / 24);

            // Si la fecha de caducidad es anterior a la fecha actual, la diferencia será negativa
            if ($fechaFin < $fechaInicio) {
                $diasRestantes = -$diasRestantes;
            }
            if ($diasRestantes > 0 && $diasRestantes <= 5) {
                // Mensaje para advertir que está a punto de vencer
                $mensaje = "Su registro NIM ya esta a punto de vencer en: " . $diasRestantes . ' Dia(s), Regularice su registro a la brevedad posible.';
            } elseif ($diasRestantes < 0) {
                // Mensaje para indicar que ya venció
                $mensaje = "Su registro NIM ya vencio, Regularice su registro a la brevedad posible.";
            }
        }

        return view('dashboard/formulario.edit', compact('formulario', 'metales', 'nometales', 'municipios', 'cantStaging', 'tipo', 'mensaje', 'alta', 'opcion', 'comercios', 'nameBd', 'municipiosCoincidentes', 'empresa'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Formulario $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulario $formulario, $id)
    {
        $params = (object) $request->all(); // Devuelve un objeto
        $paramsArray = $request->all(); // Devuelve un array
        $formData = Formulario::find($id);

        try {
            if ($params->comercio == 'Interno') {
                // Validar para comercio interno
                request()->validate(Formulario::$rules_create);
            } else {
                // Validar para comercio externo
                request()->validate(Formulario::$rules_externo);
            }

            $formData->update($paramsArray);
            return redirect()->route('admin.staging')
                ->with('success', 'El formulario 101 se modificó correctamente');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Aquí puedes manejar los errores si necesitas hacer algo adicional
            return redirect()->back()
                ->withErrors($e->validator)  // Pasar los errores de validación
                ->withInput();  // Para mantener los datos enviados
        }
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $formulario = Formulario::find($id)->delete();

        return redirect()->route('admin.staging')
            ->with('success', 'El formulario se eliminó correctamente');
    }



    public function staging()
    {
        $alta = null;

        $user = Auth::user(); // Accede al usuario autenticado

        $alta = $user->estado;

        // Consulta a todos los que estan en staging
        $staging = Formulario::where('staging', 0)
            ->where('users_id', $user->id)
            ->orderBy('id', 'desc')
            ->get(); // Devuelve un objeto
        // ->toArray();  // Devuelve un array

        // Enviando los datos no emitidos a la vista staging 
        return view('dashboard/formulario.staging', compact('staging', 'alta'));
    }

    public function emitidos()
    {

        $user = Auth::user(); // Accede al usuario autenticado

        // Consulta a todos los que estan en staging
        $emitidos = Formulario::where('staging', 1)
            ->where('users_id', $user->id)
            ->whereDate('updated_at', now()->toDateString()) // Filtra por la fecha actual
            ->orderBy('updated_at', 'desc')
            ->get(); // Devuelve un objeto
        // ->toArray();  // Devuelve un array

        // $numeroFactura = date('ymdHs'); // Formato: yyyymmddHHMMSS

        // Enviando los datos no emitidos a la vista staging 
        return view('dashboard/formulario.emitidos', compact('emitidos'));
    }

    function edit_staging()
    {
        // Aqui imprimir en PDF
    }

    public function updated_staging($id)
    {
        $maxAttempts = 2;

        for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
            try {
                DB::beginTransaction();

                $numeracion = new Numeracion();
                $numeracion->formularios_id = $id;
                $numeracion->save();

                $idEncontrado = Numeracion::where('formularios_id', $id)
                    ->first();

                $formulario = Formulario::find($id);
                $formulario->staging = 1;
                $formulario->nro_formulario = $idEncontrado->id;
                $formulario->save();

                DB::commit();

                return redirect()->route('admin.emitidos')
                    ->with('success', 'El formulario 101 se emitió correctamente');
            } catch (\Exception $e) {
                DB::rollBack();

                if ($attempt === $maxAttempts) {
                    return redirect()->route('admin.staging')
                        ->with('error', 'Error al emitir el formulario. Por favor, inténtelo de nuevo.');
                }
                usleep(1000); // 1 milisegundo
            }
        }
    }

    public function pdf($id)
    {
        $formulario = Formulario::find($id);

        $metalico = $formulario->tipo_min_metalico;
        $metalico_array = explode(',', $metalico);
        $nometalico = $formulario->tipo_min_nometalico;
        $nometalico_array = explode(',', $nometalico);

        $pdf = PDF::loadView('dashboard.formulario.pdf', compact('formulario', 'metalico_array', 'nometalico_array'));

        // Genera el PDF con tamaño carta (8.5x11 pulgadas)
        $pdf->setPaper('letter');

        // Establece el nombre de archivo predeterminado
        $filename = $formulario->nro_formulario . '.pdf';

        return $pdf->stream($filename);
    }

    public function prueba_pdf($id)
    {
        $formulario = Formulario::find($id);
        return view('dashboard/formulario.prueba_pdf', compact('formulario'));
    }

    // Observaciones de transporte

    function observacion()
    {
        $formulario = new Formulario();
        return view('dashboard/formulario.observacion', compact('formulario'));
    }

    function buscarFormulario(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        $user = Auth::user(); // Accede al usuario autenticado

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');


        $emitidoArray = Formulario::where('staging', 1)
            ->where('users_id', $user->id)
            ->where('nro_formulario', $params->nro_formulario)
            ->where('estado_observacion', 0)
            ->where('fecha_valides', '>', $formattedDateTime) // Si la fecha validez es mayor a la fecha actual es admitido
            ->where('estado_entrega', 0)
            ->get();

        return response()->json($emitidoArray);
    }

    function updateObservacion(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        // Quitar el token
        unset($paramsArray['_token']);

        try {
            Formulario::where('id', $params->id)->update($paramsArray);
            $data = ([
                'codigo' => 200,
                'status' => 'success',
                'message' => 'LA OBSERVACIÓN SE REGISTRO CON EXITO!!',
                'datos' => $paramsArray
            ]);
        } catch (Exception $e) {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Hubo un error al realizar la observación, intente nuevamente',
                'error' => $e->getMessage()
            );
        }

        // Devuelve los resultados como respuesta JSON
        return response()->json($data);
    }

    function gestionBuscar()
    {
        return view('dashboard/formulario.gestion_buscar');
    }

    function datosGestionBuscar(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        $user = Auth::user(); // Accede al usuario autenticado

        switch ($user->name_bd) {
            case 'empresas':
                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;

            case 'mineros':
                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;

            case 'funcionarios':

                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;

            default:
                # code...
                break;
        }
    }

    // Modulo finalizar formulario
    function gestionBuscarFinalizar()
    {
        return view('dashboard/formulario.gestion_buscar_finalizar');
    }

    function datosGestionBuscarFinalizar(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto     
        $paramsArray = $request->all(); // Devulve un Array

        $user = Auth::user(); // Accede al usuario autenticado

        switch ($user->name_bd) {
            case 'empresas':
                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'name' => $user->name_bd
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;
            case 'funcionarios':
                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'name' => $user->name_bd
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;

            case 'mineros':

                try {
                    $gestionBuscar = Formulario::where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'name' => $user->name_bd
                    );
                } catch (Exception $e) {
                    $data = array(
                        'code' => 400,
                        'status' => 'error',
                        'error' => $e->getMessage(),
                    );
                }
                return response()->json($data, $data['code']);
                break;

            default:
                # code...
                break;
        }
    }

    // Finalizar formulario
    function finalizarFormulario(Request $request)
    {
        $params = (object) $request->all();

        try {
            $finalizar = Formulario::where('nro_formulario', $params->nro_formulario)->first();
            if (!$finalizar) {
                return response()->json([
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Formulario no encontrado'
                ], 404);
            }

            $finalizar->estado_entrega = 1;
            $finalizar->save();

            // Consultar nuevamente para asegurar que refleje el cambio
            // $gestionBuscar = Formulario::where('nro_formulario', $params->nro_formulario)->get();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'datos_gestion_buscar' => $finalizar,
                'numero' => $params->nro_formulario
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'code' => 400,
                'status' => 'error',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
