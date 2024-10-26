@extends('dashboard.layouts.main')

@section('template_title')
{{ $formulario->name ?? "{{ __('Show') Formulario" }}
@endsection

@section('content')

<style>
    /* Bloque 1 */
    .img-escudo {
        width: 140px;
    }

    .img-logo {
        width: 140px;
    }

    .titulo-cabecera {

        text-align: center;
        text-transform: uppercase;
        margin-bottom: 0px;
        font-size: 12px;
    }

    .line-borde {

        border-top: 1px solid rgb(193, 193, 194);

    }

    .margen-linea {
        margin-top: 20px;
    }

    /* Fin Bloque 1 */

    /* Bloque 2 */
    /* FIN Bloque 2 */
</style>

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Formulario</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="#"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <table>

                        <tbody>
                            <tr>
                                <td>
                                    <img class="img-escudo" src="{{asset('dashboard/img/logo-gadc.jpg')}}" alt="Escudo gobernación">
                                </td>
                                <td>
                                    <p class="titulo-cabecera">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                                </td>
                                <td>
                                    <img class="img-logo" src="{{asset('dashboard/img/logo-gadc.png')}}" alt="Logo gobernación">
                                </td>
                            </tr>

                        </tbody>

                    </table>



                    <div class="line-borde margen-linea"></div>


                    <!-- Bloque 2 Razón Social -->
                    <table>
                        <tbody>
                            <tr>
                                <!-- Formulario 101 y Razón social -->
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h1>Formulario 101</h1>
                                                    <p>Para el control fiscalización de la regalia minera y autorización de salida de mineral</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hola2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- FIN Bloque 2 Razónn Social -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection