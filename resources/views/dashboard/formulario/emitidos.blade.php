@extends('dashboard.layouts.main')

@section('template_title')
Puesto en ecena
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="">Home</a></li>
<li class="breadcrumb-item">Formulario</li>
<li class="breadcrumb-item active">Lista de formularios emitidos</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-success">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Formularios emitidos') }}

                        </span>


                    </div>
                </div>
                @if ($message = Session::get('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: '{{ $message }}',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    });
                </script>
                @endif
                <div class="d-flex justify-content-between mt-2">
                    <p class="mt-3 ms-3 text-primary">Lista de formularios emitidos hoy: <span class="text-dark"> <i class="bi bi-calendar3 text-warning"></i> {{ now()->format('d/m/Y') }}</span></p>
                    <div class="float-right me-4">
                        <a href="{{ route('admin.staging') }}" class="btn btn-primary text-uppercase float-right" data-placement="left">
                            {{ __('Regresar a puesto en escena') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive--custom">
                        <table class="table table-striped" id="pescena_1">
                            <thead class="thead border">

                                <tr>
                                    <th>#</th>
                                    <th>Nro. formulario</th>
                                    <!-- <th>Id formulario</th> -->
                                    <th>Tipo metalico</th>
                                    <th>Tipo no metalico</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
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
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($emitidos as $emitido)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $emitido->nro_formulario }}</td>
                                    <!-- <td>{{ $emitido->id }}</td> -->

                                    @if(!is_null($emitido->tipo_min_metalico) && !empty($emitido->tipo_min_metalico))
                                    <td>{{ $emitido->tipo_min_metalico }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif

                                    @if(!is_null($emitido->tipo_min_nometalico) && !empty($emitido->tipo_min_nometalico))
                                    <td>{{ $emitido->tipo_min_nometalico }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif
                                    <td>{{ $emitido->origen }}</td>
                                    <td>{{ $emitido->destino }}</td>
                                    <td>{{ $emitido->alicuota }}</td>
                                    <td>{{ $emitido->transporte }}</td>
                                    <td>{{ $emitido->chofer }}</td>
                                    <td>{{ $emitido->placa }}</td>
                                    <td>{{ $emitido->fecha_emision }}</td>
                                    @if(!is_null($emitido->fecha_valides) && !empty($emitido->fecha_valides))
                                    <td>{{ $emitido->fecha_valides }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif
                                    <td>{{ $emitido->comercio }}</td>
                                    <td>
                                        <form action="{{ route('admin.formularios.destroy',$emitido->id) }}" method="POST" class="btn-emitidos">
                                            <div class="">
                                                <a href="/dashboard/formulario/{{ $emitido->id }}/emitidos" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos"><i class="bi bi-eye"></i></a>
                                            </div>
                                            <div class="btn-separar">
                                                <a href="{{ route('admin.pdf',['id'=>$emitido->id,'nro_formulario'=>$emitido->nro_formulario,'token'=>'GobiernoAutónomoDepartamentalDeCochabamba' ]) }}" target="_blank" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir"><i class="bi bi-printer"></i></a>
                                            </div>
                                            <div class="btn-separar">
                                                <a href="{{ route('admin.pdf',$emitido->id) }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Descargar" download><i class="bi bi-download"></i></a>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection