@extends('gestion_salles.layout')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <style>
        a {
            text-decoration: none
        }
        .form-control{
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        input[type=file]{
            padding-top: 2px !important;
        }
    </style>
@endsection
@section('main')
    <div id="overviews" class="section lb">
        <div class="section-title row mx-4">
            <div class="col-md-8">
                <h3>Créer emploi du temps</h3>
            </div>
            <div class="col-md-4 text-right">
            </div>
        </div><!-- end title -->
    </div><!-- end section -->

    <div class="row mx-4">
        <div class="col-md-12 my-4 elevate-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gestion_salle.shedule.store', []) }}" method="POST">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="year">Année d'étude</label>
                                    <select name="year" class="form-control" id="year">
                                        <option value="1">1ère année</option>
                                        <option value="2">2ème année</option>
                                        <option value="3">3ème année</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="semestre">Semestre</label>
                                    <select name="semestre" class="form-control" id="semestre">
                                        <option value="1">Semestre 1</option>
                                        <option value="2">Semestre 2</option>
                                        <option value="3">Semestre 3</option>
                                        <option value="4">Semestre 4</option>
                                        <option value="5">Semestre 5</option>
                                        <option value="6">Semestre 6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <legend>Unité d'Ensignement</legend>
                        <div id="ue">
                            <div id="ue-1">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="matiere">UE</label>
                                            <select name="semestre" class="form-control" id="semestre">
                                                <option value="1">POO(Programmation Orientée Objet)</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="enseignant">Nom & prénom de l'enseignant</label>
                                            <input type="text" name="enseignant" class="form-control" id="enseignant">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="startTime">Heure du début</label>
                                            <input type="time" name="startTime" class="form-control" id="startTime">
                                        </div>

                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="endTime">Heure de fin</label>
                                            <input type="time" name="endTime" class="form-control" id="endTime">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="scheduleFile">Fichier</label>
                                <input name="emploi_fic" type="file" class="form-control" id="scheduleFile">
                            </div>
                        <div class="pb-2">
                            <div class="block">
                                <button class="btn bg-primary rounded py-2 px-4 text-white " id="add">+</button>
                                <button class="btn bg-danger rounded py-2 px-4 text-white  " id="delete">🗑️</button>
                                <button type="submit" class=" btn bg-primary py-2 px-4 rounded text-white" id="submit">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
    <script>
        $('button#add').click((e)=>{
            e.preventDefault()
            const parent = $("#ue");
            var prevDiv = $('div[id^="ue"]:last');
            var num = parseInt(prevDiv.prop("id").split('-')[1]) + 1;
            var nextDiv = prevDiv.clone().prop('id', 'ue-'+num );
            nextDiv.appendTo(parent)
        })

        $("button#delete").click((e) => {
            e.preventDefault()
            var prevDiv = $('div[id^="ue"]:last');
            if (prevDiv.prop("id") !== 'ue-1') {
                prevDiv.remove();
            }
        })

        $("button#submit").click((e) => {
            e.preventDefault()
            matiere = []
            $("[id=matiere]").each((index) => {
                matiere.push(this.val())
            })

            console.log("Matière", matiere)
        })
    </script>
@endsection
