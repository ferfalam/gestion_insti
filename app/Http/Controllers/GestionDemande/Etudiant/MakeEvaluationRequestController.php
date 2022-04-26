<?php

namespace App\Http\Controllers\GestionDemande\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class MakeEvaluationRequestController extends Controller
{
    // public function index(){
    //     return view('gestion_demandes.etudiants.faire_demande_evaluation');
    // }

    public function show()
    {

        $idUser = Auth::user()->id;
        $idPedagogicGroupe = DB::table('user_pedagogic_group_maps')->where('user_Id', $idUser)->value('pedagogic_group_Id');
       
        $ues = DB::table('shortcuts_requests')
                    ->leftJoin('ues', 'shortcuts_requests.ue_Id', '=', 'ues.id')
                    ->where('shortcuts_requests.pedagogic_group_Id','=', $idPedagogicGroupe)
                    ->select('ues.name as name')
                    ->get();
        
        $academic_semesters = DB::table('academic_semesters')->pluck('designation');
        $evaluation_types = DB::table('evaluation_types')->pluck('designation');

       

        return view('gestion_demandes_reclamation_evaluation.etudiants.faire_demande_evaluation'
         ,compact('academic_semesters','ues','evaluation_types')
        );

    }

    public function validation(){
        // return request();
        request()->validate([
            "semester" => "required",
            "ue" => "required",
            "evaluationType" => "required",
            "document" => "required|file|max:2048|mines:pdf,docx,jpg,jpeg",
            "reclamationMotif" => "required",
            "descriptionMotif" => "required",
        ]);

        $documentPath = request()->file('document')->store('public/reclamations');
        $idUser = Auth::user()->id;

        $idPedagogicGroupe = DB::table('user_pedagogic_group_maps')->where('user_Id', $idUser)->value('pedagogic_group_Id');
        $pedagogicGroupe = DB::table('pedagogic_groups')->where('id',$idPedagogicGroupe)->value('name');
        
        $idField = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('field_Id');
        $field = DB::table('fields')->where('id',$idField)->value('name');
        
        $idAcademic_year = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('academic_year_Id');
        $academic_year_start = DB::table('academic_years')->where('id',$idAcademic_year)->value('startDate');
        $academic_year_end = DB::table('academic_years')->where('id',$idAcademic_year)->value('endDate');

        $idAcademic_semester = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('academic_semester_Id');
        $academic_semester = DB::table('academic_semesters')->where('id',$idAcademic_semester)->value('designation');

        

        // Complaint_request::create([
        //     'userId' => $idUser,
        //     'motif' => request("reclamationMotif"),
        //     'description_motif' => request("descriptionMotif"),
        //     'evaluation_type' => request("evaluationType"),
        //     'ue' => request("ue"),
        //     'document_path' => $documentPath,
        //     'field' => $field,
        //     'pegagogic_group' => $pedagogicGroupe,
        //     'academic_year_start' => $academic_year_start,
        //     'academic_year_end' => $academic_year_end,
        //     'academic_semester' => $academic_semester,
            
        // ]);

        DB::table('complaint_requests')->insert(
            array('userId' => $idUser,
                'motif' => request("reclamationMotif"),
                'description_motif' => request("descriptionMotif"),
                'evaluation_type' => request("evaluationType"),
                'ue' => request("ue"),
                'document_path' => $documentPath,
                'field' => $field,
                'pegagogic_group' => $pedagogicGroupe,
                'academic_year_start' => $academic_year_start,
                'academic_year_end' => $academic_year_end,
                'academic_semester' => $academic_semester,)
        );

        
    }
}

