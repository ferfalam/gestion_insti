@extends('gestion_authClass.layout')

@section('main')
    <div class="container-fluid">
        <h3 class="text-black mb-4">Classement des étudiants</h3>
        <div class="card shadow">
            <div class="card-header py-3" style="columns: 2">
                <div>
                    <div style="display: inline">
                        <label for="">Filière</label>
                    </div>
                    <div style="display: inline">

                            <select class="form-control" name="fili">
                                <optgroup>
                                    <option value="GEI" name="GEI">GEI</option>
                                    <option value="GMP" name="GMP">GMP</option>
                                    <option value="MS" name="MS">MS</option>
                                    <option value="GE" name="GE">GE</option>
                                    <option value="GC" name="GC">GC</option>
                                </optgroup>
                            </select>

                    </div>
                </div>
                <div style="width: 500px">
                    <div style="display: inline">
                        <label for="">Promotion</label>
                    </div>
                    <div style="display: inline">
                        <select class="form-control" name="fili">
                            <optgroup>
                                <option value="GEI" selected="">2019-2020</option>
                                <option value="GMP">2020-2021</option>
                                <option value="MS">2021-2022</option>
                                <option value="GE">2022-2023</option>
                                <option value="GC">2023-2024</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                </div>
                <div
                    class="table-responsive table mt-2"
                    id="dataTable"
                    role="grid"
                    aria-describedby="dataTable_info"
                >
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
                            <li><h1>Aucun classement disponible</h1></li>

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
            </div>
        </div>
    </div>

@endsection
