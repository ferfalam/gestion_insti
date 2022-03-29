<?php

use App\Http\Controllers\GestionSalleDeClasse\SheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GestionConseilPedagogique\CouncilControler;

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

Auth::routes();

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle.", "middleware" => "auth"], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
    Route::resource('shedule', "GestionSalleDeClasse\SheduleController");
    Route::resource('class_shedule', "GestionSalleDeClasse\ClassSheduleController");
});



Route::group(["prefix"=>"gestion_enseignant", "as"=>"gestion_enseignant.","middleware" => "auth"], function ()
{

    //Route::get('/', [App\Http\Controllers\GestionDesEnseignants\ConnexionController::class,'affichage'])->name("index");
    Route::get('/programmerCours/show',[App\Http\Controllers\GestionDesEnseignants\ProgrammeController::class,'show'])->name("show");

    //Route::view('/programmerCours','addCours');
    Route::get('/ajouterProf','App\Http\Controllers\AddProfController@affichage');
    Route::post('/ajouterProf','App\Http\Controllers\AddProfController@traitement');
    Route::get('/programmerMission','App\Http\Controllers\AddMissionController@affichage');
    Route::post('/programmerMission','App\Http\Controllers\AddMissionController@traitement');
    Route::get('/programmerCours','App\Http\Controllers\AddCoursController@affichage');
    Route::post('/programmerCours','App\Http\Controllers\AddCoursController@traitement');
    Route::get('/profile','App\Http\Controllers\ProfileController@affichage');
    Route::post('/profilPass','App\Http\Controllers\ProfileController@traitement1');
    Route::post('/profilInfo','App\Http\Controllers\ProfileController@traitement2');
    Route::get('/programme','App\Http\Controllers\ProgrammeController@affichage');
    Route::post('/programme','App\Http\Controllers\ProgrammeController@traitement');
    Route::get('/mission','App\Http\Controllers\MissionController@affichage');
    Route::post('/mission','App\Http\Controllers\MissionController@traitement');
    Route::get('/pdfM', 'App\Http\Controllers\MissionController@generate')->name('pdf');
    Route::get('/pdfT', 'App\Http\Controllers\ProgrammeController@generate')->name('pdf');
    Route::post('image-upload','App\Http\Controllers\ImageUploadController@imageUploadPost')->name('image.upload.post');

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
    Route::get('/login', [App\Http\Controllers\GestionDesEntreprisesDeStage\Auth\AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Gestion deroulement cours

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

    // Route::get('/accueil', function()
    // {
    //     return view('gestionDeroulementCours/accueil');
    // })->name('accueil');

});



