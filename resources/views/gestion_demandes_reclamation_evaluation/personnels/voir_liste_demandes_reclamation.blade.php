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
                        @foreach($all_complaint_requests as $all_complaint_request) 
                            <tr>
                               
                                <td>{{$all_complaint_request->fist_name}} {{$all_complaint_request->last_name}}</td> 
                                <td>{{$all_complaint_request->field}}</td>    
                                <td>{{$all_complaint_request->created_date}}</td>
                            
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
