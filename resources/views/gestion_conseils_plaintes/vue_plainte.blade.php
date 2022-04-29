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
        style ="margin: 5em auto;
        padding: 2em;
        background-color: #fdfdff;
        border-radius: 0.5em;
        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02)"
         class="col-lg-7 col-xl-8">
    <h1>Example Domain</h1>
     <address class="sender-column">
    <strong>Lokossa le </strong><time datetime="2016-01-20">20 January 2016</time><br>
      <strong>CA. Eleanor Gaye</strong><br>
   Numéro matricule=10599,<br>
      <strong>Tel</strong>: 123-456-7890<br>
      <strong>Email</strong>: no_reply@example.com
    </address>

    <p class="sender-column"><time datetime="2016-01-20">20 January 2016</time></p>

    <address>
      <strong>Chef scolarité</strong><br>
      AHOGNISSE Ariel<br>
   Numéro matricule=4321 <br>

    </address>

    <h1>Object=Conseil de discipline </h1>

    <p>Cher CA,</p>

    <p>Il sera organisé un conseil de discipline pour gerer le cas de l'etudiant GOHOUE rodias.IL a été absent pendant 1 mois au cours de math . Votre présence est requise </p>

    <h2>Lieu et date du conseil</h2>

    <p>les informations concernant ce conseil sont les suivantes:</p>

    <ul>
      <li>Lieu: Salle des professeurs /INSTI LOKOSSA</li>
      <li>Date<time datetime="2022-1-4">4/01/2022</time></li>
      <li>Heure: 16h00</li>
    </ul>

    <h2>Participants</h2>

    <p>En plus de vous ,les personnes présentes a ce conseil seront:</p>

    <ol>
      <li>Monsieur AMOUSSA Farid DE</li>
      <li>Madame BIAOU Laurette SR</li>
      <li>Les parents de l'étudiant/e</li>
      <li>Monsieur BABIO Amir (Témoin)</li>
    </ol>









    <p>Nous esperons votre presence a ce conseil . </p>

    <p>Yours sincerely,</p>

    <p>Dr Eleanor Gaye</p>


    <p>University of Awesome motto: <q>Be awesome to each other.</q> -- <cite>The memoirs of Bill S Preston, <abbr title="Esquire">Esq</abbr></cite></p>


</div>
@if ($tile -> statut == 0 && auth()->user()->id == $tile -> id_plaignant)
<div class="col-lg-7 col-xl-8"><div style ="margin: 10px auto;" class="form-group"><a class="btn btn-primary" role="button" href="{{route('gestion_conseils_plaintes.formulaire_edition_plainte', $tile-> id)}}">Modifier la plainte</a>
<form action="{{route('gestion_conseils_plaintes.suppression_plainte', $tile-> id)}}"
    method="post">
    @csrf
    <button
        class="btn btn-xs btn-info pull-right " onclick="return confirm('Voulez vous vraiment supprimer cette plainte?')">
        Supprimer la plainte
    </button>
</form></div>
@endif

@if ($tile -> statut == 0)
@if (auth()->user()->statusId == 1)
<div class="form-group"><a href="{{ route('gestion_conseils_plaintes.formulaire_conseil', $tile-> id) }}" class="btn btn-xs  btn-info pull-right">Organiser un conseil</a></div>

<form action="{{ route('gestion_conseils_plaintes.rejet_plainte', $tile-> id) }}"
    method="post">
    @csrf
    <button
        class="btn btn-xs btn-info pull-right btn-danger" onclick="return confirm('Voulez vous vraiment rejeter cette plainte?')">
        Rejeter la plainte
    </button>
</form>
@endif
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
</div>
@endsection
