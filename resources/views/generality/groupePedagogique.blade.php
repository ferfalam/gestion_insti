@extends('layouts.app')

@section('style')
    <style>
        .row a{
            color:white;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false"> <a href="{{ route('newField') }}"> Filière </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"> <a href="{{ route('newGroup') }}"> Groupe Pédagogique </a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="{{ route('newGenerals') }}">General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newStudents') }}"> Enregistrer les etudiants </a> </button>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div style="padding-right:70px; padding-left:20px;" class="col-xs-9 col-xs">

                <form data-bs-hover-animate="pulse" method="post" action="{{ route('generality.saveNewGroup') }}" novalidate>
                    {{ csrf_field() }}

                    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Nouveau Groupe Pedagogique </strong></h2>

                        <div class="form-group" >
                            <label for="dsgn"> Designation </label> <br>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="nameGP" required="">
                                    {!! $errors->first('designation', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>

                        {{--  Start insert id field  --}}


                        <div class="form-group">
                            <div class="form-row">

                                <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;"> Filière Associee </label>
                                    <select class="form-control" name="filiere" required="">
                                            <optgroup label="Filière">
                                                @foreach(DB::table("fields")->get() as $one_filiere)
                                                    <option value='{{$one_filiere->id}}' selected=''> {{ $one_filiere->name }} </option>
                                                @endforeach
                                            </optgroup>
                                    </select>
                                    {!! $errors->first('filiere', '<span class="error"> :message </span>') !!}
                                </div>

                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;"> Annee Academique </label>
                                    <select class="form-control" name="academicYear" required="">
                                        <optgroup label="Annee Academique">
                                            @foreach(DB::table("academic_years")->get() as $academicYear)
                                                <option value='{{$academicYear->id}}' selected=''> {{ $academicYear->name }} </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    {!! $errors->first('Annee Academique', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;"> Annee D'etude </label>
                                    <select class="form-control" name="anneeStudy" required="">
                                        <optgroup label="Study year">
                                            @foreach(DB::table("generals")->get() as $studyYear)
                                                <option value='{{$studyYear->id}}' selected=''> {{ $studyYear->name }} </option>
                                            @endforeach
                                        </optgroup>

                                    </select>
                                    {!! $errors->first('annee d\'etude', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>


                        {{-- End insert id domain generate --}}

                        <div class="form-group">
                            <label style="font-weight: normal;"> Description </label>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="description" required="">
                                    {!! $errors->first('description', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <a style="float : right">
                                <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Envoyer">
                            </a>
                        </div>

                </form>

            </div>
            <div style="width: 40%;padding-top:40px;padding-left:20px;" class="col-xs-9 ">
                <div>
                    @if ( count($groupPedagogique) == 0)
                        <label> <strong> Aucun Groupe Pedagogique Enrégistrée </strong> </label> <br>
                    @else
                        <label> <strong> Liste des Groupes Pedagogiques existants </strong> </label> <br>

                        @foreach($groupPedagogique as $grpPedag)
                            <div class="row">
                                <ul>
                                    <li> {!! $grpPedag->name!!} - {!! $grpPedag->fieldId !!} </li>
                                    <button class="btn btn-primary"> <a href="{{ route('groupById', ['id'=>$grpPedag->id]) }}"> Mettre à jour </a> </button>
                                    <button class="btn btn-danger"> <a href="{{ route('deleteGroup', ['id'=>$grpPedag->id]) }}"> Supprimer </a> </button>
                                </ul>
                            </div>
                        @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
