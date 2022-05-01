@extends('gestion_enseignants.layout')
@section('content')

    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #4e73df;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gestion_enseignant.show_programme') }}"><i class="fas fa-table"></i><span>Programme</span></a>
                        <a class="nav-link" href="{{ route('gestion_enseignant.show_mission') }}"><i class="fas fa-table"></i><span>Mission</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gestion_enseignant.show_profil') }}"><i class="fas fa-user"></i>Profil</a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        @include('gestion_enseignants.navbar')
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Mission d'enseignement</h3>
                    <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
                        <div class="card-body"><div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
    <table class="table dataTable my-0" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">Qualité</th>
                <th class="text-center">Adresse Compléte</th>
                <th class="text-center">Date de Naissance</th>
                <th class="text-center">Nationalité</th>
                <th class="text-center">Matricule et / ou IFU</th>
                <th class="text-center">Indice et Grafe</th>
                <th class="text-center">Intitulé de UE</th>
                <th class="text-center">Groupe pedagogique</th>
                <th class="text-center">Année Academique</th>
                <th class="text-center">Nombre d&#39;heure de L&#39;UE (de la Mission)</th>
                <th class="text-center">Durée de la mission</th>
                <th class="text-center">Date et jour d&#39;arrivé</th>
                <th class="text-center">Date et jour de retour</th>
            </tr>
        </thead>
        <tbody>
            @isset($table)
            @foreach ($table as $table)
                <tr>
                    <td class="text-center">{{ $table->qualite }}</td>
                    <td class="text-center">{{ $table->adressse }}</td>
                    <td class="text-center">{{ $table->date_naissance }}</td>
                    <td class="text-center">{{ $table->nationalite }}</td>
                    <td class="text-center">{{ $table->maticule }}</td>
                    <td class="text-center">{{ $table->grade }}</td>
                    <td class="text-center">{{ $table->ue }}</td>
                    <td class="text-center">{{ $table->pedagogicGroup }}</td>
                    <td class="text-center">{{ $table->academicYear }}</td>
                    <td class="text-center">{{ $table->missionHeure }}</td>
                    <td class="text-center">{{ $table->missionDuree." semaines" }}</td>
                    <td class="text-center">{{ $table->startDate }}</td>
                    <td class="text-center">{{ $table->endDate }}</td>
                </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
</div></div>
                        <div id="btn-Exporter"><a class="btn btn-primary btn-sm" role="button" id="exporterPdf" name="exporterPdf" href="{{ route('gestion_enseignant.mission_pdf') }}">Exporter PDF</a></div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
@endsection
