@extends('gestion_deroulement_cours.layout')

@section('title') Filiere À Mettre À Jour @endsection

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

            

            <form data-bs-hover-animate="pulse" method="post" action="{{ route('gestion_deroulement_cours.updateField',['id' => $flight->id]) }}" novalidate>
                {{ csrf_field() }} 
                
                <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong> <br> Nouvelle Filiere </strong></h2>    
                
                    <div class="form-group" >
                        <label for="dsgn"> Appelation </label> <br>
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" placeholder="{{ $flight->name }}" id="dsgn" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="appelation" required="">
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
                                        <input class="form-control" placeholder="{{ $flight->systemName }}" id="name_sys" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="nameSys" required="">
                                        {!! $errors->first('nameSys', '<span class="error"> :message </span>') !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                <label style="font-weight: normal;" id="abrv"> Abreviation </label>
                                <div class="form-row">
                                    <div class="col">
                                        <input class="form-control" placeholder="{{ $flight->abbreviation }}" id="abrv" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="abreviation" required="">
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
                                <input class="form-control" placeholder="{{ $flight->description }}" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="description" required="">
                                {!! $errors->first('description', '<span class="error"> :message </span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <a style="float : right">
                            <input name="bouton" class="btn btn-primary btn-block" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" value="Valider">   
                        </a>
                    </div>
              
            </form>

        </div>

        <br>
        <li class="retourAccueil" >  <a href="{{ route('gestion_deroulement_cours.accueil') }}"> Annuler </a></li>

       
    @if(isset($message))
        <script>
            toastr.success("{{$message}}", 'Succès')
        </script>
    @endif
@endsection