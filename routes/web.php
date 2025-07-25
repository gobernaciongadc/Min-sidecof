<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MetalicoController;
use App\Http\Controllers\MineroController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NometalicoController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UserController;
use App\Models\Empresa;
use App\Models\Formulario;
use App\Models\Minero;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


// En routes/web.php
Auth::routes(['register' => false, 'reset' => false, 'logout' => true]);

Route::get('/logout', function () {
    return redirect('/')->with('error', 'Debes cerrar sesión desde el botón de logout.');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    /*************RUTAS MUNICIPIOS********/
    Route::resource('dashboard/municipio', MunicipioController::class)->names('admin.municipios');

    /*************RUTAS FUNCIONARIOS********/
    Route::resource('dashboard/funcionario', FuncionarioController::class)->names('admin.funcionarios');

    /*************RUTAS METALICOS********/
    Route::resource('dashboard/metalico', MetalicoController::class)->names('admin.metalicos');
    Route::post('buscaralicuotametalico', [MetalicoController::class, 'buscarAlicuotaMetalico'])->name('admin.buscaralicuotametalico');

    /*************RUTAS NO METALICOS********/
    Route::resource('dashboard/nometalico', NometalicoController::class)->names('admin.nometalicos');
    Route::post('buscaralicuotanometalico', [NometalicoController::class, 'buscarAlicuotaNometalico'])->name('admin.buscaralicuotanometalico');

    /*************RUTAS EMPRESAS********/
    Route::resource('dashboard/empresa', EmpresaController::class)->names('admin.empresas');
    Route::post('indexminerales', [EmpresaController::class, 'indexMinerales'])->name('admin.indexminerales');
    Route::post('verdocumentopdf', [EmpresaController::class, 'verDocumentoPdf'])->name('admin.verdocumentopdf');
    Route::get('pdfruim/{id}', [EmpresaController::class, 'pdfRuim'])->name('admin.pdfruim');

    /*************RUTAS MINEROS********/
    Route::resource('dashboard/minero', MineroController::class)->names('admin.mineros');
    Route::post('verdocumentopdfminero', [MineroController::class, 'verDocumentoPdfMinero'])->name('admin.verdocumentopdfminero');
    Route::get('dashboard/minero/getdata/{id}', [MineroController::class, 'showGetData'])->name('admin.showgetdata');
    /*************RUTAS FORMULARIOS********/
    Route::resource('dashboard/formulario', FormularioController::class)->names('admin.formularios');


    Route::get('dashboard/formulario/opcion/{opcion}', [FormularioController::class, 'createTipos'])->name('admin.tipo.formularios.create');

    // Externo
    Route::resource('dashboard/externo', FormularioController::class)->names('admin.formularios');
    // Interno
    Route::resource('dashboard/interno', FormularioController::class)->names('admin.formularios');

    // Ruta personalizada para mostrar el perfil con un parámetro adicional
    Route::get('dashboard/formulario/{id}/{datos}', [FormularioController::class, 'show']);

    Route::get('staging', [FormularioController::class, 'staging'])->name('admin.staging');
    Route::get('emitidos', [FormularioController::class, 'emitidos'])->name('admin.emitidos');
    Route::get('observacion', [FormularioController::class, 'observacion'])->name('admin.observacion');
    Route::post('buscarFormulario', [FormularioController::class, 'buscarFormulario'])->name('admin.buscarFormulario');
    Route::put('updateObservacion', [FormularioController::class, 'updateObservacion'])->name('admin.updateObservacion');
    Route::get('updated_staging/{id}', [FormularioController::class, 'updated_staging'])->name('admin.updated_staging');

    Route::get('prueba_pdf/{id}', [FormularioController::class, 'prueba_pdf'])->name('admin.prueba_pdf');
    Route::get('gestionbuscar', [FormularioController::class, 'gestionBuscar'])->name('admin.gestionbuscar');
    Route::post('datosgestionbuscar', [FormularioController::class, 'datosGestionBuscar'])->name('admin.datosgestionbuscar');

    /*************RUTAS SEGUIMIENTO********/
    Route::get('actividad', [UbicacionController::class, 'actividad'])->name('admin.actividad');
    Route::post('datosactividad', [UbicacionController::class, 'datosActividad'])->name('admin.datosactividad');
    Route::post('storeactividad', [UbicacionController::class, 'storeActividad'])->name('admin.storeactividad');
    Route::get('gestionbuscarubicacion', [UbicacionController::class, 'gestionBuscarUbicacion'])->name('admin.gestionbuscarubicacion');
    Route::post('datosgestionbuscarubicacion', [UbicacionController::class, 'datosGestionBuscarUbicacion'])->name('admin.datosgestionbuscarubicacion');

    /*************RUTAS PARA USUARIOS********/
    Route::resource('dashboard/usuario', UserController::class)->names('admin.usuarios');

    // Ruta personalizada para mostrar el perfil con un parámetro adicional
    Route::get('dashboard/usuario/{id}/mostrar/{opcion}', [UserController::class, 'show'])->name('admin.usuarios.show');
    Route::post('indexusuarios', [UserController::class, 'indexUsuarios'])->name('admin.indexusuarios');
    Route::get('habilitaruser/{id}', [UserController::class, 'habilitarUser'])->name('admin.habilitaruser');
    Route::get('viewpassword', [UserController::class, 'viewPassword'])->name('admin.viewpassword');
    Route::post('changespassword', [UserController::class, 'changesPassword'])->name('admin.changespassword');


    Route::get('gestionbuscarfinalizar', [FormularioController::class, 'gestionBuscarFinalizar'])->name('admin.gestionbuscarfinalizar');
    Route::post('datosgestionbuscarfinalizar', [FormularioController::class, 'datosGestionBuscarFinalizar'])->name('admin.datosgestionbuscarfinalizar');
    Route::post('finalizarformulario', [FormularioController::class, 'finalizarFormulario'])->name('admin.finalizarformulario');


    /*************RUTAS PARA REPORTES********/
    // Reporte 1
    Route::get('cantidadformularios', [ReportesController::class, 'cantidadFormularios'])->name('admin.cantidadformularios');
    Route::post('resultadosreporteuno', [ReportesController::class, 'resultadosReporteUno'])->name('admin.resultadosreporteuno');

    Route::get('pdfreporteuno/{empresaId}/{usuarioId}/{periodoBack}', [ReportesController::class, 'pdfReporteUno'])->name('admin.pdfreporteuno');

    // Reporte 2
    Route::get('cantidadformulariosmunicipio', [ReportesController::class, 'cantidadFormulariosMunicipio'])->name('admin.cantidadformulariosmunicipio');
    Route::post('resultadosreporteunomunicipio', [ReportesController::class, 'resultadosReporteUnoMunicipio'])->name('admin.resultadosreporteunomunicipio');
    Route::get('pdfreporteunomunicipio/{municipioId}', [ReportesController::class, 'pdfReporteUnoMunicipio'])->name('admin.pdfreporteunomunicipio');

    // Reporte 4
    Route::get('cantidadformulariosanio', [ReportesController::class, 'cantidadFormulariosAnio'])->name('admin.cantidadformulariosanio');
    Route::post('resultadosreporteunoanio', [ReportesController::class, 'resultadosReporteUnoAnio'])->name('admin.resultadosreporteunoanio');
    Route::get('pdfreporteunoanio/{anio}', [ReportesController::class, 'pdfReporteUnoAnio'])->name('admin.pdfreporteunoanio');

    // Reporte 3
    Route::get('cantidadformulariosmineral', [ReportesController::class, 'cantidadFormulariosMineral'])->name('admin.cantidadformulariosmineral');
    Route::post('resultadosreporteunomineral', [ReportesController::class, 'resultadosReporteUnoMineral'])->name('admin.resultadosreporteunomineral');
    Route::get('pdfreporteunomineral/{mineral}', [ReportesController::class, 'pdfReporteUnoMineral'])->name('admin.pdfreporteunomineral');

    // Reporte 4
    Route::get('viewformulariolista', [ReportesController::class, 'viewFormularioLista'])->name('admin.viewformulariolista');
    Route::post('dataformulariolista', [ReportesController::class, 'dataFormularioLista'])->name('admin.dataformulariolista');
    // Route::get('pdfreporteunomineral/{mineral}', [ReportesController::class, 'pdfReporteUnoMineral'])->name('admin.pdfreporteunomineral');

});


// End point libre de token Libre de token
Route::get('pdf/{id}', [FormularioController::class, 'pdf'])->name('admin.pdf');
