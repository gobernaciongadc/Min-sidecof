<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SI.DE.CO.F.</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <!-- Favicons -->
  <link href="{{asset('dashboard/img/escudo.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
  <link href="{{asset('dashboard/css/bootstrap5.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!-- Mapas -->
  <link href="{{asset('dashboard/css/leaflet.css') }}" rel="stylesheet">

  <!-- <link href="{{asset('dashboard/css/datatable.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{asset('dashboard/vendor/simple-datatables/style.css') }}" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{asset('dashboard/css/select2.css') }}" rel="stylesheet">
  <link href="{{asset('dashboard/css/style.css') }}" rel="stylesheet">

  <!-- Css personalizado -->
  <link href="{{asset('dashboard/css/custom.css') }}" rel="stylesheet">

  <!-- Toastify -->
  <link href="{{asset('dashboard/css/toastify.css') }}" rel="stylesheet">

  @vite([
  'resources/sass/app.scss',
  'resources/css/app.css',
  'resources/js/app.js',
  'resources/js/municipio.js'
  ])

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{asset('dashboard/img/escudo.png')}}" alt="">
        <span class="d-none d-lg-block">G.A.D.C.</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('dashboard/img/escudo.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              @switch(Auth::user()->name_bd)
              @case('funcionarios')
              <span>Funcionario</span>
              @break
              @case('empresas')
              <span>RUIM</span>
              @break
              @default
              @endswitch
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.usuarios.show',['id' => Auth::user()->id, 'opcion' => 'perfil'] ) }}">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.viewpassword') }}">
                <i class="bi bi-gear"></i>
                <span>Configuración de cuenta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ __('Cerrar sesión') }}</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        @endguest
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @include('dashboard.layouts.sidebar')

  <main id="main" class="main">
    <section class="section">
      <div class="pagetitle">
        <nav>
          <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li> -->
            @yield('migajas')
          </ol>
        </nav>
      </div>
      @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>GADC</span></strong>. Todos los derechos reservados
    </div>
    <div class="credits">
      Diseñado por <a href="#">Gobierno Autónomo Departamental de Cochabamba</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('dashboard/js/jquery.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/quill/quill.min.js') }}"></script>
  <!-- <script src="{{ asset('dashboard/vendor/simple-datatables/simple-datatables.js') }}"></script> -->
  <script src="{{ asset('dashboard/js/jquerydatatable.js') }}"></script>
  <script src="{{ asset('dashboard/js/datatablebootstrap.js') }}"></script>

  <script src="{{ asset('dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('dashboard/js/main.js') }}"></script>
  <script src="{{ asset('dashboard/js/custom.js') }}"></script>
  <script src="{{ asset('dashboard/js/select2.js') }}"></script>

  <!-- Toastify -->
  <script src="{{ asset('dashboard/js/toastify.js') }}"></script>

  <!-- Mapas -->
  <script src="{{ asset('dashboard/js/leaflet.js') }}"></script>
  <script src="{{ asset('dashboard/js/dom-to-image.js') }}"></script>

  <!-- Excel -->
  <script src="{{ asset('dashboard/js/tableToExcel.js') }}"></script>




</body>

</html>