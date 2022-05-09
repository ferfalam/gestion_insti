@extends('gestion_deliberations.layout')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
        <div class="container-fluid">
            <!-- ** -->
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="m_body"> 
                <div class="main">
                    <div class="card-header py-3">
                        <h3 class="text-primary m-0 fw-bold text-center">Ajoutez une nouvelle délibération!</h3>
                    </div>
                    <div class="main_form">
                        
                        <form action="{{ route('gestion_deliberation.enregistrerdeliberation') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            <div class="element_">
                                <label for="">Année Académique</label>
                                <div class="sous_section">
                                    <select name="annee" id="annee" class="form-control @error('annee') is-invalid @enderror">
                                        @foreach($annees as $annee)
                                        <option value="{{$annee->id}}" >{{$annee->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('annee')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="">Semestre</label>
                                <div class="sous_section">
                                    <select name="semestre" id="semestre" class="form-control @error('semestre') is-invalid @enderror">
                                        <option value="semestre1">Semestre1</option>
                                        <option value="semestre2">Semestre2</option>
                                        <option value="semestres1&2">Semestres 1 et 2</option>
                                    </select>
                                </div>
                            </div>
                            @error('semestre')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="begin_date">Début</label>
                                <div class="sous_section">
                                    <input type="date" name="begin_date" id="begin_date" required value="{{ old('begin_date') }}" class="form-control @error('begin_date') is-invalid @enderror">
                                </div> 
                            </div>
                            @error('begin_date')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="end_date">Fin</label> 
                                <div class="sous_section">
                                    <input type="date" name="end_date" id="end_date" required value="{{ old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
                                </div>
                            </div><script type="text/javascript"></script>
                            @error('end_date')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="">Filière & Groupe</label>
                                <div class="sous_section">
                                    <select name="groupePedagogique" id="groupePedagogique" class="form-control @error('groupePedagogique') is-invalid @enderror">
                                        @foreach($groupes as $groupe)
                                        <option value="{{$groupe->id}}" >{{$groupe->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('groupePedagogique')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_ row d-flex ">
                                <label class="col-md-2" for="">UEs</label>
                                <div class="col-md-9 row d-flex justify-content-center">
                                    @foreach($ues as $ue)
                                    <div class="col-md-2 col-sm-2">
                                        <input type="checkbox" name ="ues[]" value="{{$ue->id}}">
                                        <label>{{$ue->abbreviation}}</label>
                                    </div>
                                    @endforeach   
                                </div>
                            </div>
                            @error('ues')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            
                            <div class="element_">
                                <label for="participants">Participants</label>
                                <div class="sous_section">
                                    <input type="file" name="participants" class="form-control-file @error('participants') is-invalid @enderror" value="{{ old('participants') }}" style="padding-top: 5px;">
                                </div>
                            </div>
                            @error('participants')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="delib_af">Délibération affichée</label>
                                <div class="sous_section">
                                    <input type="file" name="delib_af" class="form-control-file @error('delib_af') is-invalid @enderror" value="{{ old('delib_af') }}" style="padding-top: 5px;">
                                </div>
                            </div>
                            @error('delib_af')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="delib_msq">Délibération masquée</label>
                                <div class="sous_section">
                                    <input type="file" name="delib_msq" class="form-control-file @error('delib_msq') is-invalid @enderror" value="{{ old('delib_msq') }}" style="padding-top: 5px;">
                                </div>
                            </div>
                            @error('delib_msq')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_">
                                <label for="rapport">Rapport</label>
                                <div class="sous_section">
                                    <input type="file" name="rapport" class="form-control-file @error('rapport') is-invalid @enderror" value="{{ old('rapport') }}" style="padding-top: 5px;">
                                </div>
                            </div>
                            @error('rapport')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="element_btn">
                                <input type="submit" value="Enregistrer" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a> -->
</div>        

@endsection