<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Illuminate\Http\Request;
use App\Models\Plainte;
use App\Models\PlainteUser;
use App\Models\PlainteTemoin;
use App\Models\User;
use App\Http\Controllers\Controller;
use PDF;
use Auth;
Use Alert;

class PlainteController extends Controller
{
    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = Plainte::find($id);
        return view('gestion_conseils_plaintes.vue_plainte', compact('tile'));
    }

    public function show(){

        $admin = auth()->user()->user_groupId;
        if($admin == 1){
            $query = Plainte::all();
        } else {
            $query = Plainte::where('id_plaignant', auth()->user()->id)->get();
        }

        return view('gestion_conseils_plaintes.complaints_user', compact('query'));
    }

    public function form(){
        $users = User::all()->except(Auth::id());
        return view('gestion_conseils_plaintes.complaint_form', compact('users'));
    }

    public function model(){
        return view('gestion_conseils_plaintes.model');
    }

    public function edform($id){
        $users = User::all();
        $plainte = Plainte::find($id);
        $selected1 = array();
        $selected2 = array();
        $fautifs = PlainteUser::where('id_plainte', $id)-> get();
        $temoins = PlainteTemoin::where('id_plainte', $id)-> get();
        foreach($fautifs as $c){
            array_push($selected1, $c->fautif-> id);
        }

        foreach($temoins as $c){
            array_push($selected2, $c->temoin-> id);
        }
        return view('gestion_conseils_plaintes.complaint_edition_form', compact('users','plainte','selected1','selected2'));
    }

    public function update(Request $request, $plainte){
        $request->validate([
            'fautifs' => 'required',
            'motif' => 'required',
            'description' => 'required',
        ]);

        Plainte::findOrFail($plainte)->update([
            'motif' => request('motif'),
            'description' => request('description')
        ]);

        $fautifs = PlainteUser::where('id_plainte', $plainte)-> get();
        foreach($fautifs as $c){
            $c->delete();
            $request->session()->flash('alert-success', ' Complaint is deleted successfully.');
        }

        $fautifs = PlainteTemoin::where('id_plainte', $plainte)-> get();
        foreach($fautifs as $c){
            $c->delete();
            $request->session()->flash('alert-success', ' Complaint is deleted successfully.');
        }

        foreach($request -> fautifs as $key) {
            PlainteUser::create([
                'id_plainte' => $plainte,
                'id_user' => $key
            ]);
        }

        if($request -> temoins != null){
            foreach($request -> temoins as $key) {
                PlainteTemoin::create([
                    'id_plainte' => Plainte::orderBy('id', 'desc')->first()->id,
                    'id_temoin' => $key
                ]);
            }
        }
        return redirect()->route('gestion_conseils_plaintes.liste_plaintes');
    }

    public function create(Request $request){
        $request->validate([
            'fautifs' => 'required',
            'motif' => 'required',
            'description' => 'required',
        ]);

        $store = Plainte::create([
            'id_plaignant' =>auth()->user()->id,
            'motif' => request('motif'),
            'description' => request('description')
        ]);

        foreach($request -> fautifs as $key) {
            PlainteUser::create([
                'id_plainte' => Plainte::orderBy('id', 'desc')->first()->id,
                'id_user' => $key
            ]);
        }

        if($request -> temoins != null){
            foreach($request -> temoins as $key) {
                PlainteTemoin::create([
                    'id_plainte' => Plainte::orderBy('id', 'desc')->first()->id,
                    'id_temoin' => $key
                ]);
            }
        }
        toast('Votre plainte a été ajoutée!','success');
        return redirect()->route('gestion_conseils_plaintes.liste_plaintes');
    }

    public function destroy(Request $request ,$id){
        $Del = Plainte::find($id);
        $Del->delete();
        $request->session()->flash('alert-success', ' Complaint is deleted successfully.');
        return redirect()->route('gestion_conseils_plaintes.liste_plaintes');
    }

     public function reject(Request $request ,$id){
        $up = Plainte::where('id', $id)->first();
        $up->update([
            "statut" => 2
        ]);
        return redirect()->route('gestion_conseils_plaintes.liste_plaintes');
     }

}



