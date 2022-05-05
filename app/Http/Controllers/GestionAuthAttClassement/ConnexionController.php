<?php

namespace App\Http\Controllers\GestionAuthAttClassement;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{

    public function deconnexion(){
        Auth::logout();

        return redirect('/');

    }
}
