@extends('gestion_deroulement_cours.layout')

@section('title') Module UE @endsection

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

            @if ( count($ues) == 0)
                <label> <strong> Aucune UE Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des UEs existantes </strong> </label> <br>
        
                @foreach($ues as $ue)
                    <div class="row">
                        <ul>
                            <li>  {!! $ue->name !!} - {!! $ue->abbreviation!!} </li> 
                            <a href="{{ route('gestion_deroulement_cours.deleteUe', ['id'=>$ue->id]) }}"> Supprimer </a>
                            <a href="{{ route('gestion_deroulement_cours.ueById', ['id'=>$ue->id]) }}"> Mettre à jour </a>
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection