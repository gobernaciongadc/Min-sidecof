<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
Reporte cantidad de formularios por empresas
@endsection


@section('migajas')
<li class="breadcrumb-item"><a>Inicio</a></li>
<li class="breadcrumb-item">Reportes</li>
<li class="breadcrumb-item active">Empresas por mineral</li>
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
                    <h5 class="text-uppercase text-center mt-2">Cantidad de empresas por mineral autorizado</h5>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 mt-3">
                            <div class="form-group borde-consulta p-4">

                                <div class="row">
                                    <div class="col-12  name-empresa">
                                        <label for="">Mineral</label><br>
                                        <select class="select-reporte-uno" name="mineral" style="width: 100%;" id="mineral">
                                            <option value="" selected disabled>-Seleccionar-</option>
                                            @foreach($minerales as $mineral)
                                            <option value="{{ $mineral->nombre }}">{{ $mineral->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="btn-consulta mt-4 d-flex justify-content-end">
                                        <button class="btn btn-primary " style="width:100%;" type="button" id="consulta-reporte">CONSULTAR</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                $('.select-reporte-uno').select2();

                                const mineralInput = document.getElementById('mineralInput');
                                const fechaInput = document.getElementById('fecha');
                                const totalInput = document.getElementById('total');
                                const btn_reporte_uno = document.getElementById('btn-reporte-uno');

                                $("#consulta-reporte").click(() => {
                                    // Obtiene los valores seleccionados de los select
                                    const mineral = $("#mineral").val();

                                    // Crea un objeto con los datos a enviar
                                    const datos = {
                                        _token: '{{ csrf_token() }}',
                                        mineral: mineral,
                                    };
                                    // Realiza la solicitud AJAX
                                    $.ajax({
                                        type: "POST", // Puedes cambiar a GET si es más apropiado
                                        url: "{{route('admin.resultadosreporteunomineral')}}", // Reemplaza con la URL correcta de tu controlador
                                        data: datos,
                                        success: function(response) {
                                            // Maneja la respuesta exitosa aquí

                                            const {
                                                listaEmpresas,
                                                cantidadEmpresas,
                                                status

                                            } = response;


                                            if (status === 'success' && listaEmpresas.length != 0) {
                                                $('#primer-reporte').removeClass('d-none');
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

                                                mineralInput.innerText = mineral;

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
                                                fechaInput.innerText = fechaActual.toLocaleString('es-ES', formatoFechaHora);
                                                // Para el año**************
                                                // Vaciar la tabla antes de agregar nuevas filas
                                                $('#reporte-uno').empty();
                                                // Itera a través de los datos en la respuesta y agrega filas a la tabla
                                                for (let i = 0; i < listaEmpresas.length; i++) {
                                                    let rowData = listaEmpresas[i];
                                                    let newRow = '<tr>' +
                                                        '<td>' + (i + 1) + '</td>' +
                                                        '<td>' + rowData.nombres + '</td>' +
                                                        '<td>' + rowData.mineral + '</td>' +
                                                        '<td>' + rowData.municipio.municipio + '</td>' +
                                                        '</tr>';
                                                    $('#reporte-uno').append(newRow);
                                                }

                                                let newTotal = '<tr>' +
                                                    `<td colspan="4">
                                                      <div class="col-md-12">
                                                        <div class="pull-right m-t-30 text-right">
                                                            <hr>
                                                            <h5><b>Total candidad de empresas por mineral autorizado :</b> <span>${cantidadEmpresas}</span></h5>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                      
                                                      </div>
                                                    </tr>`;
                                                $('#reporte-uno').append(newTotal);
                                                // FIN Para el año****************                              


                                                let btn_imprimir = `
                                                        <a  href="/pdfreporteunomineral/${mineral}" target="_blank" id="btn-reporte-uno" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir">
                                                            <i class="bi bi-printer"></i> Imprimir reporte
                                                        </a>
                                                           <button onclick="exportarExcel()" id="btn-excel" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Archivo excel">
                                                            <i class="bi bi-filetype-csv"></i> Reporte Excel
                                                        </button>
                                                        `;
                                                // Limpia el contenido antes de agregar el nuevo botón
                                                $('#btn-imprimir').empty().append(btn_imprimir);

                                                totalInput.innerText = cantidadEmpresas;

                                            } else if (status === 'sin datos') {

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
                                            } else {
                                                var elemento = document.getElementById('primer-reporte');
                                                elemento.className += ' d-none';
                                                Toastify({
                                                    text: 'SISTEMA DE REGALIAS MINERAS, NO SE ENCONTRARON DATOS',
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
                            <h5 class="text-center text-uppercase">Cantidad de empresas por mineral autorizado</h5>

                            <div class="row mt-5">
                                <div class="col-12 col-md-6">
                                    <p class="mb-1"><strong>Mineral autorizado: </strong><span id="mineralInput"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="mb-1"><strong>Fecha y hora reporte: </strong><span id="fecha"></span></p>
                                </div>
                            </div>

                            <div class="row mt-3">

                                <!-- REPORTE UNO -->
                                <div class="col-8" id="miTabla">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td class="header" colspan="4" data-f-sz="18" data-f-color="" data-a-h="center" data-a-v="middle" data-f-underline="true">
                                                        <p class="text-uppercase text-danger"><strong>Reporte de empresas por mineral autorizado <span id="anio-uno"></span></strong></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Empresa/Coperativa</th>
                                                    <th>Mineral(s) autorizados</th>
                                                    <th>Municipio</th>
                                                </tr>
                                            </thead>
                                            <tbody id="reporte-uno">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-right" id="btn-imprimir"></div>
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

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection