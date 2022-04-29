<div class="row" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>PLACES DISPONIBLE</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                            {{$availableplace}}
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-exclamation fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-info py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Stagiaires actifs</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>{{$activeInternSize}} Etudiants</span></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" aria-valuenow="{{$activeInternSize}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$activeInternSize}}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

