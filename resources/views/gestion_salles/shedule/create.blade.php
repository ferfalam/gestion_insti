@extends('gestion_salles.layout')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                    <select name="year" class="form-control select2" id="year">
                                        @foreach ($years as $year)
                                            <option value="{{$year->id}}">{{\Carbon\Carbon::createFromFormat('Y-m-d', $year->startDate)->format('Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $year->endDate)->format('Y')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="semestre">Semestre</label>
                                    <select name="semestre" class="form-control select2" id="semestre">
                                        @foreach ($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->designation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="scheduleFile">Emploi du temps PDF</label>
                            <input name="emploi_fic" type="file" class="form-control" id="scheduleFile">
                        </div>
                        <legend>Unité d'Ensignement</legend>
                        <div id="ue">
                            <div id="ue-1">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="matiere">UE</label>
                                            <select name="matiere" class="form-control select2" id="matiere">
                                                @foreach ($ues as $ue)
                                                    <option value="{{$ue->id}}">{{$ue->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="enseignant">Nom & prénom de l'enseignant</label>
                                            <select name="enseignant" class="form-control select2" id="ue">
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->com_fullname}}</option>
                                                @endforeach
                                            </select>
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
                        <div class="pb-2">
                            <div class="block">
                                <button class="btn bg-primary rounded py-2 px-4 text-white " id="add">+</button>
                                {{-- 🗑️ --}}
                                <button class="btn bg-danger rounded py-2 px-4 text-white  " id="delete">-</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
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
