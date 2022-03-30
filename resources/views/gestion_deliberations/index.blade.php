@extends('gestion_deliberations.layout')

@section('content')
{{$search = false}}
<div class="d-flex flex-column" id="content-wrapper">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success" id="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Liste des délibérations&nbsp;</h3>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Rechercher une délibération</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('gestion_deliberation.search') }}" method="post">
                       @csrf
                       <div class="row">
                        <div class="col-md-6 text-nowrap d-lg-flex flex-row align-items-lg-center">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="margin-right: 59px;"><label class="form-label">Filière&nbsp;
                                <select name="filiere" id="filiere" class="form-select d-inline-block form-select form-select-sm">
                                    @foreach($filieres as $filiere)
                                    <option value="{{$filiere->id}}" >{{$filiere->systemName}} </option>
                                    @endforeach
                                </select>&nbsp;
                            </label></div>
                            <div id="dataTable_length-3" class="dataTables_length" aria-controls="dataTable" style="margin-right: 59px;"><label class="form-label">Année&nbsp;<select name="annee" id="annee" class="form-select d-inline-block form-select form-select-sm">
                                @foreach($annees as $annee)
                                <option value="{{$annee->id}}" >{{$annee->name}} </option>
                                @endforeach
                            </select>&nbsp;
                        </label></div>
                        <div id="dataTable_length-2" class="dataTables_length" aria-controls="dataTable" style="margin-right: 59px;"><label class="form-label">GP&nbsp;<select name="groupe" id="groupe" class="form-select d-inline-block form-select form-select-sm">
                            @foreach($groupes as $groupe)
                            <option value="{{$groupe->id}}" >{{$groupe->name}} </option>
                            @endforeach
                        </select>&nbsp;</label></div>
                        <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable" style="margin-right: 59px;"><label class="form-label">Semestre&nbsp;<select name="semestre" id="semestre" class="form-select d-inline-block form-select form-select-sm">
                            <option value="semestre1" >Semestre1 </option>
                            <option value="semestre2" >Semestre2</option>
                            <option value="semestres1&2" >Semestres 1 et 2 </option>
                        </select>&nbsp;</label></div><button class="btn btn-primary" type="submit" style="margin-left: 50px;margin-right: 0px;" onclick="{{$search = true}}" value="rechercher">Rechercher</button> 
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Aller à</th>
                            <th>Année Académique</th>
                            <th>Filière</th>
                            <th>Groupe Pédagogique</th>
                            <th>Fiche Affichée</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($deliberations->isEmpty()) 
                        <div class="my_jumbotron">
                            <span class="big-s">Aucune délibération trouvée pour ces critères! Essayez une autre recherche.
                            </span>
                        </div>
                        @else
                        

                        @if($search)

                        @foreach($deliberations as $deliberation)

                        <tr>
                            <td><a class="btn_bt" href=""
                                            onclick="event.preventDefault();
                                            document.getElementById('inf').submit();"> <---- </a></td>
                            
                            <form id="inf" action="{{ route('gestion_deliberation.delibinfos') }}" method="POST" class="d-none">
                                @csrf
                                    <input hidden type="text" name="id" value="{{$deliberation->id}}">
                            </form>
                            <?php  foreach ($annees as $annee) {if($annee->id == $deliberation->yearId){ $m = $annee -> name; }} 
                            ?> 
                            <td><a href="#">{{$m}}</a></td>
                            <?php  foreach ($filieres as $filiere) {if($filiere->id == $deliberation->fieldId){ $m = $filiere -> systemName; }} 
                            ?> 
                            <td><a href="#">{{$m}}</a></td>
                            <?php  foreach ($groupes as $groupe) {if($groupe->id == $deliberation->groupId){ $m = $groupe -> name; }} 
                            ?> 
                            <td><a href="#">{{$m}}</a></td>
                            <td class="ro">
                                <a  class="deliberation" data-link code='1'></a>


                                <div class="box" link = "1">

                                    <ul>

                                        <li><a class="btn_bt" href=""
                                            onclick="event.preventDefault();
                                            document.getElementById('ram').submit();"> Télécharger </a> <i class='bx bx-window-open'></i></li>
                                            <form id="ram" action="{{ route('gestion_deliberation.voir') }}" method="POST" class="d-none">
                                                @csrf
                                                <input type="text" name="path" value="{{$deliberation->revealTicket}}">
                                            </form>

                                            <!-- <li><a download="{{ Storage::path($deliberation->revealTicket)}}" >Télécharger</a>  <i class='bx bx-download' download></i>  -->
                                    
                                        </ul>
                                    </div>
                                </td>
                                <td><a href="#">{{ $deliberation->end }}</a></td>
                            </tr>
                            @endforeach
                            @endif
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', ()=> {


        let list = document.getElementsByClassName('deliberation');

        let poux = 0;


        for (let i = 0; i < list.length; i++) {

            list[i].addEventListener('click' , (e)=> {

                let box = list[i].parentElement.lastElementChild;

                box.style.left = (e.clientX - 249)+"px";

                box.style.top = (i*49)+"px";

                if (box.classList.length === 1) {

                    box.classList.toggle("toggle" , true);

                } else if (box.classList.length !== 1) {

                    box.classList.toggle("toggle" , false);
                }
            })
            poux +=49;
        }

        document.body.addEventListener('click' , (e)=> {

            let boxs = document.getElementsByClassName('box');
            if (!e.target.matches('[data-link]')) {

             for (let i = 0; i < list.length; i++) {

                boxs[i].classList.toggle("toggle" , false);                 
            }
        }
    })
    })
</script>
@endsection