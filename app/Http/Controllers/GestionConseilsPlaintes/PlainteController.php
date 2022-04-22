<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Illuminate\Http\Request;
use App\Models\Plainte;
use App\Models\User;
use App\Http\Controllers\Controller;

class PlainteController extends Controller
{
    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = Plainte::find($id);
        return view('vue_plainte', compact('tile'));
    }

    public function show(){
        $admin = auth()->user()->statusId;

        if($admin == 2){
            $query = Plainte::all();
        } else {
            $query = Plainte::where('id_plaignant', auth()->user()->id)->get();
        }
        return view('gestion_conseils_plaintes.complaints_user', compact('query'));
    }

    public function form(){
        return view('gestion_conseils_plaintes.complaint_form');
    }

    public function create(Request $request){

        $request->validate([
            'nom_fautif' => ['required', 'min:3', 'max:255', 'exists:users,name'],
            'motif' => 'required',
            'description' => 'required',
        ]);

        $store = Plainte::create([
            'id_plaignant' =>auth()->user()->id,
            'motif' => request('motif'),
            'description' => request('description')
        ]);
        //$query = Plainte::all();
        return redirect()->route('liste_plaintes');
    }

    public function destroy($delete){
        $item = $delete;
        $Del = Plainte::find($item);
        $Del->delete();
        $request->session()->flash('alert-success', ' Complaint is deleted successfully.');

        return redirect()->route('index');
     }

     public function update($update){
        $up = Plainte::find($update);
        $up -> update(['status', 1]);
        return redirect()->route('index');
     }
}



