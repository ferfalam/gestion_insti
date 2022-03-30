<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        $idUser = Auth::user()->id;
        // $idUserRole = DB::table('user_user_group__position__service__maps')->where('user_Id', $idUser)->value('userGroup_Id');

        // $userRole = DB::table('user_groups')->where('id', $idUserRole)->value('name');


        // switch ($userRole){
        //     case 'Etudiant':
        //         return route('dashboard_etudiant');
        //         break;
        //     case 'Personnel':
        //         return route('dashboard_personnel');
        //         break;
        //     default:
        //         return route('home');
        //         break;
        // }
    }


    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
