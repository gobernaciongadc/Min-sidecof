@extends('dashboard.layouts.main')

@section('template_title')
Gestion de funcionario
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-index">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="text-uppercase text-white">
                            Gestión {{ __('Funcionarios') }}
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
                        <a href="{{ route('admin.funcionarios.create') }}" class="btn btn-primary float-right text-uppercase" data-placement="left">
                            {{ __('Crear funcionario') }}
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">
                        <table id="fun_2" class="table table-striped">
                            <thead class="thead border">
                                <tr>
                                    <th>No</th>
                                    <th>Nombres</th>
                                    <th>Carnet</th>
                                    <th>Cargo</th>
                                    <th style="width: 15%;">Dirección</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $funcionario->nombres }}</td>
                                    <td>{{ $funcionario->carnet }}</td>
                                    <td>{{ $funcionario->cargo }}</td>
                                    <td>{{ $funcionario->direccion }}</td>
                                    <td>{{ $funcionario->telefono }}</td>
                                    <td>{{ $funcionario->email }}</td>

                                    <td class="{{ $funcionario->estado === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $funcionario->estado }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.funcionarios.destroy',$funcionario->id) }}" method="POST">
                                            <div class="opciones-btn-usuarios">
                                                <div class="">
                                                    <a class="btn btn-sm btn-info opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.funcionarios.show',$funcionario->id) }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="btn btn-sm btn-warning opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar" href="{{ route('admin.funcionarios.edit',$funcionario->id) }}"><i class="bi bi-pencil"></i></a>
                                                </div>
                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opciones-btn-usuarios__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.funcionarios.destroy', $funcionario->id) }}`)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <script>
                                                function confirmDelete(deleteUrl) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡Puedes revertir en la opción editar!",
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
            <!-- {!! $funcionarios->links() !!} -->
        </div>
    </div>
</div>
@endsection