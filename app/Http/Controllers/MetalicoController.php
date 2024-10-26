<?php

namespace App\Http\Controllers;

use App\Models\Metalico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class MetalicoController
 * @package App\Http\Controllers
 */
class MetalicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metalicos = Metalico::paginate();

        return view('dashboard/metalico.index', compact('metalicos'))
            ->with('i', (request()->input('page', 1) - 1) * $metalicos->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metalico = new Metalico();
        return view('dashboard/metalico.create', compact('metalico'));
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
        request()->validate(Metalico::$rules);

        // Obtiene el usuario autenticado

        $user = Auth::user(); // Accede al usuario autenticado

        $paramsArray['users_id'] = $user->id;

        $metalico = Metalico::create($paramsArray);

        return redirect()->route('admin.metalicos.index')
            ->with('success', 'Se registro correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metalico = Metalico::find($id);

        return view('dashboard/metalico.show', compact('metalico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metalico = Metalico::find($id);

        return view('dashboard/metalico.edit', compact('metalico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Metalico $metalico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metalico $metalico)
    {
        // print_r('<pre>' . $municipio . '</pre>');
        // die();

        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        // Validaciones
        // request()->validate(Municipio::$rules);

        if ($metalico['nombre'] == $paramsArray['nombre']) {
            unset($paramsArray['nombre']);
        }


        $metalico->update($paramsArray);

        return redirect()->route('admin.metalicos.index')
            ->with('success', 'Se modifico correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra el funcionario por su ID
        $metalico = Metalico::find($id);

        // Verifica si se encontró el funcionario
        if ($metalico) {
            // Actualiza el estado a "No habilitado"
            $metalico->update(['estado' => 'No habilitado']);

            return redirect()->route('admin.metalicos.index')
                ->with('success', 'Este metal fue dado de baja correctamente');
        } else {
            return redirect()->route('admin.metalicos.index')
                ->with('error', 'No se encontró este registro');
        }
    }

    function buscarAlicuotaMetalico(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        try {
            $alicuota = Metalico::where('simbolo', $params->simbolo)
                ->get();
            $data = array(
                'code' => 200,
                'status' => 'success',
                'alicuota' => $alicuota
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
}
