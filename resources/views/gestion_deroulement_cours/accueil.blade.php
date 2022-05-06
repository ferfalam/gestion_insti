@extends('gestion_deroulement_cours.layout')

@section('title') Accueil @endsection

@section('style_for_file_point')
    <style>
        #content-wrapper h2 {
            padding-top: 12px;
        }

        .description {
            font-size:20px;
        }
    </style>

@endsection

@section('main')

        <div class="d-flex flex-column" id="content-wrapper">

                <br>
                <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong>Déroulement des Cours </strong></h2>
                
                <div class = "description">
                            <p>
                                Enregistrez ici les données relatives au déroulement des cours, permettant de produire
                                une version numérique des cahiers de textes suite aux fiches de déroulement remplies.
                            </p>

                                {{-- {!!  $number = rand(0,3) !!}

                                <br>
                                
                                @if($number == 0 )
                                    <p> Aucune fiche Créée </p>                     
                                @else
                                        Get All {{ Str::plural('Fiche',$number) }} {{ Str::plural('crée', $number) }}
                                @endif --}}
                                    
                            
                            <ul>

                                <li> <a href="{{ route('gestion_deroulement_cours.formulaire_Deroulement_Cours') }}"> Créer une Fiche du déroulement des Cours</a> </li>

                                <li> <a href="{{ route('gestion_deroulement_cours.showFiche') }}"> Fiche du déroulement de cours Disponible </a> </li>
                                
                                <li> <a href="{{ route('gestion_deroulement_cours.retraitFicheEtudiant') }}"> Retirer Fiche Etudiant pour une UE  </a> </li>

<<<<<<< HEAD
                                <li> <a href="{{ route('gestion_deroulement_cours.RetraitFicheEnseignantGlobal') }}"> Retirer Fiche Enseignant Global </a> </li>
                
                                <li> <a href="{{ route('gestion_deroulement_cours.newGroup') }}"> Integrer un nouveau Groupe Pedagogique  </a> </li>

                                <li> <a href="{{ route('gestion_deroulement_cours.newField') }}"> Integrer une nouvelle Filiere </a> </li>

                                <li> <a href="{{ route('gestion_deroulement_cours.newGenerals') }}"> Integrer un Module de type General </a> </li>
=======
                                <li> <a href="{{ route('gestion_deroulement_cours.RetraitFicheEnseignantGlobal') }}"> Retirer fiche Enseignant Global </a> </li>
>>>>>>> generalityClone


                            </ul>

                           

                    </div>
                
                
        </div>

        
@endsection