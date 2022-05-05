@extends('gestion_demandes_reclamation_evaluation.etudiants.dashboard')

@section('main')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
        <div class="container-fluid">
            <!-- ** -->
            <div class="m_body">
                <div class="main">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Faire une demande d'evaluation</p>
                    </div>
                    <div class="main_form">
                        
                        <form action="{{ route('gestion_demandes_reclamation_evaluation.enregistrement_etudiant') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
 
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
    </div>
    <!--</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a> -->
</div>        

@endsection
