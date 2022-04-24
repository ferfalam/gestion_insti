@extends('gestion_deroulement_cours.layout')

@section('title') Filieres @endsection

@section('style_for_file_point')
    <style>
        
        label{
            margin : 2%;
            padding : 1%;
        }
       
        </style>
@endsection

@section('main')


<br> <br> <br>
<div class="form-container shadow">
   
        <div class="form-group">

            @if ( count($filieres) == 0)
                <label> <strong> Aucune Filiere Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des Filieres existantes </strong> </label> <br>
        
                @foreach($filieres as $one_filiere)
                    <div class="row">
                        <ul>
                            <li>  {!! $one_filiere->systemName !!} - {!! $one_filiere->name!!} </li> 
                            <a href="{{ route('gestion_deroulement_cours.deleteField', ['id'=>$one_filiere->id]) }}"> Supprimer </a>
                            <a href="{{ route('gestion_deroulement_cours.fieldById', ['id'=>$one_filiere->id]) }}"> Mettre à jour </a>
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection