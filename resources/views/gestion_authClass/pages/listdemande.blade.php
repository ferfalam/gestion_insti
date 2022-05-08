@extends('gestion_authClass.layout')

@section('main')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Demande envoyée</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Messages</p>
        </div>
        <div class="card-body">

            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            @if (Auth::user()->email=='admin@insti.com')
                            <th>Entité</th>
                            @endif
                            <th>Objet</th>
                            <th>Date d'envoie</th>
                            <th>Heure</th>
                            <th>Voir</th>
                        </tr>
                    </thead>

                    <?php $i=0 ?>
                    <tbody>

                        @forelse ($demande as $demandes)
                        <tr>

                            <td>{{$i=$i+1}}</td>

                            @if (Auth::user()->email=='admin@insti.com')
                            <td>{{$demandes->entite}}</td>
                            @endif
                            <td>{{$demandes->objet}}</td>
                            <td>{{explode(' ',$demandes->created_at)[0]}}</td>
                            <td> {{explode(' ',$demandes->created_at)[1]}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm"
                                    href="{{route('gestion_authClass.edit2',$demandes->id)}}">

                                    Voir
                                </a>
                            </td>
                        </tr>

                        @empty
                        <li>
                            <h1>Aucune demande en cours</h1>
                        </li>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection