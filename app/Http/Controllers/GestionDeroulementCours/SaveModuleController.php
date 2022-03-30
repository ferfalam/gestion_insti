<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use Svg\Tag\Group;
use App\Models\Field;
use App\Models\General;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class SaveModuleController extends Controller
{

    
    /**
     *  Form for to create a new Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFiliere( Request $request)
    {

        $filieres = Field::all() ;

        return view ('gestion_deroulement_cours.fiche.formItemFiliere', compact('filieres'));
    }

    /**
     * Save and validate the field
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function storeFiliere(Request $request)
    {

        $this->validate( $request , [
            'appelation' => 'required|max:255',
            'nameSys' => 'required|max:255',
            'abreviation' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $field = Field::create(
            [
                'name' => $request->appelation,
                'systemName' => $request->nameSys,
                'abbreviation' => $request->abreviation,
                'description' => $request->description,
                'offer' => '',
            ]
        );
        event(new Registered($field));
        $this->message = "Nouvelle Filiere ajoutee avec succès";
        $this->success = true;
     
        return view('gestion_deroulement_cours.accueil');
    }


     /**
     * Form for to create a new Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroupePedagogique( Request $request)
    {
        $groupPedagogique = PedagogicGroup::all() ;

        return view ('gestion_deroulement_cours.fiche.formItemGroupPedagogique', compact('groupPedagogique'));
    }

    /**
        *Create pedagogic group
        *
        * @return \Illuminate\Http\Response
        */
    public function storeGroupePedagogique(Request $request)
    {

        $this->validate( $request , [
            'nameGP' => 'required|max:255',
            'description' => 'required|max:255',
            'filiere' => 'required',
            'academicYear' => 'required',
            'anneeStudy' => 'required',
        ]);

       

        $groupPedag = PedagogicGroup::create(
            [
                'name' => $request->nameGP,
                'description' => $request->description,
                'fieldId' => $request->filiere,
                'academicYearId' => $request->academicYear,
                'studyYearId' => $request->anneeStudy,
            ]
        );

        event(new Registered($groupPedag));
        $this->message = "Nouveau Groupe pedagogique ajouté avec succès";
        $this->success = true;
  
        return view('gestion_deroulement_cours.accueil');
    }

    
}
