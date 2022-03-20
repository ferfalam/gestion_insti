@extends('gestion_salles.layout')

@section('main')

	<div id="domain" class="section wb">
        <div class="container">
            <div class="row text-center">
				<div class="col-lg-12">
                    <div class="customwidget text-center">
                        <div id="search">
                            <div class="col-lg-12">
                                <h1>Trouver votre Salle de classe</h1>
                                @if (session('errMsg'))
                                    <div class="alert alert-danger">
                                        {{ session('errMsg') }}
                                    </div>
                                @endif
                                <form class="checkdomain form-inline" method="POST" action="#">
                                    @csrf
                                    <div class="checkdomain-wrapper">
                                        <div class="form-group">
                                            <label class="sr-only" for="domainnamehere">Salle de classe</label>
                                            <input type="text" class="form-control" name="salle" id="salle" placeholder="Entrer le nom la salle de classe">
                                        </div>
                                        <div class="row my-2">
                                            <button type="submit" class="btn btn-primary grd1 w-50 m-auto"><i class="fa fa-search"></i></button>
                                        </div>
                                        <hr>
                                    </div><!-- end checkdomain-wrapper -->
                                </form>
                            </div>
                        </div>
                        <div id="searchAdvanced">
                            <div class="container">
                                <h1>Recherche de salle avancée</h1>
                                <form action="" method="post">
                                    <div class="checkdomain form-inline" style="padding: 0 !important">
                                        <div class="checkdomain-wrapper">
                                            <div class="form-group">
                                                <label class="sr-only" for="domainnamehere">Salle de classe</label>
                                                <input type="text" class="form-control w-100" name="salle" id="salle" placeholder="Entrer le nom la salle de classe">
                                            </div>
                                            <hr>
                                        </div><!-- end checkdomain-wrapper -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="etat">Etat</label>
                                                <select name="etat" class="form-control" id="etat">
                                                    <option value="0">Occupée</option>
                                                    <option value="1">Libre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jour">Jour</label>
                                                <select name="jour" class="form-control" id="jour">
                                                    <option value="1">Lundi</option>
                                                    <option value="2">Mardi</option>
                                                    <option value="3">Mercredi</option>
                                                    <option value="4">Jeudi</option>
                                                    <option value="5">Vendredi</option>
                                                    <option value="6">Samedi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="startTime">Heure du début</label>
                                                <input type="time" name="startTime" class="form-control" id="startTime">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="endTime">Heure de fin</label>
                                                <input type="time" name="endTime" class="form-control" id="endTime">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <button type="submit" class="btn btn-primary grd1 w-50 m-auto"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="p-3">
                            <button class="btn btn-outline-primary rounded-circle w-50" id="advanced">
                                Recherche Avancée
                            </button>
                        </div>
                        <p>Vous pouvez consulter sur ce site les salles disponibles que vous pourrez occuper pour dérouler vos cours.</p>
                        <p>Retrouver aussi vos emploi du temps dans la session "Téléchargement"</p>
                        <!-- end list -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection

@section('script')
    <script>
        (() => {
            var advanced = false
            $('#searchAdvanced').hide()

            $('#advanced').click((e) => {
                e.preventDefault()
                advanced = !advanced
                if (advanced) {
                    $('#search').fadeOut(300)
                    $('#searchAdvanced').show(600)
                    $('#advanced').text("Recherche Simple")
                }else{
                    $('#searchAdvanced').fadeOut(300)
                    $('#search').show(600)
                    $('#advanced').text("Recherche Avancée")
                }
            })
        })()
    </script>
@endsection
