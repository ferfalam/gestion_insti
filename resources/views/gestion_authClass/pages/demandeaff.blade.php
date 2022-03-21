@extends('gestion_authClass.layout')

@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row" style="margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="col-6 col-md-4">
                            <p>Nom : <span>{{$demande->name_d}}</span></p>
                            <p>Prenom : <span>Ali</span></p>
                            <p>Entite : <span>{{$demande->entite}}</span></p>
                        </div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4">Lokossa, le 10 Janvier 2021</div>
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
                        <div class="col-6 col-md-4"><p>Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop</p></div>
                    </div>

                    <div class="row" style="margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="col-6 col-md-4 "><p>Objet: <span>{{$demande->objet}}</span></p></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"><p></p></div>
                    </div>


                    <!-- Columns are always 50% wide, on mobile and desktop -->
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-8">Monsieur le Directeur,</div>
                    </div>

                    <div class="row" style="text-align: justify; margin-left: 50px; margin-right: 50px; margin-bottom: 40px">
                        <div class="" ><p>{{$demande->redaction}}Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p></div>
                    </div>
                    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                    <div class="row">
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4"></div>
                        <div class="col-6 col-md-4">Signature <p>{{$demande->name_d}}</p></div>

                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="margin-top: 30px"><a href="{{route('gestion_authClass.medit',$demande->id)}}">Modifier</a></button>
        </div>
    </div>

@endsection
