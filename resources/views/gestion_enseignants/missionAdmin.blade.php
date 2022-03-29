@extends('gestion_enseignants.layout')
@section('content')
    
    <div id="wrapper">
        @include('gestion_enseignants.sidebar')
        @include('gestion_enseignants.navbar')
        <div class="container-fluid">
            <form method="POST">
            @csrf
            <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Mission d'enseignements</h3>
                <select class="custom-select chosen" id="selectNomA" name="selectNomA" required="" style="color: #232323;" value="{{old('selectNomA')}}">
                    @isset($lv)
                        <option value="{{$lv}}">{{$lv}}</option>
                    @endisset
                    <option value="*">*</option>
                    {{-- @foreach ($profile as $profil)<option value="{{$profil->nom}} {{$profil->prenom}}">{{$profil->nom}} {{$profil->prenom}}</option>@endforeach --}}
                                             
                </select>
                <div style="padding-top: 10px"><input class="btn btn-primary" id="ChangeTable" type="submit" name="ChangeTable" value="Changer"></div>
            </form>                                
            <div class="card mb-3" data-aos="fade-up-left" data-aos-duration="600" id="cardV">
                <div class="card-body text-center shadow" id="cardId">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
<table class="table dataTable my-0" id="dataTable">
<thead>
    <tr>
        <th>Nom et Prénoms</th>
        <th>Qualité</th>
        <th>Adresse Compléte</th>
        <th>Date de Naissance</th>
        <th>Nationalité</th>
        <th>Matricule et / ou IFU</th>
        <th>Indice et Grafe</th>
        <th>Intitulé de UE</th>
        <th>Groupe pedagogique</th>
        <th>Année Academique</th>
        <th>Nombre d&#39;heure de L&#39;UE (de la Mission)</th>
        <th>Durée de la mission</th>
        <th>Date et jour d&#39;arrivé</th>
        <th>Date et jour de retour</th>
    </tr>
</thead>
<tbody>
    
    @isset($profileTrait)
                                                 
        @if (request('selectNomA')=="*")
            @foreach ($profileTrait as $profile)
            @php
                $rowspan=0;
                $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                $table=DB::select($sqlTable);
                $table2=DB::select($sqlTable);
                foreach ($table2 as $table) {
                    $rowspan++;
                }
            @endphp
            
            @if ($table!=null)
                <td class="text-center" rowspan="{{$rowspan+1}}">{{$profile->prenom}} {{$profile->nom}}</td>
                @php
                    $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                    $table=DB::select($sqlTable);
                    foreach ($table as $table) {
                        echo '
                            <tr>
                                <td>'.$table->qualite.'</td>
                                <td>'.$table->adressse.'</td>
                                <td>'.$table->date_naissance.'</td>
                                <td>'.$table->nationalite.'</td>
                                <td>'.$table->Maticule.'</td>
                                <td>'.$table->grade.'</td>
                                <td>'.$table->Ue.'</td>
                                <td>'.$table->Groupe_Pedagogique.'</td>
                                <td>'.$table->Annee_academique.'</td>
                                <td>'.$table->missionHeure.'</td>
                                <td>'.$table->missionDuree.'</td>
                                <td>'.$table->dateJourArrive.'</td>
                                <td>'.$table->dateJourRetour.'</td>
                            </tr>
                        ';
                    }
                @endphp
            @endif
            @endforeach
        @else
        <tr>
            @php
                $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".request('selectNomA')."'";
                $rowspan=0;
                $table=DB::select($sqlTable);
                $table2=DB::select($sqlTable);
                foreach ($table2 as $table) {
                    $rowspan++;
                }
            @endphp
            @if ($table!=null)
                <td class="text-center" rowspan="{{$rowspan+1}}">{{request('selectNomA')}}</td>
                @php
                    $sqlTable= "select * from tableau_missions where nom_enseignant ='".request('selectNomA')."'";
                    $table=DB::select($sqlTable);
                    foreach ($table as $table) {
                       
                        echo '
                            <tr>
                                <td>'.$table->qualite.'</td>
                                <td>'.$table->adressse.'</td>
                                <td>'.$table->date_naissance.'</td>
                                <td>'.$table->nationalite.'</td>
                                <td>'.$table->Maticule.'</td>
                                <td>'.$table->grade.'</td>
                                <td>'.$table->Ue.'</td>
                                <td>'.$table->Groupe_Pedagogique.'</td>
                                <td>'.$table->Annee_academique.'</td>
                                <td>'.$table->missionHeure.'</td>
                                <td>'.$table->missionDuree.'</td>
                                <td>'.$table->dateJourArrive.'</td>
                                <td>'.$table->dateJourRetour.'</td>
                            </tr>
                        ';

                    }
                @endphp
            @endif
        @endif
        
    @endisset
    
</tbody>
</table>
</div></div>
            </div>
        </div>
    </div>
    <form action="/pdfM" method="get">
        <input type="hidden" name="selectNom" id="selectNom" value="{{request('selectNomA')}}"/>
        <div id="btn-Exporter"><input class="btn btn-primary btn-sm" type="submit" id="exporterPdfAdmin" name="exporterPdf" value="Exporter PDF" /></div>
    </form>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@endsection
