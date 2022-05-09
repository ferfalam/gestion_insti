<section id="features" class="features">

    <div class="container">

        <header class="section-header">
{{--            <div class="col-lg-3">--}}
{{--                <img src="{{asset($resolved_assets."images/heros/atestation.png")}}" class="img-fluid" alt="">--}}
{{--            </div>--}}
            <p>Listes des Etudiants en Stage</p>
        </header>

        <div class="row">

            <div class="col mt-5 mt-lg-0 table-centered">
                <div class="row align-self-center gy-4" style="max-height: 500px;overflow-x:hidden;overflow-y:auto" id="intern-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom et prénoms</th>
                            <th scope="col">Date d"entrée</th>
                            <th scope="col">Date de fin</th>
                            <th scope="col">Attestation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @forelse($interns as $intern)
                                <th scope="row">{{$loop->index}}</th>
                                <td>{{$intern->com_fullname}}</td>
                                <td>{{$intern->startdate}}</td>
                                <td>{{$intern->enddate}}</td>
                                <td><button type="button" class="btn btn-primary" id="add-domain">Soumettre</button></td>
                            @empty
                                <div class="col-md-12" data-aos="zoom-out" data-aos-delay="200">
                                    <div class="feature-box d-flex align-items-center">
                                        <h3>Aucun Stagiaire trouvé dans votre entreprise</h3>
                                    </div>
                                </div>
                            @endforelse
                        </tr>

                        </tbody>
                    </table>

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

