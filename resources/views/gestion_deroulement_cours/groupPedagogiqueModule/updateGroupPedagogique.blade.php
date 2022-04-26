@extends('gestion_deroulement_cours.layout')

@section('title') Groupe Pedagogique À Mettre À Jour @endsection

@section('style_for_file_point')
    <style>
        .form-control
        {
            text-align : center ;
        }

        .description{
            margin : 2%;
            padding : 1%;
        }
        table{
            border-collapse: collapse;
        }
        td, th{
            border : 2px solid #e3e6f0;
        }
        .retourAccueil{
            padding-left : 70px ;
        }
        .error{
            font-size : 17px;
            color:rgb(204, 75, 75);
            font-style: italic;
        }
        </style>
@endsection

@section('main')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content"><div class="register-photo">
        <div class="form-container shadow">

            <form data-bs-hover-animate="pulse" method="post" action="{{ route('gestion_deroulement_cours.updateGroup',['id' => $flight->id]) }}" novalidate>
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

        </div>
        <br>
        <li class="retourAccueil" >  <a href="{{ route('gestion_deroulement_cours.accueil') }}"> Annuler </a></li>
        
        
    @if(isset($message))
        <script>
            toastr.success("{{$message}}", 'Succès')
        </script>
    @endif

@endsection