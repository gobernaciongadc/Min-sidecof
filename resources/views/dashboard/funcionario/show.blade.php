@extends('dashboard.layouts.main')

@section('template_title')
{{ $funcionario->name ?? "{{ __('Show') Funcionario" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-show">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <span class="text-uppercase color-titulo">Datos del funcionario</span>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.funcionarios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <div class="form-group mt-2">
                        <strong>Nombres:</strong>
                        {{ $funcionario->nombres }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Carnet:</strong>
                        {{ $funcionario->carnet }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Cargo:</strong>
                        {{ $funcionario->cargo }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Direccion:</strong>
                        {{ $funcionario->direccion }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Telefono:</strong>
                        {{ $funcionario->telefono }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Email:</strong>
                        {{ $funcionario->email }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Responsable de registro:</strong>
                        {{ $funcionario->user->name }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Estado:</strong>
                        {{ $funcionario->estado }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection