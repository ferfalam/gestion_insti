@extends('gestion_conseils_plaintes.layouts.letters')
@section('content')


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lettre de convocation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body {
      background-color: #ffffff;
      margin: 0;
      padding: 0;
      font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    a:link,
    a:visited {
      color: #38488f;
      text-decoration: none;
    }

    @media (max-width: 700px) {
      div {
        margin: 0 auto;
        width: auto;
      }
    }
    .receiver-column {
        text-align: left;
        width: 100%;
        right:10%
    }

    .signature {
        text-align: center;
        width: 100%;
        right:10%;
        bottom: 10%
    }

    h1 {
      font-size: 1.5em;
    }

    h2 {
      font-size: 1.3em;
    }

    p,
    ul,
    ol,
    dl,
    address {
      font-size: 1.em;
    }

    p,
    li,
    dd,
    dt,
    address {
      line-height: 1.5;
    }

    #horizontal-line{

display: block;
margin-top:60px;
margin-bottom: 10px;
width:100%;
margin-left: auto;
margin-right: auto;
border-style: inset;
border-width: 1px;
border-color: #000000;


}

    #footer {


   position : relative;
   bottom : 0;
   height:20px;
   margin-top : 10px;
   text-align: center ;
   font-size: 10px ;
   font-family: 'Lato' ;


}
  </style>
</head>

<body>



    <h1 style=" font-size: 1em;"><strong>Objet: Convocation à conseil de discipline </strong></h1><br>
    <!--Début du contenu de la lettre-->
    <p>@if ($tile-> user -> profile -> gender == "F")
        Madame,
        @else
        Monsieur,
        @endif <br>
    En reponse au dépôt de plainte n°{{ $tile -> conseil -> plainte -> id  }} du <strong>{{$tile -> conseil -> plainte -> created_at -> format('j F Y')}}</strong> par
    @if($tile-> user -> profile -> gender == "F")
    Madame
    @else
    Monsieur
    @endif  <strong>{{ $tile -> conseil -> plainte -> plaignant -> profile -> com_fullname}} </strong> portant pour motif  <strong>{{ $tile -> conseil -> plainte -> motif }} </strong> par le(s) individus: @foreach ($tile -> conseil -> plainte -> fautifs as $fautif)
    <strong>{{$fautif -> fautif -> profile -> com_fullname }}</strong>,
    @endforeach

     j'ai l'honneur de vous informer que vous êtes prié d'être présent à la prochaine séance de conseil de discipline qui examinera votre cas et aura lieu le  <strong>{{ \Carbon\Carbon::parse($tile -> conseil -> date)->format('j F Y') }}  </strong>à  <strong>{{ \Carbon\Carbon::parse($tile -> conseil -> heure)->format('H:i')  }} </strong> précises
    dans l'/la {{ $tile -> conseil -> lieu }}.</p>

    <p>Vous pourrez présenter votre défense oralement ou par écrit, ou en vous faisant assister par une personne de votre choix. Dans
        ce cas, vous devrez bien me communiquer ses nom, prénoms et adresse afin que je lui fasse parvenir une convocation réglementaire. </p><br>

    <p>Tout en vous souhaitant une bonne reception, je vous prie de recevoir, @if ($tile-> user -> profile -> gender == "F")
        Madame
        @else
        Monsieur
        @endif mes meilleures salutations.</p>

    <!--fin du contenu de la lettre-->
    <div style=" margin-left:auto;text-align:left; margin-right:0; width:5.5cm; height:3cm">
        <div class="signature">
            <br><br><br><br>
            <p style="text-align: right; text-decoration: underline"><strong> John Doe Admin</strong></p>
        </div>
    </div>
    <hr id="horizontal-line">
    <div id="footer" class="center-text">
        <div><strong>INSTI ex Institut Universitaire de Technologie BP: 133 - Mail: <a href="mailto:instilokossa@gmail.com">instilokossa@gmail.com</a> - site web : http://insti.edu.bj/ </strong></div>
        </div>
    </div>






</body>


@endsection
