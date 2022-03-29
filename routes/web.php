<?php

use App\Http\Controllers\GestionSalleDeClasse\SheduleController;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix"=>"gestion_authClass", "as"=>"gestion_authClass."], function ()
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
