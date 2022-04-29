<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function affichage()
    {
        if(Auth::user()->email=='admin@insti.com'){
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
                'table'=> $table,
            ]);
        }

    }

    public function traitement(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=profile::all();

            $lastvalue=request('selectNomA');
            if($lastvalue=="*"){
                $profileTrait=$profile;
            }else{
                $profileTrait=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            }
            return view('missionAdmin',[
                'profile'=>$profile,
                'lv'=>$lastvalue,
                'profileTrait'=>$profileTrait
            ]);
            // return $this->lastvalue;
        }else{
            $profil=DB::table('profiles')->where('com_givenName',Auth::user()->id)->first();
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);

            return view('mission',[
                'table'=> $table,
            ]);
        }
    }
    public function generate(){
        if(Auth::user()->email=='admin@insti.com'){
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $profile=profile::all();
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            
            if(request('selectNom')=="*"){
                $profileTrait=$profile;
            }
            
            $profileTrait=$profile;
            return PDF::loadView('missionPdf',[
                'profile'=>$profile,
                'lv'=>request('selectNom'),
                'profileTrait'=>$profileTrait,
            ])->setPaper('a2', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
   
            $sqlTable= "select * from missions where nom_enseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
    
            return PDF::loadView('missionPdf',[
            'table'=>$table,
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
        
   
    }
}
