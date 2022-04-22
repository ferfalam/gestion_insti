<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Enterprise</title>
    <link rel="stylesheet" href="{{asset($resolved_assets."bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/aos.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Registration-Form-with-Photo.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/fontawesome-all.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/fontawesome5-overrides.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."toastr/toastr.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
</head>

<body>
<div class="register-photo bg-transparent">
    <div class="form-container rounded border-info">
        <form action="{{ route('gestion_entreprises_stage.enterprise.store') }}" class="shadow-lg" data-bs-hover-animate="pulse" method="POST" role = "form"  enctype="multipart/form-data" >
            @csrf
            <div><a class="btn btn-info btn-sm btn-circle ml-1" href="{{route("gestion_entreprises_stage.dashboard")}}" role="button" data-toggle="tooltip" data-bs-tooltip="" data-placement="right" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="950" title="Accueil"><i class="fas fa-home text-white"></i></a></div>
            <h2 class="text-center font-weight-bold font-weight-bold text-info" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 25px;"><strong>Ajouter une entreprise</strong></h2>
            <div class="form-group">
                <div class="form-row">
                    <div class="col"><input class="form-control" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="designation" placeholder="Nom" value="{{ old('designation') }}">
                        @error("designation")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                    <div class="col"><input class="form-control" type="email" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="email" placeholder="Email" value="{{ old('email') }}" >
                        @error("email")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col"><input class="form-control" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="adresse" placeholder="Adresse" value= "{{ old('adresse') }}" >
                        @error("adresse")
                        <p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col"><input class="form-control" type="number" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="capacite" placeholder="Capacite d'acceuil" value="{{ old('capacite') }}" >
                        @error("capacite")
                        <p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                        <label style="font-weight: normal;">Domaines d'intervention</label>
                        <select class="form-control" name="domaines[]" multiple="multiple" style="height: 80px;">
                            <optgroup label="Domaines">@foreach(DB::table("domaines")->get() as $domaine)<option value='{{$domaine->id}}' selected=''>{{$domaine->libelle}}</option>@endforeach</optgroup>
                        </select>
                        @error("domaines")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600"><label style="font-weight: normal;">Partenariat avec l'INSTI</label><select class="form-control" name="partenariat"><optgroup label="Partenariat avec l'INSTI"><option value="1" selected="">oui</option><option value="0">Non</option></optgroup></select></div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600"><label style="font-weight: normal;">Date de signature du partenariat</label><input class="form-control" type="date" name="Pdate" value="{{ old('Pdate') }}" >
                        @error("Pdate")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{str_replace("pdate","date",$message)}}</p>@enderror
                    </div>
                </div>
            </div><label data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" style="font-weight: normal;">Contacts</label>
            <div class="form-group">
                <div class="form-row">
                    <div class="col"><input class="form-control" type="text" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="d_contact" placeholder="Directeur" value="{{ old('d_contact') }}" >
                        @error("d_contact")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                    <div class="col"><input class="form-control" type="text" data-aos="fade-up" data-aos-duration="700" data-aos-delay="600" name="s_contact" placeholder="Secretariat" value="{{ old('s_contact') }}" >
                        @error("s_contact")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                    <div class="col"><input class="form-control" type="text" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="a_contact" placeholder="Autres" value="{{ old('a_contact') }}" >
                        @error("a_contact")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                </div>
            </div>
            <p class="text-center" data-aos="fade-up" data-aos-duration="700" data-aos-delay="600" style="text-decoration: underline;">Periode de recrutement</p>
            <div class="form-group">
                <div class="form-row">
                    <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600"><label>Debut</label><input class="form-control" type="date" name="startdate" value="{{ old('startdate') }}" >
                        @error("startdate")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{str_replace("startdate","date",$message)}}</p>@enderror
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600"><label>Fin</label><input class="form-control" type="date" name="enddate" value="{{ old('enddate') }}" >
                        @error("enddate")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{str_replace("enddate","date",$message)}}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" ><label>Choisissez une photo</label><input class="border rounded" type="file" name="photo" id="photo" onchange=" return Validation()" accept="image/*" style="font-weight: bold;font-style: normal;"></div>
                        @error("photo")<p style="color: rgb(193,15,15); font-size: 10px; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
                    </div>
                </div>
            </div>
            <div role="tablist" id="accordion-1" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" >
                <div class="card">
                    <div class="card-header text-center" role="tab">
                        <h6 class="mb-0"><a class="text-info font-weight-bold" data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="#accordion-1 .item-1">Ajouter les parametres de connexions</a></h6>
                    </div>
                    <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row" >
                                    <div class="col-md-6" ><input class="form-control" type="password" name="password" placeholder="mot de passe" value="{{ old('password') }}"></div>
                                    <div class="col-md-6"><input class="form-control" type="password" name="password_confirmation" placeholder="confirmer" value=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @error("password")<p style="color: rgb(193,15,15); font-size: 10px; text-align: center; " data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" >{{$message}}</p>@enderror
            <div class="form-group"><button class="btn btn-primary btn-block bg-info" data-aos="fade-up" data-aos-duration="750" data-aos-delay="600" type="submit" style="font-weight: bold;" id="but">{{ __('Enregistrer') }}</button></div>
            <div><p class="font-weight-bold text-center text-success" style="font-size: 16px;" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" > <?php //echo $info;  ?> </p></div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function Validation() {
        const btn = document.getElementById("but");
        const file = document.getElementById("photo");
        if (file.files[0].size > 1048576) {
            alert("Veuillez reduire la taille du fichier");
            btn.disabled = true;
        }else {
            btn.disabled = false;
        }
    }
</script>
<script src="{{asset($resolved_assets."js/jquery.min.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/bs-init.js")}}"></script>
<script src="{{asset($resolved_assets."js/aos.js")}}"></script>
<script src="{{asset($resolved_assets."toastr/toastr.js")}}"></script>

@if(isset($message))
    <script>
        toastr.success("{{$message}}", 'Succès')
    </script>
@endif

</body>

</html>
