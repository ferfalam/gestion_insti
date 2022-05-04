@extends('gestion_deroulement_cours.layout')

@section('title') Nouvelle UE @endsection

@section('style_for_file_point')
    <style>
        .form-control
        {
            text-align : center ;
        }
        .description{
            margin : 2%;
            padding : 1%;
        }
        table{
            border-collapse: collapse;
        }
        td, th{
            border : 2px solid #e3e6f0;
        }
        .retourAccueil{
            padding-left : 70px ;
        }
        .error{
            font-size : 17px;
            color:rgb(204, 75, 75);
            font-style: italic;
        }
        </style>
@endsection

@section('main')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content"><div class="register-photo">
        <div class="form-container shadow">

            <form data-bs-hover-animate="pulse" method="post" action="{{ route('gestion_deroulement_cours.saveNewUe') }}" novalidate>
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

        <br>
        <li class="retourAccueil" >  <a href="{{ route('gestion_deroulement_cours.accueil') }}"> Annuler </a></li>
        
        <li class="retourAccueil" > <a href="{{ route('gestion_deroulement_cours.showUes') }}" > Afficher toutes les UEs </a>  </li>

       
    @if(isset($message))
        <script>
            toastr.success("{{$message}}", 'Succès')
        </script>
    @endif
@endsection