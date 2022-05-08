<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    {{-- <link rel="stylesheet" src="{{ asset('fonts/fontawesome-all.min.css') }}"/> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("style")

    <style>
    .active {
        color: white;
    }
    </style>
</head>


<body id="page-top">

    <div id="wrapper">

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="{{ route('home') }}">
                    <div class="sidebar-brand-icon"><i class="fas fa-school"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.index') ? 'active':''}}"
                            href="{{route('gestion_authClass.index')}}"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.profile') ? 'active':''}}"
                            href="{{route('gestion_authClass.profile')}}"><i
                                class="fas fa-user"></i><span>Profils</span></a>
                    </li>
                    @if (Auth::user()->email=='etudiant@gmail.com' || Auth::user()->email=='personnel@gmail.com')
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.demande') ? 'active':''}}"
                            href="{{route('gestion_authClass.demande')}}"><i
                                class="fas fa-table"></i><span>Demande</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.listdemande') ? 'active':''}}"
                            href="{{route('gestion_authClass.listdemande')}}"><i class="fas fa-table"></i><span>Demande
                                envoyée</span></a>
                    </li>
                    @endif
                    @if (Auth::user()->email=='admin@insti.com')
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.demande_r') ? 'active':''}}"
                            href="{{route('gestion_authClass.demande_r')}}"><i class="fas fa-table"></i><span>Demande
                                reçue</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.deliber') ? 'active':''}}"
                            href="{{route('gestion_authClass.deliber')}}"><i class="fas fa-table"></i><span>Fiche de
                                déliberation</span></a>
                    </li>
                    
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{request()->is('gestion_authClass.classement') ? 'active':''}}"
                            href="{{route('gestion_authClass.classement')}}"><i
                                class="fas fa-table"></i><span>Classement</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                    
                                <a class="nav-link" href="{{ route('gestion_authClass.deconnexion') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>&nbsp;Deconnexion</a>
                        
                    </li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a></li> -->
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
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i
                                    class="fas fa-search"></i></button></div>
                    </form> -->

                </div>
            </nav>

            

            @yield('main')
        </main>



    </div>
    </div>

    <div id="ajax-modal" class="modal hide fade" tabindex="-1"></div>
    <footer class="bg-white sticky-footer">

        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="/gestion_classement/assets/js/jquery.min.js"></script>

    <!-- {{--    js popup--}} -->


    <script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js">
    </script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script>

    <script type="text/javascript">
    $(function() {
        $.fn.modalmanager.defaults.resize = true;

        $("[data-source]").each(function() {
            var $this = $(this),
                $source = $($this.data("source"));

            var text = [];
            $source.each(function() {
                var $s = $(this);
                if ($s.attr("type") == "text/javascript") {
                    text.push($s.html().replace(/(\n)*/, ""));
                } else {
                    text.push($s.clone().wrap("<div>").parent().html());
                }
            });

            $this.text(text.join("\n\n").replace(/\t/g, "    "));
        });

        prettyPrint();
    });
    </script>

    <script id="dynamic" type="text/javascript">
    $(".dynamic .demo").click(function() {
        var tmpl = [
            // tabindex is required for focus
            '<div class="modal hide fade" tabindex="-1">',
            '<div class="modal-header">',
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
            "<h3>Modal header</h3>",
            "</div>",
            '<div class="modal-body">',
            "<p>Test</p>",
            "</div>",
            '<div class="modal-footer">',
            '<a href="#" data-dismiss="modal" class="btn">Close</a>',
            '<a href="#" class="btn btn-primary">Save changes</a>',
            "</div>",
            "</div>",
        ].join("");

        $(tmpl).modal();
    });
    </script>

    <script id="ajax" type="text/javascript">
    var $modal = $("#ajax-modal");

    $(".ajax .demo").on("click", function() {
        // create the backdrop and wait for next modal to be triggered
        $("body").modalmanager("loading");

        setTimeout(function() {
            $modal.load("modal_ajax_test.html", "", function() {
                $modal.modal();
            });
        }, 1000);
    });

    $modal.on("click", ".update", function() {
        $modal.modal("loading");
        setTimeout(function() {
            $modal
                .modal("loading")
                .find(".modal-body")
                .prepend(
                    '<div class="alert alert-info fade in">' +
                    'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    "</div>"
                );
        }, 1000);
    });
    </script>
    <script>
    window.twttr = (function(d, s, id) {
        var js,
            fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };
        return t;
    })(document, "script", "twitter-wjs");
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/gestion_classement/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/gestion_classement/assets/js/chart.min.js"></script>
    <script src="/gestion_classement/assets/js/bs-init.js"></script>

    <script src="/gestion_classement/assets/js/theme.js"></script>

</body>

</html>