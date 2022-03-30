<?php

namespace App\Http\Controllers\GestionDemande\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('gestion_demandes_reclamation_evaluation.etudiants.dashboard');
    }
}
