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



    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des demandes de reclamation et d'evaluation</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de gestion des demandes
                            de reclamation et d'evaluation de l'insti.</p>
                        <a href="{{ route('gestion_demandes_reclamation_evaluation.dashboard_etudiant') }}" class="btn btn-primary w-25" style="float: right" ><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <div class="col-md-4 mb-2">
=======
            <div class="col-md-4 mb-2"">
>>>>>>> 99e07aa (start with generality setting)
                <div class="card">
                    <div class="card-header">Gestion des salles et emploi du temps</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de gestion de salle de classe et des
                            emploi du temps de l'insti.</p>
                        <a href="{{ route('gestion_salle.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des enseignants et Mission d'enseignement</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de gestion des enseignants et des
                            Missions d'enseignement de l'insti.</p>
                        <a href="{{ route('gestion_enseignant.show') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion d'Authentification des Attestations et Classement</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion d'Authentification des Attestations et Classement de l'insti.</p>
                        <a href="{{ route('gestion_authClass.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des entreprises de stage</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des entreprises de stage de l'insti.</p>
                        <a href="{{ route('gestion_entreprises_stage.dashboard') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion du déroulement des cours</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des déroulement de cours à l'insti.</p>
                        <a href="{{ route('gestion_deroulement_cours.accueil') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des conseils de discipline et plaintes</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des conseils de discipline et plaintes de l'insti.</p>
                        <a href="{{ route('gestion_conseils_plaintes.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des conseils pédagogique et département</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des conseils pédagogique et département de l'insti.</p>
                        <a href="{{ route('gestion_conseil_pedagogique.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des fiches et rapports de Délibération</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des fiches et rapports de Délibération de l'insti.</p>
                        <a href="{{ route('gestion_deliberation.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">Gestion des TFE</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de Gestion des travaux de fin d'étude de l'insti.</p>
                        <a href="{{ route('gestion_tfe.welcome') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
