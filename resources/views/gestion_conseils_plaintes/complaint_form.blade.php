@extends('gestion_conseils_plaintes.layouts.app')

@section('content')
<div class="contact-clean">
        <form method="post" action="{{ route('gestion_conseils_plaintes.nouvelle_plainte') }}">
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
            <h2 class="text-center"><br><strong>Votre formulaire de plainte</strong><br><br></h2>
            <div class="form-group"><input class="form-control typeahead" type="text" name="nom_fautif" id="cust" placeholder="Nom du fautif"></div>
            <div class="form-group"><input class="form-control" type="text" name="motif" placeholder="Motif de la plainte"></div>
            <div class="form-group"><textarea class="form-control" name="description" placeholder="Description " rows="14"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Envoyer</button></div>
        </form>
    </div>

    <script type="text/javascript">
        var path = "{{ route('gestion_conseils_plaintes.autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection

