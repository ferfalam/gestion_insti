<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $ues = Ue::all() ;

        return view ('generality.uEModule', compact('ues'));
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

        $ues = Ue::all() ;
  
        return view('generality.uEModule', compact('ues'));
    }

    public function findById($id)
    {
        $flight = Ue::findorFail($id);
        return view('generality.updateUeModule', compact('flight'))->with('Success'); 
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

        $ues = Ue::all() ;

        return view('generality.uEModule', compact('ues'))->with('Success');
    
    }

    public function deleteUe ($id,Request $request) 
    {
        $flight = Ue::findorFail($id);
        $flight->delete();

        $ues = Ue::all() ;

        return view('generality.uEModule', compact('ues'));
    }
    


}
