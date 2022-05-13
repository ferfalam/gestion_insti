<?php

namespace App\Http\Controllers\GestionDemande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class RedirectionController extends Controller
{

    public function __construct(){
        $this->middleware('personnel');
    }

    public function redirectTo(){
        $idUser = Auth::user()->id;
        $idUserRole = DB::table('user_user_group__position__service__maps')->where('userId', $idUser)->value('userGroupId');

        $userRole = DB::table('user_groups')->where('id', $idUserRole)->value('name');


        switch ($userRole){
            case 'Etudiant':
                return redirect()->route('/dashboard_etudiant');
                break;
            case 'Personnel':
                return redirect()->route('/dashboard_personnel');
                break;
            case 'admin':
                return redirect()->route('/dashboard_personnel');
                break;
            case 'superadmin':
                return redirect()->route('/dashboard_personnel');
                break;
            default:
                return route('home');
                break;
        }
    }
}
