
<div class="row mb-3" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
    <div class="col-lg-4">
        <div class="card shadow-sm mb-3">
            <div class="card-body text-center" style="height: 316.333px;"><img class="rounded-circle mb-3 mt-4" src="{{asset($resolved_assets."images/profil.jpg")}}" width="160" height="160">
                <div class="mb-3"><button class="btn btn-primary btn-sm" type="button" style="font-weight: bold;">Modifier la Photo</button>
                    <div class="custom-control custom-switch" style="margin-top: 10px;"><input class="custom-control-input" type="checkbox" id="formCheck-1" name="edit" value="0"><label class="custom-control-label" for="formCheck-1"><strong>Editer</strong><br></label></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Paramètres de l'entreprise</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="first_name"><strong>Nom</strong><br></label>
                                        <input class="form-control" type="text" name="first_name" readonly="" value="{{$user_data->designation}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email"><strong>Addresse Email</strong></label>
                                        <input class="form-control" type="email" placeholder="user@example.com" name="email" readonly="readonly" value="{{$user_data->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="last_name"><strong>Contacts Secrétariat&nbsp;</strong><br></label>
                                        <input class="form-control" type="text" name="s_contact" readonly="readonly" value="{{$user_data->s_contact}}">
                                    </div>
                                </div>
                                <div class="col"><label for="last_name"><strong>Contacts Directeur</strong><br></label>
                                    <input class="form-control" type="text" name="d_contact" readonly="readonly" value="{{$user_data->d_contact}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit" style="font-weight: bold;">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Autres Paramètres</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="font-weight-bold" style="font-weight: bold;">Adresse&nbsp;</h6>
                                    <input class="form-control" type="text" name="address" readonly="readonly" value="{{$user_data->adresse}}">
                                </div>
                                <div class="col-lg-12 mt-5">
                                    <h6 class="font-weight-bold" style="font-weight: bold;">Période de recrutement&nbsp;</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" readonly="readonly" value="Début: {{$user_data->startDate}}">
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" readonly="readonly" value="Fin: {{$user_data->endDate}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold" style="font-weight: bold;">Domaines</h6>
                                <ul class="">
                                    @foreach(json_decode($user_data->domaines) as $domaineId)
                                        <li class="m-2"><span>{{DB::table("domaines")->where("id",(int)$domaineId)->value("libelle")}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

