@extends('gestion_deroulement_cours.layout')

@section('title') Deroulement des Cours @endsection

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
                    <div class = "form-nom" > 
                        <p> <strong>Nom de l'Etudiant : </strong> <p> 
                        <p> <strong>Prénom de l'Etudiant : </strong> <p> 
                    </div> 
                    <div class = "form-filiere" >
                        <p> <strong>Filière : </strong> </p> 
                        <p> <strong>Annee d'Etude : </strong> </p>     
                        <p> <strong>Unite d'Enseignement : </strong> </p>   
                    </div>
                    <div class = "form-annee"> 
                        <p> <strong> Annee Academique </strong> </p>
                    </div> 

                    <div>
                        <table class = "table">
                            <thead>
                                <tr>
                                    <th> Date de Deroulement </th>
                                    <th> Heure de Debut </th>
                                    <th> Heure de fin </th>
                                    <th> Nombre d'heure Executé </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> 12/09/2021 </td>
                                    <td> 03:23:PM </td>
                                    <td> 07:23:PM </td>
                                    <td> 
                                        04 heures 
                                    </td>
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

                    </br>

                    <p> <strong> Masse horaire Executée : </strong> </p>

                    <p> <strong> Masse horaire totale Dû : </strong> </p>

                    </br>

                    <strong> Signature  <sub> Etudiant </sub> : </strong>

                    </br> </br>

                    <strong> Signature <sub> Enseignant </sub> : </strong>
                   
                    </br></br>
                    
                
                    <a href="{{ route('gestion_deroulement_cours.downloadFiche') }}" style="float : right" >
                        <button type="button" class="btn btn-primary"> Importer sous PDF </button>
                    </a>
                    </br>
                </div>
            </form>

        </div>

@endsection