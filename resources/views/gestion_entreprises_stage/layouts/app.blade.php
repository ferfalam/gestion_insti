<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>

    @yield("head")
    <link rel="icon" type="image/jpeg" sizes="292x350" href="{{asset($resolved_assets."images/logo.png")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."bootstrap/css/bootstrap.min.css")}}">
    <link rel="manifest" href="{{asset($resolved_assets."manifest.json")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/fontawesome-all.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/fontawesome5-overrides.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/aos.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/styles.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/hero.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."toastr/toastr.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."bootstrap/css/bootstrap-multiselect.css")}}">
    <link href="{{asset($resolved_assets."bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
    <link href="{{asset($resolved_assets."css/tabs.css")}}" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" data-aos="fade-right" data-aos-duration="700" data-aos-delay="200">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{--                    <i class="fas fa-laugh-wink"></i>--}}
                    <img class="rounded img-thumbnail" src="{{asset($resolved_assets."images/unstim.png")}}" style="width: 40px;height: 40px">
                </div>
                <div class="sidebar-brand-text mx-3"><span>INSTI</span>
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('gestion_entreprises_stage.dashboard')}}"><i class="fas fa-tachometer-alt"></i><span>Tableau de Bord</span></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('gestion_entreprises_stage.profile')}}"><i class="fas fa-user"></i><span>Profile</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            @include("gestion_entreprises_stage.layouts.navigation")
            @yield('content')
        </div>
        @yield("footer")
        <div id="preloader"></div>
    </div>
    <a class="border rounded d-inline scroll-to-top" data-aos="fade-up" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@yield("script")

<script src="{{asset($resolved_assets."js/splash.js")}}"></script>
<script src="{{asset($resolved_assets."js/jquery.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/popper.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset($resolved_assets."lodash/lodash.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/bs-init.js")}}"></script>
<script src="{{asset($resolved_assets."js/aos.js")}}"></script>
<script src="{{asset($resolved_assets."js/dropzone.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/countUp.umd.js")}}"></script>
<script src="{{asset($resolved_assets."jquery-steps/jquery.steps.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/theme.js")}}"></script>
<script src="{{asset($resolved_assets."toastr/toastr.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap-multiselect.min.js")}}"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@stack('custom-scripts')
</body>
</html>
