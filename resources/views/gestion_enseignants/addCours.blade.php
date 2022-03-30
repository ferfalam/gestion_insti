@extends('gestion_enseignants.layout')
@section('content')
    
    <div id="wrapper">
        @include('gestion_enseignants.sidebar')
        @include('gestion_enseignants.navbar')
                <div class="container-fluid">
                    {{-- @include('flash::message') --}}
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Ajouter/ Modifier le programme</h3>
                    <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
                        <div class="card-body"><div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

<form action="{{ route('gestion_enseignant.create_programmerCours') }}" method="POST">
    @csrf
    <table  id="dataTable" class=" table order-list">
        <thead style="font-weight: bold; text-align: center;">
            <tr>
                <td>Nom</td>
                <td>UE</td>
                <td>Crédit</td>
                <td>CT</td>
                <td>TD</td>
                <td>TP</td>
                <td>TPE</td>
                <td>GPE</td>
                <td>MP</td>
                <td>ME</td>
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
    <script  type="text/javascript" >
        // alert('hello');
        // $(document).ready(function () {
        //     

        
        var counter = 0;

        document.getElementById('addrow').onclick= function () {addNewLine()};

        function addNewLine(){
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><select class="custom-select chosen" style="width: 200px;" required style="color: #555555;" name="selectNom'+counter+'">/td>';
            cols += '<td><select class="custom-select chosen" style="width: 120px;" required style="color: #232323;" name="selectUE'+counter+'"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="credit'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="ct'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="td'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="tp'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="tpe'+counter+'" class="form-control"></td>';
            cols += '<td><select class="custom-select chosen" required style="width: 100px;" name="selectGPE'+counter+'"></td>';
            cols += '<td ><input type="number" name="mp'+counter+'" required style="width: 70px;" class="form-control"></td>';
            cols += '<td ><input type="number" name="me'+counter+'" required style="width: 70px;" class="form-control"></td>';
            
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