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
        text-align: left;
      }
      .receiver-column {
        text-align: left;
        width: 100%;
        right:10%
      }

      .date {
        width: 100%;
        right: 10%;
        text-align:left;
      }

      h1 {
        font-size: 1.5em;
      }

      h2 {
        font-size: 1.3em;
      }

      p,ul,h2,ol,dl, address {
        font-size: 1em;
      }

      p, li, dd, dt, address, strong {
        line-height: 1.2em;
      }
    </style>
<div id="letter" width= "800px" height= 1110px;
        style ="margin: 5em auto;
        padding: 2em;
        background-color: #fdfdff;
        border-radius: 0.5em;
        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02)"
         class="col-lg-7 col-xl-8">
    <h1 style="text-align: center; margin_bottom: 2em">Lettre de plainte</h1>
    <br>

    <div>

    </div>
    <div style="width:100%">
    <div style="text-align: left; margin-left:auto; margin-right:0; width:5cm"><p>Lokossa, le <strong>{{\Carbon\Carbon::now()->format('j F Y') }}</strong></div>
    </div>
    <br>

     <address class="sender-column">
      <p>{{$tile -> plaignant -> profile -> com_fullname}}<br>
      <strong>Numéro matricule: </strong>61234567<br>
      <strong>Tel</strong>: {{$tile -> plaignant -> profile -> com_phoneNumber}}<br>
      <strong>Email</strong>: {{$tile -> plaignant -> email}}
    </address>



    <div style=" width:100%">
        <div style="text-align: left; margin-left:auto; margin-right:0; width:5cm">
            <address class="receiver-column">
                <div >
                    <p>A <br>
                        Monsieur le Chef Service des Plaintes
                        de l'Institut National Supérieur de
                        Technologie Industrielle ex-IUT de Lokossa</p>
                </div>

              </address>
        </div>

    </div>


    <h2><strong>Objet: </strong>Dépôt de plainte </h1>
        <br>
        <br>

    <p>Monsieur le Chef Service, </p>
    <p>J'ai l'honneur d'attirer votre attention sur les faits de {{ $tile -> motif}}, occasionnés par le(s) interess(é)s:
        @foreach ($tile -> fautifs as $fautife)
        <strong>{{$fautife -> fautif -> profile -> com_fullname}}</strong>,
        @endforeach connus dans l'enceinte de cet établissement.
    </p>
    <p>En effet, ce(s) dernier(s) ont {{ $tile -> description}}...</p>
    @if ($tile -> temoins -> count() != 0)
    <p>Une/Plusieurs personnes ont été témoins des faits mentionnés ci-dessus. Il s'agit de:
        @foreach ($tile -> temoins as $temoin)
        <strong>{{$temoin -> temoin -> profile -> com_fullname }}</strong>,
        @endforeach joignables aux numéros respectifs:
        @foreach ($tile -> temoins as $temoin)
        <strong> {{$temoin -> temoin -> profile -> com_phoneNumber}}</strong>,
        @endforeach .</p>
    @endif
    <p>Dans ces conditions, je vous prie de bien vouloir accepter mon dépôt de plainte afin de doner une suite légale à cette affaire et de faire valoir mes droits.</p>
    <p>Je vous prie d'agréer, Monsieur le Chef Service, l'expression de mes sentiments les meilleurs.</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="text-align: right"><p><strong>{{$tile -> plaignant -> profile -> com_fullname}}</strong></p></div>
    <br>



</div>
@if ($tile -> statut == 0 && auth()->user()->id == $tile -> id_plaignant)

<div class="d-flex justify-content-center">
    <div class="btn-toolbar mx-auto" style="margin-bottom: 0.5cm">
        <a style="color: white" class=" btn btn-primary  mx-2" role="button" href="{{route('gestion_conseils_plaintes.formulaire_edition_plainte', $tile-> id)}}">Modifier la plainte</a>
        <form action="{{route('gestion_conseils_plaintes.suppression_plainte', $tile-> id)}}"
            method="post">
            @csrf
            <button
                class="btn btn-xs btn-info pull-right btn-danger mx-2" onclick="return confirm('Voulez vous vraiment supprimer cette plainte?')">
                Supprimer la plainte
            </button>
        </form>
    </div><br>
</div>
@endif

@if ($tile -> statut == 0 && auth()->user()->user_groupId == 1)
<div class="d-flex justify-content-center">
    <div class="btn-toolbar mx-auto" style="margin-bottom: 1cm">
        <a href="{{ route('gestion_conseils_plaintes.formulaire_conseil', $tile-> id) }}" style="color: white" class=" btn btn-primary  mx-2">Organiser un conseil</a>
        <form action="{{ route('gestion_conseils_plaintes.rejet_plainte', $tile-> id) }}"
            method="post">
            @csrf
            <button
                class="btn btn-xs btn-info pull-right mx-2 btn-danger" onclick="return confirm('Voulez vous vraiment rejeter cette plainte?')">
                Rejeter la plainte
            </button>
        </form>
        </div>
</div>
@endif
<div class="text-center">
    <div class="btn-group" style="margin-bottom: 1cm">
        <form action="{{ route('gestion_conseils_plaintes.telechargerPlainte', $tile ->id) }}" method="post">
            @csrf
            <button href="" class="btn btn-primary">Télécharger le document</button>
        </form>
        </div>
</div>

</div>
@endsection
