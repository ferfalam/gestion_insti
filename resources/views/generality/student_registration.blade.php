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
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <a href="{{ route('newGroup') }}"> Groupe Pédagogique </a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="{{ route('newGenerals') }}">General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true"> <a href="{{ route('newStudents') }}"> Enregistrer les etudiants </a> </button>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div style="padding-right:70px; padding-left:20px;" class="col-xs-9 col-xs">

                <form data-bs-hover-animate="pulse" method="post" action="{{ route('generality.saveNewStudent') }}" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}

                    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Enregistrer les etudiants </strong></h2>

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

                                <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;"> Groupe Pedagogique</label>
                                    <select class="form-control" name="pedagogic_group" required="">
                                            <optgroup label="Groupe pedagogique">
                                                @foreach(DB::table("pedagogic_groups")->get() as $pedagogic_group)
                                                    <option value='{{$pedagogic_group->id}}' selected=''> {{ $pedagogic_group->name }} </option>
                                                @endforeach
                                            </optgroup>
                                    </select>
                                    {!! $errors->first('pedagogic_group', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>

                            <div class="element_">
                                <label for="document">Document preuve</label>
                                <div class="sous_section">
                                    <input type="file" name="document" id="document" class="form-control-file @error('document') is-invalid @enderror" value="{{ old('document') }}" style="padding-top: 5px;">
                                </div>
                            </div>

                            @error('document')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror


                            <div class="element_btn">
                                <input type="submit" value="Enregistrer" class="btn btn-primary">
                            </div>

                        </div>

                </form>

            </div>
            <div style="width: 40%;padding-top:40px;padding-left:20px;" class="col-xs-9 ">
                <div>
                    @if ( count($student_infos) == 0)
                        <label> <strong> Aucun Groupe Pedagogique Enrégistrée </strong> </label> <br>
                    @else
                        <label> <strong> Liste des Groupes Pedagogiques existants </strong> </label> <br>

                        @foreach($student_infos as $student_info)
                            <div class="row">
                                <ul>
                                    <li> {!! $student_info->first_name!!} - {!! $student_info->last_name!!} - {!! $student_info->matricule!!} </li>

                                </ul>
                            </div>
                        @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
