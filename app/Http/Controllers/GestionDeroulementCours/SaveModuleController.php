<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaveModuleController extends Controller
{

    /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
     * @return \Illuminate\Http\Response
     */
    public function createFiliere( Request $request)
    {

        $filieres = DB::select('select appelation from filieres');
        // Get the information from the database

        return view ('gestionDeroulementCours/formItemFiliere', compact('filieres'));
    }

    /**
        * Show a list of all of the application information's for the fiche a retirer .
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\View\View
        */
    public function storeFiliere(Request $request)
    {

        $this->validate( $request , [
            'appelation' => 'required|max:255',
            'nameSys' => 'required|max:255',
            'abreviation' => 'required|max:255',
            'description' => [
                'required',
                Rule::dimensions()->maxWidth(1000)->maxHeight(500)->ratio(3 / 2),
            ]
        ]);

        /* NameOfModel::create(
            [
                'attributes' => $request->nameInForm,
                'title' => $request-> title
            ]
        );*/
        
        // return redirect('/accueil');
        return view('gestionDeroulementCours/formItemFiliere');
    }


     /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroupePedagogique( Request $request)
    {
        $filieres = DB::select('select appelation from filieres');


        // Get the information from the database

        return view ('gestionDeroulementCours/formItemGroupPedagogique', compact('filieres'));
    }

    /**
        * Show a list of all of the application information's for the fiche a retirer .
        *
        * @return \Illuminate\Http\Response
        */
    public function storeGroupePedagogique(Request $request)
    {

        $this->validate( $request , [
            'nameGP' => 'required|max:255',
            'description' => [
                'required',
                Rule::dimensions()->maxWidth(1000)->maxHeight(500)->ratio(3 / 2),
            ]
        ]);

        // Insere in Database

        /* NameOfModel::create(
            [
                'attributes' => $request->nameInForm,
                'title' => $request-> title
            ]
        );*/
        
        // return redirect('/accueil');
        return view('gestionDeroulementCours/formItemGroupPedagogique');
    }

    
}
