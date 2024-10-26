@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Update') }} Empresa
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-gestion-datos-edit">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="color-titulo text-uppercase">Modificar empresa y/o cooperativa</span>
                        </span>

                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.empresas.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.empresas.update', $empresa->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('dashboard/empresa.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection