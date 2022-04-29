<?php

namespace App\Http\Controllers\GestionDeliberation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deliberation;
use App\Models\AcademicYear;
use App\Models\Field;
use App\Models\General;
//use App\Models\UE;
use App\Models\PedagogicGroup;
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
        $annees = AcademicYear::all();
        //$ues = UE::all();
        $filieres = Field::all();
        $semestres = General::where('content_type', 'semestre_annee')->get();
        $groupes = PedagogicGroup::all();
        return view('gestion_deliberations.enregistrerDeliberation', compact('annees', 'semestres', 'filieres', 'groupes'));
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
            'delib_af' => 'required|file|mimes:xls,xlsx',
            'delib_msq' => 'required|file|mimes:xls,xlsx',
            'semestre' => 'required|string',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
            'participants' => 'required|file|max:5120|mimes:pdf',
            'rapport' => 'required|file|max:5120|mimes:pdf',
            //'ues' => 'required',
        ]);

        $rapportpath = $request->file('rapport')->store('public/rapports');
        $participantspath = $request->file('participants')->store('public/participants');
        $delib_afpath = $request->file('delib_af')->store('public/deliberation_affichees');
        $delib_msqpath = $request->file('delib_msq')->store('public/deliberation_masquees');

        


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
        ]);

        // foreach ($request->input('ues') as $ue) {
            
        //     Deliberation::create([
        //      'UEId' => $ue,
        //      'deliberationId' => $newdeliberation->id,
        //     ]);

        // }

        return redirect(route('gestion_deliberation.index'))->with('success', 'Délibération bien ajoutée');
    }
}
