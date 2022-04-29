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
        return view('gestion_conseils_plaintes.rapports', compact('tile'));
    }

    public function show(){
        $query = Rapport::all();
        return view('gestion_conseils_plaintes.rapports_user', compact('query'));
    }

    public function form($id){
        return view('gestion_conseils_plaintes.rapport_form', compact('id'));
    }

    public function create(Request $request, $id){

        $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:docx,pdf',
        ]);

        $store = Rapport::create([
            'id_conseil' => $id,
            'path' => request('file')
        ]);

        return redirect()->route('gestion_conseils_plaintes.liste_rapports');
    }

    public function destroy(Request $request, $id){
        $Del = Rapport::find($id);
        $Del->delete();
        $request->session()->flash('alert-success', ' The rapport is deleted successfully.');
        return redirect()->route('gestion_conseils_plaintes.rapports');
     }
}
