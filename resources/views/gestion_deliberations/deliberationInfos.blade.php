@extends('gestion_deliberations.layout')

@section('content')
<div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Informations sur la délibération</h3>
    </div>

    <!-- le contenue de la page à été modifié et nécéssite les ressources suivantes :: -->
    <!-- word.png -->
    <!-- excel.png -->
    <!-- pdf.jpeg -->
    <!-- ces ressources sont placées à la racine -->
    <style>
        .col-md-6 a {
            text-decoration: none;
            color: inherit;
        }

        .img-ctl {
            height: 3em;
        }
        .sz {
            font-size: 10px;
        }
    </style>

    <div class="card-header py-3">
        <h5> <span class="text-primary">Dates:</span>  {{$deliberation->start}} au {{$deliberation->start}} </h5> 
    </div>
    <div class="card-header py-3">
        <h5 class="text-primary m-0">Filière et Groupe: </h5> {{$groupe}}
    </div>
    <div class="card-header py-3">
        <h5 class="text-primary m-0">Semestre(s): </h5> {{$deliberation->semesters}}
    </div>
    <div class="card-header py-3">
        <h5 class="text-primary m-0">Année: </h5> {{$annee}} 
    </div>
    <div class="card-header py-3">
        <h5 class="text-primary m-0">Auteur: </h5> {{$auteur}} 
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <form id="parts" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$participantspath}}">
            </form>
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase fw-bold text-xs mb-1"><span>Liste des participants</span></div>
                            <div class="mb-0 me-3"><a class="btn_bt" href=""
            onclick="event.preventDefault();
            document.getElementById('parts').submit();"> Voir </a></span></div>
                        </div>
                        <div class="col-auto"><img class="img-ctl" src="{{asset('images/deliberation/pdf.jpg')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        
        <form id="da" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
            @csrf
            <input type="text" name="path" value="{{$revealticketpath}}">
        </form>
        <div class="card shadow border-start-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">
                        <div class="text-uppercase fw-bold text-xs mb-1"><span>Délibération Affiché</span></div>
                        <div class="fw-bold mb-0 me-3"><a class="btn_bt" href=""
        onclick="event.preventDefault();
        document.getElementById('da').submit();">Voir</a></div>
                    </div>
                    <div class="col-auto"><img class="img-ctl" src="{{asset('images/deliberation/excel.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-6 col-xl-3 mb-4">
    
    <form id="dm" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
        @csrf
        <input type="text" name="path" value="{{$hideticketpath}}">
    </form>
    <div class="card shadow border-start-info py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase fw-bold text-xs mb-1"><span>Délibération masqué</span></div>
                    <div class="row g-0 align-items-center">
                        <div class="col-auto">
                             <div class="fw-bold mb-0 me-3"><a class="btn_bt" href=""
    onclick="event.preventDefault();
    document.getElementById('dm').submit();">Voir</a></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto"><img class="img-ctl" src="{{asset('images/deliberation/excel.png')}}" alt=""></div>
            </div>
        </div>
    </div>
</a>
</div>
<div class="col-md-6 col-xl-3 mb-4">
    
    <form id="re" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
        @csrf
        <input type="text" name="path" value="{{$reportpath}}">
    </form>
    <div class="card shadow border-start-warning py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase fw-bold text-xs mb-1"><span>Rapport</span></div>
                    <div class="fw-bold mb-0 me-3"><a class="btn_bt" href=""
    onclick="event.preventDefault();
    document.getElementById('re').submit();">Voir</a></div>
                </div>
                <div class="col-auto"><img class="img-ctl" src="{{asset('images/deliberation/pdf.jpg')}}" alt=""></div>
            </div>
        </div>
    </div>
</a>
</div>
</div>
</div>
@endsection