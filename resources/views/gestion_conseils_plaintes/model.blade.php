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
      <p>Votre nom<br>
      <strong>Numéro matricule: </strong>XXXXXXXX<br>
      <strong>Tel</strong>: XXXXXXXX<br>
      <strong>Email</strong>: Votre mail
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
    <p>J'ai l'honneur d'attirer votre attention sur les faits de <strong>Motif</strong>, occasionnés par le(s) interess(é)s:

        <strong>Individu 1</strong>,
        <strong>Individu 2...</strong>,
         connus dans l'enceinte de cet établissement.
    </p>
    <p>En effet, ce(s) dernier(s) ont <strong>Description</strong>...</p>

    <p>Une/Plusieurs personnes ont été témoins des faits mentionnés ci-dessus. Il s'agit de:

        <strong>Temoin 1</strong>,
        <strong>Temoin 2...</strong>,
        joignables aux numéros respectifs:
        <strong> XXXXXXXX</strong>,
        <strong> XXXXXXXX</strong>
        .</p>

    <p>Dans ces conditions, je vous prie de bien vouloir accepter mon dépôt de plainte afin de donner une suite légale à cette affaire et de faire valoir mes droits.</p>
    <p>Je vous prie d'agréer, Monsieur le Chef Service, l'expression de mes sentiments les meilleurs.</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="text-align: right"><p><strong>Votre nom</strong></p></div>
    <br>



</div>

</div>
@endsection
