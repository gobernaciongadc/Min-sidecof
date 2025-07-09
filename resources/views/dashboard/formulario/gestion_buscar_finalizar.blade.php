@extends('dashboard.layouts.main')

@section('template_title')
Puesto en ecena
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="">Home</a></li>
<li class="breadcrumb-item">Finalizar formulario</li>
<li class="breadcrumb-item active">Gestión entrega</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Finalizar formulario') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">

                    <div class=" mt-3">
                        <p>Creterios para finalizar un formulario por: <strong>Nro. de formulario</strong></p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="">Buscar:</label>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <input type="number" class="form-control" id="gestion_buscar" placeholder="Ingrese un nro. de formulario">
                                <span id="error_buscar" class="invalid-feedback"></span>

                            </div>
                            <div class="col-12 col-md-6">
                                <button class="btn btn-primary text-uppercase ps-4 pe-4" id="btn_gestion_buscar"><i class="bi bi-search"></i> buscar <div id="spinner" class="spinner-border text-white" role="status" style="width: 15px; height: 15px; display: none;">

                                    </div></button>

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive--custom">
                        <table class="table table-striped" id="gestion_buscar_1">
                            <thead class="thead border">
                                <tr>
                                    <th style="width: 10%;">Nro. formulario</th>
                                    <th>Razón social</th>
                                    <th>Tipo metal</th>
                                    <th>Alicuota</th>
                                    <th>Fecha emisión</th>
                                    <th>Fecha validez</th>
                                    <th>Comercio</th>
                                    <th>Estado entrega</th>
                                    <th>Acciones</th>
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

