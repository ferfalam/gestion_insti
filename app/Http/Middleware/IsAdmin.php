<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {           
        try {

            if(auth()->user()!=null)
            {   
                if(auth()->user()->user_groupId==1){
                     return $next($request);
                }    
            } 
            return redirect()->route('gestion_tfe.welcome')->with('error',"Vous n'avez pas les acces administrateur");
        } catch (Exception $e) {
            return redirect()->route('gestion_tfe.welcome')->with('error',"Vous n'avez pas les acces administrateur");
        }
        
    }
}
