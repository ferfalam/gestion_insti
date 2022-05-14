@extends('gestion_demandes_reclamation_evaluation.layout')

@section('main')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
        <div class="m_body">
            <div class="main">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold" style="text-align : center; font-size: 30px;">Faire une reclamation </p>
                </div>
                <div class="main_form">
                    
                    <form action="{{ route('gestion_demandes_reclamation_evaluation.validation_reclamation') }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="element_">
                            <label for="semester">Semestres Academique</label>
                            <div class="sous_section">
                                <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                                    @foreach($academic_semesters as $academic_semester)
                                    <option value="{{$academic_semester}}" >{{$academic_semester}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('semester')
                        <span class="alert alert-danger">
                            {{ $message }}
                        </span>
                        @enderror

                        <div class="element_">
                            <label for="ue">UE concerné</label>
                            <div class="sous_section">
                                <select name="ue" id="ue" class="form-control @error('ue') is-invalid @enderror">
                                    @foreach($ues as $ue)
                                    <option value="{{$ue->name}}" >{{$ue->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('ue')
                        <span class="alert alert-danger">
                            {{ $message }}
                        </span>
                        @enderror

                        <div class="element_">
                            <label for="evaluationType">Type d'évaluation</label>
                            <div class="sous_section">
                                <select name="evaluationType" id="evaluationType" class="form-control @error('evaluationType') is-invalid @enderror">
                                    @foreach($evaluation_types as $evaluation_type)
                                    <option value="{{$evaluation_type}}" >{{$evaluation_type}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('$evaluation_type')
                        <span class="alert alert-danger">
                            {{ $message }}
                        </span>
                        @enderror



                        <div class="element_">
                            <label for="reclamationMotif" style="margin-right:170px"> Motif </label>
                            <input  type="text" name="reclamationMotif" id="reclamationMotif" class="form-control @error('reclamationMotif') is-invalid @enderror">
                        </div>
                        @error('reclamationMotif')
                        <span class="alert alert-danger">
                            {{$message}}
                        </span>
                        @enderror


                        <div class="element_">
                            <label for="description" style="margin-right:70px">Description du Motif </label>
                            <input type="text-area" name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                        </div>
                        @error('description')
                        <span class="alert alert-danger">
                            {{$message}}
                        </span>
                        @enderror

                        <div class="element_">
                            <label for="document">Document preuve</label>
                            <div class="sous_section">
                                <input type="file" name="document" id="document" class="form-control-file @error('document') is-invalid @enderror" value="{{ old('document') }}" style="padding-top: 5px;">
                            </div>
                        </div>
                        @error('document')
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

@endsection
