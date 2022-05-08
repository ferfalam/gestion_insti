<?php

namespace App\Http\Controllers\GestionDeliberation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deliberation;
use App\Models\AcademicYear;
use App\Models\Field;
use App\Models\General;
use App\Models\UE;
use App\Models\PedagogicGroup;
use App\Models\User_userGroup_Position_Service_Map;
//use App\Models\DeliberationUEMap;

class EnregistrerDeliberationsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 1 - admin, 2 - superadmin, 3 - aprennant, 4 - enseignant, 5 - personnel, 6 - redacteur, 7 - partenaire 

        $usergroupid = User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->userGroupId;
        $positionid = User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->positionId;
        $serviceid = User_userGroup_Position_Service_Map::where('userId', Auth::user()->id)->get()[0]->serviceId;
        
        if ($positionid == 1 and ($serviceid == 1 or $serviceid == 2)){

            $annees = AcademicYear::all();
            $ues = UE::all();
            $filieres = Field::all();
            $semestres = General::where('content_type', 'semestre_annee')->get();
            $groupes = PedagogicGroup::all();
            return view('gestion_deliberations.enregistrerDeliberation', compact('annees', 'semestres', 'filieres', 'groupes', 'ues'));    
        }
        else {
            return redirect()->action([IndexController::class, 'index'])->with('error', ' Vous ne pouvez pas enrégistrer de délibérations!');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deliberations = Deliberation::all();


        $request->validate([
            'annee' => 'required|integer',
            'groupePedagogique' => 'required|integer',            
            'delib_af' => 'required|file|mimes:xls,xlsx,pdf',
            'delib_msq' => 'required|file|mimes:xls,xlsx,pdf',
            'semestre' => 'required|string',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
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

        /* $rapportpath = $request->file('rapport')->store('public/rapports');
        $participantspath = $request->file('participants')->store('public/participants');
        $delib_afpath = $request->file('delib_af')->store('public/deliberation_affichees');
        $delib_msqpath = $request->file('delib_msq')->store('public/deliberation_masquees'); */

        $uesids = "";
        foreach ($request->get('ues') as $elmt){
            $uesids = $uesids.(string)$elmt.".";
        };

        $infos = $uesids.$request->input('annee').$request->input('semestre').$request->input('groupePedagogique');

        //dump($infos);

        $bdinfos = array();
        foreach ($deliberations as $db){
            $bdinfos[] = $db->infos;
        };

        if(in_array($infos, $bdinfos)){
            return back()->with('error', 'Une délibération identique existe déjà.');
        }else{
            $newdeliberation = Deliberation::create([
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
           ]);
   
           
   
           return redirect(route('gestion_deliberation.index'))->with('success', 'Délibération bien ajoutée');
        }

        
        
    }
}
