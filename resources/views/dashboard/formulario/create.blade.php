@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Crear') }} Formulario
@endsection

@section('migajas')
<li class="breadcrumb-item"><a>Inicio</a></li>
<li class="breadcrumb-item">Formulario</li>
<li class="breadcrumb-item active">Crear</li>
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-interno" id="bg-comercio">
                    <span class="text-uppercase text-white">{{ __('Crear') }} Formulario</span>
                </div>
                <div class="card-body">
                    @if($alta == 'Habilitado')
                    <form method="POST" action="{{ route('admin.formularios.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('dashboard/formulario.form')

                    </form>
                    @else

                    <p class=" text-danger mt-3 text-uppercase fw-bold">Regularize su registro, fuiste dado de baja del sistema</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection