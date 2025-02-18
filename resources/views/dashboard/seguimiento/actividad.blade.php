@extends('dashboard.layouts.main')

@section('template_title')
Puesto en escena
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="">Inicio</a></li>
<li class="breadcrumb-item">Seguimiento</li>
<li class="breadcrumb-item active">Registro de actividad</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg_gestion_actividad">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Registro para el control de actividad de transporte') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class=" mt-3">
                        <p>Control de actividad de transporte de mineral</p>
                    </div>
                    <hr>


                    <div class="row mb-3">
                        <div class="col-12 col-md-4 border-end ps-4 pe-4 pb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for=""><strong>Nro. de formulario:</strong><span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Ingrese el nro. de formulario" id="gestion_buscar">
                                        <span id="error_buscar" class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="lugar"><strong>Punto de control:</strong><span class="text-danger">*</span></label>
                                        <textarea name="lugar" id="lugar" cols="30" class="form-control" rows="5" placeholder="Ingrese el lugar de punto de control"></textarea>
                                        <span id="error_lugar" class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <p class="text-success" id="message-success"></p>

                                <!-- El boton esta ocupando todo el ancho -->
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary text-uppercase ps-4 pe-4" id="btn_gestion_actividad">Registrar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <p><strong>Datos del formulario</strong></p>
                                <p>Nro. de formulario: <strong id="nro_form"></strong> </p>
                                <p>Origen: <strong id="origen"></strong> </p>
                                <p>Destino: <strong id="destino"></strong> </p>
                                <p>Tipo comercio: <strong id="comercio"></strong> </p>
                                <p>Fecha emisión: <strong id="fecha_emision"></strong> </p>
                                <p>Fecha validez: <strong id="fecha_validez"></strong> </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script de gestión de busqueda de formulario -->
<script>
    document.addEventListener("DOMContentLoaded", () => {

        let formularioId;

        const gestion_buscar = document.getElementById('gestion_buscar');
        const error_buscar = document.getElementById('error_buscar');


        // Datos del formulario
        const nro_form = document.getElementById('nro_form');
        const origen = document.getElementById('origen');
        const destino = document.getElementById('destino');
        const comercio = document.getElementById('comercio');
        const fecha_emision = document.getElementById('fecha_emision');
        const fecha_validez = document.getElementById('fecha_validez');
        const lugar = document.getElementById('lugar');
        const message_success = document.getElementById('message-success');


        // Evento click button
        $('#gestion_buscar').on('input', function() {
            realizarBusqueda();
        });


        function realizarBusqueda() {

            $.ajax({
                type: 'POST',
                url: '{{ route("admin.datosactividad") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    gestion_buscar: gestion_buscar.value
                },
                beforeSend: function() {
                    console.log('Esta buscando');
                },
                success: function(response) {

                    const {
                        seguimiento
                    } = response;

                    // No se encontro ningun registro
                    if (seguimiento.length === 0) {
                        nro_form.innerText = "";
                        origen.innerText = "";
                        destino.innerText = "";
                        comercio.innerText = "";
                        fecha_emision.innerText = "";
                        fecha_validez.innerText = "";
                        if (gestion_buscar.value != '') {
                            message_success.innerText = "Registro de formulario no encontrado!"
                        } else {
                            message_success.innerText = ""
                        }
                        message_success.classList.add("text-danger");
                        message_success.classList.remove("text-success");
                    } else { // Se encontro registros
                        nro_form.innerText = seguimiento[0].nro_formulario;
                        origen.innerText = seguimiento[0].origen;
                        destino.innerText = seguimiento[0].destino;
                        comercio.innerText = seguimiento[0].comercio;
                        fecha_emision.innerText = seguimiento[0].fecha_emision;
                        fecha_validez.innerText = seguimiento[0].fecha_valides;
                        message_success.innerText = "Registro de formulario encontrado!"
                        message_success.classList.add("text-success");
                        message_success.classList.remove("text-danger");
                        formularioId = seguimiento[0].id;

                    }
                },
                error: function(xhr, status, error) {
                    spinner.style.display = 'none';
                    console.error(error);
                }
            });
        }

        // Evento keydown en el campo de entrada
        $('#gestion_buscar').keydown(function(e) {
            if (e.keyCode === 13) { // 13 es el código de la tecla "Enter"
                e.preventDefault(); // Evita el comportamiento predeterminado del "Enter"
                realizarBusqueda();
            }
        });


        gestion_buscar.addEventListener("input", function() {
            const buscarValue = gestion_buscar.value;

            // Verificar si el campo está vacío
            if (buscarValue.trim() === '') {
                error_buscar.textContent = "Este campo es requerido";
                gestion_buscar.classList.add("is-invalid");

            } else {
                error_buscar.textContent = ""; // Limpiar el mensaje de error si el campo no está vacío
                gestion_buscar.classList.remove("is-invalid");

            }

        });

        gestion_buscar.addEventListener("blur", function() {
            const inputBuscarValue = gestion_buscar.value;
            if (inputBuscarValue.trim() === '') {
                error_buscar.textContent = "Este campo es requerido";
                gestion_buscar.classList.add("is-invalid");
            } else {
                error_buscar.textContent = ""; // Limpiar el mensaje de error si el campo no está vacío
                gestion_buscar.classList.remove("is-invalid");
            }
        });

        // Guardar en la base de datos
        // Evento click button
        $('#btn_gestion_actividad').click(function(e) {
            e.preventDefault();
            storeAactividad();
        });


        function storeAactividad() {
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.storeactividad") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    formularios_id: formularioId,
                    lugar: lugar.value
                },
                beforeSend: function() {
                    console.log('Esta guardando');
                },
                success: function(response) {

                    const {
                        message,
                        status
                    } = response;

                    console.log(response);

                    if (status === 'success') {

                        // Borrar campos
                        nro_form.innerText = "";
                        origen.innerText = "";
                        destino.innerText = "";
                        fecha_emision.innerText = "";
                        fecha_validez.innerText = "";
                        comercio.innerText = "";
                        message_success.innerText = ""
                        message_success.classList.add("text-danger");
                        message_success.classList.remove("text-success");
                        // Borrar campos de los inputs
                        $("#gestion_buscar").val("");
                        $("#lugar").val("");

                        Toastify({
                            text: `SISTEMA DE REGALIAS MINERAS, ${message}`,
                            duration: 3000,
                            newWindow: true,
                            close: false,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#36ad76", // Success
                                // "# 36 ad76 " danger
                                padding: "15px 15px",
                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    } else {
                        Toastify({
                            text: `SISTEMA DE REGALIAS MINERAS, ${message}`,
                            duration: 3000,
                            newWindow: true,
                            close: false,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#dc3545", // Danhger
                                // "# 36 ad76 " danger
                                padding: "15px 15px",
                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    }


                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

    });
</script>
<!-- FIN Script de gestión de busqueda de formulario -->

@endsection