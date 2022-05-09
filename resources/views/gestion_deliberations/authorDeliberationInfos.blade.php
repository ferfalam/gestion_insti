@extends('gestion_deliberations.layout')

@section('content')

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
    <div class='row justify-content-end'>
        <a class="btn btn-primary col-md-2" href=""
                                onclick="event.preventDefault();
                                document.getElementById('ch').submit();"> Modifier</a>
        <button class="btn btn-primary col-md-2" type="button" data-toggle="modal" data-target="#supr"> Supprimer</button>

        <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="supr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 id="exampleModalLabel">Voulez-vous vraiment supprimer vcette délibération ?</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <a href="" onclick="event.preventDefault(); document.getElementById('del').submit();" type="button" class="btn btn-primary">Oui</a>
      </div>
    </div>
  </div>
</div>
        

        <form id="ch" action="{{ route('gestion_deliberation.change') }}" method="POST" class="d-none">
                @csrf
                <input type="number" name="authid" value="{{$deliberation->authorId}}">
                <input type="number" name="id" value="{{$deliberation->id}}">
    </form>
    <form id="del" action="{{ route('gestion_deliberation.delete') }}" method="POST" class="d-none">
                @csrf
                <input type="number" name="authid" value="{{$deliberation->authorId}}">
                <input type="number" name="id" value="{{$deliberation->id}}">
    </form>
    </div>
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
                <input type="text" name="page" value="h">
                <input type="number" name="id" value="{{$deliberation->id}}">
            </form>
            <!-- <form id="parts_modif" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$participantspath}}">
                <input type="text" name="page" value="h">
                <input type="number" name="id" value="{{$deliberation->id}}">
            </form> -->
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
                            <!-- <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('parts_modif').submit();"> Modifier </a></span></div> -->
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
            <input type="text" name="page" value="h">
            <input type="number" name="id" value="{{$deliberation->id}}">
        </form>
        <!-- <form id="da_modif" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$revealticketpath}}">
                <input type="text" name="page" value="h">
                <input type="number" name="id" value="{{$deliberation->id}}">
        </form> -->
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
                        <!-- <div class="mb-0 me-3"><a class="btn_bt" href=""
                            onclick="event.preventDefault();
                            document.getElementById('da_modif').submit();"> Modifier </a></span></div> -->
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
<div class="col-md-6 col-xl-3 mb-4">
    
    <form id="dm" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
        @csrf
        <input type="text" name="path" value="{{$hideticketpath}}">
        <input type="text" name="page" value="h">
        <input type="number" name="id" value="{{$deliberation->id}}">
    </form>
    <!-- <form id="dm_modif" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$hideticketpath}}">
                <input type="text" name="page" value="h">
                <input type="number" name="id" value="{{$deliberation->id}}">
        </form> -->
        <form id="dm_download" action="{{ route('gestion_deliberation.download') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$hideticketpath}}">
        </form>
    <div class="card shadow border-start-info py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase fw-bold text-xs mb-1"><span>Délibération masquée</span></div>
                    <div class="row g-0 align-items-center">
                        <div class="col-auto">
                            <div class="fw-bold mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('dm').submit();">Voir</a></span></div>
                            <!-- <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('dm_modif').submit();"> Modifier </a></span></div> -->
                            <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('dm_download').submit();"> Télécharger </a></span></div>
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
        <input type="text" name="page" value="h">
        <input type="number" name="id" value="{{$deliberation->id}}">
    </form>
    <!-- <form id="re_modif" action="{{ route('gestion_deliberation.ouvrir') }}" method="POST" class="d-none">
                @csrf
                <input type="text" name="path" value="{{$reportpath}}">
                <input type="text" name="page" value="h">
                <input type="number" name="id" value="{{$deliberation->id}}">
    </form> -->
    <form id="re_download" action="{{ route('gestion_deliberation.download') }}" method="POST" class="d-none">
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
                    <!-- <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('re_modif').submit();"> Modifier </a></span></div> -->
                    <div class="mb-0 me-3"><a class="btn_bt" href=""
                                onclick="event.preventDefault();
                                document.getElementById('re_download').submit();"> Télécharger </a></span></div>
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