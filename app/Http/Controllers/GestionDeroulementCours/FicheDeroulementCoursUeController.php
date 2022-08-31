<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Ue;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\FichesDeroulementCours;

class FicheDeroulementCoursUeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * For to read all Fiche created.
     * @return \Illuminate\Http\Response
     */
    public function showFormDeroulementCoursByUes( Request $request )
    {
       
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
            $fichesDeroulementCours = FichesDeroulementCours::all() ;
            $ues = Ue::all() ;

            return view ('gestion_deroulement_cours.fiche.showFicheByUe', compact('fichesDeroulementCours','ues'));
        }
        else{ return view('gestion_deroulement_cours.accueil');}
        
    }

    public function showFormDeroulementCoursByUe($id){

        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
        $flight = FichesDeroulementCours::where('ueId', $id)->get();
        
        //     dd( $heureEnd->format("H"), $heureStart);
        // <td>{{ $item-> created_at -> format("d F Y à H:i") }}</td>

        return view('gestion_deroulement_cours.fiche.vueFicheDeCoursSortant', compact('flight'));
        } 
        else {return view ('gestion_deroulement_cours.accueil');}
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