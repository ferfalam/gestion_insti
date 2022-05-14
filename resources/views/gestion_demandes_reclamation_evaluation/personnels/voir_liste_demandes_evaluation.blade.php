@extends('gestion_demandes_reclamation_evaluation.layout_personnel')
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
                        @foreach($all_evaluation_requests as $evaluation_request) 
                            <tr>
                               
                                <td><span>{{$evaluation_request->first_name}}</span><span>{{$evaluation_request->last_name}}</span></td> 
                                <td>{{$evaluation_request->field}}</td>    
                                <td>{{$evaluation_request->created_date}}</td>
                                <td><a href="{{route('gestion_demandes_reclamation_evaluation.voir_details_demande_evaluation', ['id'=>$evaluation_request->id])}}" class="btn btn-primary">Voir plus</a></td>

                            </tr>
                        @endforeach 
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
        