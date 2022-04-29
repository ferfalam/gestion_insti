<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddCoursController extends Controller
{
    public function show(){

        return view('gestion_enseignants.addCours', ['vTitle'=> 'AddCours']);
    
        }
	    public function affichage()
    {
        if(auth()->guest()){
            return view('index', [
                'vTitle'=> 'Connexion'
            ]);
        }
        $user= profile::all();
        $ue= UE::all();
        $gpe= GroupePedagogique::all();
    	return view('addCours',[
    		'vtitle'=>'Ajouter Cours',
            "user"=> $user,
            "ue"=> $ue,
            "gpe"=>$gpe,
    	]);
    }
    public function traitement()
    {

        $compteur= request('compteur');
        $nombreSucces=0;

        for($i=0; $i<=$compteur; $i++){
            if(request('credit'.$i)!=null){
                DB::table('tableau_enseignants')->insert([
                    'nom_enseignant'=> request('selectNom'.$i), 
                    'nom_ue'=> request('selectUE'.$i), 
                    'credit'=> request('credit'.$i), 
                    'ct'=> request('ct'.$i), 
                    'td'=> request('td'.$i), 
                    'tp'=> request('tp'.$i), 
                    'tpe'=> request('tpe'.$i), 
                    'gpe'=> request('selectGPE'.$i), 
                    'gpe'=> request('selectGPE'.$i), 
                    'mp'=> request('mp'.$i), 
                    'me'=> request('me'.$i), 
                ]);
                $nombreSucces++;
            }
            
        }
        flash($nombreSucces.' enrégistrement(s) réussit')->success();
        $user= profile::all();
        $ue= UE::all();
        $gpe= GroupePedagogique::all();
    	return view('addCours',[
    		'vtitle'=>'Ajouter Cours',
            "user"=> $user,
            "ue"=> $ue,
            "gpe"=>$gpe,
    	]);

    }
    
}
