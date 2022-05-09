<?php

namespace App\Http\Controllers\GestionDesEntreprisesDeStage;

use App\Models\Domaines;
use App\Models\Entreprises;
use App\Models\User;
use App\Models\User_userGroup_Position_Service_Map;
use App\Models\userGroup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use function MongoDB\BSON\toJSON;

class AddEnterpriseController extends Controller
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
     * Display the registration view.
     *
     * @return View
     */
    public function index()
    {
        return view('gestion_entreprises_stage.enterprises.add_enterprise', $this->data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return string
     *
     */
    public function store(Request $request): string
    {
        $request->validate([
            'designation' => 'required|string|max:100',
            'adresse' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:entreprises|unique:users',
            'capacite' => 'required|integer',
            'domaines' => 'required',
            'partenariat' => 'required|boolean',
            'Pdate' => 'date',
            'startdate' => 'required|string',
            'enddate' => 'required|date',
            'photo' => 'image|mimes:jpeg,jpg,png,bmp,svg|max:1048576',
            'password' => (isset($request->password))?['confirmed', Rules\Password::defaults()]:[],
        ]);


        if (isset($request->password)) {
            $user = new User();
            $user->statusId = 1;
            $user->email = $request->email;
            $user->pseudo = "";
            $user->password = Hash::make($request->password);
            $user->user_groupId = userGroup::where("name","partenaire")->first()->id;
            $user->save();

//            $userMapping = new User_userGroup_Position_Service_Map();
//            $userMapping->user_id = $user->id;
//            $userMapping->userGroupId = userGroup::where("partenaire")->first()->id;
//            $userMapping->save();
        }

        $newName = null;
        $file = null;
        if ($request->hasFile('photo')) {
            $file = $request->file("photo");
            $extension = $file->getClientOriginalExtension();
            $newName = strtolower(str_replace(" ", "", $request->designation)).".".$extension;
        }

        $entreprise = Entreprises::create([
            'designation' => $request->designation,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'capacite' => $request->capacite,
            'domaines' => json_encode($request->domaines),
            'partenariat' => $request->partenariat,
            'partenariat_date' => $request->Pdate,
            'd_contact' => $request->d_contact,
            's_contact' => $request->s_contact,
            'a_contact' => $request->a_contact,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'logoname' => $newName,
            'user_id' => isset($user)?$user->id:null,
        ]);
        if ($file!=null) {
            $file->move(public_path('logos'),$newName);
        }

        event(new Registered($entreprise));
        $this->message = "Nouvelle entreprise ajouter avec succès";
        $this->success = true;

        return view('gestion_entreprises_stage.enterprises.add_enterprise', $this->data);
    }

    public function  addDomain(Request $request){
        $request->validate([
            'domaine' => 'required|string',
        ]);

        $domaine = new Domaines();
        $domaine->libelle = $request->domaine;
        $domaine->save();
        return json_encode($domaine);
    }
}
