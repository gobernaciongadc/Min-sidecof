<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Ubicacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UbicacionController extends Controller
{

    // Para ir a la vista de registrar actividad
    function actividad()
    {
        return view('dashboard/seguimiento.actividad');
    }

    function datosActividad(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        try {
            $seguimiento = Formulario::where('nro_formulario', $params->gestion_buscar)
                ->where('estado_entrega', 0)
                ->get();

            $data = array(
                'code' => 200,
                'status' => 'success',
                'seguimiento' => $seguimiento
            );
        } catch (Exception $e) {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'error' => $e->getMessage()
            );
        }
        return response()->json($data);
    }

    function storeActividad(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto

        // 2.-Validar datos


        // Comprobar si los datos son validos
        if ($params->formularios_id == null || $params->lugar == null) { // en caso si los datos fallan la validacion

            // La validacion ha fallado
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'LOS DATOS ENVIADOS NO SON CORRECTOS',
            );
        } else {
            // Obtiene el usuario autenticado
            $user = Auth::user(); // Accede al usuario autenticado

            // Crear el objeto usuario para guardar en la base de datos
            $ubicacion = new Ubicacion();
            $ubicacion->formularios_id = $params->formularios_id;
            $ubicacion->lugar = $params->lugar;
            $ubicacion->users_id = $user->id;

            try {
                // 5.-Crear el usuario
                $ubicacion->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'LA ACTIVIDAD DE TRANSPORTE SE CREÓ CORRECTAMENTE.',
                    'actividad' => $ubicacion
                );
            } catch (Exception $e) {
                $data = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => $e->getMessage()
                );
            }
        }
        // Devuelve en json con laravel
        return response()->json($data, $data['code']);
    }

    function gestionBuscarUbicacion()
    {
        return view('dashboard/seguimiento.gestion_buscar_ubicacion');
    }

    function datosGestionBuscarUbicacion(Request $request)
    {
        $destino = null;
        $listaUbicaciones = null;
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        $user = Auth::user(); // Accede al usuario autenticado

        switch ($user->name_bd) {
            case 'empresas':
                try {
                    // Encuentra el formulario siempre encuentra (1) en la posision [0].
                    $gestionBuscar = Formulario::with('user')
                        ->where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();

                    if ($gestionBuscar->isEmpty()) {
                        $destino = null;
                    } else {
                        // Consulta para extraer todos los registros de formulario
                        $listaUbicaciones = Ubicacion::with('user')
                            ->where('formularios_id',  $gestionBuscar[0]->nro_formulario)
                            ->orderBy('id', 'asc')
                            ->get();
                    }
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'dato_adicional' => $listaUbicaciones
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
                    // Encuentra el formulario siempre encuentra (1) en la posision [0].
                    $gestionBuscar = Formulario::with('user')
                        ->where('nro_formulario', $params->gestion_buscar)
                        ->Where('users_id', $user->id)
                        ->get();

                    if ($gestionBuscar->isEmpty()) {
                        $destino = null;
                    } else {
                        // Consulta para extraer todos los registros de formulario
                        $listaUbicaciones = Ubicacion::with('user')
                            ->where('formularios_id',  $gestionBuscar[0]->nro_formulario)
                            ->orderBy('id', 'asc')
                            ->get();
                    }
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'dato_adicional' => $listaUbicaciones
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
                    $gestionBuscar = Formulario::with('user')
                        ->where('nro_formulario', $params->gestion_buscar)
                        ->orderBy('id', 'asc')
                        ->get();

                    if ($gestionBuscar->isEmpty()) {
                        $destino = null;
                    } else {

                        // Consulta para extraer todos los registros de formulario
                        $listaUbicaciones = Ubicacion::with('user')
                            ->where('formularios_id',  $gestionBuscar[0]->nro_formulario)
                            ->get();
                    }

                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datos_gestion_buscar' => $gestionBuscar,
                        'dato_adicional' => $listaUbicaciones
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
}
