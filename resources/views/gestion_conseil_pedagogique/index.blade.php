@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')
    <div class="row">
        @foreach ($conseils as $conseil)
            <div class="col-lg-12 col-xl-6">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary font-weight-bold m-0">{{$conseil->objet}}  </h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                            <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="opacity: 1;">
                            <h1 style="font-size: 20px;color: #280456;font-weight: 400;">
                                Thème: {{$conseil->theme}}
                            </h1>
                            <em style="color: rgb(100,74,133);">Date de tenu:{{$conseil->date_tenu}}, Signataire: {{$conseil->signataire}} </em>
                            <div><a href="{{route("gestion_conseil_pedagogique.view_new",["id"=>$conseil->id])}}" style="border-bottom-width: 1px;border-bottom-style: solid;">Consulter</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
    
