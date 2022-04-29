@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-xl-10 offset-xl-1 d-block">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">Conseil de département GC le 15/10/2021</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-block">
                    <div style="opacity: 1;">
                        <h1 style="font-size: 20px;color: #280456;font-weight: 400;">
                            <u>Thème:</u>  {{$conseil->theme}}
                        </h1>
                        <em style="color: rgb(100,74,133);">Date de tenu: {{$conseil->date_tenu}}, Signataire: {{$conseil->signataire}}</em>
                    </div>
                    <div style="margin-top: 18px;">
                        <h5 style="color: #280456;">Objet du conseil</h5>
                        <p style="color: rgb(100,74,133);">
                        <p>{{$conseil->description}}</p>
                        </div>
                            <a class="card-link" href="{{ Storage::url($conseil->note_service) }}">
                                la note de service<i class="fa fa-star"></i>
                            </a>
                            <a class="card-link" href="{{ Storage::url($conseil->liste_participants) }}">
                                Les listes des invités<i class="fa fa-star"></i>
                            </a>
                    <div class="d-lg-flex justify-content-lg-end">
                        <form action="{{route("gestion_conseil_pedagogique.report")}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$conseil->id}}">
                            <button class="btn btn-primary d-lg-flex"  style="margin-right: 10px;" h>
                                Effectuer le rapport
                            </button>
                        </form>
                        <form action="{{route("gestion_conseil_pedagogique.delete_council")}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$conseil->id}}">
                            <button class="btn btn-primary d-lg-flex"  style="margin-right: 10px;" h>
                                Annuler
                            </button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection