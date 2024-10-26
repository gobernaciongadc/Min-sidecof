@extends('dashboard.layouts.main')

@section('template_title')
{{ __('Observaciones') }} de Transporte
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header bg-observaciones">
                    <span class="text-uppercase text-white">{{ __('Observaciones') }} de Transporte</span>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-primary mb-0 mt-3">Buscar por número de formulario</p>
                    <span class="">Se podra agregar una observación a los formularios:
                        <ul>
                            <li>Dentro de la 48Hrs validas</li>
                            <li>Que no cuente una observación de transporte</li>
                            <li>A formularios no finalizados</li>
                            <li>A formularios de comercio tipo Interno</li>
                        </ul>
                    </span>
                    <div class="row pt-2 pb-2 gap-3">

                        <div class="col-12 col-md-4 p-3 custom-borde">
                            <div class="form-group mt-3">
                                <label for="buscar">Buscar por nro. de formulario</label>
                                <input type="number" id="nro_formulario" class="form-control">
                                <span id="error_nro_formulario" class="invalid-feedback"></span>
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase ps-5 pe-5 mt-2" id="enviar-buscar"><i class="bi bi-search"> Buscar</i></button>
                            <p class="text-primary mt-2" id="buscando" style="display: none;">Buscando...</p>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {

                                $('#buscando').hide();
                                // Evento click button
                                $('#enviar-buscar').click(function(e) {
                                    e.preventDefault();
                                    realizarBusquedaFormulario();
                                });

                                // Evento keydown en el campo de entrada
                                $('#nro_formulario').keydown(function(e) {
                                    if (e.keyCode === 13) { // 13 es el código de la tecla "Enter"
                                        e.preventDefault(); // Evita el comportamiento predeterminado del "Enter"
                                        realizarBusquedaFormulario();
                                    }
                                });

                                function realizarBusquedaFormulario() {
                                    const fecha_emision = document.getElementById('fecha_emision');
                                    const fecha_validez = document.getElementById('fecha_validez');
                                    const text_observaciones = document.getElementById('text_observaciones');
                                    const id_form = document.getElementById('id_form');

                                    const nro_formulario = $('#nro_formulario').val();

                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("admin.buscarFormulario") }}',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            nro_formulario: nro_formulario
                                        },
                                        beforeSend: function() {
                                            $('#buscando').show();
                                            $('#buscando').html('Buscando...');
                                            $('#buscando').addClass('text-danger');
                                        },
                                        success: function(response) {
                                            $('#buscando').hide();
                                            console.log(response);
                                            if (response.length === 0) {
                                                Toastify({
                                                    text: 'FORMULARIO NO ADMITIDO, PARA SU OBSERVACIÓN',
                                                    duration: 3000,
                                                    newWindow: true,
                                                    close: false,
                                                    gravity: "top", // `top` or `bottom`
                                                    position: "right", // `left`, `center` or `right`
                                                    stopOnFocus: true, // Prevents dismissing of toast on hover
                                                    style: {
                                                        background: "#dc3545",
                                                        padding: "15px 15px",
                                                        borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                    },
                                                    onClick: function() {} // Callback after click
                                                }).showToast();

                                                // Limpiar campos
                                                fecha_emision.value = "";
                                                fecha_validez.value = "";
                                                text_observaciones.value = "";

                                            } else {
                                                Toastify({
                                                    text: 'FORMULARIO ENCONTRADO, ESTA HABILITADO PARA REALIZAR UNA OBSERVACIÓN',
                                                    duration: 3000,
                                                    newWindow: true,
                                                    close: false,
                                                    gravity: "top", // `top` or `bottom`
                                                    position: "right", // `left`, `center` or `right`
                                                    stopOnFocus: true, // Prevents dismissing of toast on hover
                                                    style: {
                                                        background: "#36ad76",
                                                        padding: "15px 15px",
                                                        borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                    },
                                                    onClick: function() {} // Callback after click
                                                }).showToast();

                                                // Pintar el formulario encotrado
                                                fecha_emision.value = response[0].fecha_emision;
                                                fecha_validez.value = response[0].fecha_valides;
                                                id_form.value = response[0].id;
                                                text_observaciones.focus();
                                            }

                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }

                            });
                        </script>

                        <div class="col-12 col-md-7 p-3 custom-borde">
                            <form method="POST" action="{{ route('admin.buscarFormulario') }}" role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 col-md-6 form-group mt-3">
                                        <label for="fecha_emision" class="text-success">Fecha emisión</label>
                                        <input type="datetime-local" class="form-control" id="fecha_emision" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 form-group mt-3">
                                        <label for="fecha_validez" class="text-danger">Fecha validez</label>
                                        <input type="datetime-local" class="form-control" id="fecha_validez" disabled>

                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea name="observaciones" id="text_observaciones" class="form-control"></textarea>
                                        <span id="error_text_observaciones" class="invalid-feedback"></span>
                                    </div>

                                    <!-- id -->
                                    <input type="hidden" id="id_form">

                                </div>


                                <button type="submit" class="btn btn-primary text-uppercase ps-5 pe-5 mt-2" id="enviar_observacion">Guardar</button>
                            </form>
                        </div>

                        <!-- Guardar la observacion -->
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {

                                let dataForm;
                                const enviar_observacion = document.getElementById('enviar_observacion');
                                // Evento click button
                                $('#enviar_observacion').click(function(e) {
                                    e.preventDefault();
                                    guardarObservacion();
                                });

                                function guardarObservacion() {
                                    const fecha_emision = document.getElementById('fecha_emision');
                                    const fecha_final = document.getElementById('fecha_validez');
                                    const id = document.getElementById('id_form');

                                    const text_observaciones = document.getElementById('text_observaciones');
                                    const observacionLength = text_observaciones.value;


                                    if (fecha_emision.value != '' && fecha_final.value != '' && text_observaciones.value != '' && observacionLength.length <= 115) {

                                        let fechaNewEmision = new Date(fecha_final.value);

                                        // Restar la diferencia horaria entre tu zona horaria y UTC
                                        let zonaHorariaOffset = fechaNewEmision.getTimezoneOffset() * 60 * 1000;

                                        // Sumar 48 horas en milisegundos
                                        let fechaValidez = new Date(fechaNewEmision.getTime() + (24 * 60 * 60 * 1000) - zonaHorariaOffset);

                                        // Formatea la fecha de validez en el formato 'YYYY-MM-DDTHH:mm'
                                        let fechaValidezFormatted = fechaValidez.toISOString().slice(0, 16);

                                        // Actualiza el valor del campo de fecha de validez
                                        const new_fecha = fechaValidezFormatted;

                                        dataForm = {
                                            _token: '{{ csrf_token() }}',
                                            fecha_valides: fechaValidezFormatted,
                                            observaciones: text_observaciones.value,
                                            estado_observacion: 1,
                                            id: id.value
                                        };
                                        $.ajax({
                                            type: 'PUT',
                                            url: '{{ route("admin.updateObservacion") }}',
                                            data: dataForm,
                                            beforeSend: function() {
                                                enviar_observacion.disabled = true;
                                            },
                                            success: function(response) {

                                                console.log(response);
                                                enviar_observacion.disabled = false;

                                                if (response.status === 'success') {
                                                    Toastify({
                                                        text: `${response.message}`,
                                                        duration: 3000,
                                                        newWindow: true,
                                                        close: false,
                                                        gravity: "top", // `top` or `bottom`
                                                        position: "right", // `left`, `center` or `right`
                                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                                        style: {
                                                            background: "#36ad76", // Success
                                                            padding: "15px 15px",
                                                            borderRadius: "5px", // Agrega un borde redondeado de 10px
                                                        },
                                                        onClick: function() {} // Callback after click
                                                    }).showToast();

                                                    // Limpiar campos
                                                    fecha_emision.value = "";
                                                    fecha_final.value = "";
                                                    text_observaciones.value = "";

                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                            }
                                        });

                                    } else {
                                        Toastify({
                                            text: 'DATOS NO VALIDOS',
                                            duration: 3000,
                                            newWindow: true,
                                            close: false,
                                            gravity: "top", // `top` or `bottom`
                                            position: "right", // `left`, `center` or `right`
                                            stopOnFocus: true, // Prevents dismissing of toast on hover
                                            style: {
                                                background: "#dc3545",
                                                padding: "15px 15px",
                                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                                            },
                                            onClick: function() {} // Callback after click
                                        }).showToast();
                                    }

                                }

                                // Validacion de el text area de observaciones
                                // 1.- Validar  Observaciones
                                const observacionesError = document.getElementById("error_text_observaciones");
                                text_observaciones.addEventListener("input", function() {
                                    const inputTextObservacionesValue = text_observaciones.value;
                                    if (inputTextObservacionesValue.length > 115) {
                                        observacionesError.textContent = "El campo Observaciones no debe contener más de 115 caracteres.";
                                        text_observaciones.classList.add("is-invalid");

                                    } else if (inputTextObservacionesValue.length <= 115) {
                                        observacionesError.textContent = "";
                                        text_observaciones.classList.remove("is-invalid");
                                    }
                                });
                                // FIN Validar Observaciones
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection