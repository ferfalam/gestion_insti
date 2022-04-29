<section id="features" class="features">

    <div class="container">

        <header class="section-header">
            <p>Listes des Etudiants en Stage</p>
        </header>

        <div class="row">

            <div class="col-lg-6">
                <img src="{{asset($resolved_assets."images/heros/atestation.png")}}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                <div class="row align-self-center gy-4" style="max-height: 500px;overflow-x:hidden;overflow-y:auto" id="intern-content">
                    @forelse($interns as $intern)
                        <div class="col-md-12" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                {{--                                    bi-check--}}
                                <i class="bi bi-question" style="cursor: pointer" data-toggle='tooltip' data-bs-tooltip='' title="Soumettre l'attestation de {{$intern->com_fullname}}" data-id=""></i>
                                <h3>{{$intern->com_fullname}}</h3>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <h3>Aucun Stagiaire trouvé dans votre entreprise</h3>
                            </div>
                        </div>
                    @endforelse
                    <input data-required="image" type="file" name="attestation" hidden id="attestation-input">
                </div>
            </div>

        </div>
    </div>
</section>
@push("custom-scripts")
    <script>
        $("#intern-content i").on("click", function (event) {
            let target = $(event.target)[0];
            const field = $('#' + target.dataset.id)
            $("#attestation-input").click();
        })
    </script>
@endpush

