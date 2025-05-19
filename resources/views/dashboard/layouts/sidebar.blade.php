<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li><!-- End Dashboard Nav -->



    <!-- Reportes -->
    @hasrole(['Super Admin','funcionario'])

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-reportes" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-pdf"></i><span>Reportes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-reportes" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.cantidadformularios')}}">
            <i class="bi bi-circle"></i><span>Cantidad Formularios por actor productivo</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.cantidadformulariosmunicipio')}}">
            <i class="bi bi-circle"></i><span>Cantidad de RUIM por municipios</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.cantidadformulariosmineral')}}">
            <i class="bi bi-circle"></i><span>Cantidad de empresas por mineral autorizado</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.cantidadformulariosanio')}}">
            <i class="bi bi-circle"></i><span>Cantidad de empresas inscritas por año</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.viewformulariolista')}}">
            <i class="bi bi-circle"></i><span>Lista de formularios por empresa</span>
          </a>
        </li>
      </ul>
    </li><!-- End Reportes -->
    @endhasrole

    <!-- Gestión de Formulario -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-formulario" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text"></i><span>Formulario 101</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-formulario" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @can('admin.formularios.create')
        <li>
          <!-- <a href="{{route('admin.formularios.create')}}">
            <i class="bi bi-circle"></i><span>Crear formulario 101</span>
          </a> -->

          @php
          $user = Auth::user();
          $tipo = $user->name_bd;
          @endphp

          @if($tipo == 'empresas')
          <a href="{{route('admin.tipo.formularios.create',['opcion'=>'interno'])}}">
            <i class="bi bi-circle"></i><span>Formulario 101 de Transporte Interno</span>
          </a>
          @endif

          @if($tipo == 'mineros')
          <a href="{{route('admin.tipo.formularios.create',['opcion'=>'externo'])}}">
            <i class="bi bi-circle"></i><span>Formulario 101 de Exportacion</span>
          </a>
          @endif

          <!-- @if($tipo != 'empresas' && $tipo != 'mineros')
          <a href="{{route('admin.tipo.formularios.create',['opcion'=>'interno'])}}">
            <i class="bi bi-circle"></i><span>Formulario 101 de Transporte Interno</span>
          </a>
          <a href="{{route('admin.tipo.formularios.create',['opcion'=>'externo'])}}">
            <i class="bi bi-circle"></i><span>Formulario 101 de Exportacion</span>
          </a>
          @endif -->


        </li>
        @endcan

        @if($tipo != 'funcionarios')
        @can('admin.staging')
        <li>
          <a href="{{route('admin.staging')}}">
            <i class="bi bi-circle"></i><span>Puesto en escena</span>
          </a>
        </li>
        @endcan

        @can('admin.emitidos')
        <li>
          <a href="{{route('admin.emitidos')}}">
            <i class="bi bi-circle"></i><span>Formularios emitidos</span>
          </a>
        </li>
        @endcan

        @can('admin.observacion')
        <li>
          <a href="{{route('admin.observacion')}}">
            <i class="bi bi-circle"></i><span>Observacion en transporte</span>
          </a>
        </li>
        @endcan
        @endif


        @can('admin.gestionbuscar')
        <li>
          <a href="{{route('admin.gestionbuscar')}}">
            <i class="bi bi-circle"></i><span>Buscar formulario</span>
          </a>
        </li>
        @endcan

      </ul>
    </li><!-- End Components Nav -->


    <!-- Finalizar formulario 101 -->
    @hasrole(['Super Admin','funcionario','ruim','rocmin'])
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-finalizar" data-bs-toggle="collapse" href="#">
        <i class="bi bi-stop-circle"></i><span>Finalizar formulario</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-finalizar" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.gestionbuscarfinalizar')}}">
            <i class="bi bi-circle"></i><span>Gestionar entrega</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
    @endhasrole

    <!-- Seguimiento formulario 101 -->
    @hasrole(['Super Admin','funcionario','ruim','rocmin','seguimiento'])
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-seguimiento" data-bs-toggle="collapse" href="#">
        <i class="bi bi-truck"></i><span>Seguimiento</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-seguimiento" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.gestionbuscarubicacion')}}">
            <i class="bi bi-circle"></i><span>Por Nro. de Form-101</span>
          </a>
        </li>
        @can('admin.actividad')
        <li>
          <a href="{{route('admin.actividad')}}">
            <i class="bi bi-circle"></i><span>Registro de actividad</span>
          </a>
        </li>
        @endcan

      </ul>
    </li><!-- End Components Nav -->
    @endhasrole


    <!-- Gestión de datos -->
    @hasrole(['Super Admin'])
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-datos" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Gestión de datos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-datos" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <!-- <a href=""> -->
          <a href="{{route('admin.municipios.index')}}">
            <i class="bi bi-circle"></i><span>Municipios</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.metalicos.index')}}">
            <i class="bi bi-circle"></i><span>Minerales metalicos</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.nometalicos.index')}}">
            <i class="bi bi-circle"></i><span>Minerales no metalicos</span>
          </a>
        </li>
        @can('admin.empresas.index')
        <li>
          <a href="{{route('admin.empresas.index')}}">
            <i class="bi bi-circle"></i><span>Empresa/coop. RUIM</span>
          </a>
        </li>
        @endcan
        @can('admin.mineros.index')
        <li>
          <a href="{{route('admin.mineros.index')}}">
            <i class="bi bi-circle"></i><span>Comercializadoras ROCMIN</span>
          </a>
        </li>
        @endcan
      </ul>
    </li><!-- End Components Nav -->
    @endhasrole

    <!-- USUARIOS -->
    @hasrole(['Super Admin'])
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-usuarios" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-add"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-usuarios" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('admin.funcionarios.index')}}">
            <i class="bi bi-circle"></i><span>Funcionarios</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.usuarios.index')}}">
            <i class="bi bi-circle"></i><span>Gestión de usuarios</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
    @endhasrole

  </ul>

</aside><!-- End Sidebar-->