@extends('gestion_enseignants.layout')
@section('content')
    
    <div id="wrapper">
        @include('gestion_enseignants.sidebar')
        @include('gestion_enseignants.navbar')
                <div class="container-fluid">
                    {{-- @include('flash::message') --}}
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Ajouter/ Modifier le programme</h3>
                    <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
                        <div class="card-body"><div>
    <div class="table-responsive table mt-2" id="dataTable" role="grid">
        <form  method="POST">
            @csrf
                <table id="dataTable" class="table order-list">
                    <thead style="  font-weight: bold; text-align: center;">
                    <tr>
                        <td >Nom et Prénoms</td>
                        <td >Qualité</td>
                        <td >Adresse Complète</td>
                        <td >Date de Naissance</td>
                        <td >Lieu de Naissance</td>
                        <td >Nationalité</td>
                        <td >Matricule et / ou IFU</td>
                        <td >Indice et Grade</td>
                        <td >Intitulé de l&#39;UE </td>
                        <td >Groupe pedagogique</td>
                        <td >Anée Academique</td>
                        <td >Nombre d&#39;heure de l&#39;UE (de la mission)</td>
                        <td >Durée de la mission </td>
                        <td >Date et jour d&#39;arrivé</td>
                        <td >Date et jour de retour</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>



                     </tr>
                </tbody>
                </table>
            </div>
            <div style="display: flex; float: right;">
                <button type="button" class="btn btn-primary btn-sm" id="addrow" style="margin-right: 20px;">Ajouter</button>
                <input type="submit" class="btn btn-primary btn-sm " id="save" name="save" value="Enregistrer" >
            </div>
            <input type="hidden" id="compteur" name="compteur">
        </form>
    </div>
    <div class="card-body" style="margin-top: 40px;"></div>
</div>
</div>
</div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script  type="text/javascript">

var counter = 0;
document.getElementById('addrow').onclick= function (){addNewLine()};

function  addNewLine() {
    var newRow = $("<tr>");
    var cols = "";
    cols += '<td><select class="custom-select chosen" style="width: 200px;" required style="color: #555555;" name="selectNom'+counter+'">@foreach ($profile as $profil)<option value="{{$profil->com_givenName}} {{$profil->com_fullname}}">{{$profil->com_givenName}} {{$profil->com_fullname}}</option>@endforeach</select></td>';
    cols += '<td><select class="custom-select chosen" style="width: 150px;" required style="color: #232323;" name="selectQualite'+counter+'">@foreach ($qualite as $qualit)<option value="{{$qualit->name}}">{{$qualit->name}}</option>@endforeach</select></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="adresse_complet'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="date" required style="width: 150px;" name="date_naissance'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="lieu'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="Nationalite'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="matricul'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="grade'+counter+'" class="form-control"></td>';
    cols += '<td><select class="custom-select chosen" style="width: 120px;" required style="color: #232323;" name="selectUE'+counter+'">@foreach ($ue as $Ue)<option value="{{$Ue->abbreviation}}">{{$Ue->abbreviation}}</option>@endforeach</select></td>';
    cols += '<td><select class="custom-select chosen" required style="width: 150px;" name="selectGPE'+counter+'">@foreach ($group as $groupe)<option value="{{$groupe->name}}">{{$groupe->name}}</option>@endforeach</select></td>';
    cols += '<td ><input type="text" name="Annee_academique'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="text" name="heure_UE'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="text" name="dure_mission'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="date" name="dure_jourArrive'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="date" name="dure_jourRetour'+counter+'" style="width: 150px;" class="form-control" required></td>';


    $(".chosen").select2();

    cols += '<td><button id="ibtnDel" class="ibtnDel btn btn-md btn-danger "  value="Supprimer">Supprimer</button></td>';
    newRow.append(cols);
    $("table.order-list").append(newRow);
    document.getElementById('compteur').value=counter;
    counter++;
  }


$("table.order-list").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();
});

</script>
@endsection
