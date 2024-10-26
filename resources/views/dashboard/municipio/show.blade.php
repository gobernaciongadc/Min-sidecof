<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
{{ $municipio->name ?? "{{ __('Show') Municipio" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header bg-gestion-datos-show">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <span class="text-uppercase color-titulo">Datos del municipio</span>
                        </span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.municipios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <div class="form-group mt-3">
                        <strong>Codigo:</strong>
                        {{ $municipio->codigo }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Municipio:</strong>
                        {{ $municipio->municipio }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Usuario a cargo del registro: </strong>
                        {{ $municipio->user->name }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Estado: </strong>
                        {{ $municipio->estado }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection