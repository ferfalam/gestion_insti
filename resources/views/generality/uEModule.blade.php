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
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false"> <a href="{{ route('newField') }}"> Filière </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <a href="{{ route('newGroup') }}"> Groupe Pédagogique </a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="{{ route('newGenerals') }}">General </a> </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true"> <a href="{{ route('newUe') }}"> UE </a> </button>
        </li>
    </ul>

    <div class="container">
        <div class="row">
            <div style="padding-right:70px; padding-left:20px;" class="col-xs-9 col-xs">
                
                <form data-bs-hover-animate="pulse" method="post" action="{{ route('saveNewUe') }}" novalidate>
                    {{ csrf_field() }} 
                    
                    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Nouvelle UE </strong></h2>    
                    
                        <div class="form-group" >
                            <label for="dsgn"> Appelation </label> <br>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="name" required="">
                                    {!! $errors->first('name', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group" >
                            <label for="abbr"> Abbreviation </label> <br>
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" id="abbr" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="abbreviation" required="">
                                    {!! $errors->first('abbreviation', '<span class="error"> :message </span>') !!}
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="form-row">   
        
                                <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="code"> Code</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="code" type="number" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="code" required="">
                                            {!! $errors->first('code', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="ct"> CT </label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="ct" type="number" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="ct" required="">
                                            {!! $errors->first('ct', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="td"> TD</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="td" type="number" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="td" required="">
                                            {!! $errors->first('td', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;" id="tp"> TP</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" id="tp" type="number" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="tp" required="">
                                            {!! $errors->first('tp', '<span class="error"> :message </span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;"> General </label>
                                    <select class="form-control" name="generalId" required="">
                                        <optgroup label="general">
                                            @foreach(DB::table("generals")->get() as $generals)
                                                <option value='{{$generals->id}}' selected=''> {{ $generals->name }} -{{ $generals->content_tag }} </option>
                                            @endforeach
                                        </optgroup>
                                        
                                    </select>
                                    {!! $errors->first('general', '<span class="error"> :message </span>') !!}
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
                    @if ( count($ues) == 0)
                        <label> <strong> Aucune UE Enrégistrée </strong> </label> <br>
                    @else
                        <label> <strong> Liste des UEs existantes </strong> </label> <br>
                
                        @foreach($ues as $ue)
                            <div class="row">
                                <ul>
                                    <li>  {!! $ue->name !!} - {!! $ue->abbreviation!!} </li> 
                                    <button class="btn btn-primary"> <a href="{{ route('ueById', ['id'=>$ue->id]) }}"> Mettre à jour </a> </button>
                                    <button class="btn btn-danger"> <a href="{{ route('deleteUe', ['id'=>$ue->id]) }}"> Supprimer </a> </button>
                                </ul>
                            </div>
                        @endforeach
                            
                    @endif  
                
                </div>
            </div>
        </div>
    </div>
    

@endsection
