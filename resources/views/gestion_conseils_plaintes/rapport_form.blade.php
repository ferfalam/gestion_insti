@extends('layouts.app')

@section('content')
<div class="bg-secondary contact-clean">
    <form method="post"  action="{{ route('gestion_conseils_plaintes.nouveau_rapport')}}">
        @csrf
        <h2 class="text-center">Soumettre un rapport de conseil</h2>
        <div class="form-group"><input class="form-control" type="number" name="id_plainte" placeholder="Id de la plainte"></div>
        <div class="form-group"><input class="form-control" type="file" name="fichier" placeholder="Votre fichier (word ou pdf)"></div>
        <div class="form-group"><button class="btn btn-primary" type="submit">Ajouter</button></div>
    </form>
@endsection
