<?php

namespace App\Http\Controllers\GestionDemande\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_Position_Service_Field_Map;
use App\Models\Evaluation_request;
use App\Models\Complaint_request;
use App\Models\Field;
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

            $usergroupid = Auth::user()->user_groupId;
            $fieldId = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('fieldId');
            
            $fieldName = Field::where('id', $fieldId)->value('name');
    
            $all_evaluation_requests = Evaluation_request::where('field', $fieldName)->get();
            
            $all_complaint_requests = Complaint_request::where('field', $fieldName)->get();

            return view('gestion_demandes_reclamation_evaluation.etudiants.dashboard'
                ,compact('all_evaluation_requests', 'all_complaint_requests')
            );
        }else if($userRole == 'personnel'){
            return view('gestion_demandes_reclamation_evaluation.personnels.dashboard');
        }else if($userRole == 'admin'){
            return view('gestion_demandes_reclamation_evaluation.personnels.dashboard');
        }else if($userRole == 'superadmin'){
            return view('gestion_demandes_reclamation_evaluation.personnels.dashboard');
        }
    }

    
}
