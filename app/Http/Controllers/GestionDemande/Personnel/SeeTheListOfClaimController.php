<?php

namespace App\Http\Controllers\GestionDemande\Personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeeTheListOfClaimController extends Controller
{
    public function show(){
        $idUser = Auth::user()->id;
        
        
        $academic_semesters = DB::table('academic_semesters')->pluck('designation');
        $evaluation_types = DB::table('evaluation_types')->pluck('designation');

    }
}
