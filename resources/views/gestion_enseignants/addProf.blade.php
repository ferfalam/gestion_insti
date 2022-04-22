@extends('gestion_enseignants.layout')
@section('content')
<div id="wrapper">
    @include('gestion_enseignants.sidebar')
    @include('gestion_enseignants.navbar')
    <div class="container-fluid" data-aos="fade-up-left" data-aos-duration="600" >
        {{-- @include('flash::message') --}}
        <h3 class="text-dark mb-4">Ajouter/ Modifier le programme</h3>
        
        <form method="POST" action="/ajouterProf" id="containerAddProf" name="containerAddProf">
                @csrf
            <div class="card-body">

            </div>
        
    </div>
    <div id="btnDiv">
        <div style="display: flex; float: right;">
            <button type="button" class="btn btn-primary btn-sm" id="addLigneProf" name="addLigneProf" style="margin-right: 20px;">Ajouter</button>
            <input type="submit" class="btn btn-primary btn-sm " id="save" name="save" value="Enregistrer" >
            <input type="hidden" class="btn btn-primary btn-sm " id="compteur" name="compteur" value="" >
        </div>
    </div> </form>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script  type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
                $("#addLigneProf").on("click", function () {
                    var newCard='<div class="card shadow" style="margin-top: 30px;">'+
                    '<div class="card-body" style="margin-top: 30px;">'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Nom</strong><br /></label><input type="text" class="form-control" placeholder="Flavien" name="first_name'+counter+'" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Prenoms</strong><br /></label><input type="text" class="form-control" placeholder="LANMANTCHION" name="last_name'+counter+'" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="email"><strong>Email </strong></label><input type="email" class="form-control" placeholder="flavienProf@gmail.com" name="email'+counter+'" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Mots de passe par defaut</strong><br /></label><input type="text" class="form-control" id="pass" placeholder="admin" name="pass'+counter+'" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Date de naissance</strong><br /></label><input class="form-control" name="date'+counter+'" type="date" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Lieu de naissance</strong><br /></label><input class="form-control" name="lieu_naissance'+counter+'" type="text" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Genre</strong><br /></label><select class="custom-select chosen" id="genre" required style="color: #232323;" name="genre'+counter+'">'+
                    '<option value="Masculin" selected>Masculin</option>'+
                    '<option value="Feminin" selected>Feminin</option>'+
                    '</select></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label id="num" for="last_name" name><strong>Numéro de telephone </strong><br /></label><input type="text" class="form-control" id="num" placeholder="67000000" name="num'+counter+'" required/></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Diplome</strong><br /></label><select class="custom-select chosen" id="diplome" required style="color: #232323;" name="diplome'+counter+'">'+
                    '<option value="12">Bac</option>'+
                    '<option value="13">Licence</option>'+
                    '<option value="14">Master</option>'+
                    '<option value="15" selected>Doctorat</option>'+
                    '</select></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label id="num-1" for="last_name" name><strong>Numéro matricule </strong><br /></label><input type="text" class="form-control" id="matricule" placeholder="E632541" name="matricule'+counter+'" required/></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Adresse</strong><br /></label><input type="text" class="form-control" id="adresse" name="adresse'+counter+'" placeholder="Lokossa, BP201" required/></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name" name><strong>Type</strong><br /></label><select class="custom-select chosen" id="type" required style="color: #232323;" name="type'+counter+'">'+
                    '<option value="12">Permanent</option>'+
                    '<option value="13">Vacataire</option>'+
                    '<option value="14">Missionnaire</option>'+
                    '</select></div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                    $("#containerAddProf").append(newCard);
                    document.getElementById('compteur').value=counter;
                    counter++;

                });
       });

   </script>
@endsection
