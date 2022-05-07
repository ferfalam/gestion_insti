<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use PDF;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FichesDeroulementCours;

class DownloadFicheController extends Controller
{

    public function telechargerFicheEnseignant($id)
    {
        // $flight = Enseignant::where('id',$id)->get();
        $flight = Enseignant::find($id);

        view()->share('flight', $flight);
        $pdf = PDF::loadView('gestion_deroulement_cours/fiche/ficheDownloadEnseignant', compact('flight'));
        
        return $pdf->download('fiche-enseignant'.$id.'.pdf');
    }

    public function telechargerFicheStudentCours($id) 
    {
        $flight = FichesDeroulementCours::where('ueId', $id)->get();

        view()->share('flight', $flight);
        $pdf_doc = PDF::loadView('gestion_deroulement_cours/fiche/ficheDownloadSortant', compact('flight') );

        return $pdf_doc->download('fiche-deroulement-cours'.$id.'.pdf');
    }
}