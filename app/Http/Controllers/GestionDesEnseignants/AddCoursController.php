<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\Ue;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AddCoursController extends Controller
{
    public function show(){

        $user=Profile::all();
        $ue= Ue::all();
        $gpe= PedagogicGroup::all();
        return view('gestion_enseignants.addCours', [
            'vTitle'=> 'AddCours',
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
                DB::table('enseignants')->insert([
                    'nomEnseignant'=> request('selectNom'.$i), 
                    'nomUe'=> request('selectUE'.$i), 
                    'credit'=> request('credit'.$i), 
                    'ct'=> request('ct'.$i), 
                    'td'=> request('td'.$i), 
                    'tp'=> request('tp'.$i), 
                    'tpe'=> request('tpe'.$i), 
                    'gpe'=> request('selectGPE'.$i),
                    'mp'=> request('mp'.$i), 
                    'me'=> request('me'.$i), 
                ]);
                $nombreSucces++;
            }
            
        }
        // flash($nombreSucces.' enrégistrement(s) réussit')->success();

    	return redirect()->route('gestion_enseignant.show');

    }
    
}
