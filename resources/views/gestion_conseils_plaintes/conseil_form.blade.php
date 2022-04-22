@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-1">Organisation d'un conseil de discipline</h3>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Formulaire d'invitation</h4>
            <div class="form-group">
                <form id="dynamic_form" method="post" action="{{ route('gestion_conseils_plaintes.nouveau_conseil', $item) }}"><span>Date de la réunion</span><input class="border rounded form-control" name="date" placeholder="" type="date" style="margin-bottom: 20px;">
                    <br><span>Heure de début</span><input name="heure" placeholder="" class="form-control" type="time" style="margin-bottom: 20px;">
                    <div class="form-row"
                        style="margin-bottom: 40px;">
                        {{-- <div class="col"><span>Durée</span><input class="form-control" type="text"></div> --}}
                    {{-- </div><span>Nom du participant</span><input name="date" placeholder="" class="form-control typeahead" type="text" style="margin-bottom: 15px;"> --}}
                    {{-- <span>Numéro matricule du participant</span><input class="form-control" type="text" style="margin-bottom: 30px;"><span>Ordre du jour&nbsp;</span> --}}
                    {{-- <table class="table table-bordered table-striped" id="user_table">
                        <thead>
                         <tr>
                             <th width="80%">Noms des participants</th>
                             <th width="20%">Action</th>
                         </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                    @csrf
                           {{-- <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" /> --}}
                    {{-- <textarea
                        class="form-control" style="margin-bottom: 20px;"></textarea> --}}
                        {{-- <div class="form-group"><button class="btn btn-primary" id="save" type="submit">Confirmer les informations</button></div> --}}
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                                <th>Ajouter des participants</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="addMoreInputFields[0][participant_name]" placeholder="Nom du participant" class="form-control typeahead" />
                                </td>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Participant supplémentaire</button></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-outline-success btn-block">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][participant_name]" placeholder="Nom du participant" class="form-control typeahead"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Retirer</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

@endsection



