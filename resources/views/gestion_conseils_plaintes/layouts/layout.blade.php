<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Délibérations') }}</title>


       <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    {{-- <link rel="stylesheet" src="{{ asset('fonts/fontawesome-all.min.css') }}"/> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("style")

    {{-- <style>
        .navbar{
            position: fixed;
        }

        .sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}
    </style> --}}

</head>

<body>
    <div id="app">
        <div id="wrapper">
            <nav id = "sidenav" class="navbar navbar-dark align-items-start sidebar .fixed-left sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('home') }}">
                        <div class="sidebar-brand-icon"><i class="fas fa-school"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item {{ (request()->is('gestion_conseils_plaintes/plaintes*')) ? 'active' : ''}}" role="presentation"><a class="nav-link" href=" {{ route('gestion_conseils_plaintes.liste_plaintes') }}"><i class="fas fa-list-alt"></i><span><strong>Plaintes</strong></span></a></li>
                        <li class="nav-item {{ (request()->is('gestion_conseils_plaintes/convocations*')) ? 'active' : ''}}" role="presentation"><a class="nav-link" href="{{ route('gestion_conseils_plaintes.liste_convocations') }}"><i class="fas fa-list-alt"></i><span><strong>Courrier</strong><br></span></a></li>
                        @if ( auth()->user()-> user_groupId == 1)
                        <li class="nav-item {{ (request()->is('gestion_conseils_plaintes/conseils*')) ? 'active' : ''}}" role="presentation"><a class="nav-link" href=" {{ route('gestion_conseils_plaintes.liste_conseils') }}"><i class="fas fa-list-alt"></i><span><strong>Conseils</strong></span></a></li>
                        <li class="nav-item {{ (request()->is('gestion_conseils_plaintes/rapports*')) ? 'active' : ''}}" role="presentation"><a class="nav-link" href=" {{ route('gestion_conseils_plaintes.liste_rapports') }}"><i class="fas fa-list-alt"></i><span><strong>Rapports</strong></span></a></li>
                        @endif
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            
            <main class="w-100">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <!-- <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                    </form> -->
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>

                @yield('main')
                @yield('content')
            </main>
        </div>
    </div>

    <!-- ALL JS FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('gestion_cd/js/all.js') }}"></script> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    @yield("script")

</body>

</html>