<!-- Script de gestión de busqueda de formulario -->
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const gestion_buscar = document.getElementById('gestion_buscar');
        const error_buscar = document.getElementById('error_buscar');
        const spinner = document.getElementById('spinner'); // Obtén el elemento del spinner

        const btn_gestion_buscar = document.getElementById('btn_gestion_buscar');
        btn_gestion_buscar.disabled = false;

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
                url: '{{ route("admin.datosgestionbuscarfinalizar") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    gestion_buscar: gestion_buscar.value
                },
                beforeSend: function() {
                    console.log('Esta buscando....aqui');
                },
                success: function(response) {

                    const {
                        datos_gestion_buscar
                    } = response;


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
                        spinner.style.display = 'none';
                        Toastify({
                            text: 'SISTEMA DE REGALIAS MINERAS, REGISTRO ENCONTRADO',
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

                        // Itera a través de los datos en la respuesta y agrega filas a la tabla
                        for (let i = 0; i < datos_gestion_buscar.length; i++) {
                            let rowData = datos_gestion_buscar[i];
                            let newRow = '<tr>' +
                                '<td>' + (rowData.nro_formulario !== null ? rowData.nro_formulario : '<span class="text-danger">SIN EMISIÓN</span>') + '</td>' +
                                '<td>' + rowData.razon_social + '</td>' +
                                '<td>' + (rowData.tipo_min_metalico !== null ? rowData.tipo_min_metalico : rowData.tipo_min_nometalico) + '</td>' + // Operador ternario
                                '<td>' + rowData.alicuota + '</td>' +
                                '<td>' + rowData.fecha_emision + '</td>' +
                                '<td>' + (rowData.fecha_valides === null ? '<span class="text-danger">---</span>' : rowData.fecha_valides) + '</td>' + // Operador ternario
                                '<td>' + rowData.comercio + '</td>' +
                                '<td>' + (rowData.estado_entrega === 0 ? '<span class="text-danger">No finalizado</span>' : '<span class="text-success">Finalizado</span>') + '</td>' + // Operador ternario
                                '<td>' + (rowData.estado_entrega === 0 ? `<div class="">
                                        <a class="btn btn-danger" data-otro-dato=${rowData.nro_formulario} id="finalizar-formulario" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Finalizar formulario">FINALIZAR</a>
                                    </div>` : ` <div class="">
                                                <a class="btn btn-success" id="finalizado" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Finalizar formulario">FINALIZADO</a>
                                            </div>`) + '</td>' + // Operador ternario

                                '</tr>';
                            $('#gestion_buscar_1 tbody').append(newRow);
                        }
                        $('#finalizado').on('click', () => {
                            Toastify({
                                text: 'SISTEMA DE REGALIAS MINERAS, ESTE FORMULARIO YA ESTA FINALIZADO',
                                duration: 3000,
                                newWindow: true,
                                close: false,
                                gravity: "top", // `top` or `bottom`
                                position: "right", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                style: {
                                    background: "#f39c12", // Success
                                    // "#36ad76 " danger
                                    padding: "15px 15px",
                                    borderRadius: "5px", // Agrega un borde redondeado de 10px
                                },
                                onClick: function() {} // Callback after click
                            }).showToast();
                        });
                    }

                    $('#finalizar-formulario').on('click', () => {
                        // Aquí va el código que se ejecutará cuando se haga clic en el botón
                        // Obtener el valor del atributo de datos
                        const finalizar = document.getElementById('finalizar-formulario');
                        const nro_formulario = finalizar.getAttribute('data-otro-dato');

                        // console.log(nro_formulario);

                        $.ajax({
                            type: 'POST',
                            url: '{{ route("admin.finalizarformulario") }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                nro_formulario: nro_formulario
                            },
                            beforeSend: function() {
                                console.log('Esta buscando....Finalizar');
                            },
                            success: function(response) {

                                const {
                                    datos_gestion_buscar
                                } = response;

                                // console.log(datos_gestion_buscar);


                                Toastify({
                                    text: 'SISTEMA DE REGALIAS MINERAS, EL FORMULARIO SE FINALIZO CORRECTAMENTE',
                                    duration: 3000,
                                    newWindow: true,
                                    close: false,
                                    gravity: "top", // `top` or `bottom`
                                    position: "right", // `left`, `center` or `right`
                                    stopOnFocus: true, // Prevents dismissing of toast on hover
                                    style: {
                                        background: "#36ad76", // Success
                                        // "#36ad76 " danger
                                        padding: "15px 15px",
                                        borderRadius: "5px", // Agrega un borde redondeado de 10px
                                    },
                                    onClick: function() {} // Callback after click
                                }).showToast();

                                $('#gestion_buscar_1 tbody').empty();

                                // Itera a través de los datos en la respuesta y agrega filas a la tabla

                                let rowData = datos_gestion_buscar;
                                let newRow = '<tr>' +
                                    '<td>' + (rowData.nro_formulario !== null ? rowData.nro_formulario : '<span class="text-danger">SIN EMISIÓN</span>') + '</td>' +
                                    '<td>' + rowData.razon_social + '</td>' +
                                    '<td>' + (rowData.tipo_min_metalico !== null ? rowData.tipo_min_metalico : rowData.tipo_min_nometalico) + '</td>' + // Operador ternario
                                    '<td>' + rowData.alicuota + '</td>' +
                                    '<td>' + rowData.fecha_emision + '</td>' +
                                    '<td>' + rowData.fecha_valides + '</td>' +
                                    '<td>' + rowData.comercio + '</td>' +
                                    '<td>' + (parseInt(rowData.estado_entrega) === 0 ? '<span class="text-danger">No finalizado</span>' : '<span class="text-success">Finalizado</span>') + '</td>' + // Operador ternario
                                    `<td>
                                            <div class="">
                                                <a class="btn btn-success" id="finalizado" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Finalizar formulario">FINALIZADO</a>
                                            </div>
                                        </td>
                                        ` +
                                    '</tr>';
                                $('#gestion_buscar_1 tbody').append(newRow);


                                $('#finalizado').on('click', () => {
                                    Toastify({
                                        text: 'SISTEMA DE REGALIAS MINERAS, ESTE FORMULARIO YA ESTA FINALIZADO',
                                        duration: 3000,
                                        newWindow: true,
                                        close: false,
                                        gravity: "top", // `top` or `bottom`
                                        position: "right", // `left`, `center` or `right`
                                        stopOnFocus: true, // Prevents dismissing of toast on hover
                                        style: {
                                            background: "#f39c12", // Success
                                            // "#36ad76 " danger
                                            padding: "15px 15px",
                                            borderRadius: "5px", // Agrega un borde redondeado de 10px
                                        },
                                        onClick: function() {} // Callback after click
                                    }).showToast();
                                });
                            },
                            error: function(xhr, status, error) {
                                spinner.style.display = 'none';
                                console.error(error);
                            }
                        });
                    });
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
                btn_gestion_buscar.disabled = true;
                $('#gestion_buscar_1 tbody').empty();
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