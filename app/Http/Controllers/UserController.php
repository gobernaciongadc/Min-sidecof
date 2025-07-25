<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Empresa;
use App\Models\Funcionario;
use App\Models\Minero;
use App\Models\Role as ModelsRole;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('rol')->get()->toArray();

        // echo '<pre>';
        // var_dump($users);
        // echo '</pre>';
        // die();

        return view('dashboard/user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User();
        $opcion = 'crear';
        $roles = Role::all();
        return view('dashboard/user.create', compact('users', 'opcion', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 2.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        request()->validate(User::$rules);

        // Guarda directo en factura y no en detalle
        $user = new User();
        $user->name = $params->name;
        $user->name_bd = $params->name_bd;
        $user->id_login = $params->id_login;
        $user->email = $params->email;
        $user->password =   Hash::make($params->password);
        $user->roles_id = $params->rol;
        $user->estado = $params->estado;
        $user->save();

        // Asignar roles después de guardar el usuario
        $role = Role::find($params->rol); // Asegúrate de importar la clase Role
        $user->assignRole($role);

        switch ($params->name_bd) {
            case 'funcionarios':
                $funcionario = Funcionario::find($params->id_login);
                $actualizar = $funcionario->update(['user_active' => 1]);
                break;
            case 'mineros':
                $minero = Minero::find($params->id_login);
                $actualizar = $minero->update(['user_active' => 1]);
                break;
            case 'empresas':
                $empresa = Empresa::find($params->id_login);
                $actualizar = $empresa->update(['user_active' => 1]);
                break;
            default:
                # code...
                break;
        }

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'El usuario se creo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $opcion)
    {
        $funcionario = null;
        $empresa = null;
        $opcion = $opcion;

        $user = User::find($id);

        switch ($user->name_bd) {
            case 'empresas':
                $empresa = Empresa::where('id', $user->id_login)
                    ->first();
                break;
            case 'funcionarios':
                $funcionario = Funcionario::where('id', $user->id_login)
                    ->first();
                break;
            default:
                # code...
                break;
        }
        $role = Role::find($user->roles_id); // Asegúrate de importar la clase Role

        return view('dashboard/user.show', compact('user', 'role', 'empresa', 'funcionario', 'opcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $opcion = 'edit';
        $roles = Role::all();

        switch ($users->name_bd) {
            case 'funcionarios':
                $editDatos = Funcionario::all();
                return view('dashboard/user.edit', compact('users', 'opcion', 'editDatos', 'roles'));
                break;
            case 'mineros':
                $editDatos = Minero::all();
                return view('dashboard/user.edit', compact('users', 'opcion', 'editDatos', 'roles'));
                break;
            case 'empresas':
                $editDatos = Empresa::all();
                return view('dashboard/user.edit', compact('users', 'opcion', 'editDatos', 'roles'));
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        Funcionario::where('id', $request->id_login)
            ->update(['estado' => 'Habilitado']);

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'El usuario se actualizo correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra el funcionario por su ID
        $user = User::find($id);

        $userAutencated = Auth::user(); // Accede al usuario autenticado


        if ($userAutencated->id != $id) {
            // Verifica si se encontró el funcionario
            if ($user) {
                // Actualiza el estado a "No habilitado"

                switch ($user->name_bd) {
                    case 'funcionarios':
                        $actualizar = $user->update(['estado' => 'No habilitado']);
                        Funcionario::where('id', $user->id_login)
                            ->update(['estado' => 'No habilitado']);
                        break;
                    case 'empresas':
                        $actualizar = $user->update(['estado' => 'No habilitado']);
                        Empresa::where('id', $user->id_login)
                            ->update(['estado' => 'No habilitado']);
                        break;
                    case 'mineros':
                        $actualizar = $user->update(['estado' => 'No habilitado']);
                        Minero::where('id', $user->id_login)
                            ->update(['estado' => 'No habilitado']);
                        break;
                    default:
                        # code...
                        break;
                }


                return redirect()->route('admin.usuarios.index')
                    ->with('success', 'El usuario fue dado de baja correctamente');
            } else {
                return redirect()->route('admin.usuarios.index')
                    ->with('error', 'No se encontró este registro');
            }
        } else {
            return redirect()->route('admin.usuarios.index')
                ->with('error', 'NO PUEDES DARTE DE BAJA ASI MISMO');
        }
    }

    function indexUsuarios(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        try {

            switch ($params->tipo_user) {
                case 'Funcionario':
                    $funcionario = Funcionario::where('user_active', 0)
                        ->where('estado', 'Habilitado')
                        ->get();
                    $funcionarioArray = $funcionario->toArray();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datosUser' => $funcionarioArray
                    );
                    return response()->json($data);
                    break;
                case 'RUIM':
                    $empresa = Empresa::where('user_active', 0)
                        ->where('estado', 'Habilitado')
                        ->get();
                    $empresaArray = $empresa->toArray();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datosUser' => $empresaArray
                    );
                    return response()->json($data);
                    break;
                case 'ROCMIN':
                    $minero = Minero::where('user_active', 0)
                        ->where('estado', 'Habilitado')
                        ->get();
                    $mineroArray = $minero->toArray();
                    $data = array(
                        'code' => 200,
                        'status' => 'success',
                        'datosUser' => $mineroArray
                    );
                    return response()->json($data);
                    break;
                default:
                    # code...
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

    function habilitarUser($id)
    {
        // Encuentra el funcionario por su ID
        $user = User::find($id);

        // Verifica si se encontró el funcionario
        if ($user) {
            // Actualiza el estado a "No habilitado"
            $actualizar = $user->update(['estado' => 'Habilitado']);

            switch ($user->name_bd) {
                case 'funcionarios':
                    Funcionario::where('id', $user->id_login)
                        ->update(['estado' => 'Habilitado']);
                    break;
                case 'empresas':
                    Empresa::where('id', $user->id_login)
                        ->update(['estado' => 'Habilitado']);
                    break;
                case 'mineros':
                    Minero::where('id', $user->id_login)
                        ->update(['estado' => 'Habilitado']);
                    break;
                default:
                    # code...
                    break;
            }

            return redirect()->route('admin.usuarios.index')
                ->with('success', 'El usuario fue habilitado correctamente');
        } else {
            return redirect()->route('admin.usuarios.index')
                ->with('error', 'No se encontró este registro');
        }
    }

    function viewPassword()
    {
        // Encuentra el funcionario por su ID
        $userAutencated = Auth::user(); // Accede al usuario autenticado
        $idUsuario = $userAutencated->id;
        return view('dashboard/user.viewPassword', compact('idUsuario'));
    }

    function changesPassword(Request $request)
    {

        // 1.-VALIDAR DATOS
        $validate = Validator::make($request->all(), [
            'new_password' => 'required|string|min:6',
        ]);

        // 2.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devuelve un obejto

        // 3.- SI LA VALIDACION FUE CORRECTA
        // Comprobar si los datos son validos
        if ($validate->fails()) { // en caso si los datos fallan la validacion
            // La validacion ha fallado
            $data = array(
                'status' => 'validacion',
                'code' => 200,
                'message' => 'Los datos enviados no son correctos.',
                'errors' => $validate->errors()
            );
            return response()->json($data, $data['code']);
        } else {
            $user = auth()->user();
            $usuario = User::find($user->id);

            // Verificar si la contraseña actual es válida
            if (!Hash::check($request->current_password, $user->password)) {
                $data = [
                    'code' => 200,
                    'status' => 'error',
                    'message' => 'Datos no validos',
                    'errors' => 'Sin errores'
                ];
                return response()->json($data, $data['code']);
            }

            // Actualizar la contraseña en la base de datos
            $usuario->password = Hash::make($request->new_password);
            $usuario->save();

            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => 'La contraseña de cambio correctamente',
                'errors' => 'Sin errores'
            ];

            return response()->json($data, $data['code']);
        }
    }
}
