@extends('gestion_conseils_plaintes.layouts.layout')

@section('content')

    <style type="text/css">
    body {
        background-color: #ffffff;
        margin: auto;
        padding: auto;
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
        font-size: 2.2em;
      }

      h2 {
        font-size: 1.6em;
      }
      p{
        font-size: 1.3em;
      }

      ul,ol,dl,address {
        font-size: 1.1em;
      }

      li, dd, dt, address {
        line-height: 1.5;
      }
    </style>
<div width= "800px"
        style ="
        margin: 5em auto;

        width: 800px;
        padding: 2em;
        background-color: #ffffff;
        border-radius: 0.5em;
        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02);
        padding: 2em;

        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02)"
        >
    <h1 class="text-center">Conseil de discipline n° {{ $tile -> id}}</h1><br>


    <h2>Objet: Plainte n° {{ $tile -> plainte -> id}}</h1>


    <h3 class="text-center" >Détails</h3>

    <ul>
      <li>Date: {{ \Carbon\Carbon::parse($tile -> date)->format('j F Y')}}</li>
      <li>Lieu: {{ $tile -> lieu}}</li>
      <li>Heure: {{ \Carbon\Carbon::parse($tile -> heure)->format(' H: i')}}</li>
    </ul>

    <h3 class="text-center">Participants</h2>

        <p>Convoqués:</p>
        <ul>
            @forelse ($tile -> plainte -> fautifs as $participant)
            <li>{{ $participant -> fautif -> profile -> com_fullname }}</li>
            @empty
            <div class="text-center">Aucun convoqué</div>
            @endforelse
        </ul>

    <p>Invités:</p>
    <ul>
        @forelse ($tile -> participants as $participant)
        <li>{{ $participant -> participant -> profile -> com_fullname }}</li>
        @empty
        <div class="text-center">Aucun invité</div>
        @endforelse
    </ul>

    <p>Présents:</p>
    <ul>
        @forelse ($tile -> presents as $presents)
        <li>{{ $presents -> present -> profile -> com_fullname }}</li>
        @empty
        <div class="">Aucun participant présent</div>
        @endforelse
    </ul>
    <p>Maitre de séance: </p>
    <ul>
        <li>
            @if ($tile -> maitre != null)
        {{ $tile -> maitres -> profile -> com_fullname}}
    @else
    <div >Aucun maitre de séance</div>
    @endif

        </li>
    </ul>
</div>

@if ($tile -> tenue == 0)
    <div class="d-flex justify-content-center">
    <div style="margin-bottom: 0.1cm" class="btn-toolbar mx-auto">
        <form method="post" action="{{route('gestion_conseils_plaintes.envoi_convocation', $tile-> id)}}">
        @csrf
        <button class="btn btn-primary mx-2" role="submit" href="">@if ($tile->convocationsOK == 0)
            Envoyer les convocations
        @else
        Renvoyer les convocations par mail
        @endif</button>
        </form>

        @if ($tile -> tenue == 0 && $tile -> convocationsOK == 1 && $tile -> invitationsOK == 1)
        <form method="post" action="{{route('gestion_conseils_plaintes.tenu', $tile-> id)}}">
            @csrf
            <button style="color: #ffffff" class="btn btn-primary mx-2" role="submit" href="">
                Valider la tenue du conseil</button>
            </form>
        @endif

        <form method="post" action="{{route('gestion_conseils_plaintes.envoi_invitation', $tile-> id)}}">
            @csrf
            <button style="color: #ffffff" class="btn btn-primary mx-2" role="submit" href="">@if ($tile->invitationsOK == 0)
                Envoyer les invitations
            @else
            Renvoyer les invitations par mail
            @endif </button>
            </form>
    </div>
</div>
    @endif

    <div class="d-flex justify-content-center">
        <div style="margin-bottom: 1cm" class="btn-toolbar mx-auto">
            <a style="color: #ffffff" class="btn btn-primary mx-2" role="button" href="{{route('gestion_conseils_plaintes.formulaire_edition_conseil', $tile-> id)}}">Modifier le conseil</a>

            @if ($tile ->tenue == 1 && $tile->rapport == 0)
            <a style="color: #ffffff" class="btn btn-primary mx-2" role="button" href="{{route('gestion_conseils_plaintes.formulaire_rapport', $tile-> id)}}">Soumettre un rapport</a>
            @elseif ($tile ->tenue == 1  && $tile->rapport == 1)
            <a style="color: #ffffff" class="btn btn-primary mx-2" role="button" href="{{route('gestion_conseils_plaintes.formulaire_rapport', $tile-> id)}}">Télécharger le rapport</a>
            @endif
</div>

</div>


@endsection
