<div class="">
    <div class="card-body">

        <div class="row  mt-3">

            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12">
                        {{ Form::label('tipo', 'Seleccionar el tipo de operación') }}
                        <span class="text-danger">*</span>
                        <div class="d-flex gap-4 mt-2">
                            <div class="form-check">
                                {{ Form::checkbox('tipo_metalico', 'Metalico', $empresa->tipo_metalico == 'Metalico', ['class' => 'form-check-input', 'id' => 'metalico-checkbox']) }}
                                <label class="form-check-label" for="metalico-checkbox">
                                    Metalico
                                </label>
                            </div>
                            <div class="form-check">
                                {{ Form::checkbox('tipo_no_metalico', 'No metalico', $empresa->tipo_no_metalico == 'No metalico', ['class' => 'form-check-input','id' => 'no-metalico-checkbox']) }}
                                <label for="no-metalico-checkbox" class="form-check-label">
                                    No metalico
                                </label>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                // Este evento se ejecuta cuando cambia el estado de los checkboxes
                                $('input[type="checkbox"]').on('change', function() {
                                    const metalicoCheckbox = $('#metalico-checkbox');
                                    const noMetalicoCheckbox = $('#no-metalico-checkbox');

                                    // Verifica el estado de los checkboxes y realiza la acción correspondiente
                                    if (metalicoCheckbox.is(':checked') && noMetalicoCheckbox.is(':checked')) {
                                        obtenerDatos('Ambos');
                                    } else if (metalicoCheckbox.is(':checked')) {
                                        obtenerDatos('Metalico');
                                    } else if (noMetalicoCheckbox.is(':checked')) {
                                        obtenerDatos('No metalico');
                                    } else {
                                        obtenerDatos('Sin datos');
                                    }
                                });

                                // Función para realizar la solicitud AJAX y cargar los datos en el segundo select
                                function obtenerDatos(selectedOption) {
                                    $.ajax({
                                        url: '{{ route("admin.indexminerales") }}', // Debes definir la ruta en tu aplicación Laravel
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            metal: selectedOption
                                        },
                                        success: function(data) {
                                            const {
                                                mineral,
                                                tipo
                                            } = data;

                                            // Limpiar y cargar los datos en el segundo select
                                            var select2 = $('#select2-multiselect');
                                            select2.empty();
                                            $.each(mineral, function(key, value) {
                                                select2.append($('<option>', {
                                                    value: key.nombre,
                                                    text: value.nombre
                                                }));
                                            });
                                        },
                                        error: function() {
                                            alert('Error al cargar los datos.');
                                        }
                                    });
                                }
                            });
                        </script>
                    </div>

                    <!-- Campo multiselect de mineral -->
                    <div class="col-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('mineral', 'Seleccione los minerales de operación ') }}
                            <span class="text-danger">*</span>
                            <select class="form-control" id="select2-multiselect" multiple style="width: 100%;">
                                @if($opcion=='edit')
                                @foreach($metalicos as $metalico)
                                <option value="{{$metalico->nombre}}" @if(in_array($metalico->nombre, explode(',', $empresa->mineral))) selected @endif>
                                    {{ $metalico->nombre }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            {{ Form::hidden('mineral', is_array($empresa->mineral) ? implode(',', $empresa->mineral) : '', ['id' => 'hidden-minerales-ids']) }}
                            @if ($errors->has('mineral'))
                            <div class="alert alert-danger">{{ $errors->first('mineral') }}</div>
                            @endif
                        </div>
                        <script>
                            // Carga primero el HTML y luego ejecuta JavaScript
                            document.addEventListener('DOMContentLoaded', () => {
                                // Minerales (Multiselect)
                                $('#select2-multiselect').select2(); // Inicializar como multiselect

                                // Capturar valores en el evento change
                                $('#select2-multiselect').on('change', (e) => {
                                    updateHiddenField();
                                });

                                // Función para actualizar el campo oculto
                                function updateHiddenField() {
                                    let selectedValues = $('#select2-multiselect').val(); // Obtener valores seleccionados como un array

                                    // Asignar los valores al input oculto como una cadena separada por comas
                                    $('#hidden-minerales-ids').val(selectedValues.join(','));
                                    // let hola = $('#hidden-minerales-ids').val();
                                    // console.log(hola);
                                }

                                // Actualizar el campo oculto al inicio
                                updateHiddenField();
                            });
                        </script>
                    </div>




                    <div class="col-12 mt-3">
                        <label for="nombres">Empresa y/o Cooperativa:</label>
                        <span class="text-danger">*</span>
                        {{ Form::text('nombres', $empresa->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre de la empresa y/o cooperativa', 'id'=>'empresa']) }}
                        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 mt-3">
                        {{ Form::label('ruim','RUIM') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('ruim', $empresa->ruim, ['class' => 'form-control' . ($errors->has('ruim') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el codigo RUIM']) }}
                        {!! $errors->first('ruim', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- NIT -->
                    <div class="col-12 mt-3">
                        {{ Form::label('nro_nit','NIT') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('nro_nit', $empresa->nro_nit, ['class' => 'form-control' . ($errors->has('nro_nit') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un número de NIT']) }}
                        {!! $errors->first('nro_nit', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- NIM -->
                    <div class="col-12 mt-3">
                        {{ Form::label('nro_nim','NIM') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('nro_nim', $empresa->nro_nim, ['class' => 'form-control' . ($errors->has('nro_nim') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un codigo de NIM']) }}
                        {!! $errors->first('nro_nim', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- Fecha-caducidad -->
                    <div class="col-12 mt-3">
                        {{ Form::label('fecha_caducidad','Fecha de caducidad de NIM') }}
                        <span class="text-danger">*</span>
                        {{ Form::input('datetime-local', 'fecha_caducidad', $empresa->fecha_caducidad, ['class' => 'form-control' . ($errors->has('fecha_caducidad') ? ' is-invalid' : ''), 'id' => 'fecha_caducidad']) }}
                        {!! $errors->first('fecha_caducidad', '<div class="invalid-feedback">:message</div>') !!}

                    </div>


                    <!-- Campo municipios -->
                    <div class="col-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('municipios_id', 'Seleccione un municipio') }}
                            <span class="text-danger">*</span>
                            <select class="form-control" id="select2-dropdown" style="width: 100%;">
                                <option value="">-Seleccionar-</option>
                                @foreach($municipios as $municipio)
                                <option value="{{$municipio->id}}" data-otro-dato="{{$municipio->codigo}}" @if($municipio->id == $empresa->municipios_id) selected @endif>
                                    {{ $municipio->municipio }}
                                </option>
                                @endforeach
                            </select>
                            {{ Form::hidden('municipios_id', $empresa->municipios_id, ['id' => 'hidden-municipio-id']) }}
                            @if ($errors->has('municipios_id'))
                            <div class="alert alert-danger">{{ $errors->first('municipios_id') }}</div>
                            @endif
                        </div>
                        <script>
                            // Carga primero el HTML y luego ejecuta javascript
                            document.addEventListener('DOMContentLoaded', () => {
                                // Municipios
                                $('#select2-dropdown').select2(); // Inicializar
                                // Capturar Values when change event
                                $('#select2-dropdown').on('change', (e) => {
                                    let id = $('#select2-dropdown').select2("val"); // get id municipio
                                    let municipio = $('#select2-dropdown option:selected').text(); // get nombre municipio
                                    let codigo = $('#select2-dropdown option:selected').data('otro-dato'); // Obtener data-otro-dato

                                    // Asignar el valor al input oculto
                                    $('#hidden-municipio-id').val(id);
                                }); // Fin municipios

                            })
                        </script>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('fecha_inscripcion','Fecha de incripción') }}
                            <span class="text-danger">*</span>
                            {{ Form::input('datetime-local', 'fecha_inscripcion', $empresa->fecha_inscripcion, ['class' => 'form-control' . ($errors->has('fecha_inscripcion') ? ' is-invalid' : ''), 'id' => 'fecha_inscripcion']) }}
                            {!! $errors->first('fecha_inscripcion', '<div class="invalid-feedback">:message</div>') !!}

                        </div>
                    </div>

                    <!-- Campo para subir archivo PDF -->

                    @if($opcion=='edit')
                    <!-- Campo para mostrar el nombre del archivo existente -->
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            {{ Form::label('archivo_pdf', 'Archivo PDF existente:') }}
                            <p class="text-danger">{{ $empresa->archivo_pdf }}</p>
                        </div>
                    </div>

                    <!-- Campo para subir un nuevo archivo PDF -->
                    <div class="col-12 mt-1">
                        <div class="form-group">
                            {{ Form::label('nuevo_archivo_pdf', 'Subir nuevo archivo PDF') }}
                            {{ Form::file('nuevo_archivo_pdf', ['class' => 'form-control-file', 'accept' => '.pdf']) }}
                            {!! $errors->first('nuevo_archivo_pdf', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    @else
                    <div class="col-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('archivo_pdf', 'Archivo PDF') }}
                            {{ Form::file('archivo_pdf', ['class' => 'form-control-file', 'accept' => '.pdf']) }}
                            {!! $errors->first('archivo_pdf', '<div class="text-danger text-small">:message</div>') !!}
                        </div>
                    </div>
                    @endif

                    <div class="col-12 mt-3">
                        {{ Form::label('estado', 'Estado') }}
                        <span class="text-danger">*</span>
                        {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $empresa->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="row">

                    <div class="col-12">
                        <strong>Lugar de operación</strong>
                        <!-- Tu mapa se renderizará aquí -->
                        <style>
                            #map {
                                cursor: pointer;
                                /* Establece el cursor por defecto como puntero */
                            }

                            #map.dragging {
                                cursor: grabbing;
                                /* Cambia el cursor mientras el mouse está presionado */
                            }
                        </style>

                        <div id="map" style="height: 300px;" class="mt-2"></div>

                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                // Define la ruta de la imagen del marcador personalizado
                                var customMarkerIcon = L.icon({
                                    iconUrl: '{{ asset("dashboard/img/marker-icon.png") }}', // Reemplaza con la ruta correcta
                                    iconSize: [32, 50],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32],
                                });

                                // Obtén las coordenadas del controlador
                                let empresaLongitud = '{{ $empresa->longitud }}' || -66.1568;
                                let empresaLatitud = '{{ $empresa->latitud }}' || -17.3895;

                                // Crea el mapa en el contenedor con id 'map' y centra en las coordenadas proporcionadas por el controlador
                                let mymap = L.map('map').setView([empresaLatitud, empresaLongitud], 13);

                                // Añade un mapa base de OpenStreetMap
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '© OpenStreetMap contributors'
                                }).addTo(mymap);

                                // Crea un marcador con las coordenadas proporcionadas por el controlador
                                let marker;
                                marker = L.marker([empresaLatitud, empresaLongitud], {
                                    icon: customMarkerIcon
                                }).addTo(mymap);

                                // Inicializa una variable para almacenar el marcador

                                // Añade un control de clic para obtener las coordenadas
                                mymap.on('click', function(e) {
                                    // Elimina el marcador existente, si hay uno
                                    if (marker) {
                                        mymap.removeLayer(marker);
                                    }

                                    // Obtiene las coordenadas del clic
                                    let latlng = e.latlng;

                                    // Coloca un marcador en las coordenadas
                                    // Coloca un marcador personalizado en las coordenadas
                                    marker = L.marker(latlng, {
                                        icon: customMarkerIcon
                                    }).addTo(mymap);

                                    // Muestra las coordenadas en la consola
                                    console.log("Latitud: " + latlng.lat + ", Longitud: " + latlng.lng);


                                    // Capturar el contenido del elemento con el id 'map'
                                    const contenidoMapa = document.getElementById('map');

                                    // Definir las dimensiones deseadas
                                    const anchoDeseado = 100; // Puedes cambiar esto al ancho que desees
                                    const altoDeseado = 300; // Puedes cambiar esto al alto que desees

                                    // Ajustar las dimensiones del elemento
                                    contenidoMapa.style.width = anchoDeseado + '%';
                                    contenidoMapa.style.height = altoDeseado + 'px';

                                    // Convertir el elemento a una imagen utilizando dom-to-image
                                    domtoimage.toPng(contenidoMapa)
                                        .then(function(dataUrl) {

                                            // Asignar el contenido de la imagen capturada al campo oculto
                                            const mapaCapturado = document.getElementById('mapa_captura');
                                            if (mapaCapturado) {
                                                mapaCapturado.value = dataUrl;
                                                console.log('Imagen capturada y asignada correctamente.');
                                                console.log(contenidoMapa);
                                            } else {
                                                console.error('Error: No se encontró el elemento con id "mapa_captura".');
                                            }

                                        })
                                        .catch(function(error) {
                                            console.error('Error al convertir el elemento a imagen:', error);
                                        });

                                    // También puedes mostrar las coordenadas en la página
                                    $('#longitud').val(latlng.lng);
                                    $('#latitud').val(latlng.lat);
                                });

                                // Agrega clases CSS al mapa para cambiar el cursor mientras se arrastra el mapa
                                mymap.on('mousedown', function() {
                                    document.getElementById('map').classList.add('dragging');
                                });

                                mymap.on('mouseup', function() {
                                    document.getElementById('map').classList.remove('dragging');
                                });

                                mymap.on('dragend', function() {
                                    document.getElementById('map').classList.remove('dragging');
                                });
                            });
                        </script>


                    </div>

                    <!-- Longitud -->
                    <div class="col-12 col-md-6 mt-3">
                        {{ Form::label('longitud','Longitud') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('longitud', $empresa->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud','id'=>'longitud']) }}
                        {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- Latitud -->
                    <div class="col-12 col-md-6 mt-3">
                        {{ Form::label('latitud','Latitud') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('latitud', $empresa->latitud, ['class' => 'form-control' . ($errors->has('latitud') ? ' is-invalid' : ''), 'placeholder' => 'Latitud','id'=>'latitud']) }}
                        {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Agregar este campo oculto al formulario -->
    <input type="hidden" name="mapa_captura" id="mapa_captura" value="">

    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase" id="guardar-empresa">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>


</div>