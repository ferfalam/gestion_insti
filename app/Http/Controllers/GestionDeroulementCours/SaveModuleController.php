<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
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

        $filieres = Field::all() ;
        // $filieres = DB::select('select appelation from filieres');
        // Get the information from the database

        return view ('gestion_deroulement_cours.fiche.formItemFiliere', compact('filieres'));
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

        Field::create(
            [
                'name' => $request->appelation,
                'systemName' => $request->nameSys,
                'abbreviation' => $request->abreviation,
                'description' => $request->description,
                'offer' => null
            ]
        );
     
        return view('gestion_deroulement_cours.fiche.formItemFiliere');
    }


     /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
     * @return \Illuminate\Http\Response
     */
    public function createGroupePedagogique( Request $request)
    {
        $groupPedagogique = PedagogicGroup::all() ;

        // Get the information from the database

        return view ('gestion_deroulement_cours.fiche.formItemGroupPedagogique', compact('groupPedagogique'));
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

        $designation = $request->input('nameGP');
        $description = $request->input('description');

        $data=array('name'=>$designation,"description"=>$description);
        DB::table('pedagogic_groups')->insert($data);


        // Insere in Database

        /* NameOfModel::create(
            [
                'attributes' => $request->nameInForm,
                'title' => $request-> title
            ]
        );*/
        
        // return redirect('/accueil');
        return view('gestion_deroulement_cours.fiche.formItemGroupPedagogique');
    }

    
}
