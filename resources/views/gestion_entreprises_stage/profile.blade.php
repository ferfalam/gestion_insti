@extends('gestion_entreprises_stage.layouts.app')
@section('title')
    Profil
@endsection

@section("head")
    <link rel="stylesheet" href="{{asset("assets/css/dropzone.css")}}">
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4" data-aos="zoom-in" data-aos-duration="650" style="font-weight: bold;">Profil</h3>
        @if($userGroup == "partenaire")
            @include('gestion_entreprises_stage.profiles.enterprise_profile')
        @else
            @include('gestion_entreprises_stage.profiles.studentsAndAdminProfile')
        @endif
    </div>
@endsection

@section("script")
{{--    <script src="{{asset("assets/js/dropzone.min.js")}}"></script>--}}
@endsection
