@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-xl-10 offset-xl-1 d-block">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">&nbsp;Conseil de département GC le 15/10/2021</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-block">
                    <div>
                        <h1 style="font-size: 20px;color: #280456;font-weight: 400;">Thème: {{$input["theme"]}}</h1>
                        <em style="color: rgb(100,74,133);">Date de tenu:&nbsp; {{$input["date_tenu"]}}, Signataire:&nbsp; {{$input["signataire"] }}&nbsp;&nbsp;</em>
                    </div>
                    <div style="margin-top: 18px;">
                        <h5 style="color: #280456;">Objet du conseil&nbsp;</h5>
                        <p style="color: rgb(100,74,133);">
                            {{$input["description"]}}
                        </p>

                    </div>
                    <div>
                        <a class="card-link" href="{{Storage::url($input["note_service"])}}">la note de service&nbsp;<i class="fa fa-star"></i></a>
                        <a class="card-link" href="{{Storage::url($input["liste_participants"])}}">Les listes des invités<i class="fa fa-star"></i></a>
                        <div class="d-lg-flex justify-content-lg-end">
                            <a class="btn btn-primary" role="button" style="margin-right: 10px;color: rgb(255, 255, 255);background: rgb(149,169,230);" href="javascript:history.back()">Modifier</a>
                            <a class="btn btn-primary" role="button" href="{{route("gestion_conseil_pedagogique.vaidate_program")}}">Valider</a>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    
@endsection