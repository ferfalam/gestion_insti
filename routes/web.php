<?php

use App\Http\Controllers\GestionSalleDeClasse\SheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GestionConseilPedagogique\CouncilControler;
use App\Http\Controllers\GestionDeliberation\IndexController;
use App\Http\Controllers\GestionDeliberation\EnregistrerDeliberationsController;
use App\Http\Controllers\GestionDeliberation\DeliberationInfosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/etudiant',[App\Http\Controllers\GestionDemande\Etudiant\DashboardController::class, 'index'])->name("dashboard_etudiant");
Route::get('/personnel',[App\Http\Controllers\GestionDemande\Personnel\DashboardController::class, 'index'])->name("dashboard_personnel");
Route::get('/Faire_une_reclamation',[App\Http\Controllers\GestionDemande\Etudiant\MakeClaimController::class, 'show'])->name("reclamation");
Route::get('/Faire_demande_evaluation',[App\Http\Controllers\GestionDemande\Etudiant\MakeEvaluationRequestController::class, 'show'])->name("evaluation");
Route::post('/soumettre_demande_reclamation',[App\Http\Controllers\GestionDemande\Etudiant\MakeClaimController::class, 'validation'])->name("validation_reclamation");
Route::post('/soumettre_demande_evaluation',[App\Http\Controllers\GestionDemande\Etudiant\MakeEvaluationRequestController::class, 'validation'])->name("validation_demande_evaluation");
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");



Auth::routes();

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle.", "middleware" => "auth"], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
    Route::resource('shedule', "GestionSalleDeClasse\SheduleController");
    Route::resource('class_shedule', "GestionSalleDeClasse\ClassSheduleController");
});


Route::group(["prefix"=>"gestion_enseignant", "as"=>"gestion_enseignant.","middleware" => "auth"], function ()
{
    //affichage
    //Route::get('/', [App\Http\Controllers\GestionDesEnseignants\ConnexionController::class,'affichage'])->name("index");
    Route::get('/programmerCours/show',[App\Http\Controllers\GestionDesEnseignants\AddCoursController::class,'show'])->name("show");

    Route::get('/programme',[App\Http\Controllers\GestionDesEnseignants\ProgrammeController::class,'affichage'])->name('show_programme');
    Route::post('/programme',[App\Http\Controllers\GestionDesEnseignants\ProgrammeController::class,'traitement'])->name("programme");

    Route::get('/programmerCours',[App\Http\Controllers\GestionDesEnseignants\AddCoursController::class,'affichage'])->name("show_programmerCours");
    Route::post('/programmerCours',[App\Http\Controllers\GestionDesEnseignants\AddCoursController::class,'traitement'])->name('create_programmerCours');

    //Route::view('/programmerCours','addCours');
    Route::get('/ajouterProf',[App\Http\Controllers\GestionDesEnseignants\AddProfController::class,"affichage"])->name('show_prof');

    Route::post('/ajouterProf',[App\Http\Controllers\GestionDesEnseignants\AddProfController::class,"traitement"])->name('store_prof');

    Route::get('/programmerMission',[App\Http\Controllers\GestionDesEnseignants\AddMissionController::class,"affichage"])->name('show_programmerMission');

    Route::post('/programmerMission',[App\Http\Controllers\GestionDesEnseignants\AddMissionController::class,"traitement"])->name('store_programmerMission');


    Route::get('/profile',[App\Http\Controllers\GestionDesEnseignants\ProfilController::class,"affichage"])->name('show_profil');

    Route::post('/profilPass',[App\Http\Controllers\GestionDesEnseignants\ProfilController::class,"traitement1"])->name('show_profil_pass');

    Route::post('/profilInfo',[App\Http\Controllers\GestionDesEnseignants\ProfilController::class,"traitement2"])->name('show_profil_info');


    Route::get('/mission',[App\Http\Controllers\GestionDesEnseignants\MissionController::class,"affichage"])->name('show_mission');

    Route::post('/mission',[App\Http\Controllers\GestionDesEnseignants\MissionController::class,"traitement"])->name('store_mission');

    Route::get('/pdfM',[App\Http\Controllers\GestionDesEnseignants\MissionController::class,"generate"])->name('mission_pdf');

    Route::get('/pdfT',[App\Http\Controllers\GestionDesEnseignants\ProgrammeController::class,"generate"])->name('programme_pdf');

    Route::post('/image-upload',[App\Http\Controllers\GestionDesEnseignants\ImageUploadController::class,"imageUploadPost"])->name('image_upload_post');

    // Route::get('/profile','App\Http\Controllers\ProfileController@affichage');
    // Route::post('/profilPass','App\Http\Controllers\ProfileController@traitement1');
    // Route::post('/profilInfo','App\Http\Controllers\ProfileController@traitement2');
    // Route::get('/mission','App\Http\Controllers\MissionController@affichage');
    // Route::post('/mission','App\Http\Controllers\MissionController@traitement');
    // Route::get('/pdfM', 'App\Http\Controllers\MissionController@generate')->name('pdf');
    // Route::get('/pdfT', 'App\Http\Controllers\ProgrammeController@generate')->name('pdf');
    // Route::post('image-upload','App\Http\Controllers\ImageUploadController@imageUploadPost')->name('image.upload.post');
});

