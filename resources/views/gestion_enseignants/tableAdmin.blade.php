@extends('gestion_enseignants.layout')
@section('content')

    <div id="wrapper">
        @include('gestion_enseignants.sidebar')
        @include('gestion_enseignants.navbar')
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Programme de cours</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3" data-aos="fade-up" data-aos-duration="600">
                                <form method="POST">
                                    @csrf
                                    <div class="card-body text-center shadow">
                                        <div class="col"><select class="custom-select chosen" id="selectNom" name ="selectNom" required="" style="color: #232323;" value="{{old('selectNom')}}">
                                            @isset($lv)
                                            <option value="{{$lv}}">{{$lv}}</option>
                                            @endisset
                                            <option value="*">*</option>
                                            @foreach ($profile as $profil)<option value="{{$profil->com_givenName}} {{$profil->com_fullname }}">{{$profil->com_givenName}} {{$profil->com_fullname }}</option>@endforeach
                                            </select>
                                            <div style="padding-top: 10px"><input class="btn btn-primary" id="ChangeTable" type="submit" name="ChangeTable" value="Changer"></div>
                                            <div id="checkDiv">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkCredit" checked=""><label class="form-check-label">Credits</label></div>
                                                <div class="form-check" value="true"><input class="form-check-input" type="checkbox" id="checkCt" checked=""><label class="form-check-label" for="formCheck-2">CT&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTp" checked=""><label class="form-check-label" for="formCheck-2">TP&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTd" checked=""><label class="form-check-label" for="formCheck-2">TD&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTpe" checked=""><label class="form-check-label" for="formCheck-2">TPE&nbsp; &nbsp; &nbsp;&nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkMp" checked=""><label class="form-check-label" for="formCheck-2">MP&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkMe" checked=""><label class="form-check-label" for="formCheck-2">ME&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3" data-aos="fade-up-left" data-aos-duration="600">
                                <div class="card-body text-center shadow">
                                    <div class="table-responsive table mt-2" id="dataTableAdmin" role="grid" aria-describedby="dataTable_info">
                                        <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                <tr id="tableauThead">
                                                    <th class="text-center"><strong>Nom et Prénoms</strong></th>
                                                    <th class="text-center"><strong>UE</strong></th>
                                                    <th class="text-center" id="credit"><strong>Crédits</strong></th>
                                                    <th class="text-center" id="ct"><strong>CT</strong></th>
                                                    <th id="td"><strong>TD</strong></th>
                                                    <th id="tp"><strong>TP</strong></th>
                                                    <th id="tpe"><strong>TPE</strong></th>
                                                    <th class="text-center"><strong>&nbsp;Groupe pédagogique</strong><br></th>
                                                    <th class="text-center" id="mp">Masse programmée</th>
                                                    <th class="text-center" id="me"><strong>Masse exécutée</strong><br></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($profileTrait)

                                                    @if (request('selectNom')=="*")
                                                        @foreach ($profileTrait as $profile)
                                                        @php
                                                            $rowspan=0;
                                                            $sqlTable= "select * from enseignants where nomEnseignant ='"."".$profile->com_givenName." ".$profile->com_fullname."'";
                                                            $table=DB::select($sqlTable);
                                                            $table2=DB::select($sqlTable);
                                                            foreach ($table2 as $table) {
                                                                $rowspan++;
                                                            }
                                                        @endphp
                                                        @if ($table!=null)
                                                            <td class="text-center" rowspan="{{$rowspan+1}}">{{$profile->com_fullname}} {{$profile->com_givenName}}</td>
                                                            @php
                                                                $sqlTable= "select * from enseignants where nomEnseignant ='"."".$profile->com_givenName." ".$profile->com_fullname."'";
                                                                $table=DB::select($sqlTable);
                                                                foreach ($table as $table) {
                                                                    echo '
                                                                    <tr>
                                                                    <td class="text-center" >'.$table->nomUe.'</td>
                                                                    <td class="text-center" id="credit">'.$table->credit.'</td>
                                                                    <td id="ct">'.$table->ct.'</td>
                                                                    <td id="td">'.$table->td.'</td>
                                                                    <td id="tp">'.$table->tp.'</td>
                                                                    <td class="text-center" id="tpe">'.$table->tpe.'</td>
                                                                    <td class="text-center">'.$table->gpe.'</td>
                                                                    <td class="text-center" id="mp">'.$table->mp.'</td>
                                                                    <td class="text-center" id="me">'.$table->me.'</td>
                                                                    </tr>';
                                                                }
                                                            @endphp
                                                        @endif
                                                        @endforeach
                                                    @else
                                                        @php
                                                            $rowspan=0;
                                                            $sqlTable= "select * from enseignants where nomEnseignant ='"."".request('selectNom')."'";
                                                            $table=DB::select($sqlTable);
                                                            $table2=DB::select($sqlTable);
                                                            foreach ($table2 as $table) {
                                                                $rowspan++;
                                                            }
                                                        @endphp
                                                        @if ($table!=null)
                                                            <td class="text-center" rowspan="{{$rowspan+1}}">{{request('selectNom')}}</td>
                                                            @php
                                                                $sqlTable= "select * from tableau_enseignants where nom_enseignant ='".request('selectNom')."'";
                                                                $table=DB::select($sqlTable);
                                                                foreach ($table as $table) {
                                                                    echo '
                                                                    <tr>
                                                                    <td class="text-center" >'.$table->nomUe.'</td>
                                                                    <td class="text-center" id="credit">'.$table->credit.'</td>
                                                                    <td id="ct">'.$table->ct.'</td>
                                                                    <td id="td">'.$table->td.'</td>
                                                                    <td id="tp">'.$table->tp.'</td>
                                                                    <td class="text-center" id="tpe">'.$table->tpe.'</td>
                                                                    <td class="text-center">'.$table->gpe.'</td>
                                                                    <td class="text-center" id="mp">'.$table->mp.'</td>
                                                                    <td class="text-center" id="me">'.$table->me.'</td>
                                                                    </tr>';
                                                                }
                                                            @endphp
                                                        @endif
                                                    @endif

                                                @endisset

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('gestion_enseignant.programme_pdf') }}" method="get">
                <input type="hidden" name="selectNom" id="selectNom" value="{{request('selectNom')}}"/>
                <div id="btn-Exporter">
                    <input class="btn btn-primary btn-sm" type="submit" id="exporterPdfAdmin" name="exporterPdf" value="Exporter PDF" />
                </div>
            </form>
            
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
@endsection
