<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Ue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;


class UesController extends Controller
{
    
    /**
     * For to read all Ues created.
     * @return \Illuminate\Http\Response
     */
    public function createUe()
    {
        return view ('gestion_deroulement_cours.ueModule.formItemUe');
    }

    /**
     * For to read all Groups created.
     * @return \Illuminate\Http\Response
     */
    public function showUe( Request $request)
    {
        $ues = Ue::all() ;

        return view ('gestion_deroulement_cours.ueModule.showUe', compact('ues'));
    }

    /**
      * @return \Illuminate\Http\Response
      */
    public function storeUe(Request $request)
    {
        // Verifiy if this integer or string
        $this->validate( $request , [
            'name' => 'required|max:255',
            'abbreviation' => 'required',
            'code' => 'required',
            'ct' => 'required',
            'td' => 'required',
            'tp' => 'required',
            'generalId' => 'required',
        ]);

        $ue = Ue::create(
            [
                'name' => $request->name,
                'abbreviation' => $request->abbreviation,
                'code' => $request->code,
                'CT' => $request->ct,
                'TD' => $request->td,
                'TP' => $request->tp,
                'generalId' => $request->generalId,
            ]
        );

        event(new Registered($ue));
        $this->message = "Nouvelle UE ajoutée avec succès";
        $this->success = true;
  
        return view('gestion_deroulement_cours.accueil');
    }

    public function findById($id)
    {
        $flight = Ue::findorFail($id);
        return view('gestion_deroulement_cours.ueModule.updateUe', compact('flight'))->with('Success'); 
    }

    public function updateUe($id, Request $request)
    {
        $flight = Ue::findorFail($id);
        $flight-> update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'code' => $request->code,
            'CT' => $request->ct,
            'TD' => $request->td,
            'TP' => $request->tp,
            'generalId' => $request->generalId,
        ]);

        return view('gestion_deroulement_cours.ueModule.formItemUe')->with('Success');
    
    }

    public function deleteUe ($id,Request $request) 
    {
        $flight = Ue::findorFail($id);
        $flight->delete();

        return view('gestion_deroulement_cours.ueModule.formItemUe');
    }
    


}
