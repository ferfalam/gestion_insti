<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Plainte;
use Illuminate\Support\Facades\Validator;
use App\Models\ConseilDiscipline;
use App\Models\Convocation;
use App\Models\User;
use App\Models\ConseilUsers;
use App\Models\ConseilPresent;
use App\Models\PlainteUser;
use Auth;

class ConseilController extends Controller
{
    //

    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = ConseilDiscipline::find($id);
        return view('gestion_conseils_plaintes.vue_conseil', compact('tile'));
    }

    public function show(){
        $query = ConseilDiscipline::all();
        return view('gestion_conseils_plaintes.conseils_user', compact('query'));
    }

    public function form($id){
        $users = User::all();
        return view('gestion_conseils_plaintes.conseil_form', compact('id','users'));
    }


    public function tenu(Request $request,$id)
    {
        $tile =ConseilDiscipline::find($id);
        ConseilDiscipline::find($id)->update([
            "tenue" => 1
        ]);
        return view('gestion_conseils_plaintes.vue_conseil', compact('tile'));

    }


    public function sendMails(Request $request,$id){
        $conseil = ConseilDiscipline::find($id);
        $idp = $conseil -> id_plainte;
        $fautifs = PlainteUser::where('id_plainte', $idp)-> get();
        foreach($fautifs as $c){
            Convocation::create([
                'id_conseil' => ConseilDiscipline::orderBy('id', 'desc')->first()->id,
                'id_user' => $c -> id_user,
                'type' => 'Convocation'
            ]);
        }

        $convoques = ConseilUsers::where('id_conseil', $id)-> get();
        foreach($convoques as $c){
            Convocation::create([
                'id_conseil' => ConseilDiscipline::orderBy('id', 'desc')->first()->id,
                'id_user' => $c,
                'type' => 'Invitation'
            ]);
        }

        $conseil-> update([
            'mailOK' =>  1
        ]);
    }

    public function edform($id){
        $users = User::all();
        $conseil = ConseilDiscipline::findOrFail($id);

        $selected1 = array();
        $selected2 = array();
        $participants = ConseilUsers::where('id_conseil', $id)-> get();
        $presents = ConseilPresent::where('id_conseil', $id)-> get();
        foreach($participants as $c){
            array_push($selected1, $c->participant-> id);
        }

        foreach($presents as $c){
            array_push($selected2, $c->present-> id);
        }
        return view('gestion_conseils_plaintes.conseil_edition_form', compact('users','conseil','selected1', 'selected2'));
    }

    public function create(Request $request, $id){

        $request->validate([
            'date' => 'required|after:tomorrow',
            'heure' => 'required',
            'lieu' => 'required',
        ]);

        $store = ConseilDiscipline::create([
            'id_plainte' => $id,
            'date' => request('date'),
            'heure' => request('heure'),
            'lieu' => request('lieu')
        ]);

        foreach ($request->participants as $key) {
            ConseilUsers::create([
                'id_conseil' => ConseilDiscipline::orderBy('id', 'desc')->first()->id,
                'id_user' => $key
            ]);
        }

        $up = Plainte::where('id', $id)->first();
        $up->update([
            "statut" => 1
        ]);
        return redirect()->route('gestion_conseils_plaintes.liste_conseils');
    }

    public function update(Request $request, $conseil){
        $ceconseil = ConseilDiscipline::findOrFail($conseil);
        if($ceconseil-> tenue == 0 ){
            $request->validate([
                'date' => 'required|after:today',
                'heure' => 'required',
                'lieu' => 'required',
                'participants' => 'required',
            ]);
            $ceconseil->update([
                'date' => request('date'),
                'heure' => request('heure'),
                'lieu' => request('lieu'),

            ]);

            $parts = ConseilUsers::where('id_conseil', $conseil)-> get();
            foreach($parts as $c){
                $c->delete();
                $request->session()->flash('alert-success', ' council is deleted successfully.');
            }

            foreach($request -> participants as $key) {
                ConseilUsers::create([
                    'id_conseil' => $conseil,
                    'id_user' => $key
                ]);
            }
        }

        if ($ceconseil-> tenue == 1) {

            if($request -> presents != null){
                $parts = ConseilPresent::where('id_conseil', $conseil)-> get();
                foreach($parts as $c){
                $c->delete();
                $request->session()->flash('alert-success', ' council is deleted successfully.');
            }
                foreach($request -> presents as $key) {
                    ConseilPresent::create([
                        'id_conseil' => $conseil,
                        'id_present' => $key
                    ]);
                }
            }

        if($request -> maitre != null){
            $ceconseil ->update([
                'maitre' => request('maitre') ?? null,
            ]);
        }
        }

        return redirect()->route('gestion_conseils_plaintes.liste_conseils');
    }

}
