<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use Svg\Tag\Group;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class PedagogicGroupController extends Controller {

    
    public function createGroupPedagogique(Request $request)
    {
        return view ('gestion_deroulement_cours.groupPedagogiqueModule.formItemGroupPedagogique');
    }

    /**
     * For to read all Groups created.
     * @return \Illuminate\Http\Response
     */
    public function showGroupPedagogique( Request $request)
    {
        $groupPedagogique = PedagogicGroup::all() ;

        return view ('gestion_deroulement_cours.groupPedagogiqueModule.showGroupPedagogique', compact('groupPedagogique'));
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

    public function findById($id)
    {
        $flight = PedagogicGroup::findorFail($id);
        return view('gestion_deroulement_cours.groupPedagogiqueModule.updateGroupPedagogique', compact('flight'))->with('Success'); 
    }

    public function updateGroupPedagogique($id, Request $request)
    {
        $flight = PedagogicGroup::findorFail($id);
        $flight-> update([
                'name' => $request->nameGP,
                'description' => $request->description,
                'fieldId' => $request->filiere,
                'academicYearId' => $request->academicYear,
                'studyYearId' => $request->anneeStudy,
        ]);

        return view('gestion_deroulement_cours.groupPedagogiqueModule.formItemGroupPedagogique')->with('Success');
    
    }

    public function deleteGroupPedagogique ($id,Request $request) 
    {
        $flight = PedagogicGroup::findorFail($id);
        $flight->delete();

        return view('gestion_deroulement_cours.groupPedagogiqueModule.formItemGroupPedagogique');
    }

}