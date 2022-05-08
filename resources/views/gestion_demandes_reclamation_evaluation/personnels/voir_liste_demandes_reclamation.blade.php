@extends('gestion_demandes_reclamation_evaluation.personnels.dashboard')
@section('main')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <label> DEMANDES DE RECLAMATION</label>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                            <tr>
                                <th>Nom et Prénoms</th>
                                <th>Filiere</th>
                                <th>Date de Réception</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($all_complaint_requests as $complaint_request) 
                            <tr>
                               
                                <td>{{$complaint_request->first_name}} {{$complaint_request->last_name}}</td> 
                                <td>{{$complaint_request->field}}</td>    
                                <td>{{$complaint_request->created_date}}</td>
                                <td><a href="{{route('gestion_demandes_reclamation_evaluation.voir_details_demande_reclamation', ['id'=>$complaint_request->id])}}" class="btn btn-primary">Voir plus</a></td>
                            
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
