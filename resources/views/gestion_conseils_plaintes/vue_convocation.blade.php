<!DOCTYPE html>
<!-- saved from url=(0069)file:///home/kalirodi/T%C3%A9l%C3%A9chargements/example%20letter.html -->
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lettre de convocation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body {
      background-color: #f0f0f2;
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



    .sender-column {
      text-align: right;
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
      font-size: 1.1em;
    }

    p,
    li,
    dd,
    dt,
    address {
      line-height: 1.5;
    }
  </style>
</head>

<body>
  <div class="col-lg-7 col-xl-8 " style="width: 800px;
        margin: 5em auto;
        padding: 2em;
        background-color: #fdfdff;
        border-radius: 0.5em;
        box-shadow: 2px 3px 7px 2px rgba(0,0,0,0.02);">

    <div class="container">

      <div class="row">
        <div class="col " style="text-align: center;">
          <h2 style="font-size: medium;">REPUBLIQUE DU BENIN <br>********<br>MINISTERE DE L'ENSEIGNEMENT SUPERIEUR ET DE
            LA RECHERCHE SCIENTIFIQUE
            <br>***************</h2>
        </div>
      </div>
      <div class="row">
        <div class="col" style="text-align: left;">
          <div class="row no-gutters">
            <div class="col-auto">
              <img src="{{ asset('gestion_cd/unstim.jpeg') }}" class="img-fluid" alt="logo unstim" style="width:90px ; height: 90px;">
            </div>
            <div class="col">
              <div class="card-block px-2"><br><br>
                <p style="font-size: xx-small;">UNIVERSITE NATIONALE DES SCIENCES <br> TECHNOLOGIES INGENIERIE ET
                  MATHEMATIQUES
                  <br>
                  ABOMEY
                </p>
              </div>
            </div>
          </div>

        </div>
        <div class="col" style="text-align: left;">
          <div class="row no-gutters">
            <div class="col">
              <div class="card-block px-2"><br><br>
                <p style=" font-size: xx-small;">INSTITUT NATIONAL SUPERIEUR DE TECHNOLOGIE <br> INDUSTRIELLE (Ex UIT)
                </p>
              </div>
            </div>
            <div class="col-auto">
              <img src="{{ asset('gestion_cd/insti.png')}}" class="img-fluid" alt="logo insti" style="width: 90px; height: 90px;">
            </div>
          </div>
        </div>
      </div>
    </div>


    <br><br><br>

    <!-- numéro de la plainte-->
    <p style="text-align: left ;">21/INSTI LOKOSSA/DA/SRE/SA </p>

    <!-- date et information du receveur-->
    <address class="sender-column">
      <strong id="place">Lokossa le</strong>
      <time datetime="2016-01-20">20 January 2016</time><br><br>
      A l'etudiant <br>GOHOUE Rodias<br>
      <strong>Tel</strong> :97933988<br>
      <strong>Email</strong>: no_reply@example.com
    </address>

    <h1 style=" font-size: 1.1em;"><strong>Objet: </strong>Convocation pour 1 mois d'absence au cours </h1><br><br><br>
    <!--Début du contenu de la lettre-->
    <p>Cher etudiant/e,</p>

    <p>Vous etes prié d'etre présent a prochaine séance de conseil de discipline qui aura lieu le 12/02/22 a 16h00
      en
      votre nom dans la salle des professeurs.</p>



    <p>Les raisons de ce conseil sont les suivants:</p>
    <!-- listes des délits ou plaintes-->
    <ul>
      <li>Abscence au cours de Math pendant 1 mois</li>
    </ul>

    <p>Facilitez nous la tache en venant a ce conseil pour répondre de vos actes dans le cas contraire vous serez
      contraint a vous faire renvoyer </p>

    <p>Merci de la lecture.</p>

    <!--fin du contenu de la lettre-->
    <p style="text-align: right;">Le Chef Scolarité</p>
    <h1 style="text-align: right;">Mr Ariel Carmen</h1>

  </div>
  <form action="{{ route('gestion_conseils_plaintes.send') }}"
    method="post">
    @csrf
    <button
        class="btn btn-xs btn-info pull-right btn-danger" onclick="return confirm('Voulez vous vraiment rejeter cette plainte?')" >
        Envoyer les convocations
    </button>
</form>

</body>

</html>
