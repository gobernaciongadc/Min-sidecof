<!-- Extender main -->
@extends('dashboard.layouts.main')

@section('template_title')
Lista de municipios registrados
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-index">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            Gestión {{ __('Municipio') }}
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
                        <a href="{{ route('admin.municipios.create') }}" class="btn btn-primary float-right text-uppercase" data-placement="left">
                            {{ __('Crear municipio') }}
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">
                        <table id="municipio_1" class="table table-striped">
                            <thead class="thead border">
                                <tr>
                                    <th class="text-dark" style="width: 10%;">Nro.</th>
                                    <th style="width: 15%;">Codigo</th>
                                    <th style="width: 30%;">Municipio</th>
                                    <th style="width: 15%;">Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $municipio->codigo }}</td>
                                    <td>{{ $municipio->municipio }}</td>
                                    <td class="{{ $municipio->estado === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $municipio->estado }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.municipios.destroy',$municipio->id) }}" method="POST">
                                            <div class="opciones-btn-municipio">
                                                <div class="">
                                                    <a class="btn btn-sm btn-info opcion-btn-municipio__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.municipios.show',$municipio->id) }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="btn btn-sm btn-warning opcion-btn-municipio__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar" href="{{ route('admin.municipios.edit',$municipio->id) }}"><i class="bi bi-pencil"></i></a>
                                                </div>
                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opcion-btn-municipio__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.municipios.destroy', $municipio->id) }}`)">
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
            <!-- {!! $municipios->links() !!} -->
        </div>
    </div>
</div>

@endsection