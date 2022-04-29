<?php

namespace App\Http\Controllers\GestionDesEntreprisesDeStage;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class OffersController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->resolved_assets = "";
        for($i=1;$i<=substr_count(Route::getCurrentRoute()->uri, "/");$i++){
            $this->resolved_assets .= "../";
        }
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return array
     *
     */
    public function store(Request $request){
        $request->validate(
            [
                'domain' => 'required',
                'niv_etude' => 'required',
                'gratification' => 'required',
                'location' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'profiles' => 'required',
                'mission' => 'required',
                'image' => 'image'
            ]
        );
        $offer = new Offers();
        $offer->entreprise_id = DB::table("entreprises")->where("user_id", Auth::id())->get("id")[0]->id;
        $offer->domaine = $request->domain;
        $offer->niv_etude = $request->niv_etude;
        $offer->gratification = $request->gratification;
        $offer->localisation = $request->location;
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;
        $offer->profils = $request->profiles;
        $offer->mission = $request->mission;
        $offer->image = "";

        $offer->save();
        return ["success"=>true, "class"=>"alert-success", "message"=>"Offre ajouter ajouter avec succès"];
    }
}
