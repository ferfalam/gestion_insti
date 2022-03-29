@extends('gestion_demandes.personnels.dashboard')

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
                            <th>Nom et Prénoms</th>
                            <th>Type de Demande</th>
                            <th>Date de Réception</th>
                        </thead>


                        <tbody>
                            @foreach($evaluation_requests as $an_eva_request)

                                <tr>
                                        
                                <td>{!!$an_eva_request->profil_id!!}</td>
                                                                                
                                <td> {!!$an_eva_request->evaluation_type_id!!}</td>
                                                                                                                    
                                <td> {!!$an_eva_request->created_at!!}</td>

                                </tr>        
                            @endforeach
                        
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
        