@extends('gestion_demandes_reclamation_evaluation.etudiants.dashboard')

@section('main')

    <div class="container bg-light">
        <div class="row text-primary justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div>
                            <div>
                                <div class="text-center p-5">
                                    <div class="text-center">                   
                                        <form data-bs-hover-animate="pulse" method="POST" enctype="multipart/form-data" action="{{ route('gestion_demandes_reclamation_evaluation.validation_demande_evaluation') }}" >
                                            
                                            @csrf
                                            <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong>Demande d'évaluation</strong></h2>              
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                                        <label style="font-weight: normal;">Semestre concerné</label>
                                                        <select class="form-control" name="semester">
                                                            <optgroup >
                                                                @foreach($academic_semesters as $academic_semester)
                                                                    <option>
                                                                        {!!$academic_semester!!}
                                                                    </option>
                                                                @endforeach                              
                                                            </optgroup>                                                                       </optgroup>
                                                        </select>
                                                    </div>

                                                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" V>
                                                        <label style="font-weight: normal;">UE concerné</label>
                                                        <select class="form-control" name="ue">
                                                            <optgroup >
                                                                @foreach($ues as $ue)
                                                                    <option>
                                                                        {!!$ue->name!!}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>               
                                                        </select>
                                                    </div>                  
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-row">           
                                                    <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                                        <label style="font-weight: normal;">Type d'évaluation</label>
                                                        <select class="form-control" name="evaluationType" required="required">
                                                            <optgroup label="Type d'évaluation">
                                                                @foreach($evaluation_types as $evaluation_type)
                                                                    <option>
                                                                        {!!$evaluation_type!!}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                                    
                                                    <div class="col">
                                                        <label style="font-weight: normal;"> Document preuve </label>
                                                        <input class="form-control" type="file" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="document">   
                                                    </div>   
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col md-4">
                                                        <label style="font-weight: normal;"> Motif </label>
                                                        <input class="form-control" type="text" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="reclamationMotif" >
                                                    </div>
                                                    
                                                    <div class="col md-4">
                                                        <label style="font-weight: normal;"> Description du Motif </label>
                                                        <input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="motifDescription" >
                                                    </div>
                                                </div>
                                            </div>

                                                            
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block" data-aos="fade-down" data-aos-duration="750" data-aos-delay="600" type="submit" name = "demande" style=" font-weight:bold;" >Envoyer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



           
