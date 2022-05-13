<?php

namespace App\Http\Controllers\GestionDeliberation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Deliberation;
use App\Models\AcademicYear;
use App\Models\Field;
use App\Models\PedagogicGroup;
use App\Models\General;
use Illuminate\Support\Facades\DB;
use App\Models\UserGroup;
use App\Models\Services;
use App\Models\Position;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\User_Position_Service_Field_Map;
use App\Models\Ue;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         // 1 - admin, 2 - superadmin, 3 - apprenant, 4 - enseignant, 5 - personnel, 6 - redacteur, 7 - partenaire 
        $annees = AcademicYear::all(); 
        $deliberations = Deliberation::all();
        $filieres = Field::all();
        $groupes = PedagogicGroup::all();
        $semestres = General::where('content_type', 'semestre_annee')->get();

        $ug = UserGroup::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->userGroupId)->get()[0]->name;

        $p = Position::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->positionId)->get()[0]->name;

        $s = Services::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->serviceId)->get()[0]->name;

        if ($p == "chefService/Adjoint" and $s == "departement" and !(in_array($ug, array("apprenant", "partenaire"))) ){
            return view('gestion_deliberations.index', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        }else{
            return view('gestion_deliberations.lowIndex', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        }


        // $usergroupid = Auth::user()->user_groupId;


        // $positionid = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('positionId');
        // $serviceid = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('serviceId');

        // $fieldid = User_Position_Service_Field_Map::where('userId', Auth::user()->id)->value('fieldId');

        // $pedagogic_groupid = PedagogicGroup::where('fieldId', $fieldid)->value('id');
        
        // if($usergroupid == 5 and $serviceid == 2 and $positionid == 1){

        //     $annees = AcademicYear::all();

        //     $ues = UE::all();
        //     $deliberations = Deliberation::find($fieldid);
        //     $filieres = Field::find($fieldid);
        //     // return $filieres;

        //     $groupes = DB::table('fields')
        //             ->leftJoin('pedagogic_groups', 'fields.id', '=', 'pedagogic_groups.fieldId')
        //             ->where('pedagogic_groups.fieldId','=', $fieldid)
        //             ->select('pedagogic_groups.name as name')
        //             ->get();

        //     $semestres = General::where('content_type', 'semestre_annee')->get();
        //     // $groupes = PedagogicGroup::find($pedagogic_groupid);

        //     return view('gestion_deliberations.index', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
             
        // }elseif($usergroupid == 1 and $usergroupid == 2){

        //     $annees = AcademicYear::all();
        //     $deliberations = Deliberation::all();
        //     $ues = UE::all();
        //     $filieres = Field::all();
        //     $semestres = General::where('content_type', 'semestre_annee')->get();
        //     $groupes = PedagogicGroup::all();
        //     return view('gestion_deliberations.index', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));

        // }elseif($usergroupid == 5 and $serviceid == 1){

        //     $annees = AcademicYear::all();
        //     $ues = UE::all();
        //     $deliberations = Deliberation::all();
        //     $filieres = Field::all();
        //     $semestres = General::where('content_type', 'semestre_annee')->get();
        //     $groupes = PedagogicGroup::all();

        //     return view('gestion_deliberations.index', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        // } else{
        //     return view('gestion_deliberations.lowIndex', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        // }
  
    }

    public function show(Request $request){

        header('Content-type: application/pdf');
        if(strrchr($request->path, '.') == '.pdf'){
            readfile(Storage::path($request->path));
        } else{
            return redirect(route('gestion_deliberations.index'))->with('error', "Ce fichier ne peut s'ouvrir dans le navigateur! Vous pouvez le télécharger.");

        }
    }

    public function down(Request $request){
        //return response()->();
        return response()->download(Storage::path($request->path));
    }
 
    public function recherche(Request $request)
    {
        $annees = AcademicYear::all(); 
        $filieres = Field::all();
        $groupes = PedagogicGroup::all();
        $semestres = General::where('content_type', 'semestre_annee')->get();
        if ($request->annee == null && $request->semestre == null && $request->filiere == null && $request->groupe == null) {
                $deliberations = Deliberation::all();
                return view('home', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres'));
        }else{

        if ($request->annee == null && $request->semestre == null && $request->filiere == null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('groupId', $request->groupe)
            ->get();
        }
        if ($request->annee != null && $request->semestre == null && $request->filiere == null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->get();
        }

        if ($request->annee == null && $request->semestre != null && $request->filiere == null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('semesters', $request->semestre)
            ->get();
        }

        if ($request->annee == null && $request->semestre == null && $request->filiere != null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('fieldId', $request->filiere)
            ->get();
        }

        if ($request->annee == null && $request->semestre == null && $request->filiere != null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('fieldId', $request->filiere)
            ->where('groupId', $request->groupe)
            ->get();
        }

        if ($request->annee == null && $request->semestre != null && $request->filiere == null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('semesters', $request->semestre)
            ->where('groupId', $request->groupe)
            ->get();
        }
        if ($request->annee != null && $request->semestre == null && $request->filiere == null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('groupId', $request->groupe)
            ->get();
        }
        
        if ($request->annee != null && $request->semestre == null && $request->filiere != null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('fieldId', $request->filiere)
            ->get();
        }

        if ($request->annee != null && $request->semestre != null && $request->filiere == null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('semesters', $request->semestre)
            ->get();
        }

        if ($request->annee == null && $request->semestre != null && $request->filiere != null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('fieldId', $request->filiere)
            ->where('semesters', $request->semestre)
            ->get();
        }

        if ($request->annee == null && $request->semestre != null && $request->filiere != null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('semesters', $request->semestre)
            ->where('fieldId', $request->filiere)
            ->where('groupId', $request->groupe)
            ->get();
        }

        if ($request->annee != null && $request->semestre == null && $request->filiere != null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('fieldId', $request->filiere)
            ->where('groupId', $request->groupe)
            ->get();
        }

        if ($request->annee != null && $request->semestre != null && $request->filiere == null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('semesters', $request->semestre)
            ->where('PedagogicGroupId', $request->groupe)
            ->get();
        }
        if ($request->annee != null && $request->semestre != null && $request->filiere != null && $request->groupe == null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('semesters', $request->semestre)
            ->where('fieldId', $request->filiere)
            ->get();
        }
        if ($request->annee != null && $request->semestre != null && $request->filiere != null && $request->groupe != null) {
            $deliberations = DB::table('deliberations')
            ->where('yearId', $request->annee)
            ->where('semesters', $request->semestre)
            ->where('fieldId', $request->filiere)
            ->where('groupId', $request->groupe)
            ->get();
        }
        $ug = UserGroup::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->userGroupId)->get()[0]->name;

        $p = Position::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->positionId)->get()[0]->name;

        $s = Services::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->serviceId)->get()[0]->name;

        if ($p == "chefService/Adjoint" and $s == "departement" and !(in_array($ug, array("apprenant","personnel", "redacteur", "partenaire"))) ){
            return view('gestion_deliberations.index', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        }else{
            return view('gestion_deliberations.lowIndex', compact('deliberations', 'annees', 'filieres', 'groupes', 'semestres',));
        }
        }
    }

}
