<?php

namespace App\Http\Controllers\GestionDeliberation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Deliberation;
use App\Models\PedagogicGroup;
use App\Models\User;
use App\Models\AcademicYear;
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

        $groupe = PedagogicGroup::where('id', $deliberation->groupId)->get()[0]->name; 

        $auteur = User::where('id', $deliberation->authorId)->get()[0]->pseudo; 

        $annee = AcademicYear::where('id', $deliberation->yearId)->get()[0]->name; 

        $participantspath = Storage::path($deliberation['participants']);
        $reportpath = Storage::path($deliberation['report']);
        $hideticketpath = Storage::path($deliberation['hideTicket']);
        $revealticketpath = Storage::path($deliberation['revealTicket']);
        return view('gestion_deliberations.deliberationInfos',compact('deliberation', 'groupe', 'auteur','annee','participantspath', 'reportpath', 'hideticketpath', 'revealticketpath'));
    }

    public function show(Request $request){

        header('Content-type: application/pdf');
        readfile($request->path);

    }

    public function change(Request $request){
        if((Auth::user()->id) == $request->id){
            $thispath = $request->path; 
            return view('replace', compact('thispath')); 
        } else{
            return redirect(route('gestion_deliberations.deliberationInfos'))->with('error', ' Vous ne pouvez modifier ce document! ');
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'doc' => 'required|file|max:1024|mimes:pdf',
        ]);

        //$rapportpath = $request->file('rapport')->store('public/rapports');

        File::delete([
            Storage::path($request->path),
        ]);
        //var_dump($request->input('path'));

    }
}
