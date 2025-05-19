<?php

namespace App\Http\Controllers;

use App\Models\Minero;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;;


/**
 * Class MineroController
 * @package App\Http\Controllers
 */
class MineroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mineros = Minero::paginate();

        return view('dashboard/minero.index', compact('mineros'))
            ->with('i', (request()->input('page', 1) - 1) * $mineros->perPage());

        // Solo que imprima una vista
        // return view('dashboard/minero.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $minero = new Minero();
        $opcion = 'create';
        return view('dashboard/minero.create', compact('minero', 'opcion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        request()->validate(Minero::$rules);

        // Obtiene el usuario autenticado
        $user = Auth::user(); // Accede al usuario autenticado
        $paramsArray['users_id'] = $user->id;
        $minero = Minero::create($paramsArray);

        // 6. Maneja la carga del archivo
        if ($request->hasFile('archivo_pdf')) {
            $archivoPdf = $request->file('archivo_pdf');
            $nombreOriginal = $archivoPdf->getClientOriginalName();

            // Generar un nombre único usando la fecha y hora actual
            $nombreArchivo = pathinfo($nombreOriginal, PATHINFO_FILENAME) . '_' . time() . '.' . $archivoPdf->getClientOriginalExtension();

            // Guardar el archivo en una carpeta específica
            $archivoPdf->storeAs('archivos_pdf', $nombreArchivo, 'public');

            // Actualizar el campo de la base de datos con el nombre del archivo único
            $minero->archivo_pdf = $nombreArchivo;
            $minero->save();
        }
        return redirect()->route('admin.mineros.index')
            ->with('success', 'El comercializadora se creo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $minero = Minero::find($id);

        return view('dashboard/minero.show', compact('minero'));
    }

    function showGetData($id)
    {
        $minero = Minero::find($id);
        return response()->json($minero);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $minero = Minero::find($id);
        $opcion = 'edit';
        return view('dashboard/minero.edit', compact('minero', 'opcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Minero $minero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minero $minero)
    {
        // print_r('<pre>' . $municipio . '</pre>');
        // die();
        $params = (object) $request->all(); // Devuelve un obejto
        $paramsArray = $request->all(); // Es un array

        // Validaciones
        // request()->validate(Municipio::$rules);

        if ($minero['rocmin'] == $paramsArray['rocmin']) {
            unset($paramsArray['rocmin']);
        }

        if ($request->hasFile('nuevo_archivo_pdf')) {
            $nuevoArchivoPdf = $request->file('nuevo_archivo_pdf');
            $nombreOriginal = $nuevoArchivoPdf->getClientOriginalName();

            // Generar un nombre único usando la fecha y hora actual
            $nombreArchivo = pathinfo($nombreOriginal, PATHINFO_FILENAME) . '_' . time() . '.' . $nuevoArchivoPdf->getClientOriginalExtension();

            // Guarda el nuevo archivo en una carpeta específica
            $nuevoArchivoPdf->storeAs('archivos_pdf', $nombreArchivo, 'public');

            // Actualiza el nombre del archivo en la base de datos
            $paramsArray['archivo_pdf'] = $nombreArchivo;
        }

        $minero->update($paramsArray);
        return redirect()->route('admin.mineros.index')
            ->with('success', 'la comercializadora se modifico correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encuentra el funcionario por su ID
        $minero = Minero::find($id);

        // Verifica si se encontró el funcionario
        if ($minero) {
            // Actualiza el estado a "No habilitado"
            $minero->update(['estado' => 'No habilitado']);

            return redirect()->route('admin.mineros.index')
                ->with('success', 'La comercializadora fue dado de baja correctamente');
        } else {
            return redirect()->route('admin.mineros.index')
                ->with('error', 'No se encontró este registro');
        }
    }

    function verDocumentoPdfMinero(Request $request)
    {
        // 1.-Recoger los usuarios por post
        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        // 3. Obtiene el usuario autenticado
        $user = Auth::user();

        // 4. Añade el ID del usuario autenticado a los datos
        $paramsArray['users_id'] = $user->id;
        $usuario = User::find($user->id);

        $file = Minero::where('users_id', $user->id)
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
}
