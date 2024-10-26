<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class FuncionarioController
 * @package App\Http\Controllers
 */
class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::paginate();

        return view('dashboard/funcionario.index', compact('funcionarios'))
            ->with('i', (request()->input('page', 1) - 1) * $funcionarios->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionario = new Funcionario();
        return view('dashboard/funcionario.create', compact('funcionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        request()->validate(Funcionario::$rules);

        // Obtiene el usuario autenticado
        $user = Auth::user(); // Accede al usuario autenticado

        $paramsArray['users_id'] = $user->id;

        $funcionario = Funcionario::create($paramsArray);

        return redirect()->route('admin.funcionarios.index')
            ->with('success', 'El funcionario se creo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        return view('dashboard/funcionario.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);

        return view('dashboard/funcionario.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        // print_r('<pre>' . $municipio . '</pre>');
        // die();

        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        // Validaciones
        // request()->validate(Municipio::$rules);

        if ($funcionario['carnet'] == $paramsArray['carnet']) {
            unset($paramsArray['carnet']);
        }

        // echo '<pre>';
        // var_dump($paramsArray);
        // echo '</pre>';

        $funcionario->update($paramsArray);

        User::where('id_login', $funcionario->id)
            ->where('name_bd', 'funcionarios')
            ->update(['estado' => 'Habilitado']);

        // echo $funcionario;
        // die();


        return redirect()->route('admin.funcionarios.index')
            ->with('success', 'El funcionario se modifico correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        // Encuentra el funcionario por su ID
        $funcionario = Funcionario::find($id);

        $userAutencated = Auth::user(); // Accede al usuario autenticado

        if ($userAutencated->id != $id) {
            // Verifica si se encontró el funcionario
            if ($funcionario) {
                // Actualiza el estado a "No habilitado"
                $funcionario->update(['estado' => 'No habilitado']);
                User::where('id_login', $id)
                    ->where('name_bd', 'funcionarios')
                    ->update(['estado' => 'No habilitado']);

                return redirect()->route('admin.funcionarios.index')
                    ->with('success', 'El funcionario fue dado de baja correctamente');
            } else {
                return redirect()->route('admin.funcionarios.index')
                    ->with('error', 'No se encontró el funcionario');
            }
        } else {
            return redirect()->route('admin.funcionarios.index')
                ->with('error', 'NO PUEDES DARTE DE BAJA ASI MISMO');
        }
    }
}
