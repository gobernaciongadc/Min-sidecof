@extends('dashboard.layouts.main')

@section('template_title')
Minero
@endsection


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-index">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            Gestión de comercializadoras mineras ROCMIN
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

                <div class="card-body mt-3">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.mineros.create') }}" class="btn btn-primary text-uppercase float-right" data-placement="left">
                            {{ __('Crear rocmin') }}
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">
                        <table class="table table-striped" id="min_1" style="width: 100%;">
                            <thead class="thead border">
                                <tr>
                                    <th>Nro.</th>
                                    <th>Nro. ROCMIN</th>
                                    <th>Nombre/Razón social</th>
                                    <th>fecha de inscripción</th>
                                    <th>Lugar dirección</th>
                                    <th>Telefono</th>
                                    <th>Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mineros as $minero)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $minero->rocmin }}</td>
                                    <td>{{ $minero->nombres }}</td>
                                    <td>{{ $minero->fecha_inscripcion }}</td>
                                    <td>{{ $minero->procedencia }}</td>
                                    <td>{{ $minero->telefono }}</td>
                                    <td class="{{ $minero->estado === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $minero->estado }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.mineros.destroy',$minero->id) }}" method="POST">
                                            <div class="opciones-btn-ruim">
                                                <div class="">
                                                    <a class="btn btn-sm btn-info opciones-btn-ruim__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.mineros.show',$minero->id) }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="btn btn-sm btn-warning opciones-btn-ruim__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar" href="{{ route('admin.mineros.edit',$minero->id) }}"><i class="bi bi-pencil"></i></a>
                                                </div>
                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opciones-btn-ruim__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.mineros.destroy', $minero->id) }}`)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button> -->
                                            <script>
                                                function confirmDelete(deleteUrl) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡Podrás revertir esto en la opcion editar!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Sí, dar de baja'
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
            {!! $mineros->links() !!}
        </div>
    </div>
</div>




@endsection