Route::group(["prefix"=>"gestion_authClass", "as"=>"gestion_authClass.", "middleware" => "auth"], function ()
{
    Route::get('/', "GestionAuthAttClassement\AuthClassController@index")->name("index");
    Route::get('/profile', "GestionAuthAttClassement\AuthClassController@profile")->name("profile");

    Route::get('/demande', function () {
        return view('gestion_authClass.pages/demande');
    })->name('demande');

    Route::get('/demandeaff', function () {
        return view('gestion_authClass.pages/demandeaff');
    })->name('demandeaff');

    // Route::get('/updatede/{id}','App\Http\Controllers\DemandeeController@show')->middleware(['auth'])->name('showd');
    // Route::get('/demande', "GestionAuthAttClassement\DemandeAuthController@index1")->name("demande");
    Route::post('/listdemande','GestionAuthAttClassement\DemandeAuthController@store')->name('dem');
    // Route::get('/demandeaff', "GestionAuthAttClassement\DemandeAuth@demaff")->name("demandeaff");
    Route::get('/updatede/{id}', 'GestionAuthAttClassement\DemandeAuthController@show')->name('edit');
    Route::get('/demandeaff/{id}', 'GestionAuthAttClassement\DemandeAuthController@edit')->name('medit');
    Route::get('/update/{id}', 'GestionAuthAttClassement\DemandeAuthController@show2')->name('edit2');
    Route::post('/updatede/{id}', 'GestionAuthAttClassement\DemandeAuthController@update')->name('update');
    Route::get('/listdemande','GestionAuthAttClassement\DemandeAuthController@create')->name('listdemande');

    Route::get('/demande_r','GestionAuthAttClassement\DemandeAuthController@index')->name('demande_r');


    Route::get('/classement','GestionAuthAttClassement\ClassementController@create')->name('classement');
    Route::post('/classement','GestionAuthAttClassement\ClassementController@store')->name('dam');

    Route::get('/ficheDeliberation','GestionAuthAttClassement\FileController@ImportForm')->name('deliber');
    Route::post('/import','GestionAuthAttClassement\FileController@Import')->name('employee.import');
    Route::get('/export-excel','GestionAuthAttClassement\FileController@exportIntoExcel')->name('export-excel');


    Route::get('/send-mail', [\App\Http\Controllers\MailController::class, 'sendMail'])->middleware(['auth'])->name('send-mail');
});

