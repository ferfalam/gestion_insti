@extends('gestion_demandes_reclamation_evaluation.layout')

@section('main')
    
    <div class="container">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold" style="text-align : center; font-size: 30px;">Activites recentes</p>
        </div>

        <div>
            <h3 style="margin-top:20px; text-align: center; border-bottom: solid black 0.5px">Demande de reclamation</h3>
            <div class="row" style="padding-left: 30px; margin-top:20px;">
                @foreach($all_complaint_requests as $complaint_request)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Demande de reclamation</h5>
                                <p class="card-text">Vous avez soumis un demande de reclamation pour l'UE <span>{{$complaint_request->ue}}</span> le <span>{{$complaint_request->created_date}}</span></p>
                                <a href="{{route('gestion_demandes_reclamation_evaluation.voir_details_demande_reclamation', ['id'=>$complaint_request->id])}}" class="btn btn-primary">Voir details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

           

        <div>
            <h3 style="margin-top:20px; text-align: center; border-bottom: solid black 0.5px">Demande d'evaluation</h3>
            <div class="row" style="padding-left: 30px; margin-top:20px;  margin-bottom:30px;">
                @foreach($all_evaluation_requests as $evaluation_request)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">Vous avez soumis une demande d'evaluation pour l'UE <span>{{$evaluation_request->ue}}</span> le <span>{{$evaluation_request->created_date}}</p>
                            <a href="{{route('gestion_demandes_reclamation_evaluation.voir_details_demande_evaluation', ['id'=>$evaluation_request->id])}}" class="btn btn-primary">Voir details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
    </div>

@endsection
