<?php

namespace App\Http\Controllers\GestionDemande\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\StoreFileRequest;
use App\Models\Evaluation_request;

class MakeEvaluationRequestController extends Controller
{
    // public function index(){
    //     return view('gestion_demandes.etudiants.faire_demande_reclamation');
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

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'semester' => 'required|string',
            'ue' => 'required|string',
            'evaluationType' => 'required|string',
            'document' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            'reclamationMotif' => 'required|string',
            'description' => 'required|string',
        ]);

        

        $documentPath = $request->file('document')->store('public/document');

        // return $documentPath;

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



        // $requete = Complaint_request::create([
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

        DB::table('evaluation_requests')->insert(
            array('userId' => $idUser,
                'motif' => request("reclamationMotif"),
                'description_motif' => request("description"),
                'evaluation_type' => request("evaluationType"),
                'ue' => request("ue"),
                'document_path' => $documentPath,
                'field' => $field,
                'pegagogic_group' => $pedagogicGroupe,
                'academic_year_start' => $academic_year_start,
                'academic_year_end' => $academic_year_end,
                'academic_semester' => $academic_semester,)
        );

        

        return redirect(route('gestion_demandes_reclamation_evaluation.dashboard_etudiant'))->with('success', 'Demande d\'evaluation effectuer avec sucess');
    }
}
