<?php

namespace App\Http\Controllers\GestionDesEnseignants;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    // public function affichage(){
        
    //     return view('gestion_enseignants.index', [
    //         'vTitle'=> 'Connexion'
    //     ]);
    // }

    // public  function traitement(){
    //     request()->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);
        
    
    //     if(auth::attempt([
    //         'email'=>request('email'),
    //         'password'=>request('password')
    //     ])){
    //         return redirect('/programme');
    //     }else{
    //         return back()->withErrors(['password'=> 'Vos identifiants sont incorrect',])->withInput(['email']);
    //     }
    // }
    public function deconnexion(){
        Auth::logout();

        return redirect('/');

    }
}
