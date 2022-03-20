<?php

namespace App\Http\Controllers\GestionSalleDeClasse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalleController extends Controller
{
    public function index()
    {
        // $batiments = DB::table('batiments')
        // ->get();
        return view('gestion_salles.index');
    }

    public function showSalleSchedule()
    {
        $salles = DB::table('salles')
        ->get();
        return view('gestion_salle.front.occupSalle', ['salles' => $salles]);
    }

    public function searchSalleSchedule(Request $request)
    {
        $salles = DB::table('salles')
        ->get();
        foreach ($salles as $k => $salle) {
            if (!empty($request->salle) && preg_match("/" . $request->salle . "/i", $salle->s_name)) {
                return redirect(route('occupSalle') . "#" . str_replace(' ', '_', strtolower($salle->s_name)));
                break;
            }
        }
        return back()->with(['errMsg' => 'Aucune salle ne contient ce mot']);
    }
}
