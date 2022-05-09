@extends('gestion_conseils_plaintes.layouts.layout')

@section('style')
<style>
    .contact-clean
        {
            display: flex;
            justify-content: center;
            align-content: center;
        }
</style>
<link rel="stylesheet" href="{{ asset('gestion_cd/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aladin">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/fontawesome5-overrides.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/select2/css/select2.min.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@endsection

@section('content')

<div id="wrapper" class="contact-clean">
        <form method="post" enctype="multipart/form-data" action="{{ route('gestion_conseils_plaintes.nouveau_rapport', $id) }}">
            @csrf
            <h2 class="text-center"><br><strong>Soumettre un rapport</strong><br><br></h2>
            @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          <span>Fichier du rapport</span><div id="file" class="form-group"><input class="form-control" name="file" type="file" placeholder="Votre fichier..." ></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Envoyer</button></div>
        </form>
    </div>
@endsection

@section('script')
<script src="{{ asset('gestion_cd/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('gestion_cd/js/form-advanced.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

