<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>INSTI</title>
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
     <link rel="stylesheet" src="{{ asset('fonts/fontawesome-all.min.css') }}"/> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/jquery.fileupload.css') }}">


</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="fas fa-school"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active"
                            href="{{ route('gestion_conseil_pedagogique.index') }}"><i
                                class="fas fa-tachometer-alt"></i><span>Accueil</span></a></li>
                    @if (allowsUser())
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('gestion_conseil_pedagogique.view_program') }}"><i
                                    class="fas fa-user"></i>Organiser conseil<span></span></a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('gestion_conseil_pedagogique.guests') }}"><i
                                    class="fas fa-table"></i><span>Les invités</span></a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('gestion_conseil_pedagogique.my_councils') }}"><i
                                    class="far fa-user-circle"></i><span>Mes conseils</span></a></li>
                    @endif

                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('gestion_conseil_pedagogique.councils') }}"><i
                                class="fas fa-user-circle"></i><span>Les conseils</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"
                    style="background-color: rgb(255,255,255);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h5></h5>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                                        href="#">
                                        @if (notifymax() != null)
                                            <span
                                                class="badge badge-danger badge-counter">{{ count(notifymax()) }}+</span><i
                                                class="fas fa-bell fa-fw"></i>
                                        @endif
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                        <h6 class="dropdown-header">Invitations</h6>
                                        @foreach (notifymax() as $notify)
                                            <a class="d-flex align-items-center dropdown-item"
                                                href="{{ Storage::url($notify->fichier) }}">
                                                <div class="mr-3">
                                                    <div class="bg-primary icon-circle">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div><span class="small text-gray-500">December 12, 2019</span>
                                                    <p>{{ $notify->objet }}</p>
                                                </div>
                                            </a>
                                            <a
                                                href="{{ route('gestion_conseil_pedagogique.view_new', ['id' => $notify->idc]) }}">
                                                Consulter le conseil</a>
                                        @endforeach


                                    </div>

                                </div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">{{Auth::user()->pseudo}}</span><img
                                            class="border rounded-circle img-profile"
                                            src="{{asset("images/avatars/avatar1.jpeg")}}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><form action="{{ route("logout")}}" method="post">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Deconnexion</button>
                                        </form>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
