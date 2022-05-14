<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Délibérations') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    {{-- <link rel="stylesheet" src="{{ asset('fonts/fontawesome-all.min.css') }}"/> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("style")
</head>

<body>
    <div id="app">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('home') }}">
                        <div class="sidebar-brand-icon"><i class="fas fa-school"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar">
                        @if (auth()->guest())
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <i class="far fa-user-circle"></i>
                                    <span>Connexion</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gestion_demandes_reclamation_evaluation.dashboard_etudiant') }}">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span>Accueil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gestion_demandes_reclamation_evaluation.voir_demande_reclamation') }}">
                                    <i class="fas fa-user"></i>
                                    <span>Voir demande de reclamations</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gestion_demandes_reclamation_evaluation.voir_demande_evaluation') }}">
                                    <i class="fas fa-table"></i>
                                    <span>Voir demande d'evaluation</span>
                                </a>
                            </li>
                            
                        @endif
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>

            <main class="w-100">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    
                </nav>

                @yield('main')
            </main>

        </div>
    </div>
    <!-- ALL JS FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="{{ asset('js/all.js') }}"></script> --}}
    @yield("script")
</body>

</html>
