<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
Reporte cantidad de formularios por empresas
@endsection


@section('migajas')
<li class="breadcrumb-item"><a>Inicio</a></li>
<li class="breadcrumb-item">Reportes</li>
<li class="breadcrumb-item active">Cantidad de formularios por RUIM</li>
@endsection


@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header bg-reportes">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <span class="text-uppercase color-titulo text-white">Gestión Reportes </span>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="text-uppercase text-center mt-2">Cantidad de formulario por actor productivo</h5>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 mt-3">
                            <div class="form-group borde-consulta p-4">

                                <div class="row">
                                    <div class="col-12 col-md-6 name-empresa">
                                        <label for="">Empresa/Cooperativa</label><br>
                                        <select class="select-reporte-uno" name="ruims" style="width: 100%;" id="empresas">
                                            <option value="" selected disabled>-Seleccionar-</option>
                                            @foreach($ruims as $ruim)
                                            <option value="{{ $ruim->id }}">{{ $ruim->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class=" col-12 col-md-6 mes">
                                        <label for="">Periodo</label><br>
                                        <select class="form-select" name="mes" style="width: 100%;" id="meses">
                                            <option value="" selected disabled>-Selecionar-</option>
                                            <option value="1">Año Actual</option>
                                            <option value="2">Ultimos Dos Años</option>
                                            <option value="3">Ultimos Tres Años </option>
                                        </select>
                                    </div>

                                    <div class="btn-consulta d-flex justify-content-end mt-4">
                                        <button class="btn btn-primary" style="width: 250px;" type="button" id="consulta-reporte">CONSULTAR</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                $('.select-reporte-uno').select2();
                                const nombres = document.getElementById('nombres');
                                const metales = document.getElementById('metales');
                                const nim = document.getElementById('nim');
                                const ruim = document.getElementById('ruim');
                                const estado = document.getElementById('estado');
                                const fecha = document.getElementById('fecha');
                                const total = document.getElementById('total');

                                const anio_uno = document.getElementById('anio-uno');
                                const anio_dos = document.getElementById('anio-dos');
                                const anio_tres = document.getElementById('anio-tres');

                                // Crear una instancia de Date
                                const fechaActual = new Date();

                                // Obtener el año actual
                                const añoActual = fechaActual.getFullYear();

                                anio_uno.innerText = añoActual;
                                anio_dos.innerText = añoActual - 1;
                                anio_tres.innerText = añoActual - 2;

                                const btn_reporte_uno = document.getElementById('btn-reporte-uno');

                                $("#consulta-reporte").click(() => {
                                    // Obtiene los valores seleccionados de los select
                                    const empresaId = $("#empresas").val();
                                    const periodo = $("#meses").val();

                                    // Crea un objeto con los datos a enviar
                                    const datos = {
                                        _token: '{{ csrf_token() }}',
                                        empresaId: empresaId,
                                        periodo: periodo
                                    };

                                    // Realiza la solicitud AJAX
                                    $.ajax({
                                        type: "POST", // Puedes cambiar a GET si es más apropiado
                                        url: "{{route('admin.resultadosreporteuno')}}", // Reemplaza con la URL correcta de tu controlador
                                        data: datos,
                                        success: function(response) {
                                            // Maneja la respuesta exitosa aquí

                                            $('#primer-reporte').removeClass('d-none');
                                            const {
                                                empresa,
                                                resultadomes,
                                                resultadosPreviousYear,
                                                resultadosPreviousYearTres,

                                                resultadoTotalPreviousYear,
                                                resultadototal,
                                                resultadoTotalPreviousYearTres,
                                                status,
                                                usuariosId,
                                                periodoBack
                                            } = response;


                                            function estado() {
                                                if (status === 'success') {
                                                    Toastify({
                                                        text: 'SISTEMA DE REGALIAS MINERAS, DATOS ENCONTRADOS',
                                                        duration: 3000,
                                                        newWindow: true,
                                                        close: false,
                                                        gravity: "top", // `top` or `bottom`
                                                        position: "right", // `left`, `center` or `right`
                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                        style: {
                                                            background: "#36ad76", // Success
                                                            // "# 36 ad76 " danger
                                                            padding: "15px 15px",
                                                            borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                        },
                                                        onClick: function() {} // Callback after click
                                                    }).showToast();

                                                    nombres.innerText = empresa.nombres;
                                                    metales.innerText = empresa.mineral;
                                                    nim.innerText = empresa.nro_nim;
                                                    ruim.innerText = empresa.ruim;
                                                    estado.innerText = empresa.estado;
                                                    // Obtener la fecha y hora actual
                                                    const fechaActual = new Date();
                                                    const formatoFechaHora = {
                                                        year: 'numeric',
                                                        month: 'long',
                                                        day: 'numeric',
                                                        hour: 'numeric',
                                                        minute: 'numeric',
                                                        second: 'numeric',
                                                        hour12: false,
                                                        timeZone: 'America/La_Paz' // La Paz, Bolivia (GMT-4)
                                                    };

                                                    fecha.innerText = fechaActual.toLocaleString('es-ES', formatoFechaHora);


                                                    // Para el año**************
                                                    // Vaciar la tabla antes de agregar nuevas filas
                                                    $('#reporte-uno').empty();
                                                    // Itera a través de los datos en la respuesta y agrega filas a la tabla
                                                    for (let i = 0; i < resultadomes.length; i++) {
                                                        let rowData = resultadomes[i];
                                                        let newRow = '<tr>' +
                                                            '<td>' + (i + 1) + '</td>' +
                                                            '<td>' + obtenerNombreMes(rowData.mes) + '</td>' +
                                                            '<td>' + rowData.total_formularios + '</td>' +
                                                            '</tr>';
                                                        $('#reporte-uno').append(newRow);
                                                    }
                                                    // FIN Para el año****************

                                                    // Para el año-DOS**************
                                                    // Vaciar la tabla antes de agregar nuevas filas
                                                    $('#reporte-dos').empty();
                                                    // Itera a través de los datos en la respuesta y agrega filas a la tabla
                                                    for (let i = 0; i < resultadosPreviousYear.length; i++) {
                                                        let rowData = resultadosPreviousYear[i];
                                                        let newRow = '<tr>' +
                                                            '<td>' + (i + 1) + '</td>' +
                                                            '<td>' + obtenerNombreMes(rowData.mes) + '</td>' +
                                                            '<td>' + rowData.total_formularios + '</td>' +
                                                            '</tr>';
                                                        $('#reporte-dos').append(newRow);
                                                    }
                                                    // FIN Para el año-DOS****************

                                                    // Para el año-Tres**************
                                                    // Vaciar la tabla antes de agregar nuevas filas
                                                    $('#reporte-tres').empty();
                                                    // Itera a través de los datos en la respuesta y agrega filas a la tabla
                                                    for (let i = 0; i < resultadosPreviousYearTres.length; i++) {
                                                        let rowData = resultadosPreviousYearTres[i];
                                                        let newRow = '<tr>' +
                                                            '<td>' + (i + 1) + '</td>' +
                                                            '<td>' + obtenerNombreMes(rowData.mes) + '</td>' +
                                                            '<td>' + rowData.total_formularios + '</td>' +
                                                            '</tr>';
                                                        $('#reporte-tres').append(newRow);
                                                    }
                                                    // FIN Para el año-Tres****************

                                                    const empresaId = empresa.id;
                                                    let btn_imprimir = `
                                                        <a  href="/pdfreporteuno/${empresaId}/${usuariosId}/${periodoBack}" target="_blank" id="btn-reporte-uno" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir">
                                                            <i class="bi bi-printer"></i> Imprimir reporte
                                                        </a>
                                                        `;
                                                    // Limpia el contenido antes de agregar el nuevo botón
                                                    $('#btn-imprimir').empty().append(btn_imprimir);

                                                    // Meses
                                                    // Función para convertir números de mes a nombres de mes
                                                    function obtenerNombreMes(numeroMes) {
                                                        switch (numeroMes) {
                                                            case '1':
                                                                return 'Enero';
                                                            case '2':
                                                                return 'Febrero';
                                                            case '3':
                                                                return 'Marzo';
                                                            case '4':
                                                                return 'Abril';
                                                            case '5':
                                                                return 'Mayo';
                                                            case '6':
                                                                return 'Junio';
                                                            case '7':
                                                                return 'Julio';
                                                            case '8':
                                                                return 'Agosto';
                                                            case '9':
                                                                return 'Septiembre';
                                                            case '10':
                                                                return 'Octubre';
                                                            case '11':
                                                                return 'Noviembre';
                                                            case '12':
                                                                return 'Diciembre';
                                                            default:
                                                                return '';
                                                        }
                                                    }
                                                    switch (periodoBack) {
                                                        case '1':
                                                            $('#uno').show();
                                                            $('#dos').hide(); // Cambiado de hidden() a hide()
                                                            $('#tres').hide(); // Cambiado de hidden() a hide()
                                                            total.innerText = resultadototal.total_formularios;
                                                            break;
                                                        case '2':
                                                            $('#uno').show();
                                                            $('#dos').show(); // Cambiado de hidden() a hide()
                                                            $('#tres').hide(); // Cambiado de hidden() a hide()
                                                            total.innerText = Number(resultadototal.total_formularios) + Number(resultadoTotalPreviousYear.total_formularios);
                                                            break;

                                                        case '3':
                                                            $('#uno').show();
                                                            $('#dos').show(); // Cambiado de hidden() a hide()
                                                            $('#tres').show(); // Cambiado de hidden() a hide()
                                                            total.innerText = Number(resultadototal.total_formularios) + Number(resultadoTotalPreviousYear.total_formularios) + Number(resultadoTotalPreviousYearTres.total_formularios);
                                                            break;
                                                        default:
                                                            break;
                                                    }

                                                }

                                                if (status === 'sin datos') {
                                                    Toastify({
                                                        text: 'SISTEMA DE REGALIAS MINERAS, INGRESE TODOS LOS DATOS PARA REALIZAR UNA CONSULTA',
                                                        duration: 3000,
                                                        newWindow: true,
                                                        close: false,
                                                        gravity: "top", // `top` or `bottom`
                                                        position: "right", // `left`, `center` or `right`
                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                        style: {
                                                            background: "#dc3545", // Success
                                                            // "# 36 ad76 " danger
                                                            padding: "15px 15px",
                                                            borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                        },
                                                        onClick: function() {} // Callback after click
                                                    }).showToast();
                                                }
                                            }

                                            switch (periodoBack) {
                                                case "1":

                                                    if (resultadototal.total_formularios === 0 || resultadototal.total_formularios === null) {
                                                        Toastify({
                                                            text: 'SISTEMA DE REGALIAS MINERAS, SIN DATOS',
                                                            duration: 3000,
                                                            newWindow: true,
                                                            close: false,
                                                            gravity: "top", // `top` or `bottom`
                                                            position: "right", // `left`, `center` or `right`
                                                            stopOnFocus: true, // Prevents dismissing of toast on hover
                                                            style: {
                                                                background: "#dc3545", // Success
                                                                // "# 36 ad76 " danger
                                                                padding: "15px 15px",
                                                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                            },
                                                            onClick: function() {} // Callback after click
                                                        }).showToast();
                                                    } else {

                                                        estado();
                                                    }
                                                    break;
                                                case "2":
                                                    if (resultadototal.total_formularios === 0 || resultadototal.total_formularios === null) {
                                                        Toastify({
                                                            text: 'SISTEMA DE REGALIAS MINERAS, SIN DATOS',
                                                            duration: 3000,
                                                            newWindow: true,
                                                            close: false,
                                                            gravity: "top", // `top` or `bottom`
                                                            position: "right", // `left`, `center` or `right`
                                                            stopOnFocus: true, // Prevents dismissing of toast on hover
                                                            style: {
                                                                background: "#dc3545", // Success
                                                                // "# 36 ad76 " danger
                                                                padding: "15px 15px",
                                                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                            },
                                                            onClick: function() {} // Callback after click
                                                        }).showToast();
                                                    } else {
                                                        estado();
                                                    }
                                                    break;
                                                case "3":
                                                    if (resultadototal.total_formularios === 0 || resultadototal.total_formularios === null) {
                                                        Toastify({
                                                            text: 'SISTEMA DE REGALIAS MINERAS, SIN DATOS',
                                                            duration: 3000,
                                                            newWindow: true,
                                                            close: false,
                                                            gravity: "top", // `top` or `bottom`
                                                            position: "right", // `left`, `center` or `right`
                                                            stopOnFocus: true, // Prevents dismissing of toast on hover
                                                            style: {
                                                                background: "#dc3545", // Success
                                                                // "# 36 ad76 " danger
                                                                padding: "15px 15px",
                                                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                            },
                                                            onClick: function() {} // Callback after click
                                                        }).showToast();
                                                    } else {
                                                        estado();
                                                    }
                                                    break;
                                                default:
                                                    Toastify({
                                                        text: 'SISTEMA DE REGALIAS MINERAS, SIN DATOS',
                                                        duration: 3000,
                                                        newWindow: true,
                                                        close: false,
                                                        gravity: "top", // `top` or `bottom`
                                                        position: "right", // `left`, `center` or `right`
                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                        style: {
                                                            background: "#dc3545", // Success
                                                            // "# 36 ad76 " danger
                                                            padding: "15px 15px",
                                                            borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                        },
                                                        onClick: function() {} // Callback after click
                                                    }).showToast();
                                                    break;
                                            }
                                        },
                                        error: function(error) {
                                            // Maneja los errores aquí
                                            console.error(error);
                                        }
                                    });
                                });

                            });
                        </script>
                    </div>

                    <hr>
                    <div class="reporte-cant-formulario borde-consulta d-none" id="primer-reporte">

                        <div class="reporte-logo">
                            <div>
                                <img class="reporte-logo__img" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                            </div>

                            <p class="reporte-logo__titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                            <div>
                                <img class="reporte-logo__img" src="dashboard/img/logo-gadc.png" alt="Logo gobernación">
                            </div>
                        </div>
                        <hr>

                        <!-- Datos de la empresa y resultado de  -->
                        <div class="datos-reporte">
                            <h5 class="text-center text-uppercase">Cantidad de formularios por actor productivo</h5>

                            <div class="row mt-5">
                                <div class="col-12 col-md-6">
                                    <p class="mb-1"><strong>Empresa/Cooperativa: </strong><span id="nombres"></span></p>
                                    <p class="mb-1"><strong>Minerales permitidos: </strong><span id="metales"></span></p>
                                    <p class="mb-1"><strong>Nro. NIM: </strong><span id="nim"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="mb-1"><strong>Nro. Ruim: </strong><span id="ruim"></span></p>
                                    <p class="mb-1"><strong>Estado: </strong><span id="estado"></span></p>
                                    <p class="mb-1"><strong>Fecha y hora reporte: </strong><span id="fecha"></span></p>
                                </div>
                            </div>

                            <div class="row mt-3">

                                <!-- REPORTE UNO -->
                                <div class="col-md-4" id="uno">

                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover" id="miTabla">
                                            <thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="text-uppercase text-danger"><strong>Reporte Año <span id="anio-uno"></span></strong></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mes</th>
                                                    <th class="text-right">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="reporte-uno">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <script>
                                    function exportarExcel() {
                                        TableToExcel.convert(document.getElementById("miTabla"), {
                                            name: "table1.xlsx",
                                            sheet: {
                                                name: "Sheet 1"
                                            }
                                        });
                                    }
                                </script>

                                <!-- REPORTE DOS -->
                                <div class="col-md-4" id="dos">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover" id="">
                                            <thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="text-uppercase text-danger"><strong>Reporte Año <span id="anio-dos"></span></strong></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mes</th>
                                                    <th class="text-right">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="reporte-dos">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- REPORTE TRES -->
                                <div class="col-md-4" id="tres">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <p class="text-uppercase text-danger"><strong>Reporte Año <span id="anio-tres"></span></strong></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mes</th>
                                                    <th class="text-right">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="reporte-tres">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <hr>
                                        <h5><b>Cantidad Total de Formularios :</b> <span id="total"></span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right" id="btn-imprimir"></div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection