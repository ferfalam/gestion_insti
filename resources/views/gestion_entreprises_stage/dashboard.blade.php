@extends('gestion_entreprises_stage.layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">

    @if($userGroup == "admin")
            <div class="text-center d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-center text-dark mb-0" data-aos="zoom-in"><strong>Tableau De Bord</strong><br></h3>
            </div>
            @include('gestion_entreprises_stage.layouts.available_place__interns_active')
            <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bold text-primary" id="enterprise-tab" data-toggle="tab" href="#enterprise" role="tab" aria-controls="enterprise" aria-selected="true">Liste des Entreprises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-primary" id="recommendation-tab" data-toggle="tab" href="#recommendation" role="tab" aria-controls="recommendation" aria-selected="false">Recommandations</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="enterprise" role="tabpanel" aria-labelledby="enterprise-tab">@include('gestion_entreprises_stage.enterprises.enterprise_table')</div>
                <div class="tab-pane fade" id="recommendation" role="tabpanel" aria-labelledby="profile-tab">@include('gestion_entreprises_stage.layouts.recommendation')</div>
            </div>

        @elseif($userGroup == "apprenant")
            <div class="text-center d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-center text-dark mb-0" data-aos="zoom-in"><strong>Tableau De Bord</strong><br></h3>
            </div>
            @include('gestion_entreprises_stage.enterprises.enterprise_table')

        @elseif($userGroup == "partenaire")
            <div class="text-center d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-center text-dark mb-0" data-aos="zoom-in"><strong>Tableau De Bord</strong><br></h3>
            </div>
            @include('gestion_entreprises_stage.enterprises.interns_lists')
{{--            @include('gestion_entreprises_stage.enterprises.offers_form')--}}
        @endif
    </div>

    <script>
        const enterprise = document.getElementById("enterprise-tab");
        const recommendation = document.getElementById("recommendation-tab")
        const enterprise_content = document.getElementById("enterprise")
        const recommendation_content = document.getElementById("recommendation")
        enterprise.onclick = function () {
            enterprise_content.classList.add("show", "active")
            recommendation_content.classList.remove("show", "active")
        }
        recommendation.onclick = function () {
            recommendation_content.classList.add("show", "active")
            enterprise_content.classList.remove("show", "active")
        }

    </script>
@endsection
