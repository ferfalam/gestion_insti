@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-2">
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
        </div>
    </div>
@endsection
