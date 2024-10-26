@extends('dashboard.layouts.main')

@section('template_title')
{{ $formulario->name ?? "{{ __('Show') Formulario" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info d-flex justify-content-between">
                    <div class="float-left">
                        <span class="text-uppercase text-black">{{ __('Datos de') }} Formulario</span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-end mt-2">
                        @switch($datos)
                        @case('emitidos')
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.emitidos') }}"> {{ __('Regresar') }} a formularios emitidos</a>
                        @break

                        @case('buscar')
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.gestionbuscar') }}"> {{ __('Regresar')  }} a gestión buscar</a>
                        @break

                        @default
                        <a class="btn btn-primary text-uppercase" href="{{ route('admin.viewformulariolista') }}"> {{ __('Regresar')  }} a reportes</a>
                        @endswitch
                    </div>
                    <hr>
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

                            <p class="text-center text-uppercase"><span class="titulo-gadc">Formulario 101</span> <br><span>Para el control fiscalización de la regalia minera y autorización de salida de mineral</span> </p>
                        </div>
                    </div>

                    <!-- 1.- -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3 ">
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <span class="titulo-gadc">1:</span>
                                        <strong class="text-uppercase">Razon Social:</strong>
                                        {{ $formulario->razon_social }}
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <strong class="text-uppercase">Nro. Formulario:</strong>
                                        <span class=" text-danger nro_form_text">{{ $formulario->nro_formulario }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 2 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">2:</span>
                                            <strong class="text-uppercase">Nro. de NIM: </strong>
                                            {{ $formulario->nro_nim }}
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">3:</span>
                                            <strong class="text-uppercase">Número de nit:</strong>
                                            {{ $formulario->nro_nit }}
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">4:</span>

                                            <strong class="text-uppercase">Ruim:</strong>
                                            {{ $formulario->ruim }}
                                        </div>
                                    </div>
                                    <!-- 5 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">5:</span>
                                            <strong class="text-uppercase">Partida:</strong>
                                            {{ $formulario->reg_partida }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 6 -->
                                    <div class="col-12 col-md-9">
                                        <div class="form-group">
                                            <span class="titulo-gadc">6:</span>
                                            <strong>MINERAL METÁLICO (Onza Troy-DM-%):</strong>
                                            <span class="text-uppercase titulo-gadc"><br><span>TIPO:</span></span>
                                            {{ $formulario->tipo_min_metalico }}
                                        </div>
                                    </div>
                                    <!-- 7 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">7:</span>
                                            <strong class="text-uppercase">Nro. Lote:</strong>
                                            {{ $formulario->nro_lote }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 8 -->
                                    <div class="col-12 col-md-9">
                                        <div class="form-group">
                                            <span class="titulo-gadc">8:</span>
                                            <strong>MINERAL NO METÁLICO (%):</strong>
                                            <span class="text-uppercase titulo-gadc"><br><span>TIPO:</span></span>
                                            {{ $formulario->tipo_min_nometalico }}

                                        </div>
                                    </div>
                                    <!-- 9 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">9:</span>
                                            <strong class="text-uppercase">Cert. a. Químico:</strong>
                                            {{ $formulario->cert_analisis_quimico }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- BLOQUE -->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 10 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">10:</span>
                                            <strong class="text-uppercase">PESO BRUTO <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> :</strong>
                                            {{ $formulario->peso_bruto_kg}}

                                        </div>
                                    </div>
                                    <!-- 11 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">11:</span>
                                            <strong class="text-uppercase">PESO NETO EN <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> :</strong>
                                            {{ $formulario->peso_neto_kg}}
                                        </div>
                                    </div>
                                    <!-- 12 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">12:</span>
                                            <strong class="text-uppercase">TARA <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> :</strong>
                                            {{ $formulario->tara_kg}}
                                        </div>
                                    </div>
                                    <!-- 13 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">13:</span>
                                            <strong class="text-uppercase">HUM. MERMA(%) ENV. (<span style="text-transform: capitalize;">{{ $formulario->unidad }}</span>) :</strong>
                                            {{ $formulario->hum_merma}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE MUNICIPIO-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 14 -->
                                    <div class="col-12 col-md-1">
                                        <div class="form-group">
                                            <span class="titulo-gadc">14:</span>
                                            <strong class="text-uppercase">Codigo:</strong>
                                            <p class="mb-0">{{ $formulario->codigo}}</p>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Municipio productor:</strong>
                                            <p class="mb-0">{{ $formulario->municipio}}</p>
                                        </div>
                                    </div>



                                    <!-- 15 -->
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <span class="titulo-gadc">15:</span>
                                            <strong class="text-uppercase">Origen:</strong>
                                            <p class="mb-0">{{ $formulario->origen}}</p>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Destino:</strong>
                                            <p class="mb-0">{{ $formulario->destino}}</p>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Comercializadora
                                                <span>
                                                    @if($formulario->comercio=='Externo')
                                                    /Comprador
                                                    @endif
                                                </span>:</strong>
                                            <p class="mb-0">{{ $formulario->comercializadora}}</p>

                                        </div>
                                    </div>

                                    <!-- 16 -->
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <span class="titulo-gadc">16:</span>
                                            <strong class="text-uppercase">Alicuota:</strong>
                                            <p class="mb-0"> {{ $formulario->alicuota }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 17 -->
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <span class="titulo-gadc">17:</span>
                                            <strong class="text-uppercase">Transporte:</strong>
                                            @if($formulario->comercio=='Externo' && $formulario->transporte=='Via ferrea' )
                                            Otros
                                            @else
                                            {{ $formulario->transporte}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Chofer:</strong>
                                            {{ $formulario->chofer}}

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Placa:</strong>
                                            {{ $formulario->placa}}

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE DECLARACION JURADA-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <!-- 18 -->
                                    <div class="col-12 col-md-9">
                                        <div class="form-group">
                                            <span class="titulo-gadc">18:</span>
                                            {{ Form::label('declarcion_jurada','DECLARACIÓN JURADA') }}
                                            <P class="mt-3">El presente formulario constituye una Declaración Jurada y debe ser sellada en todas las trancas por el Organismo Operativo de Tránsito y puestos <br>de control que se encuentren en el fijado por el itenerario.</P>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BLOQUE fECHA DE EMISION Y VALIDEZ-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">
                                    <!-- 19 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <span class="titulo-gadc">19:</span>
                                            <strong class="text-uppercase">Fecha emisión:</strong>
                                            {{ $formulario->fecha_emision}}
                                        </div>
                                    </div>

                                    <!-- 19 -->
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <strong class="text-uppercase">Validez fecha:</strong>
                                            {{ $formulario->fecha_valides}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- BLOQUE OBSERVACIONES-->
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div class="form-group border p-3">
                                <div class="row">

                                    <!-- 20 -->
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <span class="titulo-gadc">20:</span>
                                            <strong class="text-uppercase">Observaciones:</strong><span> Comercio {{ $formulario->comercio }} </span><br>
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


                @endsection