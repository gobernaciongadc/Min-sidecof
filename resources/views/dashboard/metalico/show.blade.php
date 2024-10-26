@extends('dashboard.layouts.main')

@section('template_title')
{{ $metalico->name ?? "{{ __('Show') Metalico" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-show">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="text-uppercase text-dark">Datos del metal</span>
                        </span>

                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.metalicos.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <div class="form-group mt-3">
                        <strong>Nombre:</strong>
                        {{ $metalico->nombre }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Simbolo:</strong>
                        {{ $metalico->simbolo }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Alicuota:</strong>
                        {{ $metalico->alicuota }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Usuario a cargo del registro:</strong>
                        {{ $metalico->user->name }}
                    </div>
                    <div class="form-group mt-3">
                        <strong>Estado:</strong>
                        {{ $metalico->estado }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection