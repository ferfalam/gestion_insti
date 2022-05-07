<?php

namespace App\Http\Controllers\GestionConseilPedagogique;

use App\Models\Profile as Profil;
use App\Models\Conseil;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\CouncilRequest;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Profiler\Profile;

class councilControler extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    function index()
    {
        $conseils = Conseil::where("statut", null)->get();
    
        return view("gestion_conseil_pedagogique.index", compact("conseils"));

    }


    function councils()
    {
        $conseils = Conseil::where("statut", "done")->get();
        return view("gestion_conseil_pedagogique.councils", compact("conseils"));
    }

    
    function my_councils()
    {
        $conseils = Conseil::where("statut", "done")->where("user_id", Auth::id())->get();
        return view("gestion_conseil_pedagogique.my_councils", compact("conseils"));
    }


    function view_new($id)
    {
        $conseil = Conseil::where('id', $id)->firstOrFail();
        return view("gestion_conseil_pedagogique.new_council", compact("conseil"));
    }

    function view_done($id)
    {
        $conseil = Conseil::where('id', $id)->where("statut", "done")->firstOrFail();
        return view("gestion_conseil_pedagogique.done_council", compact("conseil"));
    }


    function view_own_done($id)
    {
        $conseil = Conseil::where('id', $id)->where("statut", "done")->where("user_id", Auth::id())->firstOrFail();
        return view("gestion_conseil_pedagogique.done_council", compact("conseil"));
    }


    function program()
    {
        $conseil = Conseil::where("user_id", Auth::id())->where("statut", null)->first();
        if ($conseil != null) return redirect()->route("gestion_conseil_pedagogique.view_program");
        return view("gestion_conseil_pedagogique.program_council");
    }


    function report(Request $request)
    {
        $request->validate([
            "id" => "bail|required"
        ]);
        $id = $request->id;
        return view("gestion_conseil_pedagogique.report_council", compact("id"));
    }


    function store_program(Request $request)
    {
        $request->validate([
            "theme"=>"bail|required|min:20",
            "signataire"=>"bail|required|min:10",
            "date_tenu"=>"bail|required",
            "description"=>"bail|required|min:20",
            "note_service"=>"bail|required|mimes:jpg,png,pdf,jpeg|max:4096",
            "liste_participants"=>"bail|required|mimes:jpg,png,pdf,jpeg|max:4096"
        ]);

        $note = "note_service" . time() . ".pdf";
        $liste = "liste_participants" . time() . ".pdf";



        $input = $request->all();

        $input["note_service"] = $request->note_service->storeAs("document", $note, "public");;
        $input["liste_participants"] = $request->liste_participants->storeAs("document", $liste, "public");
        session(["council" => $input]);
        return view("gestion_conseil_pedagogique.validate_council", compact("input"));
    }

    function vaidate_program()
    {


        if (!empty(session("council"))) {
            $council = session("council");


            $council["user_id"] = Auth::id();


            $council["objet"] = $this->councilObject();
            $conseil = Conseil::create($council);
            if ($conseil != null) session()->forget("council");
        }

        return redirect()->route("gestion_conseil_pedagogique.view_program");
    }


    function program_view()
    {

        $conseil = Conseil::where("user_id", Auth::id())->where("statut", null)->first();

        if ($conseil == null) return redirect()->route("gestion_conseil_pedagogique.program");

        return view("gestion_conseil_pedagogique.reset_council", compact("conseil"));
    }



    function store_report(Request $request)
    {

        $request->validate([
            "rapport" => "bail|required|min:10",
            "fichier_rapport" => "bail|required|mimes:jpg,png,pdf,jpeg|max:4096",
            "liste_presence" => "bail|required|mimes:jpg,png,pdf,jpeg|max:4096"
        ]);
        $note = "fichier_rapport" . time() . ".pdf";
        $liste = "liste_presence" . time() . ".pdf";
        $conseil = Conseil::find($request->id);
        $conseil->fichier_rapport = $request->fichier_rapport->storeAs("document", $note, "public");
        $conseil->fichier_rapport = $request->liste_presence->storeAs("document", $liste, "public");
        $conseil->rapport = $request->rapport;
        $conseil->save();

        return view("gestion_conseil_pedagogique.validate_report", compact("conseil"));
    }

    function validate_report(Request $request)
    {
        $conseil = Conseil::where('id', $request->id)->firstOrFail();
        $conseil->statut = "done";
        $conseil->date_rapport = date("m/d/Y");
        $conseil->save();
        return redirect()->route("gestion_conseil_pedagogique.view_own_done", ["id" => $conseil->id]);
    }







    function delete_council(Request $request)
    {
        $conseil = Conseil::where('id', $request->id)->firstOrFail();
        $conseil->statut = "deleted";
        $conseil->save();
        return redirect()->route("gestion_conseil_pedagogique.view_own_done", ["id" => $conseil->id]);
    }









    function guests()
    {
        $conseil = Conseil::where("user_id", Auth::id())->where("statut", null)->first();
        if ($conseil == null) return redirect()->route("gestion_conseil_pedagogique.index");
        $guests = DB::select(
            'SELECT DISTINCT invitations.id as invit_id,fichier,
                
                profiles.com_fullname as fullname,
                profiles.com_givenName as firstname,
                profiles.com_registrationNumber as regist_num,
                services.name as services_name,
                user_groups.name as user_groups_name
                FROM invitations ,user_groups ,profiles ,users,
                    user_user_group__position__service__maps  maps,
                    positions,services
                WHERE invitations.conseil_id=:id 
                AND invitations.participant_id=users.id
                AND invitations.participant_id=profiles.user_id
                AND invitations.participant_id=maps.userId
                AND users.user_groupId=user_groups.id
                AND maps.serviceId=services.id
                AND maps.positionId=positions.id',
            array("id" => $conseil->id,)
        );

       

        



        $i = 0;



        return view("gestion_conseil_pedagogique.guests", compact('guests', 'i', 'conseil'));
    }


    function add_guest(Request $request)
    {


        $request->validate([
            "fichier" => "bail|required|mimes:pdf|max:4096",
            "num_mat" => "bail|required|numeric|min:0",

        ]);



        $fichier = "invite" . time() . ".pdf";
        $profile = Profil::where("com_registrationNumber", $request->num_mat)->first();
        
        if($profile==null) return redirect()->route("gestion_conseil_pedagogique.guests");
        $conseil = Conseil::where("user_id", Auth::id())->where("statut", null)->first();
        $guest = new Invitation();
        $guest->participant_id = $profile->user_id;
        $guest->conseil_id = $conseil->id;
        $guest->fichier = $request->fichier->storeAs("document", $fichier, "public");
        $guest->save();

        return redirect()->route("gestion_conseil_pedagogique.guests");
    }



    function del_guest(Request $request)
    {

        $guest = Invitation::where("id",$request->id)->firstOrFail();
        $guest->delete();

        return redirect()->route("gestion_conseil_pedagogique.guests");
    }


    function allowUser()
    {
        if (!Gate::allows("yesadmin")) return redirect()->route("gestion_conseil_pedagogique.index");
    }

    function councilObject(){
        $guests = DB::select(
            "SELECT DISTINCT 
                
                fields.abbreviation as field_name
                
                FROM profiles ,
                    user_user_group__position__service__maps  maps,
                    services,fields
                WHERE maps.userId=:id 
                AND maps.userId=profiles.user_id
                AND profiles.app_fieldId= fields.id
                AND maps.serviceId=services.id
                AND services.name ='departement'",
            array("id" =>Auth::id(),));
         
        return $guests==null ?"Conseil pédagogique":"Conseil du departement de ".$guests[0]->field_name;
    }
}
