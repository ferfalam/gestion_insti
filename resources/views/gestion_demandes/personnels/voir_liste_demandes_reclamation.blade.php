@extends('gestion_demandes.personnels.dashboard')
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
                                @foreach($complaint_requests as $a_complaint_request)
                                    
                                    <tr>{!!$a_complaint_request->profil_id!!}</tr>
                                @endforeach 

                                <th>Type de Demande</th>

                                @foreach($complaint_requests as $a_complaint_request)
                                                
                                    <tr> {!!$a_complaint_request->evaluation_type_id!!}</tr>
                                @endforeach

                                <th>Date de Réception</th>

                                @foreach($complaint_requests as $a_complaint_request)
                                                
                                    <tr> {!!$a_complaint_request->created_at!!}</tr>
                                
                                @endforeach

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
