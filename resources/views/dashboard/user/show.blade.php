@extends('dashboard.layouts.main')

@section('template_title')
{{ $user->name ?? "{{ __('Show') User" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header bg-gestion-datos-show">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <span class="text-uppercase color-titulo">Datos de usuario</span>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    @if($opcion != 'perfil')
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.usuarios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    @endif
                    <hr>
                    <div class="form-group mt-2">
                        <strong>Nombres:</strong>
                        {{ $user->name }}
                    </div>

                    @if($user->name_bd == 'funcionarios')
                    <div class="form-group mt-2">
                        <strong>Carnet:</strong>
                        {{ $funcionario->carnet }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Cargo:</strong>
                        {{ $funcionario->cargo }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Dirección:</strong>
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
                    @endif

                    @if($user->name_bd == 'empresas')
                    <div class="form-group mt-2">
                        <strong>Ruim:</strong>
                        {{ $empresa->ruim }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Nro. NIT:</strong>
                        {{ $empresa->nro_nit }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Nro. NIM:</strong>
                        {{ $empresa->nro_nim }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Fecha de caducidad de nro. NIM:</strong>
                        {{ $empresa->fecha_caducidad }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Fecha de inscripción:</strong>
                        {{ $empresa->fecha_inscripcion }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Minerales autorizados:</strong>
                        {{ $empresa->mineral}}
                    </div>

                    @endif


                    <div class="form-group mt-2">
                        <strong>Tipo de usuario:</strong>
                        @switch($user->name_bd)
                        @case('funcionarios')
                        Funcionario
                        @break

                        @case('mineros')
                        ROCMIN
                        @break

                        @case('empresas')
                        RUIM
                        @break

                        @default
                        Opción por defecto
                        @endswitch
                    </div>

                    <div class="form-group mt-2">
                        <strong>Rol de usuario:</strong>
                        <span style="text-transform: capitalize;">{{ $role->name }}</span>
                    </div>
                    <div class="form-group mt-2">
                        <strong>Responsable de registro:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group mt-2">
                        <strong>Estado:</strong>
                        {{ $user->estado }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection