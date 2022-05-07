@extends('gestion_deroulement_cours.fiche.ficheformat')
@section('content')

<style type="text/css">
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

    <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong></br> Fiche de déroulement des cours </strong></h2>

    <div class = "description">
        
        <div class = "form-enseignant"> 
            <p> <strong> Enseignant : {{ $flight->nomEnseignant }} </strong> </p>
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
                        <td> Informatique et Telecommuncation </td>
                        <td> 3eme annee </td>
                        <td> Developpement d'application mobile </td>
                        <td> 72h </td>
                        <td> 67h </td>
                        <td> 4 </td>
                    </tr>
                </tbody> 

               
            </table>
        </div>


        </br> </br>

        <strong> Signature <sub> Chef Departement </sub> : </strong>
       
    </div>



@endsection