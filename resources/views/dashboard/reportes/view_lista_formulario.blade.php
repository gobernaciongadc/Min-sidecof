@extends('dashboard.layouts.main')

@section('template_title')
Buscar Formulario
@endsection

@section('migajas')
<li class="breadcrumb-item"><a>Inicio</a></li>
<li class="breadcrumb-item">Reportes</li>
<li class="breadcrumb-item active">Filtrar y buscar por diferentes campos</li>
@endsection

@php
use App\Models\Metalico;
use App\Models\Nometalico;
use App\Models\Municipio;
use App\Models\Minero;
use App\Models\Empresa;

$metalico = Metalico::where('tipo_mercado', 'Interno')->get();
$nometalico = Nometalico::where('tipo_mercado', 'Interno')->get();
$municipios = Municipio::all();
$mineros = Minero::all();
$empresas = Empresa::all();

// Para metales y no metales
$metalicoArray = $metalico->toArray();
$nometalicoArray = $nometalico->toArray();
$metalicoNometalico = collect(array_merge($metalicoArray, $nometalicoArray));

// Para cooperativas
$mineros = Minero::all()->map(function ($item) {
return [
'id' => $item->id,
'nombres' => $item->nombres,
'tipo' => 'Minero'
];
});

$empresas = Empresa::all()->map(function ($item) {
return [
'id' => $item->id,
'nombres' => $item->nombres,
'tipo' => 'Empresa'
];
});

$cooperativas = $mineros->merge($empresas);
@endphp

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
                    <h5 class="text-uppercase text-center mt-2">Filtrar y buscar por diferentes campos</h5>

                    <!-- Formulario de busqueda -->
                    <form class="row" method="GET" id="form-filtro" action="{{ route('admin.dataformulariolista') }}">
                        <div class="form-group col-12 col-md-3">
                            <label for="mineralSelect">Mineral</label>
                            <select class="form-control select2" id="mineralSelect" name="mineral">
                                <option value="">-- Selecciona un mineral --</option>
                                @foreach($metalicoNometalico as $item)
                                <option value="{{ $item['simbolo'] }}">
                                    {{ $item['nombre'] ?? $item['nombre'] ?? 'Sin nombre' }} ({{ $item['simbolo'] }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="nim">NIM</label>
                            <input class="form-control" id="nim" type="text" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="mercadoSelect">Comercio</label>
                            <select class="form-control select2" id="mercadoSelect" name="comercio">
                                <option value="">-- Selecciona un mercado --</option>
                                <option value="Interno">
                                    Interno
                                </option>
                                <option value="Externo">
                                    Externo
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="municipioSelect">Municipio</label>
                            <select class="form-control select2" id="municipioSelect" name="municipio">
                                <option value="">-- Selecciona un municipio --</option>
                                @foreach($municipios as $item)
                                <option value="{{ $item->municipio }}">
                                    {{ $item->municipio ?? $item->municipio ?? 'Sin nombre' }} ({{ $item->codigo }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="comercializadora">Comercializadora</label>
                            <input class="form-control" type="text" name="comercializadora" placeholder="Comercializadora o Retención">
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="cooperativaSelect">Cooperativa</label>
                            <select class="form-control select2" id="cooperativaSelect" name="cooperativa">
                                <option value="">-- Selecciona una cooperativa --</option>
                                @foreach($cooperativas as $item)
                                <option value="{{ $item['nombres'] }}">
                                    {{ $item['nombres']  }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="mes_inicio">Desde (mes):</label>
                                    <select class="form-select" name="mes_inicio">
                                        <option value="">-- Mes inicial --</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="mes_fin">Hasta (mes):</label>
                                    <select class="form-select" name="mes_fin">
                                        <option value="">-- Mes final --</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="anio">Año:</label>
                                    <input class="form-control" type="number" name="anio" placeholder="Año" min="2000" max="2099">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-3">
                            <button class="btn btn-primary text-uppercase" type="submit">Buscar Formulario</button>
                        </div>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            $('#mineralSelect').select2({
                                placeholder: "Selecciona un mineral",
                                allowClear: true
                            });
                            $('#mercadoSelect').select2({
                                placeholder: "Selecciona un comercio",
                                allowClear: true
                            });
                            $('#municipioSelect').select2({
                                placeholder: "Selecciona un municipio",
                                allowClear: true
                            });
                            $('#cooperativaSelect').select2({
                                placeholder: "Selecciona una cooperativa",
                                allowClear: true
                            });
                        })
                    </script>

                    <!-- Lista de datos -->
                    <br><br>
                    <hr>
                    <div class="">
                        <br><br>
                        <div class="reporte-logo mb-4">
                            <div>
                                <img class="reporte-logo__img" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                            </div>
                            <p class="reporte-logo__titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria, hidrocarburos y energias</p>
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
                                        <th>Comercializadora</th>
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
        $('#form-filtro').on('submit', function(e) {
            e.preventDefault();

            // Destruir DataTables anterior
            $('#gestion_buscar_1').DataTable().destroy();

            // Inicializar nuevamente la tabla
            const tabla = $('#gestion_buscar_1').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{{ route("admin.dataformulariolista") }}',
                    type: 'POST',
                    data: function(d) {
                        return $.extend({}, d, {
                            _token: '{{ csrf_token() }}',
                            mineral: $('select[name="mineral"]').val(),
                            nim: $('input[name="nim"]').val(),
                            comercio: $('select[name="comercio"]').val(),
                            municipio: $('select[name="municipio"]').val(),
                            comercializadora: $('select[name="comercializadora"]').val(),
                            cooperativa: $('select[name="cooperativa"]').val(),
                            mes_inicio: $('select[name="mes_inicio"]').val(),
                            mes_fin: $('select[name="mes_fin"]').val(),
                            anio: $('input[name="anio"]').val(),
                        });
                    }
                },
                columns: [{
                        data: 'nro_formulario',
                        render: (data) => data ?? '<span class="text-danger">SIN EMISIÓN</span>'
                    },
                    {
                        data: 'razon_social'
                    },
                    {
                        data: 'tipo_min_metalico',
                        render: (data, type, row) => data ?? row.tipo_min_nometalico
                    },
                    {
                        data: 'alicuota'
                    },
                    {
                        data: 'transporte',
                        render: (data, type, row) => row.comercio === 'Externo' && data === 'Via ferrea' ? 'Otros' : data
                    },
                    {
                        data: 'chofer',
                        render: (data, type, row) => data ?? row.tipo_min_nometalico
                    },
                    {
                        data: 'placa'
                    },
                    {
                        data: 'fecha_emision'
                    },
                    {
                        data: 'fecha_valides',
                        render: (data) => data ?? '<span class="text-danger">---</span>'
                    },
                    {
                        data: 'comercio'
                    },
                    {
                        data: 'comprador'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return `
                                <form action="/admin/formularios/destroy/" method="POST" class="btn-emitidos">
                                    <div>
                                        <a href="/dashboard/formulario/${row.id}/reporte" class="btn btn-info" title="Ver datos"><i class="bi bi-eye"></i></a>
                                    </div>
                                    <div class="btn-separar">
                                        ${row.nro_formulario !== null ? `
                                            <a href="/pdf/${row.id}?nro_formulario=${row.nro_formulario}&token=GobiernoAutónomoDepartamentalDeCochabamba" target="_blank" class="btn btn-warning" title="Imprimir"><i class="bi bi-printer"></i></a>
                                        ` : `<a class="btn btn-warning disabled-link" title="Imprimir"><i class="bi bi-printer"></i></a>`}
                                    </div>
                                    <div class="btn-separar">
                                        ${row.nro_formulario !== null ? `
                                            <a href="/pdf/${row.id}" class="btn btn-secondary" title="Descargar" download><i class="bi bi-download"></i></a>
                                        ` : `<a class="btn btn-secondary disabled-link" title="Descargar"><i class="bi bi-download"></i></a>`}
                                    </div>
                                </form>
                            `;
                        }
                    }
                ],
                language: {
                    info: 'Mostrando _START_ al _END_ de _TOTAL_ registros',
                    infoFiltered: '(filtrados de un total de _MAX_ registros)',
                    lengthMenu: ' _MENU_ registros por página',
                    zeroRecords: '❌ No se encontraron registros con los criterios seleccionados.',
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    },
                    search: 'Buscar'
                }
            });

            // 🔁 Registrar solo una vez el evento xhr para evitar duplicación
            $('#gestion_buscar_1').off('xhr.dt').on('xhr.dt', function(e, settings, json, xhr) {
                const {
                    data,
                    status
                } = json;

                if (data.length === 0 && status === 'success') {
                    Toastify({
                        text: '❌ No se encontraron registros con los criterios seleccionados.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        style: {
                            background: "#dc3545",
                            padding: "15px",
                            borderRadius: "5px"
                        }
                    }).showToast();
                }
                if (data.length > 0 && status === 'success') {
                    Toastify({
                        text: '✅ CONSULTA REALIZADA CON ÉXITO!',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        style: {
                            background: "#36ad76",
                            padding: "15px",
                            borderRadius: "5px"
                        }
                    }).showToast();
                }
                if (data.length === 0 && status === 'error') {
                    Toastify({
                        text: '❌ Debe seleccionar mes INICIO, mes FIN y AÑO para aplicar el filtro de fecha.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        style: {
                            background: "#dc3545",
                            padding: "15px",
                            borderRadius: "5px"
                        }
                    }).showToast();
                }
            });
        });
    });
</script>


@endsection