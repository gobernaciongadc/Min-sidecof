@extends('dashboard.layouts.main')

@section('template_title')
Formulario
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item">Formulario</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Formulario') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('admin.formularios.create') }}" class="btn btn-primary  float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nro Formulario</th>
                                    <th>Razon Social</th>
                                    <th>Nro Ruim</th>
                                    <th>Nro Nit</th>
                                    <th>Ruim</th>
                                    <th>Reg Partida</th>
                                    <th>Tipo Min Metalico</th>
                                    <th>Nro Lote</th>
                                    <th>Tipo Min Nometalico</th>
                                    <th>Cert Analisis Quimico</th>
                                    <th>Peso Bruto Kg</th>
                                    <th>Peso Neto Kg</th>
                                    <th>Tara Kg</th>
                                    <th>Hum Merma</th>
                                    <th>Municipios Id</th>
                                    <th>Origen Destino Comercializadora</th>
                                    <th>Alicuota</th>
                                    <th>Transporte</th>
                                    <th>Declarcion Jurada</th>
                                    <th>Fecha Emision</th>
                                    <th>Fecha Valides</th>
                                    <th>Observaciones</th>
                                    <th>Estado</th>
                                    <th>Users Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $formulario)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $formulario->nro_formulario }}</td>
                                    <td>{{ $formulario->razon_social }}</td>
                                    <td>{{ $formulario->nro_ruim }}</td>
                                    <td>{{ $formulario->nro_nit }}</td>
                                    <td>{{ $formulario->ruim }}</td>
                                    <td>{{ $formulario->reg_partida }}</td>
                                    <td>{{ $formulario->tipo_min_metalico }}</td>
                                    <td>{{ $formulario->nro_lote }}</td>
                                    <td>{{ $formulario->tipo_min_nometalico }}</td>
                                    <td>{{ $formulario->cert_analisis_quimico }}</td>
                                    <td>{{ $formulario->peso_bruto_kg }}</td>
                                    <td>{{ $formulario->peso_neto_kg }}</td>
                                    <td>{{ $formulario->tara_kg }}</td>
                                    <td>{{ $formulario->hum_merma }}</td>
                                    <td>{{ $formulario->municipios_id }}</td>
                                    <td>{{ $formulario->origen_destino_comercializadora }}</td>
                                    <td>{{ $formulario->alicuota }}</td>
                                    <td>{{ $formulario->transporte }}</td>
                                    <td>{{ $formulario->declarcion_jurada }}</td>
                                    <td>{{ $formulario->fecha_emision }}</td>
                                    <td>{{ $formulario->fecha_valides }}</td>
                                    <td>{{ $formulario->observaciones }}</td>
                                    <td>{{ $formulario->estado }}</td>
                                    <td>{{ $formulario->users_id }}</td>

                                    <td>
                                        <form action="{{ route('admin.formularios.destroy',$formulario->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('admin.formularios.show',$formulario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('admin.formularios.edit',$formulario->id) }}"><i class="fa fa-fw fa-edit"></i> editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- {!! $formularios->links() !!} -->
        </div>
    </div>
</div>
@endsection