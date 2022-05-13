<?php

namespace Database\Seeders;


use App\Models\Ue;
use App\Models\User;
use App\Models\Field;
use App\Models\Status;
use App\Models\General;
use App\Models\Profile;
use App\Models\Qualite;
use App\Models\Position;
use App\Models\Services;
use App\Models\UserGroup;
use App\Models\Typestages;
use App\Models\AcademicYear;
use App\Models\PedagogicGroup;
use App\Models\Evaluation_type;

use App\Models\Demande;
use App\Models\Moyenne;
use Illuminate\Database\Seeder;
use App\Models\AcademicSemester;
use App\Models\ShortcutsRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User_PedagogicGroup_Map;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\User_Position_Service_Field_Map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         $status=Status::create(['name'=>'Bloquer','notation'=>1,'description'=>"Description diu status créer"]);
         $status=Status::create(['name'=>'Bloquer','notation'=>2,'description'=>"Description diu status créer"]);

         //admin,superadmin,apprenant,enseignant,personnel,redacteur,partenaire
         $user_groups=UserGroup::create(["name"=>"admin","description"=>"Admin"]);
         $user_groups=UserGroup::create(["name"=>"superadmin","description"=>"Le super Admin"]);
         $user_groups=UserGroup::create(["name"=>"apprenant","description"=>"Un apprenant"]);
         $user_groups=UserGroup::create(["name"=>"enseignant","description"=>"Un enseignant"]);
         $user_groups=UserGroup::create(["name"=>"personnel","description"=>"Un personnel"]);
         $user_groups=UserGroup::create(["name"=>"redacteur","description"=>"Un redacteur"]);
         $user_groups=UserGroup::create(["name"=>"partenaire","description"=>"Un partenaire"]);

         $user=User::create(['pseudo'=>"admin",'email'=>"admin@insti.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>1]);
         $user=User::create(['pseudo'=>"enseignant",'email'=>"nana@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>4]);
         $user=User::create(['pseudo'=>"personnel",'email'=>"personnel@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>5]);
         $user=User::create(['pseudo'=>"etudiant",'email'=>"etudiant@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>3]);
         $user=User::create(['pseudo'=>"etudiant1",'email'=>"etu1@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1 , 'user_groupId'=>3]);
         $user=User::create(['pseudo'=>"etudiant2",'email'=>"etu2@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1 , 'user_groupId'=>3]);
         $user=User::create(['pseudo'=>"etudiant3",'email'=>"etu3@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>3]);
         $user=User::create(['pseudo'=>"superadmin",'email'=>"superadmin@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>2]);
         $user=User::create(['pseudo'=>"redacteur",'email'=>"redacteur@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>6]);
         $user=User::create(['pseudo'=>"partenaire",'email'=>"partenaire@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>7]);
         $user=User::create(['pseudo'=>"CD_GEI",'email'=>"cdgei@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>5]);
         $user=User::create(['pseudo'=>"CD_MS",'email'=>"cdms@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>5]);
         $user=User::create(['pseudo'=>"CD_GMP",'email'=>"cdgmp@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>5]);
         $user=User::create(['pseudo'=>"CD_GE",'email'=>"cdge@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1, 'user_groupId'=>5]);

         $field=Field::create(["systemName"=>"Maintenace des systèmes","name"=>" MS1","abbreviation"=>"MS1","description"=>" filiere","offer"=>"filiere"]);
         $field=Field::create(["systemName"=>"Génie mecanique et productique ","name"=>" GMP1","abbreviation"=>"GMP1","description"=>" filiere","offer"=>"filiere"]);
         $field=Field::create(["systemName"=>"Génie energetique","name"=>" GE1","abbreviation"=>"GE1","description"=>" filiere","offer"=>"filiere"]);
         $field=Field::create(["systemName"=>"Genie electrique et informatique","name"=>" GEI1","abbreviation"=>"GEI1","description"=>" filiere","offer"=>"filiere"]);

         $academic_years=AcademicYear::create(['name'=>"Academique","calendar"=>"Calendrier de l'année en cours","startDate"=>"2019-02-18","endDate"=>"2019-08-18","observation"=>"un observateur"]);


        // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE
         $generals=General::create(["name"=>"semestre 1","systemName"=>"1","content_type"=>"UE","content_tag"=>"nature_UE"]);
         $generals=General::create(["name"=>"semestre 2","systemName"=>"2","content_type"=>"UE","content_tag"=>"nature_UE"]);
         $generals=General::create(["name"=>"semestre 3","systemName"=>"1","content_type"=>"UE","content_tag"=>"nature_UE"]);
         $generals=General::create(["name"=>"semestre 4","systemName"=>"2","content_type"=>"UE","content_tag"=>"nature_UE"]);


         $pedagogic_groups=PedagogicGroup::create(["name"=>"Génie Civil","fieldId"=>"1","academicYearId"=>"1","studyYearId"=>"1","description"=>"GC"]);
         $pedagogic_groups=PedagogicGroup::create(["name"=>"Génie Electrique et Informatique","fieldId"=>"2","academicYearId"=>"1","studyYearId"=>"1","description"=>"GEI"]);
         $pedagogic_groups=PedagogicGroup::create(["name"=>"Génie Electrique et Informatique","fieldId"=>"3","academicYearId"=>"1","studyYearId"=>"1","description"=>"GEI"]);
         $pedagogic_groups=PedagogicGroup::create(["name"=>"Maintenance des Systèmes","fieldId"=>"4","academicYearId"=>"1","studyYearId"=>"1","description"=>"MS"]);
         $pedagogic_groups=PedagogicGroup::create(["name"=>"GEI/A","fieldId"=>"4","academicYearId"=>"1","studyYearId"=>"1","description"=>"GEI/A"]);


         //chefService/Adjoint, collaborateur, chefCollaborateur, chefDivision, responsableClasse/Adjoint
         $position=Position::create(["name"=>"chefService/Adjoint","description"=>" le chefService/Adjoint "]);
         $position=Position::create(["name"=>"collaborateur","description"=>" le collaborateur"]);
         $position=Position::create(["name"=>"chefCollaborateur","description"=>"le chefCollaborateur"]);
         $position=Position::create(["name"=>"chefDivision","description"=>"le chefDivision"]);
         $position=Position::create(["name"=>"responsableClasse/Adjoint","description"=>"le responsableClasse/Adjoint"]);
         //direction,departement, scolarite, secretariat, comptabilite, maintenance, cooperation

         $service=Services::create(['name'=>"direction","description"=>"la direction"]);
         $service=Services::create(['name'=>"departement","description"=>"le departement"]);
         $service=Services::create(['name'=>"scolarite","description"=>"La scolarite"]);
         $service=Services::create(['name'=>"secretariat","description"=>"le secretariat"]);
         $service=Services::create(['name'=>"comptabilite","description"=>" la comptabilite"]);
         $service=Services::create(['name'=>"maintenance","description"=>"La maintenance"]);

        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"1","userGroupId"=>"1","serviceId"=>"1","positionId"=>"4"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"2","userGroupId"=>"4","serviceId"=>"3","positionId"=>"2"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"3","userGroupId"=>"4","serviceId"=>"3","positionId"=>"2"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"4","userGroupId"=>"5","serviceId"=>"3","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"5","userGroupId"=>"5","serviceId"=>"3","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"8","userGroupId"=>"4","serviceId"=>"2","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"11","userGroupId"=>"5","serviceId"=>"2","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"12","userGroupId"=>"5","serviceId"=>"2","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"13","userGroupId"=>"5","serviceId"=>"2","positionId"=>"1"]);
        $user_group_positions=User_userGroup_Position_Service_Map::create(["userId"=>"14","userGroupId"=>"5","serviceId"=>"2","positionId"=>"1"]);

        $user_positions_services_fields=User_Position_Service_Field_Map::create(["userId"=>"11","serviceId"=>"2","positionId"=>"1", "fieldId"=>"4"]);
        $user_positions_services_fields=User_Position_Service_Field_Map::create(["userId"=>"12","serviceId"=>"2","positionId"=>"1", "fieldId"=>"1"]);
        $user_positions_services_fields=User_Position_Service_Field_Map::create(["userId"=>"13","serviceId"=>"2","positionId"=>"1", "fieldId"=>"2"]);
        $user_positions_services_fields=User_Position_Service_Field_Map::create(["userId"=>"14","serviceId"=>"2","positionId"=>"1", "fieldId"=>"3"]);

        $user_pedagogic_group=User_PedagogicGroup_Map::create(["user_Id"=>"4", "pedagogic_group_Id"=>"5"]);


        $qualite=Qualite::create(["name"=>"Assistant"]);
        $qualite=Qualite::create(["name"=>"Ingenieur"]);
        $qualite=Qualite::create(["name"=>"Docteur"]);
        $qualite=Qualite::create(["name"=>"MA/AR(Assistant de recherche)"]);
        $qualite=Qualite::create(["name"=>"MC/MR(Maitre de recherche)"]);
        $qualite=Qualite::create(["name"=>"PT/DR(Directeur de recherche)"]);

        $ues=Ue::create(["name"=>"Cinematique Dynamique","abbreviation"=>"CDY","code"=>"2023","CT"=>"30","TD"=>"3","TP"=>"3","generalId"=>"1"]);
        $ues=Ue::create(["name"=>"Anaglais général","abbreviation"=>"ANG","code"=>"2023","CT"=>"25","TD"=>"5","TP"=>"5","generalId"=>"1"]);
        $ues=Ue::create(["name"=>"Analyse numerique etapplication","abbreviation"=>"AVN","code"=>"2023","CT"=>"30","TD"=>"5","TP"=>"5","generalId"=>"1"]);
        $ues=Ue::create(["name"=>"POO","abbreviation"=>"java","code"=>"2023","CT"=>"25","TD"=>"5","TP"=>"3","generalId"=>"1"]);

        $academic_semesters=AcademicSemester::create(["designation"=>"Semestre1","calendar"=>"Calendrier de l'année en cours","startDate"=>"2019-02-18","endDate"=>"2019-08-18","observation"=>"un observateur"]);
        $academic_semesters=AcademicSemester::create(["designation"=>"Semestre2","calendar"=>"Calendrier de l'année en cours","startDate"=>"2019-02-18","endDate"=>"2019-08-18","observation"=>"un observateur"]);


        $shortcuts_request=ShortcutsRequest::create(["academic_year_Id"=>"1","academic_semester_Id"=>"1","field_Id"=>"4","pedagogic_group_Id"=>"5","ue_Id"=>"1"]);
        $shortcuts_request=ShortcutsRequest::create(["academic_year_Id"=>"1","academic_semester_Id"=>"1","field_Id"=>"4","pedagogic_group_Id"=>"5","ue_Id"=>"2"]);
        $shortcuts_request=ShortcutsRequest::create(["academic_year_Id"=>"1","academic_semester_Id"=>"1","field_Id"=>"4","pedagogic_group_Id"=>"5","ue_Id"=>"3"]);
        $shortcuts_request=ShortcutsRequest::create(["academic_year_Id"=>"1","academic_semester_Id"=>"1","field_Id"=>"4","pedagogic_group_Id"=>"5","ue_Id"=>"4"]);

       $evaluation_types=Evaluation_type::create(["designation"=>"Devoir du professeur","description"=>""]);
       $evaluation_types=Evaluation_type::create(["designation"=>"Devoir de l'administration","description"=>""]);
       $evaluation_types=Evaluation_type::create(["designation"=>"Reprise","description"=>""]);
       $evaluation_types=Evaluation_type::create(["designation"=>"Rattrappage","description"=>""]);

        $profil = Profile::create([
            'user_id' => "1",
            "com_fullname" => "INSTI Admin",
            "com_givenName" => "John Doe Admin",
            "com_gender" => "M",
            "com_birthdate" => "1999-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "2",
            "com_fullname" => "John Doe SuperAdmin",
            "com_givenName" => "SuperAdmin",
            "com_gender" => "M",
            "com_birthdate" => "1998-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "3",
            "com_fullname" => "John Doe Personnel",
            "com_givenName" => "Personnel",
            "com_gender" => "M",
            "com_birthdate" => "1995-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "4",
            "com_fullname" => "John Duet",
            "com_givenName" => "Etudiant",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "5",
            "com_fullname" => "John Duet1",
            "com_givenName" => "Etudiant1",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "6",
            "com_fullname" => "John Duet2",
            "com_givenName" => "Etudiant2",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $profil = Profile::create([
            'user_id' => "7",
            "com_fullname" => "John Duet3",
            "com_givenName" => "Etudiant3",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);


        $profil = Profile::create([
            'user_id' => "8",
            "com_fullname" => "INSTI SuperAdmin",
            "com_givenName" => "SuperAd",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "9",
            "com_fullname" => "INSTI Redacteur",
            "com_givenName" => "Redac",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "10",
            "com_fullname" => "INSTI Partenaire",
            "com_givenName" => "Partenaire",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "11",
            "com_fullname" => "Chef Dep GEI",
            "com_givenName" => "CD GEI",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "12",
            "com_fullname" => "Chef Dep MS",
            "com_givenName" => "CD MS",
            "com_gender" => "F",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "13",
            "com_fullname" => "Chef Dep GMP",
            "com_givenName" => "CD GMP",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);
        $profil = Profile::create([
            'user_id' => "14",
            "com_fullname" => "Chef Dep GE",
            "com_givenName" => "CD GE",
            "com_gender" => "M",
            "com_birthdate" => "2000-02-18",
            "com_birthPlace" => "Lokossa",
            "com_diploma" => "Ing",
            "com_registrationNumber" => "00002",
            "com_phoneNumber" => "90998656",
            "com_address" => "Lokossa Insti",
            "com_parentFullname" => "Parent Enseignant",
            "com_parentGivenName" => "Parent ",
            "com_parentPhoneNumber" => "68587412",
            "ens_typeId" => "2",
        ]);

        $typeStage = Typestages::create(
            [
                'libelle' => "Académique",
            ]
        );

        $typeStage = Typestages::create(
            [
                'libelle' => "Professionnel",
            ]
        );


        // Gestion d'authentification des Attestation
        // Demende
        $demande = Demande::create([
            'user_id'=>3,
            'name_d' => "DODE Jovial",
            'recipient'=>"Madame la Directrice",
            'email' => "agent@gmail.com",
            'contact' => "66334455",
            'entite' => "EPAC",
            'status' => "Sécrétaire",
            'objet' => "Demande d'autentification d'attestation",
            'message' => "Lorem Ipsum est simplement un faux texte de l'industrie de l'impression et de la composition. Le Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, lorsqu'un imprimeur inconnu a pris une galère de caractères et l'a brouillé pour en faire un livre de spécimens de caractères. Il a survécu non seulement à cinq siècles, mais aussi au saut dans la composition électronique, restant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages de Lorem Ipsum, et plus récemment avec des logiciels de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.",
            'attestation'=>"piece",
            'status_demande'=>"Non_traiter",
            ]);

        //Moyenne des étudiants
        $moyenne = Moyenne::create([
            'name' => "GBODO Rose",
            'genre'=>"F",
            'n_matricule' => "61002533",
            'filiere' => "GEI",
            'moy_annee1' => 14,
            'moy_annee2' => 13,
            'moy_annee3' => 15,
            'moy_generale'=>14,
            ]);

        $moyenne = Moyenne::create([
            'name' => "DOLO Bro",
            'genre'=>"M",
            'n_matricule' => "61022533",
            'filiere' => "GEI",
            'moy_annee1' => 14,
            'moy_annee2' => 12,
            'moy_annee3' => 13,
            'moy_generale'=>13,
            ]);
        $moyenne = Moyenne::create([
            'name' => "DOLANE Dylane",
            'genre'=>"M",
            'n_matricule' => "61003533",
            'filiere' => "GEI",
            'moy_annee1' => 15,
            'moy_annee2' => 15,
            'moy_annee3' => 15,
            'moy_generale'=>15,
            ]);

    }
}
