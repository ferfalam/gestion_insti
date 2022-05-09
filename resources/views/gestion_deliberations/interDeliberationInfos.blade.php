@extends('gestion_deliberations.lowLayout')

@section('content')
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif
<div class="container-fluid">
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Informations sur la délibération</h3>
    </div>

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
    @if($error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
@endif

<div class="card-header py-3">
        <h5> <span class="text-primary">Dates:</span>  {{$deliberation->start}} au {{$deliberation->end}} </h5> 
    </div>
    <div class="card-header py-3">
    <h5> <span class="text-primary">Filière et Groupe: </span>  {{$groupe}} </h5>
    </div>
    <div class="card-header py-3">
    <h5> <span class="text-primary">Semestre(s):</span> {{$deliberation->semesters}}  </h5> 
    </div>
    <div class="card-header py-3">
    <h5> <span class="text-primary">Année: </span> {{$annee}}  </h5> 
    </div>
    <div class="card-header py-3">
    <h5> <span class="text-primary">Auteur: </span> {{$auteur}}  </h5> 
    </div>
    <div class="card-header py-3">
    <h5> <span class="text-primary">UEs: </span> @foreach($ues as $ue)
            {{$ue.', '}}
        @endforeach </h5>
    </div>

    <div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
            <form id="parts" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$participantspath}}">
                <input type="text" name="page" value="l">
                <input type="number" name="id" value="{{$deliberation->id}}">
            </form>
            <form id="parts_download" action="{{ route('gestion_deliberation.download') }}" method="POST" class="d-none">
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
                            <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('parts_download').submit();"> Télécharger </a></span></div>
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
            <input type="text" name="page" value="l">
            <input type="number" name="id" value="{{$deliberation->id}}">
        </form>
        <form id="da_download" action="{{ route('gestion_deliberation.download') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$revealticketpath}}">
        </form>
        <div class="card shadow border-start-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">
                        <div class="text-uppercase fw-bold text-xs mb-1"><span>Délibération Affichée</span></div>
                        <div class="fw-bold mb-0 me-3"><a class="btn_bt" href=""
                            onclick="event.preventDefault();
                            document.getElementById('da').submit();">Voir</a></div>
                        <div class="mb-0 me-3"><a class="btn_bt" href=""
                            onclick="event.preventDefault();
                            document.getElementById('da_download').submit();"> Télécharger </a></span></div>
                    </div>
                    <div class="col-auto"><img class="img-ctl" src="{{asset('images/deliberation/excel.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </a>
</div>
</div>
</div>
@endsection