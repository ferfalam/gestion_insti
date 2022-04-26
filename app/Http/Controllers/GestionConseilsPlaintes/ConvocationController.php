<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Convocation;

class ConvocationController extends Controller
{
    //
    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = Convocation::find($id);
        return view('vue_convocation', compact('tile'));
    }

    public function show(){

        $admin = auth()->user()->admin;

        if($admin == 1){
            $query = Convocation::all();
        } else {
            $query = Convocation::where('id_plaignant', auth()->user()->id)->where('nom_fautif', auth()->user()->name)->get();
        }
        return view('convocations_user', compact('query'));
    }

    public function form(){
        return view('convocation_form');
    }

    public function create(Request $request){
        $store = Convocation::create([
            'id_plainte' => request('id_plainte'),
            'nom_fautif' => request('nom_fautif'),
            'nom_plaignant' => request('nom_plaignant'),
            'date' => Carbon::parse(request('date'))->format('m/d/Y'),
        ]);
        //$query = Convocation::all();
        return redirect()->route('liste_convocations');
    }
}
