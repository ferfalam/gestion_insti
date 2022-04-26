@extends('gestion_deroulement_cours.layout')

@section('title') Groupe Pedagogique @endsection

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

            @if ( count($groupPedagogique) == 0)
                <label> <strong> Aucun Groupe Pedagogique Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des Groupes Pedagogiques existants </strong> </label> <br>
        
                @foreach($groupPedagogique as $grpPedag)
                    <div class="row">
                        <ul>
                            <li> {!! $grpPedag->name!!} - {!! $grpPedag->fieldId !!} </li> 
                            <a href="{{ route('gestion_deroulement_cours.deleteGroup', ['id'=>$grpPedag->id]) }}"> Supprimer </a>
                            <a href="{{ route('gestion_deroulement_cours.groupById', ['id'=>$grpPedag->id]) }}"> Mettre à jour </a>
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection