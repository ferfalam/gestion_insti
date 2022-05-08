<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Convocation;
use App\Models\Plainte;
use App\Models\PlainteUser;
use App\Models\PlainteTemoin;
use App\Models\ConseilUsers;
use App\Models\ConseilDiscipline;
use Auth;
///use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConvocationLetter;
use App\Mail\InvitationLetter;

class ConvocationController extends Controller
{
    //
    public function new(){
        return view('form');
    }


    public function sendConvocations(Request $request, $id)
    {
        $convoc = ConseilDiscipline::find($id);
        $convoques = PlainteUser::where('id_plainte', $convoc-> id)->get();
        $temoins = PlainteTemoin::where('id_plainte', $convoc-> id)->get();
        foreach($convoques as $co ){
            Convocation::create([
                'id_conseil' => $id,
                'id_user' => $co -> id_user,
                'type' => 'Convocation'
            ]);
            Mail::to($co-> fautif -> email)
            ->send(new ConvocationLetter(Convocation::find($id)));
        }
        foreach($temoins as $co ){
            Convocation::create([
                'id_conseil' => $id,
                'id_user' => $co -> id_user,
                'type' => 'Convocation'
            ]);
            Mail::to($co-> fautif -> email)
            ->send(new ConvocationLetter(Convocation::find($id)));
        }
        Convocation::find($id)->conseil->update([
            'convocationsOK' => 1
        ]);
        return redirect()->route('gestion_conseils_plaintes.liste_convocations');
    }

    public function sendInvitations(Request $request, $id)
    {
        $invites = ConseilUsers::where('id_conseil', $id)->get();
        foreach($invites as $co ){
            Convocation::create([
                'id_conseil' => $id,
                'id_user' => $co -> id_user,
                'type' => 'Invitation'
            ]);
            Mail::to($co -> participant -> email)
            ->send(new InvitationLetter(Convocation::find($id)));
        }

        Convocation::find($id)-> conseil->update([
            'invitationsOK' => 1
        ]);
        return redirect()->route('gestion_conseils_plaintes.liste_convocations');
    }

    public function view($id){
        $tile = Convocation::find($id);
        if($tile -> type == 'Invitation'){
            return view('gestion_conseils_plaintes.vue_invitation', compact('tile'));
        } else {
            return view('gestion_conseils_plaintes.vue_convocation', compact('tile'));
        }
    }

    public function show(){

        $admin = auth()->user()->user_groupId;
        if($admin == 1){
            $query = Convocation::all();
        } else {
            $query = Convocation::where('id_user', Auth::user()->id)->get();
        }
        return view('gestion_conseils_plaintes.convocations_user', compact('query'));
    }

    public function form(){
        return view('gestion_conseils_plaintes.convocation_form');
    }



    public function create(Request $request){
        $store = Convocation::create([
            'id_plainte' => request('id_plainte'),
            'nom_fautif' => request('nom_fautif'),
            'nom_plaignant' => request('nom_plaignant'),
            'date' => Carbon::parse(request('date'))->format('m/d/Y'),
        ]);
        //$query = Convocation::all();
        return redirect()->route('gestion_conseils_plaintes.liste_convocations');
    }
}
