@extends('layouts.app')

@section('style')
    <style>

        .row a{
            color:white;
            text-decoration: none;
        }

    </style>
@endsection

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> <a href="{{ route('newField') }}"> Filière </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <a href="{{ route('newGroup') }}"> Groupe Pédagogique </a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="{{ route('newGenerals') }}">General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div style="padding-right:80px; padding-left:20px;" class="col-xs-9 col-xs">
                <form data-bs-hover-animate="pulse" method="post" action="{{ route('saveNewField') }}" novalidate>
                    {{ csrf_field() }}
    
                    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Nouvelle Filiere </strong></h2>
    
                    <div class="form-group">
    
                        @if ( count($filieres) == 0)
                            <label for="fields"> <strong> Aucune filiere enrégistrée </strong> </label> <br>
                        @else
                            <label for="fields"> <strong> Liste des Filieres existantes </strong> </label> <br>
    
                            <select class="form-control" id="fields" name="filiere" required="" onChange='ajout_input(this.form)'>
                                <optgroup label="Filière">
                                    @foreach($filieres as $one_filiere)
                                        <option>
                                            {!!$one_filiere->name!!}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        @endif
                    </div>
    
    
                        <div class="form-group" >
                            <label for="dsgn"> Appelation </label> <br>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="appelation" required="">
                                    {!! $errors->first('appelation', '<span class="error"> :message </span>') !!}
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
    
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="abrv"> Abreviation </label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="abrv" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="abreviation" required="">
                                            {!! $errors->first('abreviation', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <label style="font-weight: normal;"> Description </label>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="description" required="">
                                    {!! $errors->first('description', '<span class="error"> :message </span>') !!}
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
                    @if ( count($filieres) == 0)
                    <label> <strong> Aucune Filiere Enrégistrée </strong> </label> <br>
                @else
                    <label> <strong> Liste des Filieres existantes </strong> </label> <br>
            
                    @foreach($filieres as $one_filiere)
                        <div class="row">
                            <ul>
                                <li>  {!! $one_filiere->systemName !!} - {!! $one_filiere->name!!} </li> 
                                <button class="btn btn-primary"> <a href="{{ route('fieldById', ['id'=>$one_filiere->id]) }}"> Mettre à jour </a> </button>
                                <button class="btn btn-danger"> <a href="{{ route('deleteField', ['id'=>$one_filiere->id]) }}"> Supprimer </a> </button>
                            </ul>
                        </div>
                    @endforeach   
                @endif
                </div>
            </div>
        </div>
    </div>
    

@endsection
