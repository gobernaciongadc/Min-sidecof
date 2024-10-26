@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Update') }} Minero
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
                            <span class="color-titulo text-uppercase">Modificar comercializadora ROCMIN</span>
                        </span>

                    </div>
                </div>
                <div class="card-body mt-3">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary text-uppercase float-right" href="{{ route('admin.mineros.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.mineros.update', $minero->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('dashboard/minero.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection