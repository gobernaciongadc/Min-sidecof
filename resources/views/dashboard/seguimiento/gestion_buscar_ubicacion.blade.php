@extends('dashboard.layouts.main')

@section('template_title')
Puesto en ecena
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="">Inicio</a></li>
<li class="breadcrumb-item">Seguimiento</li>
<li class="breadcrumb-item active">Seguimiento de actividad de formulario</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg_gestion_busqueda_ubicacion">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Seguimiento de actividad de formulario') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class=" mt-3">
                        <p>Creterios para realizar un seguimiento es el: <strong>Nro. de formulario</strong></p>
                    </div>
                    <hr>

                    <div class="mb-4 mt-4">
                        <div class="d-flex gap-2 justify-content-center">
                            <div class="form-group">
                                <label for="">Buscar por nro. del formulario 101</label>
                                <input type="number" class="form-control" id="gestion_buscar" style="width: 250px;">
                            </div>
                            <span id="error_buscar" class="invalid-feedback"></span>
                            <div class="btn-buscar align-self-end">
                                <button class="btn btn-primary text-uppercase ps-4 pe-4" id="btn_gestion_buscar"><i class="bi bi-search"></i> buscar <div id="spinner" class="spinner-border text-white" role="status" style="width: 15px; height: 15px; display: none;">
                                    </div></button>
                            </div>
                        </div>
                    </div>

                    <!-- Datos de Seguimiento de formulario -->
                    <div id="seguimiento" style="display: none;">
                        <div class="seguimiento">
                            <p class="seguimiento__titulo">Seguimiento de actividad del Formulario 101</p>
                            <p class="seguimiento__nroformulario">Nro. formulario: <span class="text-danger" id="seg-nroformulario"></span></p>

                            <div class="row mt-4">
                                <div class="col-12 col-md-6">
                                    <p class="datos-form"><strong>Empresa y/o Cooperativa:</strong> <span id="seg-empresa"></span></p>
                                    <p class="datos-form"><strong>Chofer:</strong> <span id="seg-chofer"></span></p>
                                    <p class="datos-form"><strong>Comercio:</strong> <span id="seg-comercio"></span></p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <p class="datos-form"><strong>Origen:</strong> <span id="seg-origen"></span></p>
                                    <p class="datos-form"><strong>Destino:</strong> <span id="seg-destino"></span></p>
                                    <p class="datos-form"><strong>Tipo transporte:</strong> <span id="seg-transporte"></span></p>
                                </div>
                            </div>

                        </div>

                        <p class="text-primary mb-0 mt-3"><strong>Inicio de actividad</strong></p>

                        <div class="table-responsive--custom">
                            <table class="table table-striped" id="gestion_buscar_1">
                                <thead class="thead border">
                                    <tr>
                                        <th style="width: 10%;">Actividad</th>
                                        <th>Origen</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha validez</th>
                                        <th>Tipo metal</th>
                                        <th>Placa trasporte</th>
                                        <th>Comercializadora</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <p class="text-primary mb-0 mt-3"><strong>Control de recorrido del formulario</strong></p>
                        <div class="table-responsive--custom">
                            <table class="table table-striped" id="gestion_buscar_ubicacion">
                                <thead class="thead border">
                                    <tr>
                                        <th style="width: 10%;"># Actividad</th>
                                        <th>Lugar de control</th>
                                        <th>Fecha de control</th>
                                        <th>Funcionario registro</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <p class="text-primary mb-0 mt-3"><strong>Cierre del formulario</strong></p>
                        <div class="table-responsive--custom">
                            <table class="table table-striped" id="gestion_buscar_cierre">
                                <thead class="thead border">
                                    <tr>
                                        <th style="width: 10%;">Actividad</th>
                                        <th>Estado</th>
                                        <th>Fecha de cierre</th>
                                        <th>Usuario registro</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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


        const gestion_buscar = document.getElementById('gestion_buscar');
        const seguimiento = document.getElementById('seguimiento');
        const error_buscar = document.getElementById('error_buscar');
        const spinner = document.getElementById('spinner'); // Obtén el elemento del spinner

        const btn_gestion_buscar = document.getElementById('btn_gestion_buscar');
        btn_gestion_buscar.disabled = true;

        // Datos de seguimiento a formulario
        const seg_nroform = document.getElementById('seg-nroformulario')
        const seg_empresa = document.getElementById('seg-empresa')
        const seg_chofer = document.getElementById('seg-chofer')
        const seg_comercio = document.getElementById('seg-comercio')
        const seg_origen = document.getElementById('seg-origen')
        const seg_destino = document.getElementById('seg-destino')
        const seg_transporte = document.getElementById('seg-transporte')



        // Evento click button
        $('#btn_gestion_buscar').click(function(e) {
            e.preventDefault();
            realizarBusqueda();
        });

        function realizarBusqueda() {
            // Mostrar el spinner antes de la solicitud AJAX
            spinner.style.display = 'inline-block';
            console.log(gestion_buscar.value);
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.datosgestionbuscarubicacion") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    gestion_buscar: gestion_buscar.value
                },
                beforeSend: function() {
                    console.log('Esta buscando....aqui_ubicacion');
                },
                success: function(response) {

                    const {
                        datos_gestion_buscar,
                        dato_adicional
                    } = response;

                    console.log(response);


                    // Validacion de el array esta vacio
                    if (datos_gestion_buscar.length === 0) {
                        spinner.style.display = 'none';
                        Toastify({
                            text: 'SISTEMA DE REGALIAS MINERAS, NO SE ENCONTRO REGISTROS CON EL NRO. DE FORMULARIO INGRESADO',
                            duration: 3000,
                            newWindow: true,
                            close: false,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#dc3545", // Success
                                // "# 36 ad76 " danger
                                padding: "15px 15px",
                                borderRadius: "5px", // Agrega un borde redondeado de 10px
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    } else {

                        seguimiento.style.display = 'block'; // O utiliza 'inline', 'inline-block' u otro valor según sea necesario

                        // Llenado de datos del estado de seguimiento al form 101
                        seg_nroform.innerText = datos_gestion_buscar[0].nro_formulario;
                        seg_empresa.innerText = datos_gestion_buscar[0].razon_social;
                        seg_chofer.innerText = datos_gestion_buscar[0].chofer;
                        seg_comercio.innerText = datos_gestion_buscar[0].comercio;
                        seg_origen.innerText = datos_gestion_buscar[0].origen;
                        seg_destino.innerText = datos_gestion_buscar[0].destino;
                        seg_transporte.innerText = datos_gestion_buscar[0].transporte;


                        spinner.style.display = 'none';
                        Toastify({
                            text: 'SISTEMA DE REGALIAS MINERAS, FORMULARIO ENCONTRADO',
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

                        $('#gestion_buscar_1 tbody').empty();
                        $('#gestion_buscar_ubicacion tbody').empty();
                        $('#gestion_buscar_cierre tbody').empty();
                        // Itera a través de los datos en la respuesta y agrega filas a la tabla
                        for (let i = 0; i < datos_gestion_buscar.length; i++) {
                            let rowData = datos_gestion_buscar[i];
                            let newRow = '<tr>' +
                                '<td>' + 'Inicio actividad' + '</td>' +
                                '<td>' + rowData.origen + '</td>' +
                                '<td>' + rowData.fecha_emision + '</td>' +
                                '<td>' + (rowData.fecha_valides !== null ? rowData.fecha_valides : '---') + '</td>' +
                                '<td>' + (rowData.tipo_min_metalico !== null ? rowData.tipo_min_metalico : rowData.tipo_min_nometalico) + '</td>' + // Operador ternario
                                '<td>' + rowData.placa + '</td>' +
                                '<td>' + rowData.comercializadora + '</td>' +
                                '</tr>';
                            $('#gestion_buscar_1 tbody').append(newRow);
                        }

                        for (let i = 0; i < dato_adicional.length; i++) {
                            let rowData = dato_adicional[i];
                            // Parsear la fecha y hora
                            let fechaFormateada = new Date(rowData.created_at).toLocaleString();

                            let newRow = '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + rowData.lugar + '</td>' +
                                '<td>' + fechaFormateada + '</td>' +
                                '<td>' + rowData.user.name + '</td>' +
                                '</tr>';
                            $('#gestion_buscar_ubicacion tbody').append(newRow);
                        }

                        for (let i = 0; i < datos_gestion_buscar.length; i++) {
                            let rowData = datos_gestion_buscar[i];
                            // Parsear la fecha y hora
                            let fechaFormateada = new Date(rowData.updated_at).toLocaleString();

                            let newRow = '<tr>' +
                                '<td>' + 'Fin actividad' + '</td>' +
                                '<td>' + (rowData.estado_entrega === 0 ? '<span class="text-success">Formulario no finalizado</span>' : '<span class="text-danger">Formulario finalizado</span>') + '</td>' + // Operador ternario
                                '<td>' + (rowData.estado_entrega === 0 ? '---' : fechaFormateada) + '</td>' + // Operador ternario
                                '<td>' + (rowData.estado_entrega === 0 ? '---' : rowData.user.name) + '</td>' + // Operador ternario
                                '</tr>';
                            $('#gestion_buscar_cierre tbody').append(newRow);
                        }

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

            if (gestion_buscar.value === '') {
                seguimiento.style.display = 'none';
                console.log('Vacio');
            } else
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
                btn_gestion_buscar.disabled = true;

            } else {
                error_buscar.textContent = ""; // Limpiar el mensaje de error si el campo no está vacío
                gestion_buscar.classList.remove("is-invalid");
                btn_gestion_buscar.disabled = false; // Habilitar el botón
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

    });
</script>
<!-- FIN Script de gestión de busqueda de formulario -->

@endsection