<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Create') }} Municipio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header bg-gestion-datos-create">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <span class="text-uppercase text-white">Añadir nuevo municipio</span>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase float-right" href="{{ route('admin.municipios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.municipios.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('dashboard/municipio.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection