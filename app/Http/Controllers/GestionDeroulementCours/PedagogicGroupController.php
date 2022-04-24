<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use Svg\Tag\Group;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class PedagogicGroupController extends Controller {

    
    /**
     * For to read all Groups created.
     * @return \Illuminate\Http\Response
     */
    public function readGroupePedagogique( Request $request)
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

    public function deleteGroupPedagogique (Request $request) 
    {
        $flight = Field::find($request->groupPedagodique);
        
        $flight = Field::find($request->id);

        $flight->delete();
        return view('gestion_deroulement_cours.accueil');
    }

    public function updateGroupPedagogique()
    {
        // use App\Models\Flight;
        
        // $flight = Flight::find(1);
        
        // $flight->name = 'Paris to London';
        
        // $flight->save();
    }


}