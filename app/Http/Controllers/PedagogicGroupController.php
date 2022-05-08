<?php

namespace App\Http\Controllers;


use Svg\Tag\Group;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class PedagogicGroupController extends Controller {

    
    public function index(Request $request)
    {
        $groupPedagogique = PedagogicGroup::all() ;

        return view ('generality.groupePedagogique', compact('groupPedagogique'));
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

        $groupPedagogique = PedagogicGroup::all() ;
  
        return view('generality.groupePedagogique', compact('groupPedagogique'));
    }

    public function findById($id)
    {
        $flight = PedagogicGroup::findorFail($id);
        return view('generality.updateGroupePedagogique', compact('flight'))->with('Success'); 
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

        $groupPedagogique = PedagogicGroup::all() ;

        return view('generality.groupePedagogique', compact('groupPedagogique'))->with('Success');
    
    }

    public function deleteGroupPedagogique ($id,Request $request) 
    {
        $flight = PedagogicGroup::findorFail($id);
        $flight->delete();

        $groupPedagogique = PedagogicGroup::all() ;


        return view('generality.groupePedagogique', compact('groupPedagogique'));
    }

}