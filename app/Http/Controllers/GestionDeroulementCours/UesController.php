<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Http\Controllers\Controller;


class UesController extends Controller
{
    
    /**
     * For to read all Ues created.
     * @return \Illuminate\Http\Response
     */
    public function readUes( Request $request)
    {
        $groupPedagogique = PedagogicGroup::all() ;

        // 'name',
        // 'abbreviation', //integer
        // 'code',
        // 'CT',
        // 'TD',
        // 'TP',
        // 'generalId',

        return view ('gestion_deroulement_cours.fiche.formItemGroupPedagogique', compact('groupPedagogique'));
    }
    
    /**
     * Create Validate and Save the field
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function storeUe(Request $request)
    {

        $this->validate( $request , [
            'appelation' => 'required|max:255',
            
        ]);

        $field = Field::create(
            [
                'name' => $request->appelation,
               
            ]
        );
        event(new Registered($field));
        $this->message = "Nouvelle Filiere ajoutee avec succès";
        $this->success = true;
     
        return view('gestion_deroulement_cours.accueil');
    }

    public function updateUe() 
    {
        
    }

    public function deleteUe() 
    {
        
    }
}
