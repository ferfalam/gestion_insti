<div class="row mb-3" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
    <div class="col-lg-4 m-auto col-lg-10">
        <div class="card mb-3">
            <div class="card-body m-auto" style="height: 316.333px;">
                <form class="dropzone rounded-lg m-auto bg-transparent border-0" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="{{route("gestion_entreprises_stage.profile.update.image")}}" style="max-width: 250px;max-height: 250px">
                    @csrf
                    <div class="fallback"><input name="file" type="file"/></div>
                    <div class="dz-message" data-dz-message="data-dz-message">
                        <img class="rounded-circle mb-3 mt-4" src="{{asset($resolved_assets."images/profil.jpg")}}" width="160" height="160" onclick="getImage()">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
    <div class="col-lg-8 m-auto col-lg-10">
        <div class="card shadow-sm mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Paramètres de l'utilisateur</p>
            </div>
            <div class="card-body" style="font-size: 14px;">
                <form>
                    <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="first_name"><strong>Nom et Prenoms</strong><br></label>
                                <input class="form-control" type="text" name="first_name" readonly="" value="{{$user_data->com_fullname}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email"><strong>Adresse Email</strong></label>
                                <input class="form-control" type="email" placeholder="user@example.com" name="email" readonly="readonly" value="{{$user_data->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>Adresse</strong><br></label>
                                <input class="form-control" type="text" name="s_contact" readonly="readonly" value="{{$user_data->com_address??""}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>Ville</strong><br></label>
                                <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->com_birthPlace??""}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>Téléphone</strong><br></label>
                                <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->com_phoneNumber??""}}">
                            </div>
                        </div>
                    </div>

                    @if($userGroup == "apprenant")
                        <div class="form-row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>Fillière</strong><br></label>
                                <input class="form-control" type="text" name="s_contact" readonly="readonly" value="{{$user_data->fields??""}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>Groupe Pédagogique</strong><br></label>
                                <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->pedagogic_group??""}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="last_name"><strong>N° Matricule</strong><br></label>
                                <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->app_num_mat??""}}">
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="last_name"><strong>Genre</strong><br></label>
                                    <input class="form-control" type="text" name="s_contact" readonly="readonly" value="{{$user_data->com_gender?:""}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name"><strong>Grade</strong><br></label>
                                    <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->pers_grade??""}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name"><strong>Spécialité</strong><br></label>
                                    <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->ens_principalSpeciality??""}}">
                                </div>
                            </div>
                        </div>
                    @endif

{{--                    <div class="form-group">--}}
{{--                        <button class="btn btn-primary btn-sm" type="submit" style="font-weight: bold;">Enregistrer</button>--}}
{{--                    </div>--}}
                </form>

            </div>
            <div class="card-footer"><a class="btn btn-primary float-right btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Éditer le profil"><i class="fas fa-user-edit text-white" data-toggle="modal" data-target="#popup2"></i></a></div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="popup2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold;font-size: 17px;">Modifier le Profil</h4><button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col"><input class="form-control" type="email" placeholder="Email" name="email"></div>
                            <div class="col"><input class="form-control" type="password" placeholder="Password" name="tel"></div>
                            </div>
                        <div class="form-row mt-2">
                            <div class="col"><input class="form-control" type="tel" placeholder="Téléphone" name="tel"></div>
                            <div class="col"><input class="form-control" type="text" placeholder="Adresse" name="address"></div>
                        </div>
                    </div><button class="btn btn-primary btn-block" type="submit" style="font-weight: bold;">Enregistrer</button></form>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal" style="font-weight: bold;">Fermer</button></div>
        </div>
    </div>
</div>
<script src="{{asset($resolved_assets."js/jquery.min.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap.min.js")}}"></script>
<script>
    function getImage() {
        $("#profile_image").click();
    }

    function uploadImage() {
        let form_data = new FormData()
        form_data.append("_token:", '{{ csrf_token() }}');
        form_data.append("image", $('#profile_image')[0].files[0]);
        $.ajax({
            type:'POST',
            url:'{{route("gestion_entreprises_stage.profile.update.image")}}',
            data: $("#image_form").serialize(),
            success:function(result) {
                console.log(result)
            }
        });
    }
</script>
