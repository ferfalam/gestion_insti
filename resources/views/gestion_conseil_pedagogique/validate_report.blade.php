@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-10 offset-xl-1 d-block">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">&nbsp;Rapport du conseil&nbsp;</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-block">
                    <div>
                        <h1 style="font-size: 20px;color: #280456;font-weight: 400;">Rapport du {{$conseil->objet}} du {{$conseil->objet}}</h1><em style="color: rgb(100,74,133);">Date du rapport :&nbsp; 15 octobre 2021, Signataire:&nbsp; Mr. DOSSOU Toyigbe Maxime&nbsp;&nbsp;</em>
                    </div>
                    <div style="margin-top: 18px;">
                        <p style="color: rgb(100,74,133);">{{$conseil->rapport}}</p>
                    </div>
                    <a class="card-link" href="{{Storage::url( $conseil->fichier_rapport)}}">Le fichier de rapport<i class="fa fa-star"></i></a>
                    <a class="card-link" href="{{Storage::url( $conseil->liste_presence)}}">La liste de présence&nbsp;&nbsp;<i class="fa fa-star"></i></a>
                    <div class="d-lg-flex justify-content-lg-end">
                        
                        <form action="{{route("gestion_conseil_pedagogique.report")}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$conseil->id}}">
                            <button class="btn btn-primary">
                                Modifier
                            </button>
                        </form>
                        <form action="{{route("gestion_conseil_pedagogique.validate_report")}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$conseil->id}}">
                            <button class="btn btn-primary">
                                Valider
                            </button>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection