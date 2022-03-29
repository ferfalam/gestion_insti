@php
    $heros_img_path = [
                     "images/heros/hero-img.png",
                     "images/heros/hero-img.svg",
                     "images/heros/features-2.png",
                     "images/heros/values-1.png",
                     "images/heros/values-2.png",
                     "images/heros/values-3.png"
                     ]
@endphp
    <!DOCTYPE html>
<html style="font-family: Arvo, serif;" lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="icon" type="image/jpg" sizes="undefinedxundefined" href="{{asset($resolved_assets."images/logo.jpg")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."bootstrap/css/bootstrap.min.css")}}">
    <link rel="manifest" href="{{asset($resolved_assets."manifest.json")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/fontawesome-all.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Footer-Basic.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Footer-Dark.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Highlight-Phone.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Navigation-Clean.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Navigation-with-Button.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Navigation-with-Search.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/aos.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/styles.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/hero.css")}}">
</head>

<body>
<header class="header fixed-top">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><img class="rounded-circle img-fluid" data-aos="fade-right" data-aos-duration="800" data-aos-delay="150" src="{{asset($resolved_assets."images/logo.jpg")}}" style="width: 54px;"><a class="navbar-brand" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="100" href="#">Entreprises de Stage</a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a role="button" class="nav-link" data-bs-hover-animate="rubberBand" href="{{__("/")}}" style="font-weight: bold;">Accueil</a></li>
                </ul>
                @auth
                    <span class="navbar-text actions" data-bs-hover-animate="pulse">
                    <a class="btn login btn-primary text-light" href="{{route('gestion_entreprises_stage.dashboard')}}" style="font-weight: bold;">Tableau de Bord</a>
                </span>
                @endauth

                @guest
                    <span class="navbar-text actions" data-bs-hover-animate="pulse">
                    <a class="login font-weight-bold" href="{{route('gestion_entreprises_stage.login')}}" style="font-weight: bold;">Se connecter</a>
                    <a class="btn btn-primary font-weight-bold text-light" role="button" data-aos="fade-up-left" href="#">S'inscrire</a>
                </span>
                @endguest

            </div>
        </div>
    </nav>
</header>

<div class="carousel slide" data-ride="carousel" id="carousel-1">
    <div class="carousel-inner" role="listbox">
        @foreach($heros_img_path as $img_path)
            <div class="carousel-item {{$loop->index==0?"active":""}}">
                <section class="hero d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <h1 data-aos="fade-up" class="font-weight-bold">Offres de stage en entreprise</h1>
                                <p data-aos="fade-up" data-aos-delay="400" class="text-secondary font-weight-bold">Vous etes à la recherche d'un stage étudiant en entreprise, d'un stage de fin d'études ? L'UNSTIM vous propose des offres de stages conventionnés dans tout le Bénin et dans divers secteurs</p>
                                <div data-aos="fade-up" data-aos-delay="600">
                                    <div class="text-center text-lg-start">
                                        <a href="#about" class="btn btn-get-started font-weight-bold btn-lg scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Voir l'offre</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                                <img src="{{asset($resolved_assets.$img_path)}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        @endforeach
    </div>
    <div>
        <a class="carousel-control-prev text-dark" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
        <a class="carousel-control-next text-light" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
    </div>
    <ol class="carousel-indicators text-dark">
        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-1" data-slide-to="1"></li>
    </ol>
</div>

@include("gestion_entreprises_stage.layouts.footer")

<div id="preloader"></div>
<script src="{{asset($resolved_assets."js/splash.js")}}"></script>

<script src="{{asset($resolved_assets."js/jquery.min.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/bs-init.js")}}"></script>
<script src="{{asset($resolved_assets."js/aos.js")}}"></script>

</body>

</html>
