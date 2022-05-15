<?php

namespace App\Http\Controllers\GestionDemande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluation_request;
use App\Models\User_Position_Service_Field_Map;
use App\Models\Field;
use Auth;
use DB;

class EvaluationRequestController extends Controller
{
    public function create(){

        $idUser = Auth::user()->id;
        $idPedagogicGroupe = DB::table('user__pedagogic_group__maps')->where('user_Id', $idUser)->value('pedagogic_group_Id');

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
    public function store(Request $request){

        $request->validate([
            'semester' => 'required|string',
            'ue' => 'required|string',
            'evaluationType' => 'required|string',
            'document' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            'reclamationMotif' => 'required|string',
            'description' => 'required|string',
        ]);


        $documentPath = $request->document->move(public_path(), $request->document->hashName());
        // $documentPath = $request->file('document')->store('public/document');

        // return $documentPath;

        $idUser = Auth::user()->id;
        $userFirstName = DB::table('profiles')->where('user_id', $idUser)->value('com_fullname');
        $userLastName = DB::table('profiles')->where('user_id', $idUser)->value('com_givenName');


        $idPedagogicGroupe = DB::table('user__pedagogic_group__maps')->where('user_Id', $idUser)->value('pedagogic_group_Id');
        $pedagogicGroupe = DB::table('pedagogic_groups')->where('id',$idPedagogicGroupe)->value('name');

        $idField = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('field_Id');
        $field = DB::table('fields')->where('id',$idField)->value('name');

        $idAcademic_year = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('academic_year_Id');
        $academic_year_start = DB::table('academic_years')->where('id',$idAcademic_year)->value('startDate');
        $academic_year_end = DB::table('academic_years')->where('id',$idAcademic_year)->value('endDate');

        $idAcademic_semester = DB::table('shortcuts_requests')->where('pedagogic_group_Id', $idPedagogicGroupe)->value('academic_semester_Id');
        $academic_semester = DB::table('academic_semesters')->where('id',$idAcademic_semester)->value('designation');



        $requete = Evaluation_request::create([
            'first_name' => $userFirstName,
            'last_name' => $userLastName,
            'userId' => $idUser,
            'motif' => request("reclamationMotif"),
            'description_motif' => request("description"),
            'evaluation_type' => request("evaluationType"),
            'ue' => request("ue"),
            'document_path' => $documentPath,
            'field' => $field,
            'pegagogic_group' => $pedagogicGroupe,
            'academic_year_start' => $academic_year_start,
            'academic_year_end' => $academic_year_end,
            'academic_semester' => $academic_semester,
            'created_date' => date('d-m-y h:i:s'),

        ]);

        // DB::table('evaluation_requests')->insert(
        //     array('userId' => $idUser,
        //         'motif' => request("reclamationMotif"),
        //         'description_motif' => request("description"),
        //         'evaluation_type' => request("evaluationType"),
        //         'ue' => request("ue"),
        //         'document_path' => $documentPath,
        //         'field' => $field,
        //         'pegagogic_group' => $pedagogicGroupe,
        //         'academic_year_start' => $academic_year_start,
        //         'academic_year_end' => $academic_year_end,
        //         'academic_semester' => $academic_semester,)
        // );



        return redirect(route('gestion_demandes_reclamation_evaluation.dashboard_etudiant'))->with('success', 'Evaluation effectuer avec sucess');
    }

    public function show_all(){

        $usergroupid = Auth::user()->user_groupId;

        $positionid = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('positionId');
        $serviceid = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('serviceId');
        $fieldId = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('fieldId');
        $fieldName = Field::where('id', $fieldId)->value('name');


        if($usergroupid == 5 and $serviceid == 2 and $positionid == 1){

            $all_evaluation_requests = Evaluation_request::where('field', $fieldName)->get();

            return view('gestion_demandes_reclamation_evaluation.personnels.voir_liste_demandes_evaluation'
             ,compact('all_evaluation_requests')
            );
    
             
        }elseif($usergroupid == 1 or $usergroupid == 2){

            
            $all_evaluation_requests = Evaluation_request::all();

            return view('gestion_demandes_reclamation_evaluation.personnels.voir_liste_demandes_evaluation'
             ,compact('all_evaluation_requests')
            );
            

        }elseif($usergroupid == 5 and $serviceid == 1){

            $all_evaluation_requests = Evaluation_request::all();

            return view('gestion_demandes_reclamation_evaluation.personnels.voir_liste_demandes_evaluation'
             ,compact('all_evaluation_requests')
            );
            
        }elseif($usergroupid == 3 ){

            $all_evaluation_requests = Evaluation_request::where('field', $fieldName)->get();

            return view('gestion_demandes_reclamation_evaluation.personnels.voir_liste_demandes_evaluation'
             ,compact('all_evaluation_requests')
            );
        }
    }

    /**
     * Show single evaluation request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){


        $evaluation_request = Evaluation_request::find($id);
        return view('gestion_demandes_reclamation_evaluation.personnels.voir_details_demande_evaluation'
         ,compact('evaluation_request')
        );
    }
}
