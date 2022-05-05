<?php

namespace App\Http\Controllers\GestionDesEntreprisesDeStage;

use App\Models\Entreprises;
use App\Models\Stages;
use App\Models\User;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\UserGroup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Dashboard extends Controller
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
        for ($i = 1; $i <= substr_count(Route::getCurrentRoute()->uri, "/"); $i++) {
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

    public function index()
    {
        $id = Auth::id();
        $interns = null;

        $this->userGroup = UserGroup::find(Auth::user()->user_groupId)->name;
//        dd($this->userGroup);
        if ($this->userGroup == "partenaire") {
            $username = DB::table("entreprises")->where("user_id", $id)->value('designation');
            $interns = $this->getInterns();
        } else {
            $shortProfile = DB::table("profiles")
                ->select("com_fullname")
                ->where("user_id", $id)
                ->first();
            $username = $shortProfile->com_fullname;
            if ($this->userGroup == "admin") {
                $this->activeInternSize = $this->getActiveInternSize();
                $this->availableplace = $this->getAvailablePlace();
            }
        }
        $this->enterprises = $this->getEnterprises();
        $this->username = $username;
        foreach ($this->enterprises as $enterprise){
            $enterprise->domaines = (array)json_decode($enterprise->domaines,true);
        }
        $this->interns = $interns;

        return view('gestion_entreprises_stage.dashboard', $this->data);
    }

    public function getAvailablePlace()
    {
        $entreprises = DB::table('entreprises')
            ->get();
        $availableplace = 0;
        foreach ($entreprises as $entreprise) {
            $availableplace += $entreprise->capacite;
        }
        return $availableplace;
    }

    public function getActiveInternSize(): float
    {
        return count(DB::table("stages")->get());
    }

    public function getEnterprises(): Collection
    {
        return DB::table('entreprises')->get();
    }

    public function getInterns(): Collection
    {
        return DB::table("profiles")
            ->select("profiles.com_fullname", "stages.startdate", "stages.enddate")
            ->join("stages", "stages.user_id", "=", "profiles.user_id")
            ->whereIn("profiles.user_id",
                function ($query) {
                    $query->from("stages")
                        ->select("user_id")
                        ->whereIn("entreprise_id", function ($result) {
                            $result->from("entreprises")
                                ->select("id")
                                ->where("user_id", Auth::id());
                        });
                })
            ->get();
    }

    public function getEnterpriseData(Request $request)
    {
        $enterprise = Entreprises::find($request->id);
        $domaines_ids = array();
        foreach (json_decode($enterprise->domaines) as $id) {
            if ($id != "") {
                array_push($domaines_ids, (int)$id);
            }
        }
        $enterprise->domaines = DB::table("domaines")->whereIn("id", $domaines_ids)->get("libelle");
        return $enterprise;
    }

    public function addIntern(Request $request)
    {

        $request->validate([
            'entreprise_id' => 'required|integer',
            'typeS' => 'required|integer',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);


        $UserStage = DB::table("stages")->where("user_id", Auth::id())->get();
        if (count($UserStage) == 0) {
            $stage = Stages::create([
                'entreprise_id' => $request->entreprise_id,
                'startdate' => $request->startDate,
                'enddate' => $request->endDate,
                "type_id" => $request->typeS,
                "user_id" => Auth::id(),
            ]);
            event(new Registered($stage));
            return ["success" => true, "message" => "Votre lieu de stage est défini avec succès"];
        } else {
            return ["success" => false, "message" => "Vous aviez déja renseigné lieu de stage"];
        }

    }

}
