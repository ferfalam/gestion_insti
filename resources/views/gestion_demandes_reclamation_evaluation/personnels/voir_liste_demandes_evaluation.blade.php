@extends('gestion_demandes_reclamation_evaluation.personnels.dashboard')

@section('main')

    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <label> DEMANDES D'EVALUATIONS </label>
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
                        @foreach($all_evaluation_requests as $all_evaluation_request) 
                            <tr>
                               
                                <td>{{$all_evaluation_request->fist_name}} {{$all_evaluation_request->last_name}}</td> 
                                <td>{{$all_evaluation_request->field}}</td>    
                                <td>{{$all_evaluation_request->created_date}}</td>
                            
                            </tr>
                        @endforeach 
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
        