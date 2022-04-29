<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Convocation;
use App\Models\Plainte;
use Auth;
///use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConvocationLetter;

class ConvocationController extends Controller
{
    //
    public function new(){
        return view('form');
    }

    public function send(Request $request)
    {
        Mail::to('makandjou3000@gmail.com')
            ->send(new ConvocationLetter($request->except('_token')));
        return view('gestion_conseils_plaintes.vue_convocation');
    }

    public function view($id){
        $tile = Convocation::find($id);
        return view('gestion_conseils_plaintes.vue_convocation', compact('tile'));
    }

    public function show(){

        $admin = auth()->user()->statusId;

        if($admin == 1){
            $query = Convocation::all();
        } else {
            $query = Convocation::where('id_user', Auth::user()->id);
        }
        return view('gestion_conseils_plaintes.convocations_user', compact('query'));
    }

    public function form(){
        return view('gestion_conseils_plaintes.convocation_form');
    }

    public function store(Request $request)
    {
        $order = Convocation::findOrFail($request->id);

        // Ship the order...

        Mail::to('makandjou3000@gmail.com')->send(new Convocation($order));
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
