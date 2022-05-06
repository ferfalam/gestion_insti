@extends('layouts.app')

@section('style')
    <style>
        .card{
            height : 100%
        }

        .card-body a{
            float: right;
            position: absolute;
            right: 10px;
            bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false"> <a href="{{ route('newField') }}"> Filière </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <a href="{{ route('newGroup') }}"> Groupe Pédagogique </a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Année Académique</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true"> <a href="{{ route('newGenerals') }}"> General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div style="padding-right:70px; padding-left:20px;" class="col-xs-9 col-xs">
                
                <form data-bs-hover-animate="pulse" method="post" action="{{ route('saveNewGenerals') }}" novalidate>
                    {{ csrf_field() }} 
                    
                    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Nouveau Module General </strong></h2>    
                    
                        <div class="form-group" >
                            <label for="dsgn"> Appelation </label> <br>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="name" required="">
                                    {!! $errors->first('name', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="name_sys"> Nom Systeme </label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="name_sys" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="nameSys" required="">
                                            {!! $errors->first('nameSys', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="form-row">   
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="abrv"> Type du Contenu </label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="abrv" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="contentType" required="">
                                            {!! $errors->first('contentType', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="abrv"> Contenu_Tag </label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="abrv" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="contentTag" required="">
                                            {!! $errors->first('contentTag', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <a style="float : right">
                                <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Envoyer">   
                            </a>
                        </div>
                  
                </form>
    
            </div>
            <div style="width: 40%;padding-top:40px;padding-left:20px;" class="col-xs-9 ">
                <div>
                    @if ( count($generals) == 0)
                        <label> <strong> Aucun Module General Enrégistrée </strong> </label> <br>
                    @else
                        <label> <strong> Liste des Modules de type General existants </strong> </label> <br>
                
                        @foreach($generals as $one_module_general)
                            <div class="row">
                                <ul>
                                    <li>  {!! $one_module_general->systemName !!} - {!! $one_module_general->name!!} </li> 
                                    <a href="{{ route('deleteGeneral', ['id'=>$one_module_general->id]) }}"> Supprimer </a>
                                    <a href="{{ route('generalById', ['id'=>$one_module_general->id]) }}"> Mettre à jour </a>
                                </ul>
                            </div>
                        @endforeach
                            
                    @endif  
                
                </div>
            </div>
        </div>
    </div>
    

@endsection
