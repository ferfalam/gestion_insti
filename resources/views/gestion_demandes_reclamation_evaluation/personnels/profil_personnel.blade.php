
@extends('gestion_demandes_reclamation_evaluation.personnels.dashboard')

@section('main')              
               
    <div class="container-fluid">
        <h3 class="text-dark mb-4" data-aos="zoom-in" data-aos-duration="650" style="font-weight: bold;">Profile</h3>
        <div class="text-center" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body text-center shadow" style="height: 339.333px;">
                        <img class="rounded-circle mb-3 mt-4" src="assets/img/profil.jpg" width="160" height="160">
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="button" style="font-weight: bold;">Modifier la Photo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Paramètres de l'utilisateur</p>
                </div>
                <div class="card-body" style="font-size: 14px;">
                    <ul class="list-group">
                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">test test</li>
                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">test test</li>
                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">test test</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                        <li class="list-group-item"><span style="font-weight: bold;">tests tests</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary float-right btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Éditer le profil">
                        <i class="fas fa-user-edit text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-weight: bold;font-size: 17px;">Modifier le Profil</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col"><input class="form-control" type="email" placeholder="Email" name="email"></div>
                            <div class="col"><input class="form-control" type="tel" placeholder="Téléphone" name="tel"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" style="font-weight: bold;">Enregistrer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal" style="font-weight: bold;">Fermer</button>
            </div>
        </div>
    </div>
        
@endsection
    