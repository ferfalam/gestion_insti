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
    
        }
    </style>
@endsection

@section('main')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content"><div class="register-photo">
        <div class="form-container shadow">

            <form data-bs-hover-animate="pulse" method="post" action="{{ route('gestion_deroulement_cours.saveFicheEtudiant') }}" novalidate>
                {{ csrf_field() }}
                
                <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> Fiche de Déroulement des Cours </strong></h2>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><input class="form-control" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="surname" placeholder="Nom" required=""></div>
                        <div class="col"><input class="form-control" type="text" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="name" placeholder="Prenoms" required=""></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label style="font-weight: normal;"> Année d'Etude </label>
                            <select required="" class="form-control" name="yearstudy">
                                <optgroup label="Année_Etude">

                                        @foreach($annee_detude as $anne_etude)
                                            <option>
                                                {!!$anne_etude->appelation!!}
                                            </option>
                                        @endforeach

                                    </optgroup>
                            </select>   
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">   

                        <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;"> Filière </label>
                            <select class="form-control" name="filiere" required="">
                                    <optgroup label="Filière">

                                        @foreach($filieres as $one_filiere)
                                            <option>
                                                {!!$one_filiere->appelation!!}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                        </div>

                        <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;"> UE concerné </label>
                                <select class="form-control" name="ue" required="">
                                    <optgroup label="UE Concerné">

                                        @foreach($ues as $ue)
                                            <option>
                                                {!!$ue->appelation!!}
                                            </option>
                                        @endforeach

                                    </optgroup>
                                </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label style="font-weight: normal;"> Date de déroulement </label><input class="form-control" type="date" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="date" required=""></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label style="font-weight: normal;"> Temps de déroulement </label> </div>
                        <div class="col">
                        De
                            <input class="form-control" type="time" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="starttime" placeholder="De" required=""> <br>
                        A 
                            <input class="form-control" type="time" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="endtime" placeholder="A" required=""> 
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                            <label style="font-weight: normal;">Semestre concerné</label>
                            <select class="form-control" name="semester" required="">
                                <optgroup label="Semestre Concerné">

                                    @foreach($acad_semestre as $academique_semestre)
                                        <option>
                                            {!!$academique_semestre->designation!!}
                                        </option>
                                    @endforeach

                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label style="font-weight: normal;"> Observation </label><input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="date" required=""></div>
                    </div>
                </div>

                <div class="form-group">
                    <a style="float : right">
                        <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Envoyer">   
                    </a>
                </div>

            </form>

        </div>

        <br>
        <li class="retourAccueil" >  <a href="{{ route('gestion_deroulement_cours.accueil') }}"> Annuler </a></li>

@endsection