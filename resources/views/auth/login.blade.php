@extends('layouts.app')

@section('content')
<style>
    .sombra-login {
        -webkit-box-shadow: 10px 10px 8px -8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: 10px 10px 8px -8px rgba(0, 0, 0, 0.36);
        box-shadow: 10px 10px 8px -8px rgba(0, 0, 0, 0.36);
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card sombra-login">
                <div class="card-header text-uppercase text-center text-white bg-card-login pt-2 pb-2" style="background-color: #1e92ff;">Iniciar Sesión</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-1 p-2">

                            <div class="col-12">
                                <label for="email" class="col-form-label p-0">Usuario:</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 mt-2">
                                <label for="password" class="col-form-label p-0">Contraseña:</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12  mt-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">

                                <button type="submit" class="btn btn-primary text-uppercase" style="width: 100%;">
                                    {{ __('Ingresar') }}
                                </button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection