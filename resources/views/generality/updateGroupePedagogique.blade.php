@extends('layouts.app')

@section('style')
    <style>
        .card{
            height : 100%
        }

        .card-body a{
            float: right;
            position: absolute;
            right: 10px;
            bottom: 10px;
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
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Année Académique</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="{{ route('newGenerals') }}">General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
    </ul>

    <div class="container">

        <form data-bs-hover-animate="pulse" method="post" action="{{ route('updateGroup',['id' => $flight->id]) }}" novalidate>
            {{ csrf_field() }} 

            <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Mettre À Jour un Nouveau Groupe Pedagogique </strong></h2>
                    
                <div class="form-group" >
                    <label for="dsgn"> Designation </label> <br>
                    <div class="form-row">
                        <div class="col">
                            <input class="form-control" placeholder="{{ $flight->name }}" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="nameGP" required="">
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
                                            <option value='{{$one_filiere->id }}' selected=''> {{ $one_filiere->name }} </option>
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
                            <input class="form-control" placeholder="{{ $flight->description }}" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="description" required="">
                            {!! $errors->first('description', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <a style="float : right">
                        <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Valider">   
                    </a>
                </div>
          
        </form>

                <br>
                <li class="retourAccueil" >  <a href="{{ route('newGroup') }}"> Annuler </a></li>
        
               
            
    </div>
    @if(isset($message))
        <script>
            toastr.success("{{$message}}", 'Succès')
        </script>
    @endif
@endsection