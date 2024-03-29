<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #4e73df;">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('home') }}">
            <div class="sidebar-brand-icon"><i class="fas fa-school"></i></div>
            <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_enseignant.show_programme') }}"><i class="fas fa-table"></i><span>Programme</span></a>
                <a class="nav-link" href="{{ route('gestion_enseignant.show_mission') }}"><i class="fas fa-table"></i><span>Mission</span></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link active" href="{{ route('gestion_enseignant.show') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                        <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                    </svg><span>&nbsp;Programmer Cours</span>
                    </a>
                    <a class="nav-link" href="{{ route('gestion_enseignant.show_programmerMission') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                        <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                        </svg><span>&nbsp;Programmer Mission</span>
                    </a>
                    <a class="nav-link" href="{{ route('gestion_enseignant.show_prof') }}"><i class="material-icons">add_box</i><span>Inscrire Enseignants</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('gestion_enseignant.show_profil') }}"><i class="fas fa-user"></i>Profil</a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>