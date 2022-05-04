<?php

namespace App\Http\Controllers\GestionDemande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentRegistrationController extends Controller
{
    public function create(){

        return view('gestion_demandes_reclamation_evaluation.personnels.enregistrer_etudiant');
    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
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
                "app_fieldId" => "4",
                "app_typeId",
                "ens_typeId",
                "pers_typeId",
            ]);
        }

         // 5. On supprime le fichier uploadé
         $reader->close(); // On ferme le $reader
         unlink($fichier);

         // 6. Retour vers le formulaire avec un message $msg
         return back()->withMsg("Importation réussie !");

        // return dump($rows);
        

    }

   

    

    // // $rows est une Illuminate\Support\LazyCollection

    // // 4. On insère toutes les lignes dans la base de données
    // $status = Client::insert($rows->toArray());

    // // Si toutes les lignes sont insérées
    // if ($status) {

    //     // 5. On supprime le fichier uploadé
    //     $reader->close(); // On ferme le $reader
    //     unlink($fichier);

    //     // 6. Retour vers le formulaire avec un message $msg
    //     return back()->withMsg("Importation réussie !");

    // } else { abort(500); }

}
