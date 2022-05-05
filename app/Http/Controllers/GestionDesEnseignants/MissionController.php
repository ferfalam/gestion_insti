<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class MissionController extends Controller
{
    public function affichage()
    {
        //dd(Auth::user()->user_group->id);
        if(Auth::user()->user_groupId==1){
            $profile=Profile::all();
            return view('gestion_enseignants.missionAdmin', [
                'vTitle'=>'Mission',
                 'profile'=>$profile,
            ]);
        }else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            return view('gestion_enseignants.mission',[
                'vTitle'=>'Mission',
                'table'=> $table,
            ]);
        }

    }

    public function traitement(){
        if(Auth::user()->user_groupId==1){
            $profile=profile::all();

            $lastvalue=request('selectNomA');
            if($lastvalue=="*"){
                $profileTrait=$profile;
            }else{
                $profileTrait=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            }
            return view('gestion_enseignants.missionAdmin',[
                'vTitle'=>'Mission',
                'profile'=>$profile,
                'lv'=>$lastvalue,
                'profileTrait'=>$profileTrait
            ]);
            // return $this->lastvalue;
        }else{
            $profil=DB::table('profiles')->where('com_givenName',Auth::user()->id)->first();
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);

            return view('gestion_enseignants.mission',[
                'vTitle'=>'Mission',
                'table'=> $table,
            ]);
        }
    }

    public function generate(){
        if(Auth::user()->user_groupId==1){
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $profile=profile::all();
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            if(request('selectNom')=="*"){
                $profileTrait=$profile;
            }
            
            $profileTrait=$profile;
            return PDF::loadView('gestion_enseignants.missionPdf',[
                'profile'=>$profile,
                'lv'=>request('selectNom'),
                'profileTrait'=>$profileTrait,
            ])->setPaper('a2', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
   
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
    
            return PDF::loadView('gestion_enseignants.missionPdf',[
            'table'=>$table,
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        
   
    }
}
