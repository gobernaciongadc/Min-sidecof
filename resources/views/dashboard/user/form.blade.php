<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-5">

                <div class="form-group mt-3">
                    <label for="tipo-user" class="form-label">Tipo de usuario:</label>
                    <span class="text-danger">*</span>
                    <select class="form-select font-select" id="tipo-user" name="tipo-user">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="Funcionario">Funcionario</option>
                        <option value="RUIM">RUIM</option>
                        <option value="ROCMIN">ROCMIN</option>
                    </select>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {

                        // Este evento se ejecuta cuando selecciona
                        $('#tipo-user').on('change', function() {
                            const tipoUser = $(this).val();

                            switch (tipoUser) {
                                case 'Funcionario':
                                    $('#name-db').val('funcionarios');
                                    break;
                                case 'RUIM':
                                    $('#name-db').val('empresas');
                                    break;
                                case 'ROCMIN':
                                    $('#name-db').val('mineros');
                                    break;
                                default:
                                    break;
                            }

                            ajax(tipoUser);
                        });

                        function ajax(tipoUser) {
                            // Realizar una solicitud AJAX al servidor para obtener los datos correspondientes
                            $.ajax({
                                url: '{{ route("admin.indexusuarios") }}', // Debes definir la ruta en tu aplicación Laravel
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    tipo_user: tipoUser
                                },
                                success: function(data) {

                                    const {
                                        datosUser
                                    } = data;

                                    // Limpiar y cargar los datos en el segundo select
                                    var select2 = $('#select2-user');
                                    select2.empty();
                                    select2.append($('<option>', {
                                        value: '', // Valor vacío
                                        text: '--Seleccionar--',
                                        disabled: true,
                                        selected: true // Marcado como seleccionado
                                    }));
                                    $.each(datosUser, function(key, value) {
                                        select2.append($('<option>', {
                                            value: value.id,
                                            text: value.nombres,
                                            otrodato: value.id,
                                            otrodatodos: value.nombres // Agrega otro dato aquí
                                        }));
                                    });

                                    // Actualizar el campo oculto al inicio
                                    updateHiddenField();
                                },
                                error: function(data) {
                                    console.log(data);
                                    alert('Error al cargar los datos.');
                                }
                            });
                        }

                        // Seleccion de un formulario
                        // Campo select2 simple de mineral
                        $('#select2-user').select2({ // Inicializar como simple
                            width: '100%'
                        });

                        // Capturar valores en el evento change
                        $('#select2-user').on('change', (e) => {
                            updateHiddenField();
                        });

                        // Función para actualizar el campo oculto
                        function updateHiddenField() {
                            let selectedValue = $('#select2-user').val(); // Obtener el valor seleccionado
                            var selectedOption = $('#select2-user :selected'); // Seleccionar la opción actual
                            var otroDato = selectedOption.attr('otrodato'); // Usar attr para acceder al atributo 'otrodato'
                            var otroDatoDos = selectedOption.attr('otrodatodos'); // Usar attr para acceder al atributo 'otrodato'

                            // Asignar el valor al input oculto
                            $('#hidden-user-ids').val(selectedValue);
                            $('#name-user').val(otroDatoDos);
                            $('#idLogin').val(otroDato);
                        }

                        // Actualizar el campo oculto al inicio
                        updateHiddenField();

                    });
                </script>


                <!-- Seleccion de un usuario -->
                <div class="col-12 mt-3">
                    <div class="form-group">
                        {{ Form::label('user_id', 'Seleccione un usuario:') }}
                        <span class="text-danger">*</span>
                        <select class="form-control" id="select2-user" style="width: 100%;">
                            <option value="" disabled selected>--Seleccionar--</option>
                            @if($opcion=='edit')
                            @foreach($editDatos as $edit)
                            <option value="{{$edit->nombres}}" @if($edit->id == $users->rol) selected @endif>
                                {{ $edit->nombres }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                        <!-- Campo oculto para almacenar el valor seleccionado -->
                        {{ Form::hidden('user_id', '', ['id' => 'hidden-user-ids']) }}

                        @if ($errors->has('user_id'))
                        <div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
                        @endif
                    </div>

                </div>
                <!-- FIN Seleccion de un usuario -->

                <!-- Form para selecionar un ROL -->
                <div class="col-12 mt-3">
                    <div class="form-group">

                        {{ Form::label('rol', 'Rol de usuario:') }}
                        <span class="text-danger">*</span>

                        <select class="form-control" id="select2-roles" style="width: 100%;">
                            <option value="" disabled selected>--Seleccionar--</option>
                            @foreach($roles as $rol)
                            <option value="{{$rol->id}}" @if($rol->id == $users->rol) selected @endif>
                                {{ $rol->name }}
                            </option>
                            @endforeach
                        </select>
                        {{ Form::hidden('rol', $users->rol, ['id' => 'hidden-rol-id']) }}

                        @if ($errors->has('municipios_id'))
                        <div class="alert alert-danger">{{ $errors->first('rol') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Javascript municipios -->
                <script>
                    document.addEventListener('DOMContentLoaded', () => {

                        $('#select2-roles').select2(); // Inicializar
                        // Capturar Values when change event
                        $('#select2-roles').on('change', (e) => {
                            let id = $('#select2-roles').select2("val"); // get id municipio
                            // Asignar el valor al input oculto
                            $('#hidden-rol-id').val(id);

                        })
                    });
                </script>
                <!-- FIN Form para selecionar un ROL -->


                <!-- Nombre se usuario -->
                <div class="form-group mt-3">
                    {{ Form::hidden('name', $users->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','id'=>'name-user']) }}
                </div>

                <!-- Nombre se base de datos -->
                <div class="form-group mt-3">
                    {{ Form::hidden('name_bd', $users->name_bd, ['class' => 'form-control' . ($errors->has('name_bd') ? ' is-invalid' : ''), 'placeholder' => 'Name Bd','id'=>'name-db']) }}
                </div>

                <!-- Id del usuario -->
                <div class="form-group mt-3">
                    {{ Form::hidden('id_login', $users->id_login, ['class' => 'form-control' . ($errors->has('id_login') ? ' is-invalid' : ''), 'placeholder' => 'Id Login','id'=>'idLogin']) }}
                </div>

                <div class="form-group mt-5">
                    {{ Form::label('email','Usuario:') }}
                    <span class="text-danger">*</span>
                    {{ Form::text('email', $users->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un nombre de usuario']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group mt-3">
                    {{ Form::label('password','Contraseña:') }}
                    <span class="text-danger">*</span>
                    {{ Form::text('password', $users->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una contraseña']) }}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group mt-5">
                    {{ Form::label('estado', 'Estado:') }}
                    <span class="text-danger">*</span>
                    {{ Form::select('estado', ['Habilitado' => 'Habilitado', 'No habilitado' => 'No habilitado'], $users->estado, ['class' => 'form-select font-select' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-primary text-uppercase">GUARDAR</button>
        <p>Todos los campos marcados con <span class="text-danger">(*)</span> son obligatorios</p>
    </div>
</div>