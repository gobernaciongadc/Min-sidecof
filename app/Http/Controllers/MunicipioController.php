<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class MunicipioController
 * @package App\Http\Controllers
 */
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::paginate();

        return view('dashboard/municipio.index', compact('municipios'))
            ->with('i', (request()->input('page', 1) - 1) * $municipios->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio = new Municipio();
        return view('dashboard/municipio.create', compact('municipio'));
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

        // Validando datos d
        request()->validate(Municipio::$rules);

        // Obtiene el usuario autenticado

        $user = Auth::user(); // Accede al usuario autenticado

        $paramsArray['users_id'] = $user->id;

        $municipio = Municipio::create($paramsArray);

        return redirect()->route('admin.municipios.index')
            ->with('success', 'Municipio se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = Municipio::find($id);

        return view('dashboard/municipio.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipio::find($id);

        return view('dashboard/municipio.edit', compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municipio $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        // print_r('<pre>' . $municipio . '</pre>');
        // die();

        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        // Validaciones
        // request()->validate(Municipio::$rules);

        if ($municipio['codigo'] == $paramsArray['codigo']) {
            unset($paramsArray['codigo']);
        }


        $municipio->update($paramsArray);

        return redirect()->route('admin.municipios.index')
            ->with('success', 'Municipio se modifico correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra el funcionario por su ID
        $municipio = Municipio::find($id);

        // Verifica si se encontró el funcionario
        if ($municipio) {
            // Actualiza el estado a "No habilitado"
            $municipio->update(['estado' => 'No habilitado']);

            return redirect()->route('admin.municipios.index')
                ->with('success', 'El municipio fue dado de baja correctamente');
        } else {
            return redirect()->route('admin.municipios.index')
                ->with('error', 'No se encontró este registro');
        }
    }
}
