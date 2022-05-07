@extends('gestion_deroulement_cours.layout')

@section('title') Fiches Deroulement Cours Par UE @endsection

@section('style_for_file_point')
    <style>
        
        label{
            margin : 2%;
            padding : 1%;
        }

        .row a {
            color: white;
            text-decoration: none;
        }

        .row ul li {
            color : black;
        }
       
        </style>
@endsection

@section('main')


<br> <br> <br>
<div class="form-container shadow">
   
        <div class="form-group">

            @if ( count($fichesDeroulementCours) == 0)
                <label> <strong> Aucune Fiche Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des Fiches existantes Par UEs </strong> </label> <br>
        
                @foreach ($ues as $ue)
                    <div class="row">
                        <ul>
                            <li> {{ $ue->name }} - {{ $ue->abbreviation }} </li>
                            <button class="btn btn-primary"> <a href="{{ route('gestion_deroulement_cours.showFicheUe', ['id'=>$ue->id]) }}"> Afficher </button>
                            <button class="btn btn-success"> <a href="{{ route('gestion_deroulement_cours.downloadFiche', ['id'=>$ue->id]) }}"> Telecharger </button>   
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection