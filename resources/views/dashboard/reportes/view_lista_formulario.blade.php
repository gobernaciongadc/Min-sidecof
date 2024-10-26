@extends('dashboard.layouts.main')

@section('template_title')
Buscar Formulario
@endsection

@section('migajas')
<li class="breadcrumb-item"><a>Inicio</a></li>
<li class="breadcrumb-item">Reportes</li>
<li class="breadcrumb-item active">Lista de formularios por empresa</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-reportes">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Gestión reportes') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="text-uppercase text-center mt-2">Lista de formularios por empresa/cooperativa</h5>

                    <!-- formulario de consulta -->
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

                                    <style>
                                        input[type="month"] {
                                            width: 100%;
                                            padding: 7px;
                                            box-sizing: border-box;
                                            font-size: 14px;
                                            border: 1px solid #ccc;
                                            border-radius: 4px;
                                            margin-bottom: 10px;
                                        }
                                    </style>
                                    <div class="col-12 col-md-6 mes">
                                        <label for="">Mes y Año</label><br>
                                        <input type="month" class="form-control" id="yearMonth">
                                    </div>
                                    <span id="error_buscar" class="invalid-feedback"></span>
                                    <div class="btn-consulta d-flex justify-content-end mt-4">
                                        <button class="btn btn-primary" style="width: 250px;" type="button" id="consulta-reporte" disabled>CONSULTAR</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <hr>

                    <div class="">
                        <br><br>
                        <div class="reporte-logo mb-4">
                            <div>
                                <img class="reporte-logo__img" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                            </div>

                            <p class="reporte-logo__titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                            <div>
                                <img class="reporte-logo__img" src="dashboard/img/logo-gadc.png" alt="Logo gobernación">
                            </div>
                        </div>
                        <hr>
                        <!-- FIN formulario de consulta -->
                        <div class="table-responsive--custom">
                            <table class="table table-striped mt-4" id="gestion_buscar_1" style="width: 100%;">
                                <thead class="thead border">
                                    <tr>
                                        <th style="width: 10%;">Nro formulario</th>
                                        <!-- <th>Id formulario</th> -->
                                        <th>Razón social</th>
                                        <th>Tipo metal</th>
                                        <th>Alicuota</th>
                                        <th>Transporte</th>
                                        <th>Chofer</th>
                                        <th>Placa</th>
                                        <th>Fecha emisión</th>
                                        <th>Fecha validez</th>
                                        <th>Comercio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script de gestión de busqueda de formulario -->
<script>
    document.addEventListener("DOMContentLoaded", () => {

        $('.select-reporte-uno').select2();
        const error_buscar = document.getElementById('error_buscar');
        const spinner = document.getElementById('spinner'); // Obtén el elemento del spinner

        const empresaId = document.getElementById('empresas');
        const periodo = document.getElementById('yearMonth');

        const consultaReporteButton = document.getElementById('consulta-reporte');

        // Función para verificar si ambos campos están llenos
        function verificarCamposLlenos() {
            var empresasValue = empresaId.value;
            var yearMonthValue = periodo.value;

            return empresasValue !== '' && yearMonthValue !== '';
        }
        // Función para habilitar o deshabilitar el botón según los campos
        function actualizarEstadoBoton() {
            consultaReporteButton.disabled = !verificarCamposLlenos();
        }

        // Agregar eventos de cambio a los campos
        empresaId.addEventListener('change', actualizarEstadoBoton);
        periodo.addEventListener('change', actualizarEstadoBoton);

        // Evento click button
        $('#consulta-reporte').click(function(e) {
            e.preventDefault();
            realizarBusqueda();
        });

        function realizarBusqueda() {

            const data = {
                _token: '{{ csrf_token() }}',
                empresaId: empresaId.value,
                periodo: periodo.value
            };
            // Destruir DataTables
            $('#gestion_buscar_1').DataTable().destroy();

            $('#gestion_buscar_1').DataTable({
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.dataformulariolista") }}',
                    type: 'POST',
                    data: data
                },
                columns: [{
                        data: 'nro_formulario',
                        render: function(data, type, row) {
                            return data !== null ? data : '<span class="text-danger">SIN EMISIÓN</span>';
                        }
                    },
                    {
                        data: 'razon_social'
                    },
                    {
                        data: 'tipo_min_metalico',
                        render: function(data, type, row) {
                            return data !== null ? data : row.tipo_min_nometalico;
                        }
                    },
                    {
                        data: 'alicuota'
                    },
                    {
                        data: 'transporte',
                        render: function(data, type, row) {
                            return row.comercio === 'Externo' && data === 'Via ferrea' ? 'Otros' : data;
                        }
                    },
                    {
                        data: 'chofer',
                        render: function(data, type, row) {
                            return data !== null ? data : row.tipo_min_nometalico;
                        }
                    },
                    {
                        data: 'placa'
                    },
                    {
                        data: 'fecha_emision'
                    },
                    {
                        data: 'fecha_valides',
                        render: function(data, type, row) {
                            return data !== null ? data : '<span class="text-danger">---</span>';
                        }
                    },
                    {
                        data: 'comercio'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return `
                             <form action="/admin/formularios/destroy/" method="POST" class="btn-emitidos">
                                    <div class="">
                                        <a href="/dashboard/formulario/${row.id}/reporte" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos"><i class="bi bi-eye"></i></a>
                                    </div>
                                    <div class="btn-separar">
                                      ${(row.nro_formulario !== null ? `
                                        <a href="/pdf/${row.id}?nro_formulario=${row.nro_formulario}&token=GobiernoAutónomoDepartamentalDeCochabamba" target="_blank" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir"><i class="bi bi-printer"></i></a>
                                        ` : `<a class="btn btn-warning disabled-link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir"><i class="bi bi-printer"></i></a>`)}
                                    </div>
                                    <div class="btn-separar">

                                    ${(row.nro_formulario !== null ? `
                                        <a href="/pdf/${row.id}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Descargar" download><i class="bi bi-download"></i></a>
                                        ` : `<a  class="btn btn-secondary disabled-link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Descargar" download><i class="bi bi-download"></i></a>`)}
                                    </div>
                             </form>
                            `
                        }
                    }
                ],
                language: {
                    info: 'Mostrando _START_ al _END_ de _TOTAL_ registros',
                    infoFiltered: '(filtrados de un total de _MAX_ registros)',
                    lengthMenu: ' _MENU_ registros por página',
                    zeroRecords: 'Nada encontrado - lo siento',
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    },
                    search: 'Buscar'
                },
                initComplete: function(response) {
                    Toastify({
                        text: 'CONSULTA REALIZADA CON EXITO!',
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
                }

            });

        }


    });
</script>
<!-- FIN Script de gestión de busqueda de formulario -->
@endsection