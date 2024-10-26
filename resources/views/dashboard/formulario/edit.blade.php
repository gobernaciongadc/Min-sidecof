@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Update') }} Formulario
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-warning d-flex justify-content-between">
                    <div class="float-left">
                        <span class="card-title">{{ __('Modificar') }} Formulario</span>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mt-2">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.staging') }}"> {{ __('Regresar') }} a puesto en escena</a>
                    </div>
                    @if($alta == 'Habilitado')
                    <form method="POST" action="{{ route('admin.formularios.update', $formulario->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
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