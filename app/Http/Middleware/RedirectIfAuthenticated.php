<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $idUser = Auth::user()->id;
                $idUserRole = DB::table('user_user_group__position__service__maps')->where('userId', $idUser)->value('userGroupId');

                $userRole = DB::table('user_groups')->where('id', $idUserRole)->value('name');

                
                switch ($userRole){
                    case 'Etudiant':
                        return redirect()->route('gestion_demandes_reclamation_evaluation.dashboard_etudiant');
                        break;
                    case 'Personnel':
                        return redirect()->route('gestion_demandes_reclamation_evaluation.dashboard_personnel');
                        break;
                    default:
                        return redirect()->route('home');
                        break;
                }
            }
        }

        return $next($request);
    }
}
