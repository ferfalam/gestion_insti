<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Illuminate\Http\Request;
use App\Models\Plainte;
use App\Models\Convocation;
use Validator;
use PDF;

class PDFController extends Controller
{
    function index()
    {
     return view('dynamic_field');
    }

    public function telechargerPlainte($id) {
        $tile = Plainte::find($id);
        view()->share('tile', $tile);
        $pdf_doc = PDF::loadView('gestion_conseils_plaintes/lettres/plainte', compact('tile') );
        return $pdf_doc->download('lettre-plainte-'.$id.'.pdf');
    }
    public function telechargerConvocation($id) {
        $tile = Convocation::find($id);
        view()->share('tile', $tile);
        $pdf_doc = PDF::loadView('gestion_conseils_plaintes/lettres/convocation', compact('tile') );
        return $pdf_doc->download('lettre-convocation-'.$id.'.pdf');
    }
    public function telechargerInvitation($id) {
        $tile = Convocation::find($id);
        view()->share('tile', $tile);
        $pdf_doc = PDF::loadView('gestion_conseils_plaintes/lettres/invitation', compact('tile') );
        return $pdf_doc->download('lettre-invitation-'.$id.'.pdf');
    }
}



