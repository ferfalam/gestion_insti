<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Plainte;
use Illuminate\Support\Facades\Validator;
use App\Models\Conseil;
use App\Models\User;

class ConseilController extends Controller
{
    //

    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = ConseilDiscipline::find($id);
        return view('vue_conseil', compact('tile'));
    }

    public function show(){
        $query = ConseilDiscipline::all();
        return view('conseils_user', compact('query'));
    }

    public function form($id){
        $item = Plainte::find($id);
        return view('conseil_form', compact('item'));
    }


    public function create(Request $request, $id){

    $request->validate([
        'addMoreInputFields.*.participant_name' => ['required', 'exists:users,name'],
        'date' => 'required',
        'heure' => 'required',
    ]);

    $req ="";
        $store = ConseilDiscipline::create([
            'id_plainte' => $id,
            'date' => request('date'),
            'heure' => request('heure'),
        ]);
        foreach ($request->addMoreInputFields as $key => $value) {
            ConseilUser::create([
                'id_conseil' => $store.id(),
                'id_user' => $value
            ]);
        }


        //$query = Convocation::all();
        return redirect()->route('liste_conseils');
    }
}
