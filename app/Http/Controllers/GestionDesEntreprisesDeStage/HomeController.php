<?php

namespace App\Http\Controllers\GestionDesEntreprisesDeStage;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('gestion_entreprises_stage.welcome', $this->data);
    }
}
