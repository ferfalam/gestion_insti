@extends('gestion_conseils_plaintes.layouts.layout')

@section('style')
<style>
    .contact-clean
        {
            display: flex;
            justify-content: center;
            align-content: center;
        }

</style>
<link rel="stylesheet" href="{{ asset('gestion_cd/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aladin">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('gestion_cd/fonts/fontawesome5-overrides.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('gestion_cd/css/Contact-Form-Clean.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('gestion_cd/select2/css/select2.min.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@endsection

@section('content')

<div id ="wrapper" class="contact-clean">

    <div style="margin-right:0">
        <a href="{{ route('gestion_conseils_plaintes.model', ) }}">Voir un model</a>
        </div>
        <form method="post" action="{{ route('gestion_conseils_plaintes.nouvelle_plainte') }}">
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ 'Votre plainte a été soumise' }}</strong>
            </div>
          @endif
            @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                </div>
            @endif

            <h2 class="text-center"><br><strong>Votre formulaire de plainte</strong><br><br></h2>

            <span>Motif</span><div class="form-group"><input class="form-control" type="text" name="motif" placeholder="Motif de la plainte"></div>
            <span>Fautifs</span><div class="form-group">
                <select class="select2 form-control select2-multiple"
                    name = "fautifs[]" multiple="multiple" data-placeholder="Fautifs...">
                    @foreach ($users as $user)
                    <option value="{{ $user -> id}}" >{{ $user -> profile -> com_fullname}}</option>
                    @endforeach
                </select>
            </div>

            <span>Temoins</span><div class="form-group">
                <select class="select2 form-control select2-multiple"
                    name = "temoins[]" multiple="multiple" data-placeholder="(facultatif)">
                    @foreach ($users as $user)
                    <option value="{{ $user -> id}}" >{{ $user -> profile -> com_fullname}}</option>
                    @endforeach
                </select>
            </div>
            <span>Description</span><div class="form-group"><textarea class="form-control" name="description" placeholder="Description" rows="4"></textarea></div>

            <div class="form-group"><button class="btn btn-primary" type="submit"
                {{-- onclick="return confirm('Voulez-vous soumettre cette plainte? (Vérifiez bien les informations saisies)'" --}}
                >Envoyer</button></div>
        </form>
    </div>

    @include('sweetalert::alert')
@endsection

@section('script')
<script src="{{ asset('gestion_cd/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('gestion_cd/js/form-advanced.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
