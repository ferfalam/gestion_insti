<?php

namespace App\Http\Controllers\GestionDesEntreprisesDeStage;

use App\Models\User;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\userGroup;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Profile extends Controller
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

    public function index(){
        $id = Auth::id();

        $this->userGroup = UserGroup::find(Auth::user()->user_groupId)->name;
        if ($this->userGroup == "partenaire"){

            $user_data = DB::table("entreprises")
                ->select("designation", "email", "adresse", "d_contact", "s_contact", "startDate", "endDate", "domaines")
                ->where("user_id", $id)
                ->first();
            $username = $user_data->designation;

        }else{

            if ($this->userGroup == "apprenant")
            {
                $user_data = DB::table("profiles")
                    ->select("profiles.*", "users.email", "fields.name as fields", "pedagogic_groups.name as pedagogic_group")
                    ->where("user_id", $id)
                    ->join('users', 'profiles.user_id', '=', 'users.id')
                    ->leftJoin('fields', 'profiles.app_fieldId', '=', 'fields.id')
                    ->leftJoin('pedagogic_groups', 'pedagogic_groups.fieldId', '=', 'profiles.app_fieldId')
                    ->first();
            }
            else
            {
                $user_data = DB::table("profiles")
                    ->select("profiles.*", "users.email")
                    ->where("user_id", $id)
                    ->join('users', 'profiles.user_id', '=', 'users.id')
                    ->first();
            }
            $username = $user_data->com_fullname;

        }
        $this->username = $username;
        $this->user_data = $user_data;
        return view('gestion_entreprises_stage.profile', $this->data);
    }

    public function update(Request $request)
    {
        //TODO update profile
        $id = Auth::id();

    }

    public function updateImage(Request $request)
    {
        if ($request->hasFile("image")){
            return "True";
        }
        return $request->image;
    }
}
