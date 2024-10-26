@extends('dashboard.layouts.main')

@section('template_title')
{{ $nometalico->name ?? "{{ __('Show') Nometalico" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-show">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="text-uppercase text-dark">Datos del NO metal</span>
                        </span>

                    </div>
                </div>

                <div class="card-body mt-3">

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.nometalicos.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <div class="form-group mt-3">
                        <strong>Nombre:</strong>
                        {{ $nometalico->nombre }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Simbolo:</strong>
                        {{ $nometalico->simbolo }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Alicuota:</strong>
                        {{ $nometalico->alicuota }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Usuario a cargo del registro:</strong>
                        {{ $nometalico->user->name }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Estado:</strong>
                        {{ $nometalico->estado }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection