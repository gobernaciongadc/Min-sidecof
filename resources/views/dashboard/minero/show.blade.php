@extends('dashboard.layouts.main')

@section('template_title')
{{ $minero->name ?? "{{ __('Show') Minero" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-show">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <span class="color-titulo text-uppercase">Datos de comercializadora</span>
                        </span>

                    </div>
                </div>

                <div class="card-body mt-3">

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary text-uppercase float-right" href="{{ route('admin.mineros.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group mt-2">
                                <strong>Nro. de ROCMIN:</strong>
                                {{ $minero->rocmin }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Nombre y/o Razón social</strong>
                                {{ $minero->nombres }}
                            </div>

                            <div class="form-group mt-2">
                                <strong>Nro. de NIT</strong>
                                {{ $minero->nro_nit }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Nro. de NIM</strong>
                                {{ $minero->nro_nim }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Fecha de Caducidad NIM</strong>
                                {{ $minero->fecha_caducidad }}
                            </div>

                            <div class="form-group mt-2">
                                <strong>Fecha de inscripcion:</strong>
                                {{ $minero->fecha_inscripcion }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Procedencia:</strong>
                                {{ $minero->procedencia }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Telefono:</strong>
                                {{ $minero->telefono }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Longitud:</strong>
                                {{ $minero->longitud }}
                                <input type="hidden" id="long" value="{{ $minero->longitud }}">
                            </div>

                            <div class="form-group mt-2">
                                <strong>Latitud:</strong>
                                {{ $minero->latitud }}
                                <input type="hidden" id="lat" value="{{ $minero->latitud }}">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Estado:</strong>
                                {{ $minero->estado }}
                            </div>
                            <div class="form-group mt-2">
                                <strong>Usuario a cargo del registro:</strong>
                                {{ $minero->user->name }}
                            </div>

                            <div class="form-group mt-2">
                                <strong>Documentos:</strong><br>
                                <a class="btn btn-outline-info" id="documentos" value="{{ $minero->archivo_pdf }}">Ver documentos</a>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', () => {

                                    // Realiza la petición AJAX al hacer clic en el enlace
                                    $('#documentos').on('click', function() {
                                        // Obtiene el valor del atributo value
                                        let file_pdf = $(this).attr('value');
                                        console.log(file_pdf);
                                        // Realiza la petición AJAX
                                        $.ajax({
                                            url: '{{ route("admin.verdocumentopdfminero") }}', // Reemplaza con la URL correcta
                                            method: 'POST', // Puedes ajustar el método según tus necesidades
                                            data: {
                                                _token: '{{ csrf_token() }}',
                                                file_pdf: file_pdf
                                            },
                                            success: function(response) {


                                                const nombreArchivo = response.mineral;

                                                // Construye la URL completa del archivo usando la función asset de Laravel
                                                const urlArchivo = '{{ asset("storage/archivos_pdf/") }}' + '/' + nombreArchivo;

                                                // Abre el archivo en una nueva ventana
                                                const nuevaVentana = window.open(urlArchivo, '_blank');

                                                // Verifica si la ventana se abrió correctamente
                                                if (nuevaVentana) {
                                                    console.log('Archivo abierto en una nueva ventana');
                                                } else {
                                                    console.error('No se pudo abrir el archivo en una nueva ventana');
                                                }
                                            },
                                            error: function(error) {
                                                // Maneja el error aquí
                                                console.error(error);
                                            }
                                            // Ejecutar storageLink
                                            // php artisan storage: link
                                        });
                                    });

                                });
                            </script>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="form-group mt-2">
                                <strong>Lugar de operación</strong>
                                <div id="map" style="width: 100%; height: 550px;" class="mt-2"></div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const latitud = parseFloat(document.getElementById('lat').value); // Parsea como número
                                        const longitud = parseFloat(document.getElementById('long').value); // Parsea como número

                                        // Crea el mapa en el contenedor con id 'map'
                                        let mymap = L.map('map').setView([latitud, longitud], 13);

                                        // Añade un mapa base de OpenStreetMap
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: '© OpenStreetMap contributors'
                                        }).addTo(mymap);

                                        // Inicializa una variable para almacenar el marcador
                                        let marker;

                                        // Define la ruta de la imagen del marcador personalizado
                                        var customMarkerIcon = L.icon({
                                            iconUrl: '{{ asset("dashboard/img/marker-icon.png") }}', // Reemplaza con la ruta correcta
                                            iconSize: [32, 50],
                                            iconAnchor: [16, 32],
                                            popupAnchor: [0, -32],
                                        });

                                        // Coloca un marcador por defecto utilizando las coordenadas proporcionadas
                                        marker = L.marker([latitud, longitud], {
                                            icon: customMarkerIcon
                                        }).addTo(mymap);

                                        // Añade un control de clic para obtener las coordenadas
                                        mymap.on('click', function(e) {
                                            // Elimina el marcador existente, si hay uno
                                            if (marker) {
                                                mymap.removeLayer(marker);
                                            }

                                            // Obtiene las coordenadas del clic
                                            let latlng = e.latlng;

                                            // Coloca un marcador personalizado en las coordenadas
                                            marker = L.marker(latlng, {
                                                icon: customMarkerIcon
                                            }).addTo(mymap);
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection