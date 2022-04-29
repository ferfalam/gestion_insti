<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $alerte = ['message de verification', 'message de verification', 'message de verification', 'message de verification'];
        return view('form', compact('alerte'));
    }

    public function show($id){
        $plaintes = [
            1 => 'Objet 1',
            2 => 'Objet 2',
            3 => 'Objet 3',
            4 => 'Objet 4',
        ];

        $plainte = $plaintes[$id] ?? 'pas d\'objets ';

        return view('complaint', [
            'plainte' => $plainte
        ]);
    }

    public function screen(){
        return view('screen');
    }
}
