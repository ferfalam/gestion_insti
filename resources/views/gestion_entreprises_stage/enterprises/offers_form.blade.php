
<div class="row" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-info font-weight-bold m-0">Faire une Offre</h6>
                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                        <p class="text-center dropdown-header">DÉPARTEMENT:</p><a class="dropdown-item" role="presentation" href="#">GEI</a><a class="dropdown-item" role="presentation" href="#">GMP</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" role="presentation" href="#">Tous</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form data-validation="true" enctype="multipart/form-data" id="offer_form">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col m-auto font-weight-bold"><label>Domaine de Formation</label>
                                <div class="table-responsive table-borderless">
                                    <table class="table table-bordered table-hover table-sm">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-sitemap"></i></span></div><input class="form-control" type="text" name="domain">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                @error('domain')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col m-auto font-weight-bold"><label>Niveau D'étude</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-graduation-cap"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" name="niv_etude">
                                </div>
                                @error('niv_etude')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col font-weight-bold"><label>Gratification</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span></div>
                                    <input class="form-control" type="text" name="gratification">
                                </div>
                                @error('gratification')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col font-weight-bold"><label>Infos de Localisation</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <input class="form-control" type="text" name="location">
                                </div>
                                @error('location')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group font-weight-bold"><label>Période</label>
                        <div class="form-row">
                            <div class="col col-md-6">
                                <div class="form-group input-group"><span class="border rounded-0 input-group-text" style="font-weight: bold;">Du</span>
                                    <input class="form-control" type="date" name="start_date">
                                </div>
                                @error('start_date')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group input-group"><span class="border rounded-0 input-group-text" style="font-weight: bold;">Au</span>
                                    <input class="form-control" type="date" name="end_date">
                                </div>
                                @error('end_date')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group font-weight-bold"><label>Profil rechercher</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                            <input class="form-control" type="text" name="profiles">
                        </div>
                        @error('profiles')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group font-weight-bold"><label>Missions&nbsp;</label>
                        <textarea class="form-control" rows="5" name="mission"></textarea>
                        @error('mission')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
{{--                        <div class="form-row">--}}
{{--                            <div class="col text-center">--}}
{{--                                <button class="btn btn-secondary btn-sm d-block" type="button" style="font-weight: bold;">Ajouter une image</button>--}}
{{--                                <input class="d-none" type="file" accept="image/*" name="logo">--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <input class="form-control form-control-sm" type="text" readonly="" disabled="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        @include("gestion_entreprises_stage.layouts.drap_end_drop")
                    </div>
                    <div class="text-center">
                        <button class="btn btn-info" type="button" style="font-weight: bold;" id="add-offer">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@push("custom-scripts")
<script>

    $("#add-offer").on("click",function () {
        let data = $("#offer_form").serialize();
        $.ajax({
            type:'POST',
            url: '{{route("gestion_entreprises_stage.enterprise.add_ofer")}}',
            data: data,
            success:function(data) {
                toastr.success(data["message"],'Success')
            },
            error:function (data) {
                toastr.error("Veuillez remplir tous les champs",'Oups !!')
            }
        })
    })
</script>
@endpush
