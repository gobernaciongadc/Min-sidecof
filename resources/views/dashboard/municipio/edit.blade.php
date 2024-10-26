<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
Modificar municipio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-gestion-datos-edit ">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="color-titulo text-uppercase">Modificar municipio</span>
                        </span>

                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.municipios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.municipios.update', $municipio->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('dashboard/municipio.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection