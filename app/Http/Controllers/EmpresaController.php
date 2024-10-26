<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcionario;
use App\Models\Metalico;
use App\Models\Municipio;
use App\Models\Nometalico;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class EmpresaController
 * @package App\Http\Controllers
 */
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();
        return view('dashboard/empresa.index', compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * $empresas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        $municipios = Municipio::all();
        $metalicos = Metalico::all();
        $nometalicos = Nometalico::all();
        $opcion = 'create';
        return view('dashboard/empresa.create', compact('empresa', 'municipios', 'metalicos', 'nometalicos', 'opcion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Recoger los datos del formulario
        $paramsArray = $request->all();


        // 2. Validar los datos del formulario
        request()->validate(Empresa::$rules);

        // 3. Obtiene el usuario autenticado
        $user = Auth::user();

        // 4. Añade el ID del usuario autenticado a los datos
        $paramsArray['users_id'] = $user->id;

        // 5. Crea la empresa
        $empresa = Empresa::create($paramsArray);

        // 6. Maneja la carga del archivo
        if ($request->hasFile('archivo_pdf')) {
            $archivoPdf = $request->file('archivo_pdf');
            $nombreOriginal = $archivoPdf->getClientOriginalName();

            // Generar un nombre único usando la fecha y hora actual
            $nombreArchivo = pathinfo($nombreOriginal, PATHINFO_FILENAME) . '_' . time() . '.' . $archivoPdf->getClientOriginalExtension();

            // Guardar el archivo en una carpeta específica
            $archivoPdf->storeAs('archivos_pdf', $nombreArchivo, 'public');

            // Actualizar el campo de la base de datos con el nombre del archivo único
            $empresa->archivo_pdf = $nombreArchivo;
            $empresa->save();
        }

        // 6. Maneja la carga del archivo
        if ($request->has('mapa_captura')) {
            $dataUrl = $request->input('mapa_captura');

            // Decodificar la cadena base64 y obtener los datos binarios del archivo
            $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl));

            // Generar un nombre único usando la fecha y hora actual
            $nombreArchivo = 'mapa_captura_' . time() . '.png';

            // Guardar el archivo en una carpeta específica
            Storage::disk('public')->put('mapa_captura/' . $nombreArchivo, $fileData);

            // Actualizar el campo de la base de datos con el nombre del archivo único
            $empresa->img_mapa = $nombreArchivo;
            $empresa->save();
        }


        // 7. Redirige con mensaje de éxito
        return redirect()->route('admin.empresas.index')
            ->with('success', 'La empresa y/o cooperativa se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('dashboard/empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);

        $municipios = Municipio::all();

        if ($empresa->tipo_metalico != NULL && $empresa->tipo_no_metalico == NULL) {
            $metalicos = Metalico::all();
        }

        if ($empresa->tipo_no_metalico != NULL && $empresa->tipo_metalico == NULL) {
            $metalicos = Nometalico::all();
        }

        if ($empresa->tipo_metalico != NULL && $empresa->tipo_no_metalico != NULL) {
            $metalico = Metalico::all();
            $nometalico = Nometalico::all();
            $metalicos = $metalico->concat($nometalico);
        }

        $opcion = 'edit';

        return view('dashboard/empresa.edit', compact('empresa', 'municipios', 'metalicos', 'opcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $paramsArray = $request->all();

        // Validaciones
        // request()->validate(Empresa::$rules);
        if ($empresa['ruim'] == $paramsArray['ruim']) {
            unset($paramsArray['ruim']);
        }


        if ($request->has('mapa_captura')) {
            $dataUrl = $request->input('mapa_captura');

            // Decodificar la cadena base64 y obtener los datos binarios del archivo
            $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl));

            // Generar un nombre único usando la fecha y hora actual
            $nombreArchivo = 'mapa_captura_' . time() . '.png';

            // Guardar el archivo en una carpeta específica
            Storage::disk('public')->put('mapa_captura/' . $nombreArchivo, $fileData);

            // Actualizar el campo de la base de datos con el nombre del archivo único
            $empresa->img_mapa = $nombreArchivo;
            $empresa->save();
        }

        $empresa->update($paramsArray);

        User::where('id_login', $empresa->id)
            ->where('name_bd', 'empresas')
            ->update(['estado' => 'Habilitado']);

        return redirect()->route('admin.empresas.index')
            ->with('success', 'La empresa y/o cooperativa se modificó correctamente');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra el funcionario por su ID
        $empresa = Empresa::find($id);

        $userAutencated = Auth::user(); // Accede al usuario autenticado

        $user = User::where('id_login', $id)
            ->where('name_bd', 'empresas')
            ->first();

        if ($userAutencated->id != $user->id) {
            // Verifica si se encontró el funcionario
            if ($empresa) {
                // Actualiza el estado a "No habilitado"
                $empresa->update(['estado' => 'No habilitado']);

                User::where('id_login', $id)
                    ->where('name_bd', 'empresas')
                    ->update(['estado' => 'No habilitado']);
                return redirect()->route('admin.empresas.index')
                    ->with('success', 'La empresa y/o cooperativa fue dado de baja correctamente');
            } else {
                return redirect()->route('admin.empresas.index')
                    ->with('error', 'No se encontró este registro');
            }
        } else {
            return redirect()->route('admin.empresas.index')
                ->with('error', 'NO PUEDES DARTE DE BAJA ASI MISMO');
        }
    }

    function indexMinerales(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        try {

            switch ($params->metal) {
                case 'Ambos':
                    $metalicos = Metalico::all();
                    $nometalicos = Nometalico::all();
                    $minerales = $metalicos->concat($nometalicos);

                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'tipo' => 'Ambos',
                        'mineral' => $minerales
                    );
                    return response()->json($data);
                    break;
                case 'Metalico':
                    $metalicos = Metalico::all();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'tipo' => 'Metalico',
                        'mineral' => $metalicos
                    );
                    return response()->json($data);
                    break;
                case 'No metalico':
                    $nometalicos = Nometalico::all();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'tipo' => 'No metalico',
                        'mineral' => $nometalicos
                    );
                    return response()->json($data);
                    break;
                default:
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'tipo' => 'Sin datos',
                        'mineral' => []
                    );
                    return response()->json($data);
                    break;
            }
        } catch (Exception $e) {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'error' => $e->getMessage()
            );
        }
    }

    function verDocumentoPdf(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        // 3. Obtiene el usuario autenticado
        $user = Auth::user();

        // 4. Añade el ID del usuario autenticado a los datos
        $paramsArray['users_id'] = $user->id;
        $usuario = User::find($user->id);

        $file = Empresa::where('users_id', $user->id)
            ->where('archivo_pdf', $params->file_pdf)
            ->first();

        $data = array(
            'code' => 200,
            'status' => 'success',
            'tipo' => 'No metalico',
            'mineral' => $file->archivo_pdf
        );
        return response()->json($data);
    }

    // Reporte empresas
    public function pdfRuim($id)
    {

        try {
            // Obtiene la fecha y hora actual
            $fechaHoraActual = Carbon::now();

            // Puedes formatear la fecha y hora según tus necesidades
            $formato = 'Y-m-d H:i:s';
            $fechaHoraFormateada = $fechaHoraActual->format($formato);

            // Obtener la lista de empresas
            $empresa = Empresa::find($id);

            // Carga la vista en el objeto PDF
            $pdf = PDF::loadView('dashboard.empresa.pdf_empresa', compact('fechaHoraFormateada', 'empresa'));

            // Establece el tamaño del papel
            $pdf->setPaper('letter');

            // Establece el nombre del archivo PDF
            $filename = 'david.pdf';

            // Devuelve el PDF al navegador
            return $pdf->stream($filename);
        } catch (Exception $e) {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'error' => $e->getMessage(),
            );
        }
    }
}
