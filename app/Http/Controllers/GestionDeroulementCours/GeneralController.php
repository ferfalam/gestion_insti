<?php

namespace App\Http\Controllers\GestionDeroulementCours;

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
    public function createGeneral( Request $request)
    {
        return view ('gestion_deroulement_cours.generalModule.formGeneral');
    }

    public function showGeneral()
    {
        $generals = General::all() ;

        return view('gestion_deroulement_cours.generalModule.showGeneral', compact('generals'));
    }

    
    /**
     * Create Validate and Save the general
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function storeGeneral(Request $request)
    {

        $this->validate( $request , [
            'name' => 'required|max:255',
            'systemName' => 'required|max:255',
            'content_type' => 'required|max:255',
            'content_tag' => 'required|max:255',
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
     
        return view('gestion_deroulement_cours.accueil');
    }

    public function findById($id)
    {
        $flight = General::findorFail($id);
        return view('gestion_deroulement_cours.generalModule.updateGeneral', compact('flight'))->with('Success');
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

        return view('gestion_deroulement_cours.generalModule.formGeneral')->with('Success');
    }

    /**
     * Supprimer une Filiere
     */
    public function deleteGeneral ($id)
    {
        $flight = General::findorFail($id);
        $flight->delete();

        return view('gestion_deroulement_cours.generalModule.formGeneral');
    }

}

?>