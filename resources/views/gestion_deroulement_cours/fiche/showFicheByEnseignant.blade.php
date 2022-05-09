@extends('gestion_deroulement_cours.layout')

@section('title') Fiches Deroulement Cours Par Enseignant @endsection

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

            @if ( count($enseignants) == 0)
                <label> <strong> Aucune Fiche Existantes </strong> </label> <br>
            @else
                <label> <strong> Liste des Fiches existantes Par Enseignants </strong> </label> <br>
        
                @foreach ($enseignants as $enseignant)
                    <div class="row">
                        <ul>
                            <li> {{ $enseignant->nomEnseignant }} - {{ $enseignant->nomUe }} </li>
                            <button class="btn btn-primary"> <a href="{{ route('gestion_deroulement_cours.showFicheEnseignant', ['id'=>$enseignant->id]) }}"> Afficher </button>
                            <button class="btn btn-success"> <a href="{{ route('gestion_deroulement_cours.downloadFicheEnseignant', ['id'=>$enseignant->id]) }}"> Telecharger </button>   
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection