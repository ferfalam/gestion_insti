@php
$i = 0;
@endphp

<div class="d-flex flex-column m-2 mt-4" id="content-wrapper">
    <div id="content">
    <div class="card shadow" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
            <a class="btn btn-primary  d-inline-block" role="button" data-aos="fade-up" onclick="print()" data-aos-duration="700" data-aos-delay="950" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Télécharger pdf</a>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($userGroup == "admin")
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><a class="btn btn-secondary ml-1" role="button" href="{{route("gestion_entreprises_stage.enterprise.index")}}" data-toggle="tooltip" data-bs-tooltip="" title="Ajouter des entreprises"><i class="fas fa-plus text-white"></i></a></div>
                        @elseif($userGroup == "apprenant" && (count(\Illuminate\Support\Facades\DB::table("stages")->where("user_id",\Illuminate\Support\Facades\Auth::user()->id)->get())==0))
                            <div class="col-md-6 text-nowrap" data-toggle="modal" data-target="#popup" id="add-intern">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><a class="btn btn-warning btn-sm btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" data-placement="right" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="950" title="Votre profil indique que vous n'êtes pas en stage.Veuillez sélectionné l' entreprise dans laquellle vous êtes en stage"><i class="fas fa-exclamation-triangle text-white"></i></a></div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th class="text-nowrap text-truncate">N°</th>
                            <th class="text-nowrap text-truncate"><strong>DESIGNATION</strong><br></th>
                            <th class="text-nowrap text-truncate">DOMAINES&nbsp;</th>
                            <th class="text-nowrap text-truncate">SITUATION</th>
                            <th class="text-nowrap text-truncate">CONTACTS</th>
                            <th class="text-nowrap"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($enterprises)!=0)
                            @foreach($enterprises as $enterprise)
                                <tr>
                                    <td style='font-weight: bold;font-size: 13px;'>{{++$i}}</td>
                                    <td class='text-truncate' style='font-weight: bold;font-size: 13px;'>{{$enterprise->designation}}</td>
                                    <td style='font-size: 14px;'>
                                        @foreach($enterprise->domaines as $domaineId)
                                            <p>
                                                {{DB::table("domaines")->where("id",(int)$domaineId)->value("libelle")}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td style='font-size: 14px;'>{{$enterprise->adresse}}</td>
                                    <td style='font-size: 14px;'>{{$enterprise->d_contact}}<br></td>
                                    <td><a class='btn btn-light' type='button'  data-toggle="modal" data-target="#showentreprise" onclick="getEnterprise({{$enterprise->id}})"><i class='fas fa-info-circle text-info' data-toggle='tooltip' data-bs-tooltip='' title="Voir plus d'info"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong class="text-nowrap text-truncate">N°</strong></td>
                            <td class="text-nowrap text-truncate"><strong>DÉSIGNATION&nbsp;</strong></td>
                            <td><strong class="text-nowrap text-truncate">DOMAINES&nbsp;</strong></td>
                            <td><strong class="text-nowrap text-truncate">SITUATION&nbsp;</strong></td>
                            <td><strong class="text-nowrap text-truncate">CONTACTS<br></strong></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" tabindex="-1" id="showentreprise">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold;font-size: 17px;" id="">
                    <div class="spinner-grow bg-primary" style="width: 3rem; height: 3rem;" role="status" id="spinner">
                        <span class="sr-only text-center">Loading...</span>
                    </div>
                </h4>
                <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="main-body d-none" id="main">
                    <div class="breadcrumb">
                        <h5 class="font-weight-bold text-primary text-center m-auto" id="designation">
                            Designation
                        </h5>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-md-12">
                            <div class="card mb-3 ct-card">
                                    <div class="card-body ct-card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-primary mr-2 font-weight-bold">Informations sur l'entreprise</i></h6>
                                        <hr class="bg-primary">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Adresse email</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="email">
                                                entreprise@gmail.com
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Adresse</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="address">
                                                address
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Capacité d'acceuil</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="capacity">
                                                Enterprise Capacity
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Partenariat avec l'INSTI</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="partnership">
                                                Partenariat Y, N
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Contact du Directeur</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="d_num">
                                                Dict Num
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Contact du Secretatriat</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="s_num">
                                                S Num
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Autres contacts</h6>
                                            </div>
                                            <div class="col-sm-6 text-secondary" id="o_num">
                                                others Num
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Periode de recrutement</h6>
                                            </div>
                                            <div class="col-sm-3 text-secondary" id="startPeriod">
                                               startdate
                                            </div>
                                            <div class="col-sm-3 text-secondary" id="endPeriod">
                                                enddate
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                            </div>
                            <div class="row gutters-sm">
                                <div class="col-sm-12 mb-3">
                                    <div class="ct-card h-100">
                                        <div class="card-body ct-card-body" id="areas">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-primary font-weight-bold mr-2">Domaines d'intervention</i></h6>
                                            <div id="areascontent"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal" style="font-weight: bold;">Fermer</button></div>
        </div>
    </div>
</div>

<div class="modal fade text-center border-danger shadow-lg" role="dialog" tabindex="-1" id="popup" style="width: 280px;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="width: 260px;">
                <h4 class="modal-title text-break" style="width: 350px;font-weight: bold;font-size: 14px;">Votre Entreprise de Stage</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body" style="width: 260px;">
                <div role="tablist" id="accordion-1">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="#accordion-1 .item-1" style="font-weight: bold;font-size: 14px;">Sélectionnez l'entreprise&nbsp;</a></h5>
                        </div>
                        <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <form action="" id="intern_form">
                                    @csrf
                                    <select class="form-control" name="entreprise_id" required>
                                        <optgroup label="Entreprise ">
                                            @foreach($enterprises as $enterprise)<option value='{{$enterprise->id}}'>{{$enterprise->designation}}</option>@endforeach
                                        </optgroup>
                                    </select>
                                    @error("entreprise")<script type='text/javascript'>alert('{{$message}}')</script>@enderror
                                    <label class="float-left">Du</label><input class="form-control" type="date" name="startDate" required>
                                    @error("startDate")<script type='text/javascript'>alert('{{$message}}')</script>@enderror
                                    <label class="float-left">Au</label><input class="form-control" type="date" name="endDate" required>
                                    @error("endDate")<script type='text/javascript'>alert('{{$message}}')</script>@enderror
                                    <label>Type de stage</label><select class="form-control" name="typeS" required>
                                        <optgroup label="Type de Satge ">
                                            @foreach(DB::table('typestages')->get() as $Stype)<option value='{{$Stype->id}}'>{{$Stype->libelle}}</option>@endforeach
                                        </optgroup></select>
                                    @error("typeS")<script type='text/javascript'>alert('{{$message}}')</script>@enderror
                                    <button class="btn btn-secondary btn-block mt-2" type="button" style="font-weight: bold;" onclick="add_intern()">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="#accordion-1 .item-2" style="font-weight: bold;font-size: 14px;">Autre</a></h5>
                        </div>
                        <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body"><span><i class="fa fa-link float-left"></i><a class="text-nowrap text-dark" href="{{route("gestion_entreprises_stage.enterprise.index")}}" style="font-weight: normal;">Proposer une entreprise</a></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="width: 260px;"><button class="btn btn-light" type="button" data-dismiss="modal" style="font-weight: bold;" id="close-popup">Fermer</button></div>
        </div>
    </div>
</div>

<script>

    function getEnterprise(id) {
        $("#spinner").removeClass("d-none")
        $("#main").addClass("d-none");
        $("#areas #areascontent").remove()
        $.ajax({
            type:'POST',
            url:'{{route("gestion_entreprises_stage.enterprise.data")}}',
            data:{
                _token: '{{ csrf_token() }}',
                id: id
            },
            success:function(data) {
                $("#spinner").addClass("d-none")
                $("#main").removeClass("d-none");
                $("#designation").text(data["designation"]) ;
                $("#email").text(data["email"]);
                $("#address").text(data["adresse"]);
                $("#capacity").text(data["capacite"]);
                $("#partnership").text(data["partenariat"] === 1?"Oui":"Non");
                $("#d_num").text(data["d_contact"]!==null?data["d_contact"]:"Aucun");
                $("#s_num").text(data["s_contact"]!==null?data["s_contact"]:"Aucun");
                $("#o_num").text(data["a_contact"]!==null?data["a_contact"]:"Aucun");
                $("#startPeriod").text(data["startdate"]);
                $("#endPeriod").text(data["enddate"]);
                $("#areas").append('<div id="areascontent"></div>')
                $.each(data["domaines"], function (key, value) {
                    $("#areascontent").append(
                        '<small>' + value["libelle"] + '</small>' +
                        '<div class="progress mb-3" style="height: 5px">' +
                        '<div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>'
                    );
                })
            }
        });
    }
    function add_intern(){
        let data = $("#intern_form").serialize();
        $.ajax({
            type:'POST',
            url:'{{route("gestion_entreprises_stage.students.add_intern")}}',
            data: data,
            success:function(data) {
                $("#close-popup").click();
                if (data["success"] === true) {
                    $("#add-intern").fadeOut()
                    toastr.success(data["message"], 'Success')
                }else {
                    toastr.warning(data["message"], 'Oups !!')
                }
            },
            error:function (result) {
                toastr.error("Veuillez remplir tous les champs", 'Erreur')
            }
    })
    }
</script>
