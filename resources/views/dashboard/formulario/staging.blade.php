@extends('dashboard.layouts.main')

@section('template_title')
Puesto en ecena
@endsection

@section('migajas')
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item">Formulario</li>
<li class="breadcrumb-item active">Staging</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title" class="text-uppercase text-white">
                            {{ __('Puesto en escena') }}

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
                @elseif ($message = Session::get('error'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            text: '{!! $message !!}',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    });
                </script>
                @endif
                <div class="d-flex justify-content-between mt-3">
                    <p class="mt-3 ms-3 text-primary text-uppercase">Lista de 5 registros puestos en escena para ser emitidos</p>
                    <!-- <div class="float-right me-4">
                        <a href="{{ route('admin.formularios.create') }}" class="btn btn-primary text-uppercase float-right" data-placement="left">
                            {{ __('Crear formulario 101') }}
                        </a>
                    </div> -->
                </div>
                @if($alta == 'Habilitado')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="pescena_1">
                            <thead class="thead border">

                                <tr>
                                    <th>#</th>
                                    <!-- <th>Id formulario</th> -->
                                    <th>Tipo metalico</th>
                                    <th>Tipo no metalico</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Alicuota</th>
                                    <th>Transporte</th>
                                    <th>Chofer</th>
                                    <th>Placa</th>
                                    <th>Emisión en escena</th>
                                    <th>Validez en escena</th>
                                    <th>Comercio</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>

                                @php
                                $i = 0;
                                @endphp
                                @foreach ($staging as $enescena)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <!-- <td>{{ $enescena->id }}</td> -->
                                    @if(!is_null($enescena->tipo_min_metalico) && !empty($enescena->tipo_min_metalico))
                                    <td>{{ $enescena->tipo_min_metalico }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif

                                    @if(!is_null($enescena->tipo_min_nometalico) && !empty($enescena->tipo_min_nometalico))
                                    <td>{{ $enescena->tipo_min_nometalico }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif
                                    <td>{{ $enescena->origen }}</td>
                                    <td>{{ $enescena->destino }}</td>
                                    <td>{{ $enescena->alicuota }}</td>
                                    @if($enescena->comercio == 'Externo')
                                    <td>Otros</td>
                                    @else
                                    <td>{{ $enescena->transporte }}</td>
                                    @endif
                                    <td>{{ $enescena->chofer }}</td>
                                    <td>{{ $enescena->placa }}</td>
                                    <td>{{ $enescena->fecha_emision }}</td>
                                    @if(!is_null($enescena->fecha_valides) && !empty($enescena->fecha_valides))
                                    <td>{{ $enescena->fecha_valides }}</td>
                                    @else
                                    <td class="text-danger">--</td>
                                    @endif
                                    <td>{{ $enescena->comercio }}</td>
                                    <td>
                                        <form action="{{ route('admin.formularios.destroy',$enescena->id) }}" method="POST" class="btn-staging">
                                            <div class="">
                                                <a href="{{ route('admin.formularios.edit',$enescena->id) }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar Formulario"><i class="bi bi-pencil"></i></a>
                                            </div>
                                            <div class="btn-separar_staging">
                                                <a href="{{ route('admin.updated_staging',$enescena->id) }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Emitir"><i class="bi bi-envelope-check"></i></a>
                                            </div>
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-separar_staging">
                                                <a type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Eliminar" onclick="confirmDelete(`{{ route('admin.formularios.destroy', $enescena->id) }}`)">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            <script>
                                                function confirmDelete(deleteUrl) {
                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡No podras revertir esto!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Sí, eliminar',
                                                        cancelButtonText: 'Cancelar' // Agregar esta línea para cambiar el texto del botón "Cancelar"

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
                @else

                <p class=" text-danger mt-3 ms-3 text-uppercase fw-bold">Regularize su registro, fuiste dado de baja del sistema</p>

                @endif

            </div>

        </div>
    </div>
</div>
@endsection