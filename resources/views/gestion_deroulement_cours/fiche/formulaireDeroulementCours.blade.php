@extends('gestion_deroulement_cours.layout')

@section('title') Déroulement_du_cours @endsection

@section('style_for_file_point')
    <style>
        .form-control
        {
            text-align : center ;
        }
        .retourAccueil{

            padding-left : 70px ;
            padding-bottom: 12px;
        }
        #content-wrapper h2{

            padding: 23px;
            margin-bottom: 12px;
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


            <form data-bs-hover-animate="pulse" method="post" action="{{ route('gestion_deroulement_cours.saveFiche') }}" novalidate>
                {{ csrf_field() }}

                <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> Fiche de Déroulement des Cours </strong></h2>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <input class="form-control" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="surname" placeholder="Nom" required="">
                            {!! $errors->first('surname', '<span class="error"> :message </span>') !!}
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="name" placeholder="Prenoms" required="">
                            {!! $errors->first('name', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label style="font-weight: normal;"> Année d'Etude </label>
                            <select required="" class="form-control" name="yearstudy">
                                <optgroup label="Année_Etude">
                                    @foreach(DB::table("academic_years")->get() as $annee_etude)
                                        <option value='{{$annee_etude->id}}' selected=''> {{ $annee_etude->name }} </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            {!! $errors->first('yearstudy', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">

                        <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;"> Filière </label>
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
                            <label style="font-weight: normal;"> UE concerné </label>
                            <select class="form-control" name="ue" required="">
                                <optgroup label="UE Concerné">
                                    @foreach(DB::table("ues")->get() as $ue)
                                        <option value='{{$ue->id}}' selected=''> {{ $ue->name }} </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            {!! $errors->first('ue', '<span class="error"> :message </span>') !!}
                        </div>

                        <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;"> Nature UE </label>
                            <select class="form-control" name="nature_ue" required="">
                                <optgroup label="Nature UE Concerné">
                                       <option value='1'> Decouverte </option>
                                       <option value='2'> Specialite </option>
                                       <option value='3'> Fondamentale </option>
                                       <option value='4'> Libre </option>
                                </optgroup>
                            </select>
                            {!! $errors->first('nature ue', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label style="font-weight: normal;"> Date de déroulement </label>
                            <input class="form-control" type="date" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="date" required="">
                            {!! $errors->first('date', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label style="font-weight: normal;"> Temps de déroulement </label> </div>
                        <div class="col">
                        De
                            <input class="form-control" type="time" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="starttime" placeholder="De" required=""> <br>
                            {!! $errors->first('starttime', '<span class="error"> :message </span>') !!}
                        A
                            <input class="form-control" type="time" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="endtime" placeholder="A" required="">
                            {!! $errors->first('endtime', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;">Semestre concerné</label>
                            <select class="form-control" name="semester" required="">
                                <optgroup label="Semestre Concerné">
                                    @foreach(DB::table("academic_semesters")->get() as $acad_semestre)
                                        <option value='{{$acad_semestre->id}}' selected=''> {{ $acad_semestre->designation }} </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            {!! $errors->first('semester', '<span class="error"> :message </span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label style="font-weight: normal;"> Observation </label>
                            <input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="observation" required="">
                            {!! $errors->first('observation', '<span class="error"> :message </span>') !!}
                        </div>
                        </div>
                </div>

                <div class="form-group">
                    <a style="float : right">
                        <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Envoyer">
                    </a>
                </div>

            </form>

            <br>
            <li class="retourAccueil" >  <a href="{{ route('gestion_deroulement_cours.accueil') }}"> Annuler </a></li>

        </div>

@endsection
