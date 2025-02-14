<div class="">
    <div class="card-body">

        <div class="row g-3 mt-3">
            <div class="col-12 col-md-5">
                <div class="row">

                    <div class="col-12">
                        {{ Form::label('rocmin','Nro. de ROCMIN') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('rocmin', $minero->rocmin, ['class' => 'form-control' . ($errors->has('rocmin') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un número de ROCMIN']) }}
                        {!! $errors->first('rocmin', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 mt-3">
                        {{ Form::label('nombres','Nombre/Razón Social') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('nombres', $minero->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre y/o Razón social']) }}
                        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- NIT -->
                    <div class="col-12 mt-3">
                        {{ Form::label('nro_nit','NIT') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('nro_nit', $minero->nro_nit, ['class' => 'form-control' . ($errors->has('nro_nit') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un número de NIT']) }}
                        {!! $errors->first('nro_nit', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- NIM -->
                    <div class="col-12 mt-3">
                        {{ Form::label('nro_nim','NIM') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('nro_nim', $minero->nro_nim, ['class' => 'form-control' . ($errors->has('nro_nim') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un codigo de NIM']) }}
                        {!! $errors->first('nro_nim', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- Fecha-caducidad -->
                    <div class="col-12 mt-3">
                        {{ Form::label('fecha_caducidad','Fecha de caducidad de NIM') }}
                        <span class="text-danger">*</span>
                        {{ Form::input('datetime-local', 'fecha_caducidad', $minero->fecha_caducidad, ['class' => 'form-control' . ($errors->has('fecha_caducidad') ? ' is-invalid' : ''), 'id' => 'fecha_caducidad']) }}
                        {!! $errors->first('fecha_caducidad', '<div class="invalid-feedback">:message</div>') !!}

                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('fecha_inscripcion','Fecha de incripción') }}
                            <span class="text-danger">*</span>
                            {{ Form::input('datetime-local', 'fecha_inscripcion', $minero->fecha_inscripcion, ['class' => 'form-control' . ($errors->has('fecha_inscripcion') ? ' is-invalid' : ''), 'id' => 'fecha_inscripcion']) }}
                            {!! $errors->first('fecha_inscripcion', '<div class="invalid-feedback">:message</div>') !!}

                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        {{ Form::label('procedencia','Lugar dirección') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('procedencia', $minero->procedencia, ['class' => 'form-control' . ($errors->has('procedencia') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una direccion']) }}
                        {!! $errors->first('procedencia', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-12 mt-3">
                        {{ Form::label('telefono','Telefono') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('telefono', $minero->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un telefono']) }}
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>


                    <!-- Campo para subir archivo PDF -->

                    @if($opcion=='edit')
                    <!-- Campo para mostrar el nombre del archivo existente -->
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            {{ Form::label('archivo_pdf', 'Archivo PDF existente:') }}
                            <p class="text-danger">{{ $minero->archivo_pdf }}</p>
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
                        {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $minero->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="row">

                    <div class="col-12">
                        <strong>Lugar de operación</strong>
                        <!-- Tu mapa se renderizará aquí -->
                        <div id="map" style="width: 100%; height: 550px;" class="mt-2"></div>
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

                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                // Define la ruta de la imagen del marcador personalizado
                                let customMarkerIcon = L.icon({
                                    iconUrl: '{{ asset("dashboard/img/marker-icon.png") }}', // Reemplaza con la ruta correcta
                                    iconSize: [32, 50],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32],
                                });

                                // Obtén las coordenadas del controlador
                                let empresaLongitud = '{{ $minero->longitud }}' || -66.1568;
                                let empresaLatitud = '{{ $minero->latitud }}' || -17.3895;

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
                        {{ Form::text('longitud', $minero->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud','id'=>'longitud']) }}
                        {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <!-- Latitud -->
                    <div class="col-12 col-md-6 mt-3">
                        {{ Form::label('latitud','Latitud') }}
                        <span class="text-danger">*</span>
                        {{ Form::text('latitud', $minero->latitud, ['class' => 'form-control' . ($errors->has('latitud') ? ' is-invalid' : ''), 'placeholder' => 'Latitud','id'=>'latitud']) }}
                        {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>
</div>