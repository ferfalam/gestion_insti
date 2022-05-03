<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\Profile;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{


    public function affichage()
    {
        if(Auth::user()->email=='admin@insti.com'){
            $profile=Profile::all();
            return view('gestion_enseignants.tableAdmin',[
                'vTitle'=>'Programme',
                'profile'=>$profile,
            ]);
        }else{  
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            $sqlTable= "select * from enseignants where nomEnseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            

            return view('gestion_enseignants.table',[
                'vTitle'=>'Mission',
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ]);
        }
    }
    public function traitement(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=Profile::all();
            // $profileTrait=$profile;
            $lastvalue=request('selectNom');
            if($lastvalue=="*"){
                $profileTrait=$profile;
            }else{
                $profileTrait=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
            }
            
            return view('gestion_enseignants.tableAdmin',[
                'vTitle'=>'Programme',
                'profile'=>$profile,
                'lv'=>$lastvalue,
                'profileTrait'=>$profileTrait
            ]);
        }else{  
            $profil=DB::table('profiles')->where('com_givenName',Auth::user()->id)->first();
            $sqlTable= "select * from enseignants where nomEnseignant='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            

            return view('gestion_enseignants.table',[
                'vTitle'=>'Programme',
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ]);
        }
    }

    public function generate(){
        if(Auth::user()->email=='admin@insti.com'){
            $profile=Profile::all();
            
            $profileTrait=$profile;
            
            return PDF::loadView('gestion_enseignants.tablePdf',[
                'profile'=>$profile,
                'lv'=>request('selectNom'),
                'profileTrait'=>$profileTrait
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }else{
            $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();

            $sqlTable= "select * from enseignants where nomEnseignant ='"."".$profil->com_givenName." ".$profil->com_fullname."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);

            $totalP=0;
            $totalE=0;
            $dif=0;

            foreach($table2 as $table2){
                $totalP+=$table2->mp;
                $totalE+=$table2->me;
            }

            $dif=$totalP-$totalE;
            return PDF::loadView('gestion_enseignants.tablePdf',[
                'table'=> $table,
                'mp'=> $totalP,
                'dif'=> $dif,
            ])->setPaper('a4', 'landscape')->setWarnings(false)->download('psdtest.pdf');
        }
    }
}
