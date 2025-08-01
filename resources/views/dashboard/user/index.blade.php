@extends('dashboard.layouts.main')

@section('template_title')
User
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header bg-gestion-datos-index">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            Gestión {{ __('Usuarios') }}
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: '{{ $message }}',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    });
                </script>
                @endif

                @if (session('error'))
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "No puedes darte de baja asi mismo!",
                            footer: 'Sistema de control de regalias mineras'
                        });
                    });
                </script>
                @endif


                <div class="card-body mt-3">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary float-right text-uppercase" data-placement="left">
                            {{ __('Crear usuario') }}
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">
                        <table class="table table-striped" id="pusuarios_1">
                            <thead class="thead">
                                <tr>
                                    <th>Nro.</th>
                                    <th>Nombres</th>
                                    <th>Tipo usuario</th>
                                    <th>Usuario</th>
                                    <th>Rol de usuario</th>
                                    <th>Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $user['name'] }}</td>
                                    <td>
                                        @switch($user['name_bd'])
                                        @case('funcionarios')
                                        Funcionario
                                        @break

                                        @case('mineros')
                                        ROCMIN
                                        @break

                                        @case('empresas')
                                        RUIM
                                        @break

                                        @default
                                        Opción por defecto
                                        @endswitch
                                    </td>

                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['rol']['name'] }}</td>
                                    <td class="{{ $user['estado'] === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $user['estado'] }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.usuarios.destroy',$user['id']) }}" method="POST">
                                            <div class="opciones-btn-usuarios">
                                                <div class="">
                                                    <a class="btn btn-sm btn-info opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.usuarios.show',['id'=> $user['id'],'opcion'=> 'index']) }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="btn btn-sm btn-success opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Habilitar" href="{{ route('admin.habilitaruser',$user['id']) }}"><i class="bi bi-check-lg"></i></a>
                                                </div>
                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.usuarios.destroy', $user['id']) }}`)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <script>
                                                function confirmDelete(deleteUrl) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡Puedes revertir con el boton habilitar!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Sí, deshabilitar'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Si el usuario confirma, envía el formulario de eliminación
                                                            const form = document.createElement('form');
                                                            form.method = 'POST';
                                                            form.action = deleteUrl;
                                                            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                                            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">
                                                             <input type="hidden" name="_token" value="${csrfToken}">`;
                                                            document.body.appendChild(form);
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection