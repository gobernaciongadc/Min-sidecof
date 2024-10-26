@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Create') }} Funcionario
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
                            <span class="text-uppercase text-white">Añadir nuevo funcionario</span>
                        </span>

                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase float-right" href="{{ route('admin.funcionarios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.funcionarios.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('dashboard/funcionario.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection