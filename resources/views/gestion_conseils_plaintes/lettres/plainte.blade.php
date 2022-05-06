@extends('gestion_conseils_plaintes.layouts.letters')
@section('content')

<style type="text/css">
    body {


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
        style ="
        padding: 2em;
        background-color: #ffffff;
         ">
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


    <h2><strong>Objet: </strong>Dépôt de plainte </h2>
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
    <p>Je vous prie d'agréer, Monsieur le Chef Service, l'expression de mes sentiments les meilleurs</p>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div style="text-align: right"><p><strong>{{$tile -> plaignant -> profile -> com_fullname}}</strong></p></div>

    </div>
@endsection
