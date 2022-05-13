<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">1+</span><i class="fas fa-bell fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                         role="menu">
                        <h6 class="dropdown-header">Centre de notification</h6>
                        <a class="d-flex align-items-center dropdown-item" href="#">
                            <div class="mr-3">
                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                            </div>
                            <div><span class="small text-gray-500">Date d'envoie</span>
                                <p>Une notification</p>
                            </div>
                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Voir tous les notifications&nbsp;</a></div>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"> {{$username}} <i class="fa fa-user border rounded" style="padding: 11px;font-size: 16px;"></i></span></a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="{{route('gestion_entreprises_stage.profile')}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profil</a><a class="dropdown-item disabled" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{route('gestion_entreprises_stage.logout')}}">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <a class="dropdown-item" role="presentation" href="{{route('gestion_entreprises_stage.logout')}}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Déconnexion</a>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
