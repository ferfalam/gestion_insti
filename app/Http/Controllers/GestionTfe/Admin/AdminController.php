<?php

namespace App\Http\Controllers\GestionTfe\Admin;

use App\Http\Controllers\Controller;
class AdminController extends Controller
{
   
    public function index(){
        return view('GestionTfe.admin.dashboard');
    }
}
