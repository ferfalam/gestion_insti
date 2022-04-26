<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('gestion_deroulement_cours.accueil');
    }
}
