@extends('gestion_conseils_plaintes.layouts.layout')

@section('content')


    <style type="text/css">
    body {
        background-color: #f0f0f2;
        margin: 0;
        padding: 0;
        font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    a:link, a:visited {
        color: #38488f;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        div {
            margin: 0 auto;
            width: auto;
        }
    }



      .sender-column {
        text-align: right;
      }

      h1 {
        font-size: 1.5em;
      }

      h2 {
        font-size: 1.3em;
      }

      p,ul,ol,dl,address {
        font-size: 1.1em;
      }

      p, li, dd, dt, address {
        line-height: 1.5;
      }
    </style>
<div width= "800px"
        style ="
        padding: 2em;

        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02)"
        >
    <h1 class="text-center">Conseil de discipline n° {{ $tile -> id}}</h1>


    <h1>Object: Plainte n° {{ $tile -> plainte -> id}}</h1>


    <h2>Details</h2>

    <ul>
      <li>Date: {{ $tile -> date}}</li>
      <li>Lieu: {{ $tile -> lieu}}</li>
      <li>Heure: {{ $tile -> heure}}</li>
    </ul>

    <h2>Participants</h2>
    <p>Invités:</p>
    <ol>
        @forelse ($tile -> participants as $participant)
        <li>{{ $participant -> participant -> pseudo }}</li>
        @empty
        <div class="text-center">Aucun participant</div>
        @endforelse
    </ol>
    <p>Présents:</p>
    <ol>
        @forelse ($tile -> presents as $presents)
        <li>{{ $presents -> present -> pseudo }}</li>
        @empty
        <div class="text-center">Aucun participant présent</div>
        @endforelse
    </ol>
    <p>Maitre de séance: @if ($tile -> maitre != null)
        {{ $tile -> maitres -> pseudo}}
    @else
    <div class="text-center">Néant</div>
    @endif </h1>
</div>
<div class="col-lg-7 col-xl-8"><div style ="margin: 10px auto;" class="form-group"><a class="btn btn-primary" role="button" href="{{route('gestion_conseils_plaintes.formulaire_edition_conseil', $tile-> id)}}">Modifier le conseil</a>
<div class="form-group"><a class="btn btn-primary btn-sm d-none d-sm-inline-block text-white-50" role="button" href="{{route('gestion_conseils_plaintes.formulaire_rapport', $tile-> id)}}">Soumettre un rapport</a></div>


@endsection
