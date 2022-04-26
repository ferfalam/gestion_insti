<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadFicheController extends Controller
{
    public function pdfSave (Request $request)
    {
        // Requetes dans la base de donnee pour recuperer les donnees de fiche

        // $students = Student::all();
        $pdf = PDF::loadView('gestion_deroulement_cours.fiche.ficheDeCoursSortant');
        $pdf ->save(storage_path().'_ficheStudentCours.pdf');
       
        return $pdf->download('ficheStudentCours.pdf');
    }

    public function pdfSaveEnseignant( Request $request)
    {
        $pdf = PDF::loadView('gestion_deroulement_cours.fiche.ficheDeCoursEnseignant');
        $pdf ->save(storage_path().'_ficheEnseignantCours.pdf');
       
        return $pdf->download('ficheEnseignantCours.pdf');
    }
}