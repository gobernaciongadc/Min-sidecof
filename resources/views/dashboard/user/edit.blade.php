@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Update') }} User
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
                            <span class="color-titulo text-uppercase">Modificar usuario</span>
                        </span>

                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mt-3">
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.usuarios.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.usuarios.update', $users->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('dashboard/user.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection