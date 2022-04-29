<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadFicheController extends Controller
{
    public function pdfSave (Request $request)
    {
        // $students = Student::all();
        $pdf = PDF::loadView('gestion_deroulement_cours.fiche.ficheDeCoursSortant');
		$pdf ->save(storage_path().'_ficheStudentCours.pdf');
       
        return $pdf->download('ficheStudentCours.pdf');
    }
}