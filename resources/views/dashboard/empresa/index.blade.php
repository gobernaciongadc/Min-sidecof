@extends('dashboard.layouts.main')

@section('template_title')
Empresa
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-gestion-datos-index ">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            Gestión de {{ __('Empresa y/o cooperativa') }}
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
                        <a href="{{ route('admin.empresas.create') }}" class="btn btn-primary text-uppercase float-right" data-placement="left">
                            {{ __('Crear') }} RUIM
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive--custom">
                        <table class="table table-striped" id="emp_1">
                            <thead class="thead border">
                                <tr>
                                    <th>Nro.</th>
                                    <th>Coop/Empresa</th>
                                    <th>Tipo de operación</th>
                                    <th>Nro. RUIM</th>
                                    <th>Minerales autorizados</th>
                                    <th>Municipio</th>
                                    <th>Fecha de inscripción</th>
                                    <th>Estado</th>
                                    <th style="width: 10%;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $empresa->nombres }}</td>

                                    <td>
                                        @if($empresa->tipo_metalico != NULL && $empresa->tipo_no_metalico == NULL)
                                        {{ $empresa->tipo_metalico }}
                                        @endif

                                        @if($empresa->tipo_no_metalico != NULL && $empresa->tipo_metalico == NULL)
                                        {{ $empresa->tipo_no_metalico }}
                                        @endif

                                        @if($empresa->tipo_metalico != NULL && $empresa->tipo_no_metalico != NULL)
                                        {{ $empresa->tipo_metalico }}, {{ $empresa->tipo_no_metalico }}
                                        @endif
                                    </td>

                                    <td>{{ $empresa->ruim }}</td>
                                    <td>{{ $empresa->mineral }}</td>
                                    <td>
                                        @php
                                        $municipiosSeleccionados = explode(',', $empresa->n_municipios);
                                        @endphp

                                        @foreach ($municipios as $municipio)
                                        @if (in_array($municipio->id, $municipiosSeleccionados))
                                        {{ $municipio->municipio }}<br>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $empresa->fecha_inscripcion }}</td>

                                    <td class="{{ $empresa->estado === 'Habilitado' ? 'text-success' : 'text-danger' }}">
                                        {{ $empresa->estado }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.empresas.destroy',$empresa->id) }}" method="POST">
                                            <div class="opciones-btn-empresa ">

                                                <div class="">
                                                    <a class="btn btn-sm btn-info opcion-btn-empresa__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ver datos" href="{{ route('admin.empresas.show',$empresa->id) }}"><i class="bi bi-eye"></i></a>
                                                </div>

                                                <div class="">
                                                    <a class="btn btn-sm btn-warning opcion-btn-empresa__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar" href="{{ route('admin.empresas.edit',$empresa->id) }}"><i class="bi bi-pencil"></i></a>
                                                </div>

                                                <div class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm opcion-btn-empresa__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Deshabilitar" onclick="confirmDelete(`{{ route('admin.empresas.destroy', $empresa->id) }}`)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>

                                                <div class="">
                                                    <a href="{{ route('admin.pdfruim',$empresa->id) }}" target="_blank" class="btn btn-primary btn-sm opcion-btn-empresa__margen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Imprimir"><i class="bi bi-printer"></i></a>
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
            {!! $empresas->links() !!}
        </div>
    </div>
</div>
@endsection