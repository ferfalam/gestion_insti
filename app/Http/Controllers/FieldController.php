<?php

namespace App\Http\Controllers;

use Svg\Tag\Group;
use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class FieldController extends Controller
{
    public function index()
    {
        $filieres = Field::all() ;

        return view('generality.index', compact('filieres'));
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

        $filieres = Field::all() ;
     
        return view('generality.index', compact('filieres'));
    }

    public function findById($id)
    {
        $flight = Field::findorFail($id);
        return view('generality.updateField', compact('flight'))->with('Success');
    }

    /**
     * Mettre à jour une Filiere
     */
    public function updateField ($id, Request $request)
    {       
        $filieres = Field::findorFail($id);
        $filieres-> update([
            'name' => $request->appelation,
            'systemName' => $request->nameSys,
            'abbreviation' => $request->abreviation,
            'description' => $request->description,
            'offer' => 'Filiere'
        ]);

        $filieres = Field::all() ;

        return view('generality.index', compact('$filieres'))->with('Success');
    }

    /**
     * Supprimer une Filiere
     */
    public function deleteField ($id)
    {
        $filiere = Field::findorFail($id);
        $filiere->delete();

        $filieres = Field::all() ;

        return view('generality.index', compact('filieres'));
    }

}

?>