<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use Svg\Tag\Group;
use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;


// use App\Models\General;
// use App\Models\AcademicYear;
// use App\Models\PedagogicGroup;
// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\DB;

class FieldController extends Controller
{
  
    /**
     *  For to read all Fields created.
     * @return \Illuminate\Http\Response
     */
    public function createFiliere( Request $request)
    {
        return view ('gestion_deroulement_cours.filiereModule.formItemFiliere');
    }

    public function showFiliere()
    {
        $filieres = Field::all() ;

        return view('gestion_deroulement_cours.filiereModule.showItemFiliere', compact('filieres'));
    }

    
    /**
     * Create Validate and Save the field
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
                'offer' => 'Filiere',
            ]
        );
        event(new Registered($field));
        $this->message = "Nouvelle Filiere ajoutee avec succès";
        $this->success = true;
     
        return view('gestion_deroulement_cours.accueil');
    }

    public function findById($id)
    {
        $flight = Field::findorFail($id);
        return view('gestion_deroulement_cours.filiereModule.updateFiliere', compact('flight'))->with('Success');
    }

    /**
     * Mettre à jour une Filiere
     */
    public function updateField ($id, Request $request)
    {       
        $flight = Field::findorFail($id);
        $flight-> update([
            'name' => $request->appelation,
            'systemName' => $request->nameSys,
            'abbreviation' => $request->abreviation,
            'description' => $request->description,
            'offer' => 'Filiere'
        ]);

        return view('gestion_deroulement_cours.filiereModule.formItemFiliere')->with('Success');
    }

    /**
     * Supprimer une Filiere
     */
    public function deleteField ($id)
    {
        $flight = Field::findorFail($id);
        $flight->delete();

        return view('gestion_deroulement_cours.filiereModule.formItemFiliere');
    }

}

?>