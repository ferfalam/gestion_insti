<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class GeneralController extends Controller
{
    // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE

    /**
     *  For to read all Generals created.
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $generals = General::all() ;

        return view ('generality.general', compact('generals'));
    }
    
    /**
     * Create Validate and Save the general
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeGeneral(Request $request)
    {

        $this->validate( $request , [
            'name' => 'required|max:255',
            'nameSys' => 'required|max:255',
            'contentType' => 'required|max:255',
            'contentTag' => 'required|max:255',
        ]);

        $general = General::create(
            [
                'name' => $request->name,
                'systemName' => $request->nameSys,
                'content_type' => $request->contentType,
                'content_tag' => $request->contentTag,
                'status' => 1,
            ]
        );
        
        event(new Registered($general));
        $this->message = "Nouveau Module General ajoutee avec succès";
        $this->success = true;

        $generals = General::all() ;
     
        return view('generality.general', compact('generals'));
    }

    public function findById($id)
    {
        $flight = General::findorFail($id);
        return view('generality.updateGeneral', compact('flight'))->with('Success');
    }

    /**
     * Mettre à jour une Filiere
     */
    public function updateGeneral ($id, Request $request)
    {       
        $flight = General::findorFail($id);
        $flight-> update([
            'name' => $request->name,
            'systemName' => $request->nameSys,
            'content_type' => $request->contentType,
            'content_tag' => $request->contentTag,
            'status' => 1
        ]);
        $generals = General::all() ;

        return view('generality.general', compact('generals'))->with('Success');
    }

    /**
     * Supprimer une Filiere
     */
    public function deleteGeneral ($id)
    {
        $flight = General::findorFail($id);
        $flight->delete();

        $generals = General::all() ;

        return view('generality.general', compact('generals'));
    }

}

?>