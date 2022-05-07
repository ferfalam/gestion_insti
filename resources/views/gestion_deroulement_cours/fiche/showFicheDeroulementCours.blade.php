@extends('gestion_deroulement_cours.layout')

@section('title') Fiches Deroulement Cours @endsection

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
       
        </style>
@endsection

@section('main')


<br> <br> <br>
<div class="form-container shadow">
   
        <div class="form-group">

            @if ( count($fichesDeroulementCours) == 0)
                <label> <strong> Aucune Fiche Enrégistrée </strong> </label> <br>
            @else
                <label> <strong> Liste des Fiches existantes </strong> </label> <br>
        
                {{-- @foreach(DB::table("academic_semesters")->get() as $acad_semestre)
                    <option value='{{$acad_semestre->id}}' selected=''> {{ $acad_semestre->designation }} </option>
                @endforeach --}}

                @foreach($fichesDeroulementCours as $one_fiche)
                    <div class="row">
                        <ul>
                            <li>  {!! $one_fiche->surname !!} - {!! $one_fiche->name!!} </li> 
                            <button class="btn btn-primary"> <a href="{{ route('gestion_deroulement_cours.ficheById', ['id'=>$one_fiche->id]) }}"> Mettre à jour </a> </button>
                            <button class="btn btn-danger"> <a href="{{ route('gestion_deroulement_cours.deleteFiche', ['id'=>$one_fiche->id]) }}"> Supprimer </a> </button>
                        </ul>
                    </div>
                @endforeach
                    
            @endif
        </div>

</div>

@endsection