<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Ue;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FichesDeroulementCours;

class FicheDeroulementCoursUeController extends Controller
{
    
    /**
     * For to read all Fiche created.
     * @return \Illuminate\Http\Response
     */
    public function showFormDeroulementCoursByUes( Request $request )
    {
        $fichesDeroulementCours = FichesDeroulementCours::all() ;
        $ues = Ue::all() ;

        return view ('gestion_deroulement_cours.fiche.showFicheByUe', compact('fichesDeroulementCours','ues'));
    }

    public function showFormDeroulementCoursByUe($id){

        $flight = FichesDeroulementCours::where('ueId', $id)->get();
        
        //     dd( $heureEnd->format("H"), $heureStart);
        // <td>{{ $item-> created_at -> format("d F Y à H:i") }}</td>

        return view('gestion_deroulement_cours.fiche.vueFicheDeCoursSortant', compact('flight'));
    }

    public function showFormDeroulementCoursByEnseignants( Request $request ){

        $enseignants = Enseignant::all() ;
        // dd($enseignants);

        return view ('gestion_deroulement_cours.fiche.showFicheByEnseignant', compact('enseignants'));
    }

    public function showFormDeroulementCoursByEnseignant($id){

        // $flight = Enseignant::where('id', $id)->get();
        $flight = Enseignant::find($id);

        return view ('gestion_deroulement_cours.fiche.vueFicheDeCoursEnseignant', compact('flight'));
    }


}