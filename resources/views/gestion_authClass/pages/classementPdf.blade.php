<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
    <div>
        <h2>Classement des étudiants de la promotion <span></span></h2>
        <p>Filière : <span>{{$request->filiere}}</span></p>
    </div>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <!-- <th>N°</th> -->
                <th>Nom et Prénoms</th>
                <th>Genre</th>
                <th>Matricule</th>
                <th>Filière</th>
                <th>Moyenne</th>
                <th>Rang</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            @forelse ($moyenne as $moyennes)
            <?php $i=$i+1 ; ?>
            <tr>
                <td>{{$moyennes->name}}</td>
                <td>{{$moyennes->genre}}</tdFirst>
                <td>{{$moyennes->n_matricule}}</tdLast>
                <td>{{$moyennes->filiere}}</tdJob>
                <td>{{$moyennes->moy_generale}}</td>
                <td>{{$i}}</td>


            </tr>
            @empty
            <li>
                <h1>Aucun classement disponible</h1>
            </li>

            @endforelse
        </tbody>
    </table>
</div>
</body>

</html>