@extends('gestion_deroulement_cours.layout')

@section('title') Fiche_A_Retirer_Enseignant @endsection

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
        </style>
@endsection

@section('main')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content"><div class="register-photo">
        <div class="form-container shadow">

            <form data-bs-hover-animate="pulse" method="get" action="">
                <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong></br> Fiche de déroulement des cours </strong></h2>

                <div class = "description">
                    
                    <div class = "form-enseignant"> 
                        <p> <strong> Enseignant : </strong> </p>
                    </div>
                    
                    <div class = "form-annee"> 
                        <p> <strong> Annee Academique </strong> </p>
                    </div> 

                    </br>

                    <div>
                        <table class = "table">
                            <thead>
                                <tr>
                                    <th> Filière </th>
                                    <th> Année d'etude </th>
                                    <th> Unité d'Enseignement </th>
                                    <th> Masse horaire dû </th>
                                    <th> Masse horaie Executée </th>
                                    <th> Nombre de Credit </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                </tr>
                            </tbody> 

                            {{--  A remplir to resee--}}

                            {{-- @foreach ($collection as $dataLineTaken )
                                <tbody>
                                    <tr>
                                        <td> {{ $dataLineTaken['surname'] }} </td>
                                        <td> {{ $dataLineTaken['name'] }} </td>
                                        <td> {{ $dataLineTaken['ue'] }} </td>
                                    </tr>
                                </tbody>  
                            @endforeach --}}

                           
                        </table>
                    </div>


                    </br> </br>

                    <strong> Signature <sub> Chef Departement </sub> : </strong>
                   
                    </br></br>

                    <a href="{{ route('gestion_deroulement_cours.accueil') }}" style="float : right" >
                        <button type="button" class="btn btn-primary"> Envoyer </button>
                    </a>
                    </br>
                </div>
            </form>

        </div>

@endsection