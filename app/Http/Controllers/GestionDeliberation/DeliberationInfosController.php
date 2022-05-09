<?php

namespace App\Http\Controllers\GestionDeliberation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Deliberation;
use App\Models\PedagogicGroup;
use App\Models\User;
use App\Models\Ue;
use App\Models\AcademicYear;
use App\Models\Field;
use App\Models\General;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\UserGroup;
use App\Models\Services;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeliberationInfosController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $deliberation = Deliberation::where('id', $request->id)->get()[0]; 

        $uesids = explode('.', $deliberation->uesIds); $ues = array();
        foreach($uesids as $ueid){
            $ueid = (int)$ueid; 
            if($ueid != null){
                $ues[] = Ue::where('id', $ueid)->get()[0]->abbreviation;
            }   
        }

        

        $groupe = PedagogicGroup::where('id', $deliberation->groupId)->get()[0]->name; 

        if(Auth::user()->id == $deliberation->authorId){
            $auteur = "Vous";
        }else{
            $auteur = User::where('id', $deliberation->authorId)->get()[0]->pseudo; 
        }

        $annee = AcademicYear::where('id', $deliberation->yearId)->get()[0]->name; 

        $participantspath = $deliberation['participants'];
        $reportpath = $deliberation['report'];
        $hideticketpath = $deliberation['hideTicket'];
        $revealticketpath = $deliberation['revealTicket'];
        $error = '';

        // 1 - admin, 2 - superadmin, 3 - aprennant, 4 - enseignant, 5 - personnel, 6 - redacteur, 7 - partenaire 

        $ug = UserGroup::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->userGroupId)->get()[0]->name;

        $p = Position::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->positionId)->get()[0]->name;

        $s = Services::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->serviceId)->get()[0]->name;

        if(Auth::user()->id == $deliberation->authorId){
            return view('gestion_deliberations.authorDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }

        if ($p == "chefService/Adjoint" and $s == "departement" and !(in_array($ug, array("apprenant","personnel", "redacteur", "partenaire"))) ){
            return view('gestion_deliberations.highDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }
        
        if (in_array($ug , array("admin","superadmin","enseignant","personnel","rédacteur")) and   in_array($p, array("chefService/Adjoint","chefCollaborateur","chefDivision")) and $s != "departement"){

            return view('gestion_deliberations.interDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }
        else {
            return view('gestion_deliberations.lowDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'revealticketpath', 'ues', 'error'));
        }
    }

    public function show(Request $request){

        header('Content-type: application/pdf');
        if(strrchr($request->path, '.') == '.pdf'){
            readfile(Storage::path($request->path));
        } 
        else{
            $deliberation = Deliberation::where('id', $request->id)->get()[0]; 

            $uesids = explode('.', $deliberation->uesIds); $ues = array();
            foreach($uesids as $ueid){
            $ueid = (int)$ueid; 
            if($ueid != null){
                $ues[] = Ue::where('id', $ueid)->get()[0]->abbreviation;
            }   
            }

            $groupe = PedagogicGroup::where('id', $deliberation->groupId)->get()[0]->name; 
    
            if(Auth::user()->id == $deliberation->authorId){
                $auteur = "Vous";
            }else{
                $auteur = User::where('id', $deliberation->authorId)->get()[0]->pseudo; 
            }
    
            $annee = AcademicYear::where('id', $deliberation->yearId)->get()[0]->name; 
    
            $participantspath = $deliberation['participants'];
            $reportpath = $deliberation['report'];
            $hideticketpath = $deliberation['hideTicket'];
            $revealticketpath = $deliberation['revealTicket'];
            $error = "Ce document ne peut s'ouvrir dans le navigateur! Vous pouvez le télécharger.";
    
            // 1 - admin, 2 - superadmin, 3 - aprennant, 4 - enseignant, 5 - personnel, 6 - redacteur, 7 - partenaire 
    
            $ug = UserGroup::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->userGroupId)->get()[0]->name;

        $p = Position::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->positionId)->get()[0]->name;

        $s = Services::where('id', User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->serviceId)->get()[0]->name;

        if(Auth::user()->id == $deliberation->authorId){
            return view('gestion_deliberations.authorDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }

        if ($p == "chefService/Adjoint" and $s == "departement" and !(in_array($ug, array("apprenant","personnel", "redacteur", "partenaire"))) ){
            return view('gestion_deliberations.highDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }
        
        if (in_array($ug , array("admin","superadmin","enseignant","personnel","rédacteur")) and   in_array($p, array("chefService/Adjoint","chefCollaborateur","chefDivision")) and $s != "departement"){

            return view('gestion_deliberations.interDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }
        else {
            return view('gestion_deliberations.lowDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'revealticketpath', 'ues', 'error'));
        }
        }  
            
    }

    public function change(Request $request){

            $annees = AcademicYear::all();
            $ues = UE::all();
            $filieres = Field::all();
            $semestres = General::where('content_type', 'semestre_annee')->get();
            $groupes = PedagogicGroup::all();
            
            $deliberation = Deliberation::where('id', $request->id)->get()[0]; 

            return view('gestion_deliberations.updateDeliberation', compact('annees', 'semestres', 'filieres', 'groupes', 'ues','deliberation')); 
        
    }

    public function update(Request $request){

        $id = $request->input('iid');

        $deliberations = Deliberation::all();
        $ds = array($deliberations);
        $deliberation = Deliberation::where('id', $id)->get()[0]; 

        $toDel = array();
        $toDel[] =  $deliberation->report;
        $toDel[] =  $deliberation->revealTicket;
        $toDel[] =  $deliberation->hideTicket;
        $toDel[] =  $deliberation->participants;

        $key = array_search($deliberation, $ds);
        if ($key !== false) {
            unset($deliberations[$key]);
        }

        $request->validate([
            'annee' => 'required|integer',
            'groupePedagogique' => 'required|integer',            
            'delib_af' => 'required|file|mimes:xls,xlsx,pdf',
            'delib_msq' => 'required|file|mimes:xls,xlsx,pdf',
            'semestre' => 'required|string',
            'begin_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:begin_date',
            'participants' => 'required|file|max:5120|mimes:pdf',
            'rapport' => 'required|file|max:5120|mimes:pdf',
            'ues' => 'required',
        ]);

        $groupe = PedagogicGroup::where('id', $request->input('groupePedagogique'))->get()[0]->name;

        $annee = AcademicYear::where('id', $request->input('annee'))->get()[0]->name; 
        $now = str_replace(':', '-', NOW());

        $inter = $annee.$request->input('semestre').$groupe.$now;

        $guessExtension = $request->file('rapport')->guessExtension();
        $rapportpath = $request->file('rapport')->storeAs('public/rapports', $inter.'rapport.'.$guessExtension);

        $guessExtension = $request->file('participants')->guessExtension();
        $participantspath = $request->file('participants')->storeAs('public/participants', $inter.'participants.'.$guessExtension);

        $guessExtension = $request->file('delib_af')->guessExtension();
        $delib_afpath = $request->file('delib_af')->storeAs('public/deliberation_affichees', $inter.'affichee.'.$guessExtension);

        $guessExtension = $request->file('delib_msq')->guessExtension();
        $delib_msqpath = $request->file('delib_msq')->storeAs('public/deliberation_masquees', $inter.'masquee.'.$guessExtension);

        $uesids = "";
        foreach ($request->get('ues') as $elmt){
            $uesids = $uesids.(string)$elmt.".";
        };

        $infos = $uesids.$request->input('annee').$request->input('semestre').$request->input('groupePedagogique');

        $bdinfos = array();
        foreach ($deliberations as $db){
            $bdinfos[] = $db->infos;
        };

        if(in_array($infos, $bdinfos)){
            return back()->with('error', 'Une délibération identique existe déjà.');
        }else{
   
           $newdelib = Deliberation::whereId($id)->update(([
            'yearId' => $request->input('annee'),
            'semesters' => $request->input('semestre'),
            'fieldId' => PedagogicGroup::where('id', $request->input('groupePedagogique'))->get()[0]->fieldId,
            'groupId' => $request->input('groupePedagogique'),
            'authorId' => Auth::user()->id, 
            'participants' => $participantspath,
            'start' => $request->input('begin_date'),
            'end' => $request->input('end_date'),
            'report' => $rapportpath,
            'revealTicket' => $delib_afpath,
            'hideTicket' => $delib_msqpath,
            'uesIds' => $uesids,
            'infos' => $infos,
            ]));

            foreach ($toDel as $td){
                File::delete([
                    Storage::path($td),
                ]);
            }
            return redirect('gestion_deliberation/')->with('success',  'Délibération mise à jour! ');
        }
    
    }

    public function delete(Request $request){

        $deliberation = Deliberation::where('id', $request->id)->get()[0]; 

            $uesids = explode('.', $deliberation->uesIds); $ues = array();
            foreach($uesids as $ueid){
            $ueid = (int)$ueid; 
            if($ueid != null){
                $ues[] = Ue::where('id', $ueid)->get()[0]->abbreviation;
            }   
            }

            $groupe = PedagogicGroup::where('id', $deliberation->groupId)->get()[0]->name; 
    
            $auteur = User::where('id', $deliberation->authorId)->get()[0]->pseudo; 
    
            $annee = AcademicYear::where('id', $deliberation->yearId)->get()[0]->name; 
    
            $participantspath = $deliberation['participants'];
            $reportpath = $deliberation['report'];
            $hideticketpath = $deliberation['hideTicket'];
            $revealticketpath = $deliberation['revealTicket'];
            
            
            $delib = Deliberation::findOrFail($request->id);

            $toDel = array();
            $toDel[] =  $delib->report;
            $toDel[] =  $delib->revealTicket;
            $toDel[] =  $delib->hideTicket;
            $toDel[] =  $delib->participants;


            if($delib->delete()){
                foreach ($toDel as $td){
                    File::delete([
                        Storage::path($td),
                    ]);
                }
                return redirect('gestion_deliberation/')->with('success',  'Délibération supprimée! ');
            }else{
                $error = "La suppression n'a pas été effectuée! ";
            return view('gestion_deliberations.highDeliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath', 'ues', 'error'));    
        }
    }
}
