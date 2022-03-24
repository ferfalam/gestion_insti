
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{asset($resolved_assets."bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."fonts/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/aos.css")}}">
    <link rel="stylesheet" href="{{asset($resolved_assets."css/Registration-Form-with-Photo.css")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
</head>
<body class="bg-img">
<div id="login" class="border rounded-0 register-photo bg-transparent border-0" data-aos="fade-left" data-aos-duration="900" data-aos-delay="350">
    <div class="form-container shadow-sm">
        <div data-aos="zoom-out-up" data-aos-duration="950" data-aos-delay="400" class="image-holder shadow"></div>
        <form class="shadow" method="post" action="{{ route('gestion_entreprises_stage.login') }}">
            @csrf
            @error("email")
            <div id="dpy" class="float-right rounded" data-aos="fade-left" data-aos-duration="500" data-aos-delay="1000" style="background-color: #ff7489"><p class="text-light font-weight-bold text-center mt-2 p-2" style="font-size: smaller">{{$message}}</p></div>
            @enderror
            <h2 class="text-center"><strong>Connexion</strong></h2>
            <div class="form-group shadow-sm"><input class="form-control" type="email" name="email" placeholder="Email" value="{{old('email')}}" required autofocus></div>
            <div class="form-group shadow-sm"><input class="form-control" type="password" name="password" placeholder="Password"  value="" required autocomplete="current-password"></div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
            <div class="form-group shadow"><button class="btn btn-primary btn-block font-weight-bold" data-bs-hover-animate="pulse" type="submit" name="Connect" onclick="showdivt()" id="subbtn">{{ __('Connecter') }}</button></div><a class="already" href="#">Vous n'avez pas un compte? S'inscrire ici</a></form>
    </div>
</div>
<script type="text/javascript">
    function showdiv() {
        const dis = document.getElementById("dpy");
        dis.style.visibility = "hidden";
    }
    function showdivt() {
        const dis = document.getElementById("dpy");
        // dis.style.visibility = "visible";
        // window.setTimeout("showdiv()", 3000);
    }
</script>
<script src="{{asset($resolved_assets."js/jquery.min.js")}}"></script>
<script src="{{asset($resolved_assets."bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset($resolved_assets."js/bs-init.js")}}"></script>
<script src="{{asset($resolved_assets."js/aos.js")}}"></script>
</body>

</html>