Route::group(["prefix"=>"gestion_entreprises_stage", "as"=>"gestion_entreprises_stage.", "middleware" => "auth"], function ()
{
    Route::get('/',[App\Http\Controllers\GestionDesEntreprisesDeStage\HomeController::class, 'index'])->name("index");

    //TODO replace
//    Route::get('/login', [App\Http\Controllers\GestionDesEntreprisesDeStage\Auth\AuthenticatedSessionController::class, 'create'])
//        ->middleware('guest')
//        ->name('login');

    Route::post('/login', [App\Http\Controllers\GestionDesEntreprisesDeStage\Auth\AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')->name("login");

    Route::post('/logout', [App\Http\Controllers\GestionDesEntreprisesDeStage\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
    //TODO end

    Route::get('/dashboard', [App\Http\Controllers\GestionDesEntreprisesDeStage\Dashboard::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');

    Route::get('/profile', [App\Http\Controllers\GestionDesEntreprisesDeStage\Profile::class, 'index'])
        ->middleware('auth')
        ->name('profile');

    Route::post('/enterprise/data',[App\Http\Controllers\GestionDesEntreprisesDeStage\Dashboard::class, 'getEnterpriseData'])
        ->middleware(['auth'])
        ->name('enterprise.data');

    Route::post('/profile/update',[App\Http\Controllers\GestionDesEntreprisesDeStage\Profile::class, 'update'])
        ->middleware(['auth'])
        ->name('profile.update');

    Route::post('/profile/image',[App\Http\Controllers\GestionDesEntreprisesDeStage\Profile::class, 'updateImage'])
        ->middleware(['auth'])
        ->name('profile.update.image');

    Route::get('/enterprise/inscription',[App\Http\Controllers\GestionDesEntreprisesDeStage\AddEnterpriseController::class, 'index'])
        ->middleware(['auth'])
        ->name('enterprise.index');

    Route::post('/enterprise/create',[App\Http\Controllers\GestionDesEntreprisesDeStage\AddEnterpriseController::class, 'store'])
        ->middleware(['auth'])
        ->name('enterprise.store');

    Route::post('/enterprise/offer',[App\Http\Controllers\GestionDesEntreprisesDeStage\OffersController::class, 'store'])
        ->middleware(['auth'])
        ->name('enterprise.add_ofer');

    Route::post('/students/intern',[App\Http\Controllers\GestionDesEntreprisesDeStage\Dashboard::class, 'addIntern'])
        ->middleware(['auth'])
        ->name('students.add_intern');
});


Route::group(["prefix"=>"gestion_deliberation", "as"=>"gestion_deliberation."], function ()
{

    Route::middleware('auth')->group(function () {
        Route::get('/', "GestionDeliberation\IndexController@index")->name("index");
        Route::post('/search', "GestionDeliberation\IndexController@recherche")->name("search");
        Route::get('/enregistrerDeliberation', "GestionDeliberation\EnregistrerDeliberationsController@create")->name('nouvelledeliberation');
        Route::post('/enregistrerDeliberation', "GestionDeliberation\EnregistrerDeliberationsController@store")->name('enregistrerdeliberation');
        Route::post('/delibinfos', "GestionDeliberation\DeliberationInfosController@index")->name('delibinfos');
        Route::post('/ouvrir', "GestionDeliberation\DeliberationInfosController@show")->name('ouvrir');
        Route::post('/voir', "GestionDeliberation\IndexController@show")->name('voir');
    });
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["prefix"=>"gestion_deroulement_cours", "as"=>"gestion_deroulement_cours."], function ()
{

    Route::get('/', "GestionDeroulementCours\HomeController@index")->name('accueil');

    Route::get('/formCours', 'GestionDeroulementCours\FormulaireDeroulementCoursController@createFiche')->name('formulaire_Deroulement_Cours');

    Route::post('/formCours', 'GestionDeroulementCours\FormulaireDeroulementCoursController@store')->name('saveFicheEtudiant');

    Route::put('/formCours', 'GestionDeroulementCours\FormulaireDeroulementCoursController@update')->name('updateFicheEtudiant');

    Route::get('/ficheDeCoursSortant', 'GestionDeroulementCours\FormulaireDeroulementCoursController@readFicheCourseExecute')->name('retraitFicheEtudiant');

    Route::get('/ficheDeCoursEnseignant', 'GestionDeroulementCours\FormulaireDeroulementCoursController@readFicheAllCourseTeacher')->name('RetraitFicheEnseignantGlobal');

    // Download
    Route::get('/ficheDeCoursSortant/pdf', 'GestionDeroulementCours\DownloadFicheController@pdfSave')->name('downloadFiche');


    // a revoir
    Route::get('/nouveauGroupePedagogique', 'GestionDeroulementCours\SaveModuleController@createGroupePedagogique')->name('newField');

    Route::post('/nouveauGroupePedagogique', 'GestionDeroulementCours\SaveModuleController@storeGroupePedagogique')->name('saveNewGroup');

    Route::get('/nouvelleFiliere', 'GestionDeroulementCours\SaveModuleController@createFiliere')->name('newFields');

    Route::post('/nouvelleFiliere', 'GestionDeroulementCours\SaveModuleController@storeFiliere')->name('saveNewField');

});

Route::group(["prefix"=>"gestion_conseils_plaintes", "as"=>"gestion_conseils_plaintes.", "middleware" => "auth" ], function ()
//"middleware" => "auth"
{
    Route::get('/', 'GestionConseilsPlaintes\PlainteController@show')->name('index');

    Route::post('/nouvelle_plainte', 'GestionConseilsPlaintes\PlainteController@create')->name('nouvelle_plainte');
    Route::post('/nouvelle_convocation', 'GestionConseilsPlaintes\ConvocationController@create')->name('nouvelle_convocation');
    Route::post('/nouveau_conseil/{id}', 'GestionConseilsPlaintes\ConseilController@create')->name('nouveau_conseil');
    Route::post('/nouveau_rapport/{id}', 'GestionConseilsPlaintes\RapportController@create')->name('nouveau_rapport');

    Route::post('/edition_plainte/{id}', 'GestionConseilsPlaintes\PlainteController@update')->name('edition_plainte');
    Route::post('/edition_conseil/{id}', 'GestionConseilsPlaintes\ConseilController@update')->name('edition_conseil');
    Route::get('/plainte/{id}/formulaire_edition_plainte', 'GestionConseilsPlaintes\PlainteController@edform')->name('formulaire_edition_plainte');
    Route::get('/conseil/{id}/formulaire_edition_conseil', 'GestionConseilsPlaintes\ConseilController@edform')->name('formulaire_edition_conseil');

    Route::post('plainte/{id}/suppression_plainte', 'GestionConseilsPlaintes\PlainteController@destroy')->name('suppression_plainte');
    Route::post('rapport/{id}/suppression_rapport', 'GestionConseilsPlaintes\RapportController@destroy')->name('suppression_rapport');

    Route::get('/formulaire_plainte', 'GestionConseilsPlaintes\PlainteController@form')->name('formulaire_plainte');
    Route::get('/formulaire_convocation', 'GestionConseilsPlaintes\ConvocationController@form')->name('formulaire_convocation');
    Route::get('/plainte/{id}/formulaire_conseil', 'GestionConseilsPlaintes\ConseilController@form')->name('formulaire_conseil');
    Route::get('/conseil/{id}/formulaire_rapport', 'GestionConseilsPlaintes\RapportController@form')->name('formulaire_rapport');

    Route::get('/plainte/{id}', 'GestionConseilsPlaintes\PlainteController@view')->name('vue_plainte');
    Route::get('/convocation/{id}', 'GestionConseilsPlaintes\ConvocationController@view')->name('vue_convocation');
    Route::get('/conseil/{id}', 'GestionConseilsPlaintes\ConseilController@view')->name('vue_conseil');

    Route::get('/convocations', 'GestionConseilsPlaintes\ConvocationController@show')->name('liste_convocations');
    Route::get('/plaintes', 'GestionConseilsPlaintes\PlainteController@show')->name('liste_plaintes');
    Route::get('/conseils', 'GestionConseilsPlaintes\ConseilController@show')->name('liste_conseils');
    Route::get('/rapports', 'GestionConseilsPlaintes\RapportController@show')->name('liste_rapports');

    Route::post('/rejet/{id}', 'GestionConseilsPlaintes\PlainteController@reject')->name('rejet_plainte');
    Route::post('/mailing/{id}', 'GestionConseilsPlaintes\ConseilController@mailSend')->name('mailing');
    Route::post('/send', 'GestionConseilsPlaintes\ConvocationController@send')->name('send');
});



