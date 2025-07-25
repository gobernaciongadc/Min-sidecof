<?php

namespace App\Http\Controllers;

use App\Models\Nometalico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class NometalicoController
 * @package App\Http\Controllers
 */
class NometalicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nometalicos = Nometalico::paginate();

        return view('dashboard/nometalico.index', compact('nometalicos'))
            ->with('i', (request()->input('page', 1) - 1) * $nometalicos->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nometalico = new Nometalico();
        return view('dashboard/nometalico.create', compact('nometalico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            // 1.-Recoger los usuarios por post
            $params = (object) $request->all(); // Devulve un obejto
            $paramsArray = $request->all(); // Devulve un Array

            // Validando datos d
            request()->validate(Nometalico::$rules);

            // Obtiene el usuario autenticado

            $user = Auth::user(); // Accede al usuario autenticado

            $paramsArray['users_id'] = $user->id;

            $nometalico = Nometalico::create($paramsArray);

            return redirect()->route('admin.nometalicos.index')
                ->with('success', 'Se creó correctamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nometalico = Nometalico::find($id);

        return view('dashboard/nometalico.show', compact('nometalico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nometalico = Nometalico::find($id);

        return view('dashboard/nometalico.edit', compact('nometalico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nometalico $nometalico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nometalico $nometalico)
    {

        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        // Validaciones
        // request()->validate(Municipio::$rules);

        if ($nometalico['nombre'] == $paramsArray['nombre']) {
            unset($paramsArray['nombre']);
        }


        $nometalico->update($paramsArray);

        return redirect()->route('admin.nometalicos.index')
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
        $nometalico = Nometalico::find($id);

        // Verifica si se encontró el funcionario
        if ($nometalico) {
            // Actualiza el estado a "No habilitado"
            $nometalico->update(['estado' => 'No habilitado']);

            return redirect()->route('admin.nometalicos.index')
                ->with('success', 'Este NO metal fue dado de baja correctamente');
        } else {
            return redirect()->route('admin.nometalicos.index')
                ->with('error', 'No se encontró este registro');
        }
    }

    function buscarAlicuotaNometalico(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        if ($params->comercio == "externo") {
            try {
                $alicuota = Nometalico::where('simbolo', $params->simbolo)
                    ->where('tipo_mercado', 'Externo')
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
        } else {
            try {
                $alicuota = Nometalico::where('simbolo', $params->simbolo)
                    ->where('tipo_mercado', 'Interno')
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
        }

        return response()->json($data);
    }
}
