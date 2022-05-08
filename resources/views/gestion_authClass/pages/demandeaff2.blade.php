@extends('gestion_authClass.layout')

@section('main')
<div class="container-fluid">
       
    <div class="card shadow mb-4">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row" style="margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="col-6 col-md-4">
                            <p>Nom : <span>{{$demande->name_d}}</span></p>
                            <p>Entite : <span>{{$demande->entite}}</span></p>
                            <p>Email : <span>{{$demande->email}}</span></p>
                            <p>Contact : <span>{{$demande->contact}}</span></p>
                        </div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4">{{$demande->created_at}}</div>
                    </div>


                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row">
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4 font-weight-bold" >A</div>
                    </div>

                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row" style=" margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"><p>{{$demande->recipient}} de l'INSTI Lokossa</p></div>
                    </div>

                    <div class="row" style="margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="col-6 col-md-4 "><p>Objet: <span>{{$demande->objet}}</span></p></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"><p></p></div>
                    </div>


                    <!-- Columns are always 50% wide, on mobile and desktop -->
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-8">{{$demande->recipient}},</div>
                    </div>

                    <div class="row" style="text-align: justify; margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="" ><p>{{$demande->message}}</p></div>
                    </div>
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row">
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"><p>{{$demande->name_d}}</p></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    </div>
</div>

@if (Auth::user()->email !='admin@insti.com')
<button class="btn btn-primary" style="margin-top: 30px"><a href="{{route('gestion_authClass.medit',$demande->id)}}" style="color:white">Modifier</a></button>
@endif
@if (Auth::user()->email =='admin@insti.com')
<button class="btn btn-primary" style="margin-top: 30px"><a href="{{route('gestion_authClass.reponseDemande',$demande->id)}}" style="color:white">Repondre</a></button>
@endif   

@endsection
