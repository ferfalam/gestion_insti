<?php

namespace App\Http\Controllers\GestionDemande\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $idUserRole = Auth::user()->user_groupId;
       
        // $idUserRole = DB::table('user_user_group__position__service__maps')->where('userId', $idUser)->value('userGroupId');
     

        $userRole = DB::table('user_groups')->where('id', $idUserRole)->value('name');
       

        if($userRole == 'apprenant'){

            return view('gestion_demandes_reclamation_evaluation.etudiants.dashboard');
        }else if($userRole == 'personnel'){
            return view('gestion_demandes_reclamation_evaluation.personnels.dashboard');
        }
    }

    
}
