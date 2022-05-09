<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="col-lg-4">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3"><span>INSTI TFE</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('gestion_tfe.welcome') }}"><i class="fas fa-user-circle"></i><span>{{ __("Liste des TFE") }}</span></a>
                </li>
                @if(has_tfe()==null)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('gestion_tfe.tfe.create') }}"><i class="fas fa-user-circle"></i><span>{{ __("Soumettre un TFE") }}</span></a>
                </li>
                @else
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ route('gestion_tfe.tfe.show', has_tfe()->id) }}"><i class="fas fa-user-circle"></i><span>{{ __("Mon tfe") }}</span></a>
                </li>
                @endif
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </div> 
</nav>
