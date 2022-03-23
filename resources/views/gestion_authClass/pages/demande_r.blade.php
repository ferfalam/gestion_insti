@extends('gestion_authClass.layout')

@section('main')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Demande reçue</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Messages</p>
            </div>
            <div class="card-body">

                <div
                    class="table-responsive table mt-2"
                    id="dataTable"
                    role="grid"
                    aria-describedby="dataTable_info"
                >
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Entité</th>
                            <th>Objet</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Voir</th>
                        </tr>
                        </thead>

                        <tbody>
                @forelse ($demande as $demandes)
                        <tr>
                            <td>{{$demandes->id}}</td>
                            <td>{{$demandes->entite}}</td>
                            <td>{{$demandes->objet}}</td>
                            <td>{{explode(' ',$demandes->created_at)[0]}}</td>
                            <td> {{explode(' ',$demandes->created_at)[1]}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <a href="{{route('gestion_authClass.edit2',$demandes->id)}}" style="color:white ;text-decoration:none">Voir</a>
                                </button>
                            </td>
                        </tr>

                        @empty
                        <li><h1>Aucun evenement en cours</h1></li>

                @endforelse

                        </tbody>
                        <!-- <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
