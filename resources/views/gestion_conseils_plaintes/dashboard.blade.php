@extends('layouts.accueil')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Bienvenue, Chef service</h3>
        </div>
        <div class="row">
            {{-- <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-primary py-2">
                    <div class="card-body"><button class="btn btn-link active" type="button">Gestion des plaintes</button></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-success py-2">
                    <div class="card-body"><button class="btn btn-link" type="button">Convocations&nbsp;</button></div>
                </div>
            </div> --}}
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-info py-2">
                    <div class="card-body"><button class="btn btn-link" href="{{ route('conseil')}}" type="button" >Organiser un conseil</button></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-warning py-2">
                    <div class="card-body"><button class="btn btn-link" type="button">Generer un rapport</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
