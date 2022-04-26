@extends('gestion_deroulement_cours.layout')

@section('title') Module General @endsection

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

            @if ( count($generals) == 0)
                <label> <strong> Aucun Module General Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des Modules de type General existants </strong> </label> <br>
        
                @foreach($generals as $one_module_general)
                    <div class="row">
                        <ul>
                            <li>  {!! $one_module_general->systemName !!} - {!! $one_module_general->name!!} </li> 
                            <a href="{{ route('gestion_deroulement_cours.deleteGeneral', ['id'=>$one_module_general->id]) }}"> Supprimer </a>
                            <a href="{{ route('gestion_deroulement_cours.generalById', ['id'=>$one_module_general->id]) }}"> Mettre à jour </a>
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection