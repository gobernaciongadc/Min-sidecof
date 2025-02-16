@extends('dashboard.layouts.main')

@section('template_title')
{{ $formulario->name ?? "{{ __('Show') Formulario" }}
@endsection

@section('content')

@if($formulario->comercio == 'Externo')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info d-flex justify-content-between">
                    <div class="float-left">
                        <span class="text-uppercase text-black">{{ __('Datos de') }} Formulario</span>
                    </div>
                    <div class="float-right">
                        @switch($datos)
                        @case('emitidos')
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.emitidos') }}"> {{ __('Regresar') }} a formularios emitidos</a>
                        @break

                        @case('buscar')
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.gestionbuscar') }}"> {{ __('Regresar')  }} a gestión buscar</a>
                        @break

                        @default
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.viewformulariolista') }}"> {{ __('Regresar')  }} a reportes</a>
                        @endswitch
                    </div>
                </div>
                <div class="card-body">

                    <div class="row pt-3 pb-3">
                        <div class="col-12 col-lg-3 d-none d-lg-block">
                            <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.jpg')}}" alt="logo-gobernacion">
                        </div>
                        <div class="col-12 col-lg-6 titulo-formulario text-uppercase">
                            <p class="text-center head-titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                        </div>
                        <div class="col-12 col-lg-3 text-end d-none d-lg-block">
                            <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.png')}}" alt="logo-gobernacion">
                        </div>
                    </div>

                    <hr>

                    <div class="row pt-2">
                        <div class="col-12 d-flex justify-content-center">

                            <p class="text-center text-uppercase"><span class="titulo-gadc">Formulario 101 de exportación</span></p>
                        </div>
                    </div>

                    <!-- Bloque nro.- de Formulario -->
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-4">
                            <div class="form-group border p-3">
                                <strong class="">Nro. de Formulario:</strong>
                                <span class=" text-danger nro_form_text">{{ $formulario->nro_formulario }}</span>
                            </div>

                        </div>
                    </div>

                    <!-- BLOQUE fECHA DE EMISION Y VALIDEZ-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 19 -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Fecha emisión:</strong>
                                            {{ $formulario->fecha_emision}}
                                        </div>
                                    </div>

                                    <!-- 19 -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Validez de vencimiento:</strong>
                                            {{ $formulario->fecha_valides}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bolque razon social -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group border p-3 text-uppercase">
                                <strong>Razón social/Nombre Completo:</strong>
                                <span class=" text-danger nro_form_text">{{ $formulario->razon_social }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bolque nim, nit y rocmin/ruim -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row justify-content-between">
                                    <!-- 2 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Nro. de NIM: </strong>
                                            {{ $formulario->nro_nim }}
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Número de nit:</strong>
                                            {{ $formulario->nro_nit }}
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">

                                            @if($formulario->comercio=='Externo')
                                            <strong class="text-uppercase">Rocmin:</strong>
                                            @else
                                            <strong class="text-uppercase">Ruim:</strong>
                                            @endif

                                            {{ $formulario->ruim }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">2. Datos del mineral y/o exportado</p>
                        </div>
                    </div>

                    <!-- Bloque LOTE y TARA -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Nro. Lote:</strong>
                                            {{ $formulario->nro_lote }}
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">TARA <span style="text-transform: capitalize;">({{ $formulario->unidad }})</span> :</strong>
                                            {{ $formulario->tara_kg}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tipo de mineral y humedad -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 6 -->
                                    <div class="col-12 col-md-9">
                                        <div class="form-group">
                                            <strong>TIPO DE MINERAL:</strong>
                                            @if($formulario->tipo_min_metalico != null)
                                            {{ $formulario->tipo_min_metalico }}
                                            @endif
                                            @if($formulario->tipo_min_nometalico != null)
                                            {{ $formulario->tipo_min_nometalico }}
                                            @endif
                                        </div>
                                    </div>
                                    <!-- 7 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">7:</span>
                                            <strong class="text-uppercase">HUMEDAD:</strong>
                                            {{ $formulario->humedad }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bloque presentacion y  Merma -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Presentación:</strong>
                                            {{ $formulario->presentacion }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Merma:</strong>
                                            {{ $formulario->merma }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE ALICUOTA Y PESO NETO Y UNIDAD-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Alicuota:</strong>
                                            {{ $formulario->alicuota }}

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">PESO NETO</strong>
                                            {{ $formulario->peso_neto_kg}}&nbsp;&nbsp;
                                            <strong class="text-uppercase">UNIDAD</strong>
                                            {{ $formulario->unidad}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE peso bruto y ley unidad-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">PESO Bruto</strong>
                                            {{ $formulario->peso_bruto_kg}}&nbsp;&nbsp;
                                            <strong class="text-uppercase">UNIDAD</strong>
                                            {{ $formulario->unidad}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Ley:</strong>
                                            {{ $formulario->ley }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">3. Origen de mineral y/o metal</p>
                        </div>
                    </div>

                    <!-- BLOQUE peso Municipo productor o metal-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Municipio productor:</strong>
                                            {{ $formulario->municipio }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Codigo Municipio:</strong>
                                            {{ $formulario->codigo }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE origen de la exportacion-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Origen de la exportación</strong>
                                            {{ $formulario->origen}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">4. Destino del mineral y/o metal</p>
                        </div>
                    </div>

                    <!-- BLOQUE comprador y destino -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Comprador</strong>
                                            {{ $formulario->comercializadora}}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Destino</strong>
                                            {{ $formulario->destino}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE aduana-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">aduana</strong>
                                            {{ $formulario->aduana}}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">5. MEDIO DE TRANSPORTE</p>
                        </div>
                    </div>

                    <!-- BLOQUE TIPO TRANSPORTE y PLACA -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">TIPO de transporte</strong>
                                            @if($formulario->comercio=='Externo' && $formulario->transporte=='Via ferrea' )
                                            Otros
                                            @else
                                            {{ $formulario->transporte}}
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Placa</strong>
                                            {{ $formulario->placa}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE Conductor-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Conductor</strong>
                                            {{ $formulario->chofer}}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">6. Otros</p>
                        </div>
                    </div>

                    <!-- bloque  Número de tramite formulario m-03 senarecom -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">Número de tramite formulario m-03 senarecom </strong>
                                            {{ $formulario->senarecom}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <p class="text-uppercase">7. observaciones</p>
                            <!-- bloque  Número de tramite formulario m-03 senarecom -->

                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            {{ $formulario->observaciones}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Declaracion -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <P class="mt-3">1. El formulario 101 es el único documento habilitado para el transporte de minerales y/o metales, de aplicación obligatoria para los Operadores Mineros, Actores Productivos Mineros, conforme señala el articulo 7 del D.S. Nro. 2288 con caracter de declaración jurada.<br>
                                2. El presente formulario constituye una declaración jurada, las caracteristicas y las cantidades indicadas en el formulario M-03 del SENARECOM, es de entera responsabilidad del exportador.</P>
                        </div>
                    </div>
                    <hr>
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 20 -->
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Otros datos de formulario:</strong>
                                            <br>
                                            @if($formulario->estado_observacion == 0)
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Observaciones: <span>No tiene observaciones de transporte</span></p>
                                            @else
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Observaciones: <span>Tiene observaciones de transporte</span></p>
                                            @endif

                                            @if($formulario->estado_entrega == 0)
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Entrega: <span class="text-danger">Este formulario no esta concluido</span></p>
                                            @else
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Entrega: <span class="text-success">Este formulario esta concluido</span></p>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($formulario->comercio == 'Interno')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info d-flex justify-content-between">
                    <div class="float-left">
                        <span class="text-uppercase text-black">{{ __('Datos de') }} Formulario</span>
                    </div>
                    <div class="float-right">
                        @switch($datos)
                        @case('emitidos')
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.emitidos') }}"> {{ __('Regresar') }} a formularios emitidos</a>
                        @break

                        @case('buscar')
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.gestionbuscar') }}"> {{ __('Regresar')  }} a gestión buscar</a>
                        @break

                        @default
                        <a class="btn btn-warning text-uppercase btn-sm" href="{{ route('admin.viewformulariolista') }}"> {{ __('Regresar')  }} a reportes</a>
                        @endswitch
                    </div>
                </div>

                <div class="card-body">

                    <div class="row pt-3 pb-3">
                        <div class="col-12 col-lg-3 d-none d-lg-block">
                            <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.jpg')}}" alt="logo-gobernacion">
                        </div>
                        <div class="col-12 col-lg-6 titulo-formulario text-uppercase">
                            <p class="text-center head-titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                        </div>
                        <div class="col-12 col-lg-3 text-end d-none d-lg-block">
                            <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.png')}}" alt="logo-gobernacion">
                        </div>
                    </div>

                    <hr>

                    <div class="row pt-2">
                        <div class="col-12 d-flex justify-content-center">

                            <p class="text-center text-uppercase"><span class="titulo-gadc">Formulario 101 - Transporte de comercio interno</span></p>
                        </div>
                    </div>

                    <!-- Bloque nro.- de Formulario -->
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-4">
                            <div class="form-group border p-3">
                                <strong class="">Nro. de Formulario:</strong>
                                <span class=" text-danger nro_form_text">{{ $formulario->nro_formulario }}</span>
                            </div>

                        </div>
                    </div>

                    <!-- BLOQUE fECHA DE EMISION Y VALIDEZ-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 19 -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Fecha emisión:</strong>
                                            {{ $formulario->fecha_emision}}
                                        </div>
                                    </div>

                                    <!-- 19 -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Validez de vencimiento:</strong>
                                            {{ $formulario->fecha_valides}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bolque razon social -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group border p-3 text-uppercase">
                                <strong>1. Razón social/Nombre Completo:</strong>
                                <span class=" text-danger nro_form_text">{{ $formulario->razon_social }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bolque nim, nit y rocmin/ruim -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row justify-content-between">
                                    <!-- 2 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">2. NÚMERO de NIM: </strong>
                                            {{ $formulario->nro_nim }}
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">3. nit:</strong>
                                            {{ $formulario->nro_nit }}
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">

                                            @if($formulario->comercio=='Externo')
                                            <strong class="text-uppercase">Rocmin:</strong>
                                            @else
                                            <strong class="text-uppercase">4. NRO. DE Ruim:</strong>
                                            @endif

                                            {{ $formulario->ruim }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bloque LOTE, LEY U HUM-MERMA -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">5. Nro. Lote:</strong>
                                            {{ $formulario->nro_lote }}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">6. Ley:</strong>
                                            {{ $formulario->ley }}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">7. Hum-Merma(%):</strong>
                                            {{ $formulario->hum_merma }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bloque tipo mineral y presentacion -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong>8. TIPO DE MINERAL:</strong>
                                            @if($formulario->tipo_min_metalico != null)
                                            {{ $formulario->tipo_min_metalico }}
                                            @endif
                                            @if($formulario->tipo_min_nometalico != null)
                                            {{ $formulario->tipo_min_nometalico }}
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">9. Presentación: </strong>
                                            {{ $formulario->presentacion}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tipo alicuota, peso bruto y tara -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">10. Alicuota:</strong>
                                            {{ $formulario->alicuota }}

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">11. PESO Bruto</strong>
                                            {{ $formulario->peso_bruto_kg}}&nbsp;&nbsp;
                                            <strong class="text-uppercase">UNIDAD</strong>
                                            {{ $formulario->unidad}}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">12. TARA <span style="text-transform: capitalize;">({{ $formulario->unidad }})</span> :</strong>
                                            {{ $formulario->tara_kg}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Peso neto y  municipio productor -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <strong class="text-uppercase">13.PESO NETO</strong>
                                            {{ $formulario->peso_neto_kg}}&nbsp;&nbsp;
                                            <strong class="text-uppercase">UNIDAD</strong>
                                            {{ $formulario->unidad}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">14. Municipio productor:</strong>
                                            {{ $formulario->municipio }}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- BLOQUE peso Municipo productor o metal-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">16. comercializadora y/o agente de retencion:</strong>
                                            {{ $formulario->comercializadora}}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">16. Codigo Municipio:</strong>
                                            {{ $formulario->codigo }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- BLOQUE origen y destino -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">17. Origen de la exportación</strong>
                                            {{ $formulario->origen}}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">18. Destino</strong>
                                            {{ $formulario->destino}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE aduana-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">19. TIPO de transporte</strong>
                                            @if($formulario->comercio=='Externo' && $formulario->transporte=='Via ferrea' )
                                            Otros
                                            @else
                                            {{ $formulario->transporte}}
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">20. Placa</strong>
                                            {{ $formulario->placa}}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group text-uppercase">
                                            <strong class="text-uppercase">21. Conductor</strong>
                                            {{ $formulario->chofer}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Declaracion -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <strong class="text-uppercase">Declaración Jurada</strong>
                            <P class="mt-3">El presente formulario constituye una Declaración Jurada y debe ser requerida en todas las trancas por el personal de la,policia y puestos de control</P>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <strong class="text-uppercase">observaciones</strong>
                            <!-- bloque  Número de tramite formulario m-03 senarecom -->
                            <div class="form-group border p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-uppercase">
                                            {{ $formulario->observaciones}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 20 -->
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Otros datos de formulario:</strong>
                                            <br>
                                            @if($formulario->estado_observacion == 0)
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Observaciones: <span>No tiene observaciones de transporte</span></p>
                                            @else
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Observaciones: <span>Tiene observaciones de transporte</span></p>
                                            @endif

                                            @if($formulario->estado_entrega == 0)
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Entrega: <span class="text-danger">Este formulario no esta concluido</span></p>
                                            @else
                                            <p class="mt-2 mb-0 text-uppercase otros-datos">Entrega: <span class="text-success">Este formulario esta concluido</span></p>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection