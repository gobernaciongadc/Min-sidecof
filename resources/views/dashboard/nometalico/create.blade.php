@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Create') }} Nometalico
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-gestion-datos-create ">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="text-white text-uppercase">Añadir nuevo no metal</span>
                        </span>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary text-uppercase float-right" href="{{ route('admin.nometalicos.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.nometalicos.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('dashboard/nometalico.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection