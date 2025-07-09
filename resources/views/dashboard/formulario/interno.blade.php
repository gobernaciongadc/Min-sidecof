@if ($errors->any())
<div class="alert alert-danger">
    <strong>¡Error!</strong> Por favor, corrige los siguientes errores:<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div>
    <div class="card-body">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-3">
                <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.jpg')}}" alt="logo-gobernacion">
            </div>
            <div class="col-12 col-md-6 titulo-formulario text-uppercase d-flex flex-column justify-content-center">
                <p class="text-center head-titulo">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria, hidrocarburos y energias</p>
            </div>
            <div class="col-12 col-md-3 text-end">
                <img style="width: 150px;" src="{{asset('dashboard/img/logo-gadc.png')}}" alt="logo-gobernacion">
            </div>
        </div>
        <hr>
        <div class="row pt-2">
            <div class="col-12 d-flex justify-content-center">
                <p class="text-center text-uppercase"><span class="titulo-gadc text-formulario-101">Formulario 101 - TRANSPORTE DE COMERCIO INTERNO</span></p>
            </div>
        </div>
        @if($mensaje != null)
        <P class="text-danger mt-2 text-uppercase">{{ $mensaje }}</P>
        @endif
        @if($cantStaging >= 5 && $tipo =='create' )
        <P class="text-danger mt-2 text-uppercase">Tienes {{ $cantStaging }} formularios en escena para su emisión.</P>
        @endif

        {{ Form::hidden('comercio', $comercios, ['id' => 'comercio']) }}

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const bg_comercio = document.getElementById('bg-comercio');
                const text_formularios = document.getElementById('text-formularios');

                const fechaValidezInput = document.getElementById('fecha_valides');
                // Cambios en el formulario
                const comercializadora = document.getElementById('label-comercializadora');
                const via_ferrea = document.getElementById('label-viaferrea');
                const fechaEmisionInput = document.getElementById('fecha_emision');


                // Validos
                const as_partida = document.getElementById('as-partida');
                const as_lote = document.getElementById('as-lote');
                const as_quimico = document.getElementById('as-quimico');
                const as_bruto = document.getElementById('as-bruto');
                const as_neto = document.getElementById('as-neto');
                const as_tara = document.getElementById('as-tara');
                const as_merma = document.getElementById('as-merma');


                // Para el boton
                const partida = document.getElementById('partida');
                const nro_lote = document.getElementById('nro_lote');
                const quimico = document.getElementById('quimico');
                const bruto = document.getElementById('bruto');
                const neto = document.getElementById('neto');
                const tara = document.getElementById('tara');
                const merma = document.getElementById('merma');

                // Limpiar campos 
                const origen = document.getElementById('origen');
                const destino = document.getElementById('destino');
                const alicuota = document.getElementById('alicuota');
                const alicuota_show = document.getElementById('alicuota-show');
                const chofer = document.getElementById('chofer');
                const placa = document.getElementById('placa');
                const observaciones = document.getElementById('observaciones');

                // btn enviar
                const btn_enviar = document.getElementById('enviar-button');
                const p_externo = document.querySelector('.p-externo');

                function limpiar() {
                    partida.value = '';
                    nro_lote.value = '';
                    quimico.value = '';
                    bruto.value = '';
                    neto.value = '';
                    tara.value = '';
                    merma.value = '';
                    origen.value = '';
                    destino.value = '';
                    alicuota.value = '';
                    alicuota_show.value = '';
                    chofer.value = '';
                    placa.value = '';
                    observaciones.value = '';
                    // Limpia las selecciones del select múltiple con ID select2-multiselect-metalicos
                    $("#select2-multiselect-metalicos").val([]).trigger('change');
                    $("#select2-multiselect-nometalicos").val([]).trigger('change');
                    // Limpia la selección de los radio buttons con name 'transporte'
                    $('input[name="transporte"]').prop('checked', false);
                }


            });
        </script>

        <!-- ************************MODIFICACIONES*********************** -->
        <!-- BLOQUE fECHA DE EMISION Y VALIDEZ-->
        <div class="row pt-2 pb-2">
            <div class="col-12">
                <div class="form-group border p-3">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                {{ Form::label('fecha_emision','FECHA EMISIÓN', ['class' => 'text-uppercase']) }}
                                <span class="text-danger">*</span>
                                {{ Form::input('datetime-local', 'fecha_emision', $formulario->fecha_emision, ['class' => 'form-control' . ($errors->has('fecha_emision') ? ' is-invalid' : ''), 'id' => 'fecha_emision','style'=>'background-color: #ffffff !important']) }}
                                {!! $errors->first('fecha_emision', '<div class="invalid-feedback">:message</div>') !!}
                                <span id="error_fecha_emision" class="invalid-feedback"></span>
                            </div>
                        </div>

                        <!-- 19 -->
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                {{ Form::label('fecha_valides','VALIDEZ FECHA') }}
                                <span class="text-danger">*</span>
                                {{ Form::input('datetime-local', 'fecha_valides', $formulario->fecha_valides, ['class' => 'form-control' . ($errors->has('fecha_valides') ? ' is-invalid' : ''), 'id' => 'fecha_valides', 'disabled' => 'disabled']) }}
                                {!! $errors->first('fecha_valides', '<div class="invalid-feedback">:message</div>') !!}

                                {{ Form::hidden('fecha_valides', $formulario->fecha_valides, ['id' => 'fechaValida']) }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Carga primero el HTML y luego ejecuta javascript
            document.addEventListener('DOMContentLoaded', () => {

                let fechaEmisionInput = document.getElementById('fecha_emision');
                let fechaValidezInput = document.getElementById('fecha_valides');
                let fechaValida = document.getElementById('fechaValida');

                const comercioSelect = document.getElementById('comercio');

                console.log(comercio);


                fechaEmisionInput.addEventListener('change', () => {
                    let fechaEmision = new Date(fechaEmisionInput.value);

                    console.log(fechaEmision);


                    // Restar la diferencia horaria entre tu zona horaria y UTC
                    let zonaHorariaOffset = fechaEmision.getTimezoneOffset() * 60 * 1000;

                    // Sumar 48 horas en milisegundos
                    let fechaValidez = new Date(fechaEmision.getTime() + (48 * 60 * 60 * 1000) - zonaHorariaOffset);

                    // Formatea la fecha de validez en el formato 'YYYY-MM-DDTHH:mm'
                    let fechaValidezFormatted = fechaValidez.toISOString().slice(0, 16);

                    if (comercioSelect.value === 'Interno') {
                        // Actualiza el valor del campo de fecha de validez
                        fechaValidezInput.value = fechaValidezFormatted;
                        fechaValida.value = fechaValidezFormatted;
                    } else {
                        fechaValidezInput.value = '';
                        fechaValida.value = '';
                    }
                });
            });
        </script>

        <!-- Bolque formulario -->
        <div class="bloque-formulario-input">
            <!-- 1.-DATOS DE OPERADOR -->
            <div class="row pt-2 pb-2">
                <div class="col-12">
                    <div class="form-group border p-3">
                        <div class="row mt-2">
                            <div class="col-12">
                                <span style="color: black;">1.</span>
                                {{ Form::label('razon_social_disabled', 'Razón Social/Nombre Completo: ', ['class' => 'text-uppercase']) }}
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-12">
                                {{ Form::text('razon_social_disabled', $formulario->razon_social ?? $empresa->nombres, ['class' => 'form-control' . ($errors->has('razon_social_disabled') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Su Razon Social', 'id' => 'razon_social_disabled', 'disabled' => 'disabled']) }}
                                {!! $errors->first('razon_social', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <span id="error_razon_social_disabled" class="invalid-feedback"></span>
                        {{ Form::hidden('razon_social', $formulario->razon_social ?? $empresa->nombres, ['id' => 'razon_social']) }}
                    </div>
                </div>
            </div>
            <div class="row pt-2 pb-2">
                <div class="col-12">
                    <div class="form-group border p-3">
                        <div class="row justify-content-between">
                            <!-- 2 NIM-->
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <span style="color: black;">2.</span>
                                    {{ Form::label('nro_nim_disabled', 'NÚMERO NIM', ['class' => 'text-uppercase']) }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('nro_nim_disabled', $formulario->nro_nim ?? $empresa->nro_nim, ['class' => 'form-control' . ($errors->has('nro_nim_disabled') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Su Nro. de NIM','id' => 'nro_nim_disabled', 'disabled' => 'disabled']) }}
                                    {!! $errors->first('nro_nim', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_nro_nim_disabled" class="invalid-feedback"></span>


                                    {{ Form::hidden('nro_nim', $formulario->nro_nim ?? $empresa->nro_nim, ['id' => 'nro_nim']) }}
                                </div>
                            </div>
                            <!-- 3 NIT -->
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <span style="color: black;">3.</span>
                                    {{ Form::label('nro_nit_disabled', 'NÚMERO NIT', ['class' => 'text-uppercase']) }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('nro_nit_disabled', $formulario->nro_nit ?? $empresa->nro_nit, ['class' => 'form-control' . ($errors->has('nro_nit_disabled') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Su Nro Nit','id' => 'nro_nit_disabled', 'disabled' => 'disabled']) }}
                                    {!! $errors->first('nro_nit', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_nro_nit_disabled" class="invalid-feedback"></span>

                                    {{ Form::hidden('nro_nit', $formulario->nro_nit ?? $empresa->nro_nit, ['id' => 'nro_nim']) }}
                                </div>
                            </div>
                            <!-- 4 RUIM-->
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <span style="color: black;">4.</span>
                                    {{ Form::label('ruim_disabled', 'NRO. RUIM', ['class' => 'text-uppercase']) }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('ruim_disabled', $formulario->ruim ?? $empresa->ruim, ['class' => 'form-control' . ($errors->has('ruim_disabled') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Su Ruim','id' => 'ruim_disabled', 'disabled' => 'disabled']) }}
                                    {!! $errors->first('ruim', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_ruim_disabled" class="invalid-feedback"></span>

                                    {{ Form::hidden('ruim', $formulario->nro_nit ?? $empresa->nro_nit, ['id' => 'ruim']) }}
                                </div>
                            </div>
                            <!-- 5. NRO DE LOTE -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">4.</span>
                                    {{ Form::label('nro_lote', 'NRO. LOTE', ['class' => 'text-uppercase']) }}
                                    <span class="text-danger" id="as-lote"></span>
                                    {{ Form::text('nro_lote', $formulario->nro_lote, ['class' => 'form-control' . ($errors->has('nro_lote') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un nro. de lote (opcional)','id'=>'nro_lote','style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('nro_lote', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_nro_lote" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 6. LEY -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="ley"><span style="color: black;">5.</span> LEY</label>
                                    <span class="text-danger" id="ley"></span>
                                    {{ Form::text('ley', $formulario->ley, ['class' => 'form-control' . ($errors->has('ley') ? ' is-invalid' : ''), 'id'=>'ley', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('ley', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_ley" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 7. HUM-MERMA -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="humedad"><span style="color: black;">7.</span> HUM-MERMA(%)</label>
                                    <span class="text-danger" id="as-merma"></span>
                                    {{ Form::text('hum_merma', $formulario->hum_merma, ['class' => 'form-control' . ($errors->has('hum_merma') ? ' is-invalid' : ''), 'id'=>'humedad', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('hum_merma', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_merma" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 8. TIPO DE MINERAL -->
                            <div class="col-12 col-md-6 mt-3">
                                <p class="">8. TIPO DE MINERAL</p>
                                <div class="form-group metalicos-input">
                                    {{ Form::label('tipo_min_metalico', 'MINERAL METÁLICO',) }}
                                    <span class="text-danger">*</span>
                                    <select class="form-control" id="select2-multiselect-metalicos" multiple style="width: 100%;">
                                        @foreach($metales as $metalico)
                                        <option value="{{$metalico->simbolo}}" @if(in_array($metalico->simbolo, explode(',', $formulario->tipo_min_metalico))) selected @endif>
                                            {{ $metalico->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{ Form::hidden('tipo_min_metalico', is_array($formulario->tipo_min_metalico) ? implode(',', $formulario->tipo_min_metalico) : '', ['id' => 'hidden-metalicos-ids']) }}
                                    @if ($errors->has('tipo_min_metalico'))
                                    <div class="alert alert-danger">{{ $errors->first('tipo_min_metalico') }}</div>
                                    @endif
                                </div>
                                <script>
                                    // Carga primero el HTML y luego ejecuta JavaScript
                                    document.addEventListener('DOMContentLoaded', () => {

                                        let datosAlicuotaMetalico = [];
                                        let datosAlicuotaNometalico = [];

                                        // -------------SECTOR METALICO----------------

                                        // Minerales (Multiselect)
                                        $('#select2-multiselect-metalicos').select2(); // Inicializar como multiselect-metalicos
                                        // Minerales (Multiselect)
                                        $('#select2-multiselect-nometalicos').select2(); // Inicializar como multiselect-nometalicos

                                        // Limpiar selecciones en el multiselect-nometalicos con JavaScript Delegation
                                        const inputMetalico = document.querySelector('.metalicos-input .select2-container');
                                        inputMetalico.addEventListener('click', e => {
                                            // Obtener las selecciones actuales en el multiselect-nometalicos
                                            const currentSelection = $('#select2-multiselect-nometalicos').val();

                                            // Limpiar selecciones en el multiselect-nometalicos solo si no está vacío
                                            if (currentSelection && currentSelection.length > 0) {
                                                $('#select2-multiselect-nometalicos').val([]).trigger('change');
                                            }
                                        })
                                        // Capturar valores en el evento change
                                        $('#select2-multiselect-metalicos').on('change', async (e) => {
                                            await updateHiddenFieldMetalico();
                                        });
                                        // Función para actualizar el campo oculto
                                        async function updateHiddenFieldMetalico() {
                                            let selectedValues = $('#select2-multiselect-metalicos').val(); // Obtener valores seleccionados como un array
                                            // Agregar información adicional, por ejemplo, el nombre del mineral
                                            let selectedData = await Promise.all(selectedValues.map(async (value) => {
                                                try {
                                                    let mineralData = await findMineralDataMetalico(value); // Función para obtener datos adicionales del mineral
                                                    return mineralData;
                                                } catch (error) {
                                                    console.error(error);
                                                    return null;
                                                }
                                            }));

                                            // Filtrar elementos nulos (errores en las solicitudes)
                                            let selectedDataNew = selectedData.filter(data => data !== null);

                                            // Asignar los valores al input oculto como una cadena separada por comas
                                            $('#hidden-metalicos-ids').val(selectedValues.join(','));

                                            let alicuota = '';
                                            selectedDataNew.forEach(element => {
                                                alicuota = alicuota + ',' + element.alicuota;
                                            });

                                            let nuevaCadenaMetalico = alicuota.substring(1);

                                            // Mostrar la nueva cadena en el campo alicuota
                                            let alicuotaInput_show = document.getElementById('alicuota-show');
                                            let alicuotaInput = document.getElementById('alicuota');
                                            alicuotaInput_show.value = nuevaCadenaMetalico;
                                            alicuotaInput.value = nuevaCadenaMetalico;
                                        }
                                        // Ejemplo de función para obtener datos adicionales del mineral
                                        function findMineralDataMetalico(value) {
                                            return new Promise((resolve, reject) => {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{ route("admin.buscaralicuotametalico") }}',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        simbolo: value
                                                    },
                                                    beforeSend: function() {
                                                        // console.log('Está buscando');
                                                    },
                                                    success: function(response) {
                                                        resolve({
                                                            simbolo: value,
                                                            alicuota: response.alicuota[0].alicuota
                                                        });
                                                    },
                                                    error: function(xhr, status, error) {
                                                        reject(error);
                                                    }
                                                });
                                            });
                                        }
                                        // Actualizar el campo oculto al inicio
                                        updateHiddenFieldMetalico();

                                        // -------------SECTOR NO METALICOS---------------

                                        // Limpiar selecciones en el multiselect-metalicos con javascript Delegation
                                        const inputNoMetalico = document.querySelector('.nometalicos-input .select2-container');
                                        inputNoMetalico.addEventListener('click', e => {
                                            // Obtener las selecciones actuales en el multiselect-metalicos
                                            const currentSelection = $('#select2-multiselect-metalicos').val();

                                            // Limpiar selecciones en el multiselect-metalicos solo si no está vacío
                                            if (currentSelection && currentSelection.length > 0) {
                                                $('#select2-multiselect-metalicos').val([]).trigger('change');
                                            }
                                        })

                                        // Capturar valores en el evento change
                                        $('#select2-multiselect-nometalicos').on('change', async (e) => {
                                            await updateHiddenField();
                                        });

                                        // Función para actualizar el campo oculto
                                        async function updateHiddenField() {
                                            let selectedValues = $('#select2-multiselect-nometalicos').val(); // Obtener valores seleccionados como un array

                                            // Agregar información adicional, por ejemplo, el nombre del mineral
                                            let selectedData = await Promise.all(selectedValues.map(async (value) => {
                                                try {
                                                    let mineralData = await findMineralData(value); // Función para obtener datos adicionales del mineral
                                                    return mineralData;
                                                } catch (error) {
                                                    console.error(error);
                                                    return null;
                                                }
                                            }));

                                            // Filtrar elementos nulos (errores en las solicitudes)
                                            let selectedDataNew = selectedData.filter(data => data !== null);

                                            // Asignar los valores al input oculto como una cadena separada por comas
                                            $('#hidden-nometalicos-ids').val(selectedValues.join(','));

                                            let alicuota = '';
                                            selectedDataNew.forEach(element => {
                                                alicuota = alicuota + ',' + element.alicuota;
                                            });
                                            let nuevaCadenaNometalico = alicuota.substring(1);

                                            let alicuotaInput_show = document.getElementById('alicuota-show');
                                            let alicuotaInput = document.getElementById('alicuota');
                                            alicuotaInput_show.value = nuevaCadenaNometalico;
                                            alicuotaInput.value = nuevaCadenaNometalico;

                                        }
                                        // Ejemplo de función para obtener datos adicionales del mineral
                                        function findMineralData(value) {
                                            return new Promise((resolve, reject) => {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{ route("admin.buscaralicuotanometalico") }}',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        simbolo: value
                                                    },
                                                    beforeSend: function() {
                                                        // console.log('Está buscando');
                                                    },
                                                    success: function(response) {
                                                        resolve({
                                                            simbolo: value,
                                                            alicuota: response.alicuota[0].alicuota
                                                        });
                                                    },
                                                    error: function(xhr, status, error) {
                                                        reject(error);
                                                    }
                                                });
                                            });
                                        }
                                        // Actualizar el campo oculto al inicio
                                        updateHiddenField();
                                    });
                                </script>
                                <!-- NO METALICO -->
                                <div class="form-group nometalicos-input mt-2">
                                    {{ Form::label('tipo_min_metalico', 'MINERAL NO METÁLICO',) }}
                                    <span class="text-danger">*</span>
                                    <select class="form-control" id="select2-multiselect-nometalicos" multiple style="width: 100%;">
                                        @foreach($nometales as $nometalico)
                                        <option value="{{$nometalico->simbolo}}" @if(in_array($nometalico->simbolo, explode(',', $formulario->tipo_min_nometalico))) selected @endif>
                                            {{ $nometalico->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{ Form::hidden('tipo_min_nometalico', is_array($formulario->tipo_min_nometalico) ? implode(',', $formulario->tipo_min_nometalico) : '', ['id' => 'hidden-nometalicos-ids']) }}
                                    @if ($errors->has('tipo_min_nometalico'))
                                    <div class="alert alert-danger">{{ $errors->first('tipo_min_nometalico') }}</div>
                                    @endif
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        $('input[name="tipo_min_metalico"]').on('change', function() {
                                            if ($(this).is(':checked')) {
                                                // Desactiva las opciones del segundo bloque
                                                $('#minerales_no_metalicos input[type="radio"]').prop('checked', false);
                                            }
                                        });

                                        $('input[name="tipo_min_nometalico"]').on('change', function() {
                                            if ($(this).is(':checked')) {
                                                // Desactiva las opciones del primer bloque
                                                $('#minerales_metalicos input[type="radio"]').prop('checked', false);
                                            }
                                        });
                                    });
                                </script>

                            </div>

                            <!-- 9.-PRESENTACIÓN -->
                            <div class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="presentacion" class="text-uppercase"><span id="label-presentacion">9. PRESENTACIÓN</span></label>
                                    <span class="text-danger">*</span>
                                    {{ Form::text('presentacion', $formulario->presentacion, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''),'id'=>'presentacion','style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_presentacion" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 10.-ALICUOTA -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">10.</span>
                                    {{ Form::label('alicuota-show', 'ALÍCUOTA') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('alicuota-show', $formulario->alicuota, ['class' => 'form-control', 'id'=>'alicuota-show',  'style'=>'background-color: #ffffff !important']) }}

                                    {{ Form::hidden('alicuota', $formulario->alicuota,['class' => 'form-control' . ($errors->has('alicuota') ? ' is-invalid' : ''),'id' => 'alicuota']) }}
                                    {!! $errors->first('alicuota', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_alicuota" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- 11.-PESO BRUTO -->
                            <div class="col-12 col-md-4 mt-3">
                                <!-- Peso Bruto y Unidad -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="" style="display: flex; gap: 20px;">
                                            <div class="form-group">
                                                <label for="bruto"><span style="color: black;">11.</span> PESO BRUTO <span class="unidad">{{ $formulario->unidad }}</span></label>
                                                <span class="text-danger" id="as-bruto"></span>
                                                {{ Form::text('peso_bruto_kg', $formulario->peso_bruto_kg, ['class' => 'form-control' . ($errors->has('peso_bruto_kg') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el Peso Bruto','id'=>'bruto', 'style'=>'background-color: #ffffff !important']) }}
                                                {!! $errors->first('peso_bruto_kg', '<div class="invalid-feedback">:message</div>') !!}
                                                <span id="error_bruto" class="invalid-feedback"></span>
                                            </div>
                                            <div class=" form-group">
                                                {{ Form::label('unidad', 'UNIDAD') }}
                                                <span class="text-danger">*</span>
                                                {{ Form::select('unidad', ['Kg.' => 'Kg.', 'Ton.' => 'Ton.'], $formulario->unidad ?? 'Kg.', ['class' => 'form-select' . ($errors->has('unidad') ? ' is-invalid' : ''),  'id' => 'unidad', 'style'=>'background-color: #ffffff !important']) }}
                                                {!! $errors->first('unidad', '<div class="invalid-feedback">:message</div>') !!}
                                                <span id="error_unidad" class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        // Selecciona el elemento select por su ID
                                        const unidadSelect = document.getElementById('unidad');
                                        const htmlUnidad = document.querySelectorAll('.unidad');

                                        // Inicializa el contenido basado en el valor predeterminado
                                        const selectedValue = unidadSelect.value;
                                        actualizarContenidoUnidad(selectedValue);

                                        // Agrega un evento de cambio al elemento select
                                        unidadSelect.addEventListener('change', function() {
                                            // Obtén el valor seleccionado
                                            const selectedValue = this.value;

                                            // Actualiza el contenido según la opción seleccionada
                                            actualizarContenidoUnidad(selectedValue);
                                        });

                                        // Función para actualizar el contenido de los elementos con clase 'unidad'
                                        function actualizarContenidoUnidad(value) {
                                            // Aplica tus condiciones aquí
                                            if (value === 'Kg.') {
                                                htmlUnidad.forEach(element => {
                                                    element.innerText = value;
                                                });
                                            } else if (value === 'Ton.') {
                                                htmlUnidad.forEach(element => {
                                                    element.innerText = value;
                                                });
                                            }
                                        }
                                    });
                                </script>
                            </div>

                            <!-- 12.-TARA -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="bruto"><span style="color: black;">12.</span> TARA <span class="unidad">{{ $formulario->unidad }}</span></label>
                                    <span class="text-danger" id="as-tara"></span>
                                    {{ Form::text('tara_kg', $formulario->tara_kg, ['class' => 'form-control' . ($errors->has('tara_kg') ? ' is-invalid' : ''), 'id'=>'tara', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('tara_kg', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_tara" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 13.-PESO NETO -->
                            <div class="col-12 col-md-5 mt-3">
                                <div class="form-group">
                                    <label for="bruto"><span style="color: black;">13.</span> PESO NETO <span class="unidad">{{ $formulario->unidad }}</span></label>
                                    <span class="text-danger" id="as-neto"></span>
                                    {{ Form::text('peso_neto_kg', $formulario->peso_neto_kg, ['class' => 'form-control' . ($errors->has('peso_neto_kg') ? ' is-invalid' : ''), 'id'=>'neto', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('peso_neto_kg', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_neto" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 14.- MUNICIPIO PRODUCTOR -->
                            <div class="col-12 col-md-7 mt-3">
                                <div class="form-group">
                                    {{ Form::label('municipio', 'Seleccione un municipio') }}
                                    <span class="text-danger">*</span>
                                    <select class="form-control" id="select2-dropdown" style="width: 100%;">
                                        <option value="" disabled selected>-Seleccionar-</option>
                                        @foreach($municipiosCoincidentes as $municipio)
                                        <option value="{{ $municipio->municipio }}"
                                            data-otro-dato="{{ $municipio->codigo }}"
                                            @if($municipio->codigo == $formulario->codigo) selected @endif>
                                            {{ $municipio->municipio }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{ Form::hidden('municipio', $empresa->municipios_id, ['id' => 'hidden-municipio']) }}
                                    @if ($errors->has('municipio'))
                                    <div class="alert alert-danger">{{ $errors->first('municipio') }}</div>
                                    @endif
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        $('#select2-dropdown').select2(); // Activar Select2

                                        $('#select2-dropdown').on('change', () => {

                                            let selectedOption = $('#select2-dropdown option:selected');
                                            let codigo = selectedOption.data('otro-dato'); // ← AQUÍ ESTÁ
                                            let municipio = selectedOption.val();

                                            // console.log('El municipio seleccionado es: ' + municipio);

                                            $('#codigo-municipio_disabled').val(codigo); // para mostrar en el campo disabled
                                            $('#codigo').val(codigo); // para enviar al backend en el campo hidden
                                            $('#hidden-municipio').val(municipio); // para enviar al backend en el campo hidden

                                        });
                                    });
                                </script>
                            </div>


                            <!-- 15.- CODIGO MUNICIPIO -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">15.</span>
                                    {{ Form::label('codigo_disabled', 'CODIGO MUNICIPIO') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('codigo_disabled', $formulario->codigo, [
                                        'class' => 'form-control' . ($errors->has('codigo_disabled') ? ' is-invalid' : ''),
                                        'id' => 'codigo-municipio_disabled',
                                        'placeholder' => 'Código',
                                        'disabled' => 'disabled'
                                    ]) }}

                                    {!! $errors->first('codigo_disabled', '<div class="invalid-feedback">:message</div>') !!}

                                    {{ Form::hidden('codigo', $formulario->codigo, ['id' => 'codigo']) }}
                                </div>
                            </div>

                            <!-- 16.- COMERCIALIZADORA Y/O AGENTE DE RETENCIÓN -->
                            <div class="col-12 col-md-8 mt-3">
                                <div class="form-group">
                                    <label for="comprador" class="text-uppercase"><span id="label-comprador">16. COMERCIALIZADORA Y/O AGENTE DE RETENCIÓN</span></label>
                                    <span class="text-danger">*</span>
                                    {{ Form::text('comprador', $formulario->comprador, ['class' => 'form-control' . ($errors->has('comprador') ? ' is-invalid' : ''),'id'=>'comprador','style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('comprador', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_comprador" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 17.- ORIGEN -->
                            <div class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">17.</span>
                                    {{ Form::label('origen','ORIGEN') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('origen', $formulario->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''),'id'=>'origen','style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('origen', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_origen" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 18.- DESTINO -->
                            <div class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">18.</span>
                                    {{ Form::label('destino','DESTINO') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('destino', $formulario->destino, ['class' => 'form-control' . ($errors->has('destino') ? ' is-invalid' : ''),'id'=>'destino','style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('destino', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_destino" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 19.- TIPO DE TRANSPORTE -->
                            <div class="col-12 col-md-4 mt-3 bg-white">
                                <!-- TIPO DE TRANSPORTE -->
                                <div class="form-group">
                                    <span style="color: black;">19.</span>
                                    {{ Form::label('transporte', 'TIPO DE TRANSPORTE') }}
                                    <span class="text-danger">*</span>
                                    <div class="minerales mt-3">
                                        <div class="form-check">
                                            {{ Form::radio('transporte', 'Volqueta', $formulario->transporte == 'Volqueta', ['class' => 'form-check-input']) }}
                                            {{ Form::label('volqueta', 'Volqueta', ['class' => 'form-check-label']) }}
                                        </div>
                                        <div class="form-check">
                                            {{ Form::radio('transporte', 'Via ferrea', $formulario->transporte == 'Via ferrea', ['class' => 'form-check-input']) }}
                                            <label for="" class="form-check-label"><span id="label-viaferrea">Via ferrea</span></label>
                                        </div>
                                        <div class="form-check">
                                            {{ Form::radio('transporte', 'Camión', $formulario->transporte == 'Camión', ['class' => 'form-check-input']) }}
                                            {{ Form::label('camion', 'Camión', ['class' => 'form-check-label']) }}
                                        </div>
                                        <div class="form-check">
                                            {{ Form::radio('transporte', 'Otros', $formulario->transporte == 'Otros', ['class' => 'form-check-input']) }}
                                            {{ Form::label('otros', 'Otros', ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                    <!-- Agrega mensajes de error según sea necesario -->
                                    <div class="error">{{ $errors->first('transporte') }}</div>
                                </div>
                            </div>

                            <!-- 20.- PLACA -->
                            <div class="col-12 col-md-4 mt-3">
                                <div class="form-group">
                                    <span style="color: black;">20.</span>
                                    {{ Form::label('placa','PLACA') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('placa', $formulario->placa, ['class' => 'form-control' . ($errors->has('placa') ? ' is-invalid' : ''),'id'=>'placa', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('placa', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_placa" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- 21.- CHOFER -->
                            <div class="col-12 col-md-4">
                                <div class="form-group mt-3">
                                    <span style="color: black;">21.</span>
                                    {{ Form::label('chofer','CONDUCTOR') }}
                                    <span class="text-danger">*</span>
                                    {{ Form::text('chofer', $formulario->chofer, ['class' => 'form-control' . ($errors->has('chofer') ? ' is-invalid' : ''),'id'=>'chofer', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('chofer', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_chofer" class="invalid-feedback"></span>
                                </div>
                            </div>


                            <!-- DECLARACIÓN JURADA -->
                            <div class="col-12 mt-3">
                                <div class="form-group border p-3">
                                    {{ Form::label('declarcion_jurada','DECLARACIÓN JURADA') }}
                                    <P class="mt-3"> El presente formulario constituye una Declaración Jurada y debe ser requerida en todas las trancas por el personal de la,policia y puestos de control.</P>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    {{ Form::label('observaciones','OBSERVACIONES') }}
                                    {{ Form::text('observaciones', $formulario->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'id'=>'observaciones', 'style'=>'background-color: #ffffff !important']) }}
                                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                                    <span id="error_observaciones" class="invalid-feedback"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="card-footer d-flex justify-content-between">
        @if($cantStaging >= 5 && $tipo =='create' )
        <div class="d-flex flex-column">
            <div class="">
                <button type="submit" class="btn btn-primary text-uppercase ps-5 pe-5" id="enviar-button" disabled>Guardar</button>
            </div>
            <P class="text-danger mt-2 text-uppercase">Tienes {{ $cantStaging }} formularios en escena para su emisión.</P>
        </div>
        @else
        <div class="">
            <button type="submit" class="btn btn-primary text-uppercase ps-5 pe-5" id="enviar-button">Guardar</button>
        </div>
        @endif
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // 1.- Validar campo Razon Social
        const razonSocialInput = document.getElementById("razon_social");
        const errorRazonSocial = document.getElementById("error_razon_social");

        razonSocialInput.addEventListener("input", function() {
            const inputValue = razonSocialInput.value;
            if (inputValue.length > 50) {
                errorRazonSocial.textContent = "El campo razon social no debe contener más de 50 caracteres.";
                razonSocialInput.classList.add("is-invalid");

            } else if (inputValue.length <= 50) {
                errorRazonSocial.textContent = "";
                razonSocialInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputValue.trim() === '') {

                errorRazonSocial.textContent = "Este campo es requerido";
                razonSocialInput.classList.add("is-invalid");
            }

        });


        razonSocialInput.addEventListener("blur", function() {
            const inputValue = razonSocialInput.value;
            if (inputValue.trim() === '') {
                errorRazonSocial.textContent = "Este campo es requerido";
                razonSocialInput.classList.add("is-invalid");
            }
        });
        // FIN Validar campo Razon Social

        // 1.- Validar campo Nro. Nim
        const nimInput = document.getElementById("nro_nim");
        const errorNim = document.getElementById("error_nro_nim");

        nimInput.addEventListener("input", function() {
            const inputNimValue = nimInput.value;
            if (inputNimValue.length > 15) {
                errorNim.textContent = "El campo Nro. Nim no debe contener más de 15 caracteres.";
                nimInput.classList.add("is-invalid");

            } else if (inputNimValue.length <= 15) {
                errorNim.textContent = "";
                nimInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputNimValue.trim() === '') {

                errorNim.textContent = "Este campo es requerido";
                nimInput.classList.add("is-invalid");
            }

        });


        nimInput.addEventListener("blur", function() {
            const inputNimValue = nimInput.value;
            if (inputNimValue.trim() === '') {
                errorNim.textContent = "Este campo es requerido";
                nimInput.classList.add("is-invalid");
            }
        });
        // FIN Validar Nro. Nim

        // 1.- Validar campo RUIM
        const ruimInput = document.getElementById("ruim");
        const errorRuim = document.getElementById("error_ruim");

        ruimInput.addEventListener("input", function() {
            const inputRuimValue = ruimInput.value;
            if (inputRuimValue.length > 15) {
                errorRuim.textContent = "El campo Ruim no debe contener más de 15 caracteres.";
                ruimInput.classList.add("is-invalid");

            } else if (inputRuimValue.length <= 15) {
                errorRuim.textContent = "";
                ruimInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputRuimValue.trim() === '') {

                errorRuim.textContent = "Este campo es requerido";
                ruimInput.classList.add("is-invalid");
            }

        });


        ruimInput.addEventListener("blur", function() {
            const inputRuimValue = ruimInput.value;
            if (inputRuimValue.trim() === '') {
                errorRuim.textContent = "Este campo es requerido";
                ruimInput.classList.add("is-invalid");
            }
        });
        // FIN Validar RUIM


        // 1.- Validar campo Reg. Nro Lote
        const loteInput = document.getElementById("nro_lote");
        const errorLote = document.getElementById("error_nro_lote");

        loteInput.addEventListener("input", function() {
            const inputLoteValue = loteInput.value;
            if (inputLoteValue.length > 15) {
                errorLote.textContent = "El campo Nro. Lote no debe contener más de 15 caracteres.";
                loteInput.classList.add("is-invalid");

            } else if (inputLoteValue.length <= 15) {
                errorLote.textContent = "";
                loteInput.classList.remove("is-invalid");

            }

        });
        // FIN Validar Nro Lote

        // 1.- Validar Reg. Cert. quimico
        const quimicoInput = document.getElementById("quimico");
        const errorQuimico = document.getElementById("error_quimico");

        quimicoInput.addEventListener("input", function() {
            const inputQuimicoValue = quimicoInput.value;
            if (inputQuimicoValue.length > 15) {
                errorQuimico.textContent = "El campo Nro. Lote no debe contener más de 15 caracteres.";
                quimicoInput.classList.add("is-invalid");

            } else if (inputQuimicoValue.length <= 15) {
                errorQuimico.textContent = "";
                quimicoInput.classList.remove("is-invalid");
            }
        });
        // FIN Validar Cert. quimico


        // 1.- Validar campo Peso Bruto
        const brutoInput = document.getElementById("bruto");
        const errorBruto = document.getElementById("error_bruto");

        brutoInput.addEventListener("input", function() {
            const inputBrutoValue = brutoInput.value;
            if (inputBrutoValue.length > 10) {
                errorBruto.textContent = "El campo Peso Bruto no debe contener más de 10 caracteres.";
                brutoInput.classList.add("is-invalid");

            } else if (inputBrutoValue.length <= 10) {
                errorBruto.textContent = "";
                brutoInput.classList.remove("is-invalid");

            }

        });


        // FIN Validar Peso Bruto

        // 1.- Validar campo Peso Neto
        const netoInput = document.getElementById("neto");
        const errorNeto = document.getElementById("error_neto");

        netoInput.addEventListener("input", function() {
            const inputNetoValue = netoInput.value;
            if (inputNetoValue.length > 10) {
                errorNeto.textContent = "El campo Peso Neto no debe contener más de 10 caracteres.";
                netoInput.classList.add("is-invalid");

            } else if (inputNetoValue.length <= 10) {
                errorNeto.textContent = "";
                netoInput.classList.remove("is-invalid");

            }


        });

        // FIN Validar Peso Neto

        // 1.- Validar campo Tara
        const taraInput = document.getElementById("tara");
        const errorTara = document.getElementById("error_tara");

        taraInput.addEventListener("input", function() {
            const inputTaraValue = taraInput.value;
            if (inputTaraValue.length > 10) {
                errorTara.textContent = "El campo Tara no debe contener más de 10 caracteres.";
                taraInput.classList.add("is-invalid");

            } else if (inputTaraValue.length <= 10) {
                errorTara.textContent = "";
                taraInput.classList.remove("is-invalid");
            }

        });

        // FIN Validar Tara

        // 1.- Validar  merma hum
        const mermaInput = document.getElementById("merma");
        const mermaQuimico = document.getElementById("error_merma");

        mermaInput.addEventListener("input", function() {
            const inputMermaValue = mermaInput.value;
            if (inputMermaValue.length > 10) {
                mermaQuimico.textContent = "El campo Hum. Merma no debe contener más de 10 caracteres.";
                mermaInput.classList.add("is-invalid");

            } else if (inputMermaValue.length <= 10) {
                mermaQuimico.textContent = "";
                mermaInput.classList.remove("is-invalid");
            }
        });
        // FIN Validar merma hum


        // 1.- Validar campo Origen
        const origenInput = document.getElementById("origen");
        const errorOrigen = document.getElementById("error_origen");

        origenInput.addEventListener("input", function() {
            const inputOrigenValue = origenInput.value;
            if (inputOrigenValue.length > 13) {
                errorOrigen.textContent = "El campo Origen no debe contener más de 13 caracteres.";
                origenInput.classList.add("is-invalid");

            } else if (inputOrigenValue.length <= 13) {
                errorOrigen.textContent = "";
                origenInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputOrigenValue.trim() === '') {

                errorOrigen.textContent = "Este campo es requerido";
                origenInput.classList.add("is-invalid");
            }

        });

        origenInput.addEventListener("blur", function() {
            const inputOrigenValue = origenInput.value;
            if (inputOrigenValue.trim() === '') {
                errorOrigen.textContent = "Este campo es requerido";
                origenInput.classList.add("is-invalid");
            }
        });
        // FIN Validar Origen


        // 1.- Validar campo destino
        const destinoInput = document.getElementById("destino");
        const errorDestino = document.getElementById("error_destino");

        destinoInput.addEventListener("input", function() {
            const inputDestinoValue = destinoInput.value;
            if (inputDestinoValue.length > 13) {
                errorDestino.textContent = "El campo Destino no debe contener más de 13 caracteres.";
                destinoInput.classList.add("is-invalid");

            } else if (inputDestinoValue.length <= 13) {
                errorDestino.textContent = "";
                destinoInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputDestinoValue.trim() === '') {

                errorDestino.textContent = "Este campo es requerido";
                destinoInput.classList.add("is-invalid");
            }

        });

        destinoInput.addEventListener("blur", function() {
            const inputDestinoValue = destinoInput.value;
            if (inputDestinoValue.trim() === '') {
                errorDestino.textContent = "Este campo es requerido";
                destinoInput.classList.add("is-invalid");
            }
        });
        // FIN Validar destino

        // 1.- Validar campo comprador
        const comercializadoraInput = document.getElementById("comercializadora");
        const errorComercializadora = document.getElementById("error_comercializadora");

        comercializadoraInput.addEventListener("input", function() {
            const inputComercializadoraValue = comercializadoraInput.value;
            if (inputComercializadoraValue.length > 16) {
                errorComercializadora.textContent = "El campo Comercializadora no debe contener más de 16 caracteres.";
                comercializadoraInput.classList.add("is-invalid");

            } else if (inputComercializadoraValue.length <= 16) {
                errorComercializadora.textContent = "";
                comercializadoraInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputComercializadoraValue.trim() === '') {

                errorComercializadora.textContent = "Este campo es requerido";
                comercializadoraInput.classList.add("is-invalid");
            }

        });

        comercializadoraInput.addEventListener("blur", function() {
            const inputComercializadoraValue = comercializadoraInput.value;
            if (inputComercializadoraValue.trim() === '') {
                errorComercializadora.textContent = "Este campo es requerido";
                comercializadoraInput.classList.add("is-invalid");
            }
        });
        // FIN Validar Alicuota

        // 1.- Validar campo comercializadora
        const alicuotaInput = document.getElementById("alicuota");
        const errorAlicuota = document.getElementById("error_alicuota");

        alicuotaInput.addEventListener("input", function() {
            const inputAlicuotaValue = alicuotaInput.value;
            if (inputAlicuotaValue.length > 10) {
                errorAlicuota.textContent = "El campo Alicuota no debe contener más de 10 caracteres.";
                alicuotaInput.classList.add("is-invalid");

            } else if (inputAlicuotaValue.length <= 10) {
                errorAlicuota.textContent = "";
                alicuotaInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputAlicuotaValue.trim() === '') {

                errorAlicuota.textContent = "Este campo es requerido";
                alicuotaInput.classList.add("is-invalid");
            }

        });

        alicuotaInput.addEventListener("blur", function() {
            const inputAlicuotaValue = alicuotaInput.value;
            if (inputAlicuotaValue.trim() === '') {
                errorAlicuota.textContent = "Este campo es requerido";
                alicuotaInput.classList.add("is-invalid");
            }
        });
        // FIN Validar Alicuota

        // 1.- Validar campo chofer
        const choferInput = document.getElementById("chofer");
        const errorChofer = document.getElementById("error_chofer");

        choferInput.addEventListener("input", function() {
            const inputChoferValue = choferInput.value;
            if (inputChoferValue.length > 20) {
                errorChofer.textContent = "El campo Chofer no debe contener más de 20 caracteres.";
                choferInput.classList.add("is-invalid");

            } else if (inputChoferValue.length <= 20) {
                errorChofer.textContent = "";
                choferInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputChoferValue.trim() === '') {
                errorChofer.textContent = "Este campo es requerido";
                choferInput.classList.add("is-invalid");
            }

        });

        choferInput.addEventListener("blur", function() {
            const inputChoferValue = choferInput.value;
            if (inputChoferValue.trim() === '') {
                errorChofer.textContent = "Este campo es requerido";
                choferInput.classList.add("is-invalid");
            }
        });
        // FIN Validar Chofer


        // 1.- Validar campo placa
        const placaInput = document.getElementById("placa");
        const errorPlaca = document.getElementById("error_placa");

        placaInput.addEventListener("input", function() {
            const inputPlacaValue = placaInput.value;
            if (inputPlacaValue.length > 15) {
                errorPlaca.textContent = "El campo Placa no debe contener más de 15 caracteres.";
                placaInput.classList.add("is-invalid");

            } else if (inputPlacaValue.length <= 15) {
                errorPlaca.textContent = "";
                placaInput.classList.remove("is-invalid");

            }
            // Verifica que el campo sea vacio
            if (inputPlacaValue.trim() === '') {
                errorPlaca.textContent = "Este campo es requerido";
                placaInput.classList.add("is-invalid");
            }

        });

        placaInput.addEventListener("blur", function() {
            const inputPlacaValue = placaInput.value;
            if (inputPlacaValue.trim() === '') {
                errorPlaca.textContent = "Este campo es requerido";
                placaInput.classList.add("is-invalid");
            }
        });
        // FIN Validar placa


        // 1.- Validar  Emisiones
        const emisionInput = document.getElementById("fecha_emision");
        const emisionError = document.getElementById("error_fecha_emision");

        emisionInput.addEventListener("blur", function() {
            const inputEmisionValue = emisionInput.value;
            if (inputEmisionValue.trim() === '') {
                emisionError.textContent = "Este campo es requerido";
                emisionInput.classList.add("is-invalid");
            } else {
                emisionError.textContent = "";
                emisionInput.classList.remove("is-invalid");
            }
        });
        // FIN Validar Emisiones



        // 1.- Validar  Observaciones
        const observacionesInput = document.getElementById("observaciones");
        const observacionesQuimico = document.getElementById("error_observaciones");

        observacionesInput.addEventListener("input", function() {
            const inputObservacionesValue = observacionesInput.value;
            if (inputObservacionesValue.length > 115) {
                observacionesQuimico.textContent = "El campo Observaciones no debe contener más de 115 caracteres.";
                observacionesInput.classList.add("is-invalid");

            } else if (inputObservacionesValue.length <= 115) {
                observacionesQuimico.textContent = "";
                observacionesInput.classList.remove("is-invalid");
            }
        });
        // FIN Validar Observaciones



    });
</script>