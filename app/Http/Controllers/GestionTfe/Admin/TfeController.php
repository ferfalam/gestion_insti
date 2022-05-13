<?php

namespace App\Http\Controllers\GestionTfe\Admin;

use App\Http\Controllers\Controller;

use App\Models\Tfe;
use App\Models\User;


class TfeController extends Controller
{

    public function index(){
        $years = Tfe::years();
        $tfes = Tfe::orderByDate()->get();
        return view('GestionTfe.admin.home', compact('tfes', 'years'));
    }

    public function showDashboard(){
        $tfes0 = Tfe::where(['status'=>0])->get();
        $tfes1 = Tfe::where(['status'=>1])->get();
        $tfes2 = Tfe::where(['status'=>2])->get();
        return view('GestionTfe.admin.dashboard', compact('tfes0','tfes2','tfes1'));
    }
    
}

