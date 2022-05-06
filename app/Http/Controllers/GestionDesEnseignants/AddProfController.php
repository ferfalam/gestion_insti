<?php

namespace App\Http\Controllers\GestionDesEnseignants;

use App\Models\User;
use App\Models\Qualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AddProfController extends Controller
{
    public function affichage()
    {
    	return view('gestion_enseignants.addProf',[
    		'vTitle'=>'Ajouter',
    	]);
    }
    public function traitement()
    {

        $compteur= request('compteur');
        $nombreSucces=$compteur+1;
        $errors= [];

        for($i=0; $i<=$compteur; $i++){
            //verifions si les eléments saisie n'etais pas enregistrer
            $compteExistant=false;
            $allUser= User::all();
            

            foreach($allUser as $user ){
                if(($user->email)==request('email'.$i)){
                    $compteExistant=true;
                    array_push($errors, "Un compte existe déjà avec l'email ".request('email'.$i));
                    $nombreSucces--;
                }
            }
            if($compteur==null){
                return back();
            }
            if(!$compteExistant){
                $Users=DB::table('users')->insert([
                    'pseudo'=>request('last_name'.$i),
                    'email'=>request('email'.$i),
                    'password'=>Hash::make(request('pass'.$i)),
                    'statusId'=>1,
                ]);
                $id=DB::getPdo()->lastInsertId();
                $profile=DB::table('profiles')->insert([
                    'user_id'=>$id,
                    'com_fullname'=>request('first_name'.$i),
                    'com_givenName'=>request('last_name'.$i),
                    'com_gender'=>request('genre'.$i),
                    'com_birthdate'=>request('date'.$i),
                    'com_birthPlace'=>request('lieu_naissance'.$i),
                    'com_diploma'=>request('diplome'.$i),
                    'com_registrationNumber'=>request('matricule'.$i),
                    'com_phoneNumber'=>request('num'.$i),
                    'com_address'=>request('adresse'.$i),
                    'pers_grade'=>request('type'.$i),
                    "com_parentFullname" => "Parent Enseignant",
                    "com_parentGivenName" => "Parent ",
                    "com_parentPhoneNumber" => "68587412",
                    "app_fieldId" => "4",
                    "app_typeId" => "1",
                    "ens_typeId" => "2",
                    "pers_typeId" => "3",
                ]);
            }

        }

        // flash($nombreSucces.'/'.($compteur+1).' enrégistrement(s) réussit')->success();
        // foreach ($errors as $errors){
        //     flash($errors)->error();
        // }
    	return view('gestion_enseignants.addProf',[
    		'vTitle'=>'Ajouter',
    	]);
        

    }
}
