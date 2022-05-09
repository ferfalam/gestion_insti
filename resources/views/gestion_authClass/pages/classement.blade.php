@extends('gestion_authClass.layout')

@section('main')


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary font-weight-bold m-0" style="text-align:center;">Classement des étudiants</h2>
        </div>

        <div class="card-body">
            <form method="POST" action="{{route('gestion_authClass.showClassement')}}">
                @csrf
                <div class="card-header py-3" style="columns: 2">
                    <div>
                        <div style="display: inline">
                            <label for="">Filière</label>
                        </div>
                        <div style="display: inline">
                            <select class="form-control" name="filiere" id="filiere" required=""
                                value="{{old('filiere')}}">

                                <option value="all">All</option>
                                @foreach($filieres as $one_filiere)
                                <option selected="">
                                    {{$one_filiere->name}}
                                </option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <div>
                        <div style="display: inline">
                            <label for="">Promotion</label>
                        </div>
                        <div style="display: inline">
                            <select class="form-control" name="annee">
                                <optgroup>
                                    <option value="2019-2020" selected="">2019-2020</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2022-2023">2022-2023</option>
                                    <option value="2023-2024">2023-2024</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Charger</button>


            </form>
            <div class="card-body">
                <div class="row">

                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>

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
                                <td>{{$moyennes->genre}}</td>
                                <td>{{$moyennes->n_matricule}}</td>
                                <td> {{$moyennes->filiere}}</td>
                                <td> {{$moyennes->moy_generale}}</td>
                                <td>{{$i}}</td>
                            </tr>

                            @empty
                            <li>
                                <h1>Aucun classement disponible</h1>
                            </li>

                            @endforelse
                            {{-- <tr>
                            <td>1</td>
                            <td>61425358</td>
                            <td>DODE Joe</td>
                            <td>GEI</td>
                            <td>1er</td>
                            <td>17</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>6253587</td>
                            <td>DADJO Romé</td>
                            <td>GEI</td>
                            <td>2e</td>
                            <td>15</td>
                        </tr>
                        </tbody> --}}
                            <!-- <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot> -->
                    </table>
                </div>

                <a class="btn btn-primary m-2" href="#" data-toggle="modal" data-target="#modal2"
                    title="Retirer tous les produits du panier">Télécharger</a>
                <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-popup">
                            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>

                            <form method="GET" action="{{route('gestion_authClass.getClassementPdf')}}" class="popup-form">
                                
                                    @csrf
                                    <div class="card-header py-3" style="columns: 2">
                                        <div>
                                            <div style="display: inline">
                                                <label for="">Filière</label>
                                            </div>
                                            <div style="display: inline">
                                                <select class="form-control" name="filiere" id="filiere" required=""
                                                    value="{{old('filiere')}}">

                                                    <option value="all">All</option>
                                                    @foreach($filieres as $one_filiere)
                                                    <option selected="">
                                                        {{$one_filiere->name}}
                                                    </option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                        <div>
                                            <div style="display: inline">
                                                <label for="">Promotion</label>
                                            </div>
                                            <div style="display: inline">
                                                <select class="form-control" name="annee">
                                                    <optgroup>
                                                        <option value="2019-2020" selected="">2019-2020</option>
                                                        <option value="2020-2021">2020-2021</option>
                                                        <option value="2021-2022">2021-2022</option>
                                                        <option value="2022-2023">2022-2023</option>
                                                        <option value="2023-2024">2023-2024</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-center"> 
                                    <button class="btn btn-primary" type="submit">Télécharger</button> </div>
  
                                </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection