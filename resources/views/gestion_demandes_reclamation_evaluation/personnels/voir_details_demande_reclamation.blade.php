@extends('gestion_demandes_reclamation_evaluation.personnels.dashboard')

@section('main')             
                
    <div class="container-fluid">
        <div class="coltext-primary justify-content" data-aos='zoom-in' data-aos-duration='700' data-aos-delay='200'>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <div class="text-center"> 
                        <p class='text-primary m-0 font-weight-bold'>Données sur la demande</p>
                    </div>
                    <div class='card-body' style='font-size: 14px;'>
                                                    
                        <ul class="list-group">
                        <li class='list-group-item'><span style='font-weight: bold;font-size: 12px;'>Nom : {{$complaint_request->first_name}} </span></li>
                            <li class='list-group-item'><span style='font-weight: bold;font-size: 12px;'>Prénoms :{{$complaint_request->last_name}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;font-size: 12px;'>Fillère : {{$complaint_request->field}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Groupe Pédagogique : {{$complaint_request->pegagogic_group}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Type de demande : Demande d'evaluation </span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Type d'évaluation : {{$complaint_request->evaluation_type}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Semestre concerné: {{$complaint_request->academic_semester}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>UE concerné: {{$complaint_request->ue}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Motif: {{$complaint_request->motif}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Description de motif : {{$complaint_request->description_motif}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Date d'envoie: {{$complaint_request->created_date}}</span></li>
                            <li class='list-group-item'><span style='font-weight: bold;'>Quittance: <a href = "{{$complaint_request->document_path}}"></a></span></li>                                                   
                        </ul>           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-brand d-flex justify-content-center align-items-center" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
    
    <div class="col-lg-10">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <button class="btn btn-primary btn-block" type="submit" style="font-weight: bold;">Répondre à la demande</button> 
                </div>
            </div>
        </div>
    </div>
@endsection
 