<?php

namespace App\Http\Controllers\GestionDemande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create(){

        $idUser = Auth::user()->id;
        $profile = DB::table('profiles')->where('user_Id', $idUser);
        $fieldId = $profile->value('app_fieldId');
        $field = DB::table('profiles')->where('user_Id', $idUser)->value('name');
       
        
       

        return view('gestion_demandes_reclamation_evaluation.etudiants.faire_demande_reclamation'
         ,compact('academic_semesters','ues','evaluation_types')
        );
    }
}
