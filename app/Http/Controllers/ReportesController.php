<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Formulario;
use App\Models\Metalico;
use App\Models\Municipio;
use App\Models\Nometalico;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Para utilizar PDF
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    function cantidadFormularios()
    {
        $ruims = Empresa::where('user_active', 1)->get();

        return view('dashboard/reportes.cantidad_formulario', compact('ruims'));
    }

    function resultadosReporteUno(Request $request)
    {

        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        if ($params->empresaId != null) {

            // Consulta año actual
            $usuarios = User::where('id_login', $params->empresaId)
                ->where('name_bd', 'empresas')
                ->first();

            $usuariosId = $usuarios->id;


            $empresa = Empresa::find($params->empresaId);

            $year = Carbon::now()->year;

            // Obtener la cantidad por meses
            $resultadosPorMes = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->where('users_id', $usuariosId)
                ->whereYear('fecha_emision', $year)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses
            $resultadoTotal = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $year)
                ->first();

            // FIN consulta año actual

            // Consulta hace dos años
            // Obtener la cantidad por meses para el año anterior
            $previousYear = $year - 1;
            $resultadosPorMesPreviousYear = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYear)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses para el año anterior
            $resultadoTotalPreviousYear = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYear)
                ->first();
            // FIN Consulta hace dos años

            // Consulta hace tres años
            // Obtener la cantidad por meses para el año anterior
            $previousYearTres = $year - 2;
            $resultadosPorMesPreviousYearTres = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYearTres)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses para el año anterior
            $resultadoTotalPreviousYearTres = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYearTres)
                ->first();
            // FIN Consulta hace tres años


            switch ($params->periodo) {
                case '1':
                    try {
                        $data = array(
                            'code' => 200,
                            'status' => 'success',
                            'empresa' => $empresa,
                            'resultadomes' => $resultadosPorMes,
                            'resultadototal' => $resultadoTotal,
                            'resultadosPreviousYear' => $resultadosPorMesPreviousYear,
                            'resultadoTotalPreviousYear' => $resultadoTotalPreviousYear,
                            'resultadosPreviousYearTres' => $resultadosPorMesPreviousYearTres,
                            'resultadoTotalPreviousYearTres' => $resultadoTotalPreviousYearTres,
                            'usuariosId' => $usuariosId,
                            'periodoBack' => $params->periodo
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

                case 2:
                    try {
                        $data = array(
                            'code' => 200,
                            'status' => 'success',
                            'empresa' => $empresa,
                            'resultadomes' => $resultadosPorMes,
                            'resultadototal' => $resultadoTotal,
                            'resultadosPreviousYear' => $resultadosPorMesPreviousYear,
                            'resultadoTotalPreviousYear' => $resultadoTotalPreviousYear,
                            'resultadosPreviousYearTres' => $resultadosPorMesPreviousYearTres,
                            'resultadoTotalPreviousYearTres' => $resultadoTotalPreviousYearTres,
                            'usuariosId' => $usuariosId,
                            'periodoBack' => $params->periodo
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
                case 3:
                    try {
                        $data = array(
                            'code' => 200,
                            'status' => 'success',
                            'empresa' => $empresa,
                            'resultadomes' => $resultadosPorMes,
                            'resultadototal' => $resultadoTotal,
                            'resultadosPreviousYear' => $resultadosPorMesPreviousYear,
                            'resultadoTotalPreviousYear' => $resultadoTotalPreviousYear,
                            'resultadosPreviousYearTres' => $resultadosPorMesPreviousYearTres,
                            'resultadoTotalPreviousYearTres' => $resultadoTotalPreviousYearTres,
                            'usuariosId' => $usuariosId,
                            'periodoBack' => $params->periodo
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
                    $data = array(
                        'code' => 200,
                        'status' => 'sin datos',
                        'message' => 'Ingrese todos los datos para relizar una consulta',
                    );

                    return response()->json($data, $data['code']);
                    break;
            }
        } else {
            $data = array(
                'code' => 200,
                'status' => 'sin datos',
                'message' => 'Ingrese todos los datos para relizar una consulta',
            );
            return response()->json($data, $data['code']);
        }
    }

    public function pdfReporteUno($empresaId, $usuarioId, $periodoBack)
    {

        try {


            // Obtiene la fecha y hora actual
            $fechaHoraActual = Carbon::now();

            // Puedes formatear la fecha y hora según tus necesidades
            $formato = 'Y-m-d H:i:s';
            $fechaHoraFormateada = $fechaHoraActual->format($formato);

            $usuariosId = $usuarioId;
            $empresa = Empresa::find($empresaId);

            $year = Carbon::now()->year;

            //    **************UNO************
            // Obtener la cantidad por meses
            $resultadosPorMes = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->whereYear('fecha_emision', $year)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses
            $resultadoTotal = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $year)
                ->first();

            //    **************DOS************
            // Consulta hace dos años
            // Obtener la cantidad por meses para el año anterior
            $previousYear = $year - 1;
            $resultadosPorMesDos = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYear)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses para el año anterior
            $resultadoTotalDos = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYear)
                ->first();
            // FIN Consulta hace dos años    


            //    **************TRES************
            $previousYearTres = $year - 2;
            $resultadosPorMesTres = Formulario::select(
                DB::raw('EXTRACT(MONTH FROM fecha_emision) as mes'),
                DB::raw('COUNT(*) as total_formularios')
            )
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYearTres)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM fecha_emision)'))
                ->get();

            // Obtener la suma total de todos los meses para el año anterior
            $resultadoTotalTres = Formulario::select(DB::raw('SUM(1) as total_formularios'))
                ->where('users_id', $usuariosId)
                ->where(DB::raw('EXTRACT(YEAR FROM fecha_emision)'), $previousYearTres)
                ->first();

            // Carga la vista en el objeto PDF
            $pdf = PDF::loadView('dashboard.reportes.reporte_pdf_uno', compact('empresa', 'resultadosPorMes', 'resultadoTotal', 'resultadosPorMesDos', 'resultadoTotalDos', 'resultadosPorMesTres', 'resultadoTotalTres', 'fechaHoraFormateada', 'year', 'periodoBack'));

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

    // Función para obtener el nombre del mes en letras
    public function nombreMesEnLetras($numeroMes)
    {
        $mesesEnLetras = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
            // ... Agrega los demás meses según sea necesario
        ];

        return $mesesEnLetras[$numeroMes] ?? '';
    }

    // MUnicipio
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    function cantidadFormulariosMunicipio()
    {
        $municipios = Municipio::all();
        return view('dashboard/reportes.cantidad_formulario_municipio', compact('municipios'));
    }

    function resultadosReporteUnoMunicipio(Request $request)
    {

        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        if ($params->municipioId != null) {

            $municipio = Municipio::find($params->municipioId);

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::where('municipios_id', $params->municipioId)
                ->get();

            // Obtener la cantidad de empresas
            $cantidadEmpresas = $listaEmpresas->count();

            try {
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                    'municipio' => $municipio,
                    'listaEmpresas' => $listaEmpresas,
                    'cantidadEmpresas' => $cantidadEmpresas
                );
            } catch (Exception $e) {
                $data = array(
                    'code' => 400,
                    'status' => 'error',
                    'error' => $e->getMessage(),
                );
            }
            return response()->json($data, $data['code']);
        } else {
            $data = array(
                'code' => 200,
                'status' => 'sin datos',
                'message' => 'Ingrese todos los datos para relizar una consulta',
            );
            return response()->json($data, $data['code']);
        }
    }

    public function pdfReporteUnoMunicipio($municipioId)
    {

        try {


            // Obtiene la fecha y hora actual
            $fechaHoraActual = Carbon::now();

            // Puedes formatear la fecha y hora según tus necesidades
            $formato = 'Y-m-d H:i:s';
            $fechaHoraFormateada = $fechaHoraActual->format($formato);

            $municipio = Municipio::find($municipioId);

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::where('municipios_id', $municipioId)
                ->get();

            // Obtener la cantidad de empresas
            $cantidadEmpresas = $listaEmpresas->count();

            // Carga la vista en el objeto PDF
            $pdf = PDF::loadView('dashboard.reportes.reporte_pdf_unomunicipio', compact('municipio', 'fechaHoraFormateada', 'listaEmpresas', 'cantidadEmpresas'));

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

    // AÑO
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    function cantidadFormulariosAnio()
    {
        return view('dashboard/reportes.cantidad_formulario_anio');
    }

    function resultadosReporteUnoAnio(Request $request)
    {

        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        if ($params->anio != null) {

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::whereYear('fecha_inscripcion', $params->anio)
                ->get();

            // Obtener la cantidad de empresas
            $cantidadEmpresas = $listaEmpresas->count();

            try {
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                    'listaEmpresas' => $listaEmpresas,
                    'cantidadEmpresas' => $cantidadEmpresas
                );
            } catch (Exception $e) {
                $data = array(
                    'code' => 400,
                    'status' => 'error',
                    'error' => $e->getMessage(),
                );
            }
            return response()->json($data, $data['code']);
        } else {
            $data = array(
                'code' => 200,
                'status' => 'sin datos',
                'message' => 'Ingrese todos los datos para relizar una consulta',
            );
            return response()->json($data, $data['code']);
        }
    }

    public function pdfReporteUnoAnio($anio)
    {

        try {

            // Obtiene la fecha y hora actual
            $fechaHoraActual = Carbon::now();

            // Puedes formatear la fecha y hora según tus necesidades
            $formato = 'Y-m-d H:i:s';
            $fechaHoraFormateada = $fechaHoraActual->format($formato);

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::whereYear('fecha_inscripcion', $anio)
                ->get();

            $year = $anio;

            // Obtener la cantidad de empresas
            $cantidadEmpresas = $listaEmpresas->count();

            // Carga la vista en el objeto PDF
            $pdf = PDF::loadView('dashboard.reportes.reporte_pdf_unoanio', compact('fechaHoraFormateada', 'listaEmpresas', 'cantidadEmpresas', 'year'));

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


    // MINERAL
    //  Reporte Nro. Cantidad de Formularios por actor productivo por año y mes
    function cantidadFormulariosMineral()
    {

        $minerales = null;

        // Obtener datos de la tabla 'metalicos'
        $metalicos = DB::table('metalicos')->get();

        // Obtener datos de la tabla 'nometalicos'
        $noMetalico = DB::table('nometalicos')->get();

        // Combina las colecciones en un solo array
        $minerales = $metalicos->merge($noMetalico)->all();

        return view('dashboard/reportes.cantidad_formulario_mineral', compact('minerales'));
    }

    function resultadosReporteUnoMineral(Request $request)
    {

        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array

        if ($params->mineral != null) {

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::with('municipio')
                ->where('mineral', 'ILIKE', '%' . $params->mineral . '%')
                ->get();

            // Obtener la cantidad de empresas
            $cantidadEmpresas = $listaEmpresas->count();

            try {
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                    'listaEmpresas' => $listaEmpresas,
                    'cantidadEmpresas' => $cantidadEmpresas
                );
            } catch (Exception $e) {
                $data = array(
                    'code' => 400,
                    'status' => 'error',
                    'error' => $e->getMessage(),
                );
            }
            return response()->json($data, $data['code']);
        } else {
            $data = array(
                'code' => 200,
                'status' => 'sin datos',
                'message' => 'Ingrese todos los datos para relizar una consulta',
            );
            return response()->json($data, $data['code']);
        }
    }

    public function pdfReporteUnoMineral($mineral)
    {
        try {


            // Obtiene la fecha y hora actual
            $fechaHoraActual = Carbon::now();

            // Puedes formatear la fecha y hora según tus necesidades
            $formato = 'Y-m-d H:i:s';
            $fechaHoraFormateada = $fechaHoraActual->format($formato);

            // Obtener la lista de empresas
            $listaEmpresas = Empresa::with('municipio')
                ->where('mineral', 'ILIKE', '%' . $mineral . '%')
                ->get()
                ->toArray();

            $minerales = $mineral;

            // Obtener la cantidad de empresas
            $cantidadEmpresas = count($listaEmpresas);


            // Carga la vista en el objeto PDF
            $pdf = PDF::loadView('dashboard.reportes.reporte_pdf_unomineral', compact('fechaHoraFormateada', 'cantidadEmpresas', 'minerales', 'listaEmpresas'));

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

    // Lista de formularios por empresa
    function viewFormularioLista()
    {
        $ruims = Empresa::where('user_active', 1)->get();
        return view('dashboard/reportes.view_lista_formulario', compact('ruims'));
    }

    function dataFormularioLista(Request $request)
    {

        $params = (object) $request->all(); // Devulve un obejto
        $paramsArray = $request->all(); // Devulve un Array


        $fechaHora = $params->periodo;

        // Extraer año y mes de $fechaHora
        $año = date('Y', strtotime($fechaHora));
        $mes = date('m', strtotime($fechaHora));

        if ($params->empresaId != null || $params->periodo != null) {

            // Consulta año actual
            $usuarios = User::where('id_login', $params->empresaId)
                ->where('name_bd', 'empresas')
                ->first();

            $usuariosId = $usuarios->id;

            // Consulta en la base de datos con selección de campos y orden descendente por nro_formulario
            $formulario = Formulario::where('users_id', $usuariosId)
                ->whereYear('fecha_emision', $año)
                ->whereMonth('fecha_emision', $mes)
                ->orderBy('nro_formulario', 'desc')
                // ->select('nro_formulario', 'razon_social', 'tipo_min_metalico', 'tipo_min_nometalico')
                ->get();

            return datatables($formulario)->toJson(); // paginacion del lado del servidor

        } else {
            $data = array(
                'code' => 200,
                'status' => 'sin datos',
                'message' => 'Ingrese todos los datos para relizar una consulta',
            );
            return response()->json($data, $data['code']);
        }
    }
}