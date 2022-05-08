<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentRegistrationController extends Controller
{

    

    public function index(Request $request)
    {
        $idUserGroup = DB::table('user_groups')->where('name', 'apprenant')->value('id');

        $student_infos = DB::table('users')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.user_groupId','=', $idUserGroup)
            ->select('profiles.com_fullname as first_name','profiles.com_givenName as last_name', 'profiles.com_registrationNumber as matricule')
            ->get();


        return view ('generality.student_registration', compact('student_infos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(Request $request){
        // return dump($request);
        $request->validate([
            'filiere' => 'required',
            'pedagogic_group' => 'required',
            'document' => 'bail|required|file|mimes:xlsx'

        ]);
        
        
         // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        
        // 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
        $fichier = $request->document->move(public_path(), $request->document->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
        $reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();
        // return $rows; 

        foreach($rows as $row){
            
            $user=User::create([
                'pseudo'=>$row['Matricule'],
                'email'=>$row['Matricule']."@insti.com",
                'password'=>Hash::make($row['Matricule']),
                'statusId'=>1,
                'user_groupId'=>3,
            ]);

            

            $userId = DB::table('users')->where('pseudo', $row['Matricule'])->value('id');

            // $user_positions_services_fields=User_Position_Service_Field_Map::create([
            //     "userId"=>$userId,
            //     "serviceId"=>"",
            //     "positionId"=>"",
            //     "fieldId"=> $request->filiere,
            // ]);

            $profil = Profile::create([
                'user_id' => $userId,
                "com_fullname" => $row['Nom'],
                "com_givenName" => $row['Prenom'],
                "com_gender" => $row['Genre'],
                "com_birthdate" => $row['Date_de_naissance'],
                "com_birthPlace" => $row['Lieu_de_naissance'],
                "com_diploma" => $row['Diplome'],
                "com_registrationNumber" => $row['Matricule'],
                "com_phoneNumber" => $row['Telephone'],
                "com_address" => $row['Adresse'],
                "com_parentFullname" => "",
                "com_parentGivenName" => "",
                "com_parentPhoneNumber",
                "app_fieldId" => $request->filiere,
                "app_typeId",
                "ens_typeId",
                "pers_typeId",
            ]);
        }

         // 5. On supprime le fichier uploadé
         $reader->close(); // On ferme le $reader
         unlink($fichier);

         event(new Registered($profil));
         $this->message = "Etudiants ajouté avec succès";
         $this->success = true;
 
         $idUserGroup = DB::table('user_groups')->where('name', 'apprenant')->value('id');

         $student_infos = DB::table('users')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.user_groupId','=', $idUserGroup)
            ->select('profiles.com_fullname as first_name','profiles.com_givenName as last_name', 'profiles.com_registrationNumber as matricule')
            ->get();


        return view ('generality.student_registration', compact('student_infos'));
        

    }

}
