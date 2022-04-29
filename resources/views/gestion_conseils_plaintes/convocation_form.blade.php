@extends('layouts.app')

@section('content')
<div class="bg-secondary contact-clean">
    <form method="post"  action="{{ route('gestion_conseils_plaintes.nouvelle_convocation')}}">
        @csrf
        <h2 class="text-center">Etablir une lettre de convocation</h2>
        <div class="form-group"><select class="form-control" type="number" name="id_plainte" placeholder="Id de la plainte"></div>
        <div class="form-group"><input class="form-control" type="string" name="nom_plaignant" placeholder="Nom du plaignant"></div>
        <div class="form-group"><input class="form-control" type="string" name="nom_fautif" placeholder="Nom du fautif"></div>
        <div class="form-group"><input class="form-control" type = "date" name="date" placeholder="Date de conseil"></textarea></div>
        <div class="form-group"><button class="btn btn-primary" type="submit">Confirmer</button></div>
    </form>
@endsection
