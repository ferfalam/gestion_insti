@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Gestion des salles et emploi du temps</div>

                    <div class="card-body">
                        <p class="card-text">Vous serez redirigé vers la section de gestion de salle de classe et des
                            emploi du temps de l'insti.</p>
                        <a href="{{ route('gestion_salle.index') }}" class="btn btn-primary w-25" style="float: right"><i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
