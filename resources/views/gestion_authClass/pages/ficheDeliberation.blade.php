@extends('gestion_authClass.layout')

@section('main')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary font-weight-bold m-0" style="text-align:center;">Fiche de Déliberation</h2>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="card bg-light mt-3">
                    <div class="card-header">
                        Import et Export des Moyennes
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gestion_authClass.employee.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-success">Import Moyenne Data</button>
                            <a class="btn btn-warning" href="{{ route('gestion_authClass.export-excel') }}">Export Moyenne Data</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

