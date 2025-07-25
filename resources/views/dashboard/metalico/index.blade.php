@extends('dashboard.layouts.main')

@section('template_title')
Metalico
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-index ">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            Gestión de minerales de tipo {{ __('metal') }}
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

                <div class="card-body mt-4">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.metalicos.create') }}" class="btn btn-primary text-uppercase float-right" data-placement="left">
                            Crear metal
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">

                        <table id="met_1" class="table table-striped table-hover">

                            <thead class="thead border">
                                <tr>
                                    <th style="width: 10%;">Nro.</th>
                                    <th style="width: 30%;">Nombre</th>
                                    <th style="width: 15%;">Simbolo</th>
                                    <th style="width: 15%;">Alicuota</th>
                                    <th style="width: 15%;">Tipo Mercado</th>
                                    <th style="width: 15%;">Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metalicos as $metalico)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $metalico->nombre }}</td>
                                    <td>{{ $metalico->simbolo }}</td>
                                    <td>{{ $metalico->alicuota }}</td>
                                    <td>{{ $metalico->tipo_mercado }}</td>
                                    <td class="{{ $metalico->estado === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $metalico->estado }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.metalicos.destroy',$metalico->id) }}" method="POST">
                                            <div class="opciones-btn-metal">
                                                <div class="">
                                                    <a class="btn btn-sm btn-info  opcion-btn-metal__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.metalicos.show',$metalico->id) }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="btn btn-sm btn-warning opcion-btn-metal__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar" href="{{ route('admin.metalicos.edit',$metalico->id) }}"><i class="bi bi-pencil"></i></a>
                                                </div>
                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opcion-btn-metal__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.metalicos.destroy', $metalico->id) }}`)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <script>
                                                function confirmDelete(deleteUrl) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡Podrás revertir esto en la opción editar!",
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
            <!-- {!! $metalicos->links() !!} -->
        </div>
    </div>
</div>
@endsection