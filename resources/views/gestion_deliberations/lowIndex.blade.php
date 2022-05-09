@extends('gestion_deliberations.lowLayout')

@section('content')
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
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h1 class="text-primary m-0 fw-bold text-center">Délibérations disponibles</h1>
                </div>
                <div class="container">
                    <form action="{{ route('gestion_deliberation.search') }}" method="post">
                       @csrf
                       <div class="row justify-content-center">
                            <div class="col-md-2" >Année<select name="annee" id="annee" class="form-control">
                                @foreach($annees as $annee)
                                <option value="{{$annee->id}}" >{{$annee->name}} </option>
                                @endforeach
                                <option value="" >Aucune</option>
                            </select>
                            </div>
                            <div class="col-md-2" >Filière
                                <select name="filiere" id="filiere" class="form-control">
                                    @foreach($filieres as $filiere)
                                    <option value="{{$filiere->id}}" >{{$filiere->systemName}} </option>
                                    @endforeach
                                    <option value="" >Aucune</option>
                                </select>
                            </div>
                            
                        <div class="col-md-2" >GP<select name="groupe" id="groupe" class="form-control">
                            @foreach($groupes as $groupe)
                            <option value="{{$groupe->id}}" >{{$groupe->name}} </option>
                            @endforeach
                            <option value="" >Aucune</option>
                        </select></div>
                        <div class="col-md-2" >Semestre<select name="semestre" id="semestre" class="form-control">
                            <option value="semestre1" >Semestre1 </option>
                            <option value="semestre2" >Semestre2</option>
                            <option value="semestres1&2" >Semestres 1 et 2 </option>
                            <option value="" >Aucune</option>
                        </select></div>
                        <div class="b col-md-2"  ><button class="btn btn-primary" type="submit" value="rechercher">Rechercher</button></div>
                    
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>À propos</th>
                            <th>Année Académique</th>
                            <th>Filière</th>
                            <th>Groupe Pédagogique</th>
                            <th>Fiche Affichée</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                        <?php  foreach ($deliberations as $deliberation){ ?>
                            <?php  $o = $deliberation->id; $a = $o/($o + 1) ;  $i = $o/($o + 2) ;    ?>

                        <tr>
                            <td><a class="btn_bt" href=""
                                            onclick="event.preventDefault();
                                            document.getElementById({{$o}}).submit();"> <==== </a></td>
                            
                            <form id="{{$o}}" action="{{ route('gestion_deliberation.delibinfos') }}" method="POST" class="d-none">
                                @csrf
                                    <input hidden type="text" name="id" value="{{$deliberation->id}}">
                            </form>
                            <?php  foreach ($annees as $annee) {if($annee->id == $deliberation->yearId){ $m = $annee -> name; }} 
                            ?> 
                            <td><p>{{$m}}</p></td>
                            <?php  foreach ($filieres as $filiere) {if($filiere->id == $deliberation->fieldId){ $m = $filiere -> systemName; }} 
                            ?> 
                            <td><p>{{$m}}</p></td>
                            <?php  foreach ($groupes as $groupe) {if($groupe->id == $deliberation->groupId){ $m = $groupe -> name; }} 
                            ?> 
                            <td><p>{{$m}}</p></td>
                            <td class="ro">
                                <a  class="deliberation" data-link code='1'></a>

                                <div style="background-image:asset('images/deliberation/pdf.jpg')" class="box" link = "1">

                                    <ul>
                                        <li><a class="btn_bt" href=""
                                            onclick="event.preventDefault();
                                            document.getElementById({{$a}}).submit();"> Voir </a> <i class='bx bx-window-open'></i></li>
                                            <form id="{{$a}}" action="{{ route('gestion_deliberation.voir') }}" method="POST" class="d-none">
                                                @csrf
                                                <input type="text" name="path" value="{{$deliberation->revealTicket}}">
                                            </form>
                                        <li><a class="btn_bt" href=""
                                            onclick="event.preventDefault();
                                            document.getElementById({{$i}}).submit();">Télécharger</a>  <i class='bx bx-download'></i>
                                            <form id="{{$i}}" action="{{ route('gestion_deliberation.download') }}" method="POST" class="d-none">
                                                @csrf
                                                <input type="text" name="path" value="{{$deliberation->revealTicket}}">
                                            </form>
                                    
                                        </ul>
                                    </div>
                                </td>
                                <td><p>{{ $deliberation->end }}</p></td>
                        </tr>
                        <?php } ?>
                        
                        </tbody>
                    </table>

                    @if($deliberations->isEmpty()) 
                            <div class="my_jumbotron">
                                <h3 class="text-center">Aucune délibération trouvée!
                                <h3>
                            </div>
                        @endif
                        

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

            list[i].addEventListener('mouseover' , (e)=> {

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