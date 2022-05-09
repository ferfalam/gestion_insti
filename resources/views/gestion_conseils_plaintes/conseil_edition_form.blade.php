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

<div id ="wrapper" class="contact-clean">
    <form method="post" action="{{ route('gestion_conseils_plaintes.edition_conseil', $conseil -> id) }}">
        @csrf
        @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
            </div>
        @endif
        <h2 class="text-center"><br><strong>Mettre à jour conseil de discipline</strong><br><br></h2>

        @if ($conseil-> tenue == 0)
        <span>Participants</span><div class="form-group">
            <select class="select2 form-control select2-multiple"
                name = "participants[]" multiple="multiple" data-placeholder="Ajouter des participants...">
                @foreach ($users as $user)
                <option value="{{ $user -> id}}" @if (in_array($user -> id, (array)$selected1))
                    selected
                @endif>{{ $user -> profile -> com_fullname}}</option>
                @endforeach
            </select>
        </div>

        <span>Date du conseil</span><div class="form-group"><input class="form-control" type="date" name="date" placeholder="Date de tenue" value="{{ $conseil -> date}}"></div>
        <span>Heure de conseil</span><div class="form-group"><input class="form-control" type="time" name="heure" placeholder="Heure" value="{{ $conseil -> heure}}"></div>
        <span>Lieu de conseil</span><div class="form-group">
            <select id="drop" class="form-control" placeholder="Lieu" name="lieu">
                <option value="Salle des professeurs">Salle des professeurs</option>
                <option value="Amphi GC">Amphi GC</option>
                <option value="Salle P04">Salle P04</option>
            </select></div>
        @endif

            @if ($conseil-> tenue == 1)
            <span>Présents</span><div class="form-group">
                <select class="select2 form-control select2-multiple"
                    name = "presents[]" multiple="multiple" data-placeholder="Personnes présentes...">
                    @foreach ($users as $user)
                    <option value="{{ $user -> id}}"@if (in_array($user -> id, (array)$selected2))
                        selected
                    @endif >{{ $user -> profile -> com_fullname}}</option>
                    @endforeach
                </select>
            </div>
            <span>Maitre de séance</span><div class="form-group">
                <select class="form-control" id="drop1"
                    name = "maitre" data-placeholder="Maitre de séance...">
                    @foreach ($users as $user)
                    <option value="{{ $user -> id}}" >{{ $user -> profile -> com_fullname}}</option>
                    @endforeach
                </select>
            </div>
            @endif
        <div class="form-group"><button class="btn btn-primary" type="submit" onclick="return confirm('Voulez-vous vraiment mettre à jour ce conseil de discipline avec les nouvelles informations?')">Mettre à jour</button></div>
    </form>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
    $('#drop,#drop1').val('');
});
</script>
<script src="{{ asset('gestion_cd/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('gestion_cd/js/form-advanced.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
