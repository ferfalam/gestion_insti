<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\Ue;
use App\Models\Profile;
use App\Models\Qualite;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AddMissionController extends Controller
{
    public function affichage(){
         $profile=Profile::all();
         $qualite=Qualite::all();
         $ue=Ue::all();
        $group= PedagogicGroup::all();
         return view('gestion_enseignants.addMission',[
             'vTitle'=>'Mission',
             'profile'=>$profile,
             "qualite"=>$qualite,
             'ue'=>$ue,
             'group'=>$group,
            ]);
    }
    public function traitement()
    {


    $compteur= request('compteur');
    $nombreSucces=0;

    for($i=0; $i<=$compteur; $i++){
        if(request('adresse_complet'.$i)!=null){
            DB::table('missions')->insert([
                'nom_enseignant'=> request('selectNom'.$i),
                 'qualite'=>request('selectQualite'.$i),
                 'adressse'=>request('adresse_complet'.$i),
                 'date_naissance'=>request('date_naissance'.$i),
                 'lieu'=>request('lieu'.$i),
                 'nationalite'=>request('Nationalite'.$i),
                 'maticule'=>request('matricul'.$i),
                 'grade'=>request('grade'.$i),
                 'ue'=>request('selectUE'.$i),
                 'pedagogicGroup'=>request('selectGPE'.$i),
                 'academicYear'=>request('Annee_academique'.$i),
                 'missionHeure'=>request('heure_UE'.$i),
                 'missionDuree'=>request('dure_mission'.$i),
                 'startDate'=>request('dure_jourArrive'.$i),
                 'endDate'=>request('dure_jourRetour'.$i),
                ]);
                $nombreSucces++;
            }
        }
        //flash($nombreSucces.' enrégistrement(s) réussit')->success();

        return redirect()->route('gestion_enseignant.show_programmerMission');
    }
}
