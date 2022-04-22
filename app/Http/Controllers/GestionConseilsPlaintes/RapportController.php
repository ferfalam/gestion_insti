<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Rapport;

class RapportController extends Controller
{
    //

    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = Rapport::find($id);
        return view('rapports', compact('tile'));
    }

    public function show(){
        $query = Rapport::all();
        return view('rapports_user', compact('query'));
    }

    public function form(){
        return view('rapport_form');
    }

    public function create(Request $request){
        $store = Convocation::create([
            'id_conseil' => request('id_conseil'),

        ]);
        //$query = Convocation::all();
        return redirect()->route('liste_rapports');
    }
}
