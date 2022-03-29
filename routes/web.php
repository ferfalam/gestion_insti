<?php

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

Route::get('/etudiant',[App\Http\Controllers\GestionDemande\Etudiant\DashboardController::class, 'index'])->name("dashboard_etudiant");
Route::get('/personnel',[App\Http\Controllers\GestionDemande\Personnel\DashboardController::class, 'index'])->name("dashboard_personnel");
Route::get('/Faire_une_reclamation',[App\Http\Controllers\GestionDemande\Etudiant\MakeClaimController::class, 'show'])->name("reclamation");
Route::get('/Faire_demande_evaluation',[App\Http\Controllers\GestionDemande\Etudiant\MakeEvaluationRequestController::class, 'show'])->name("evaluation");
Route::post('/soumettre_demande_reclamation',[App\Http\Controllers\GestionDemande\Etudiant\MakeClaimController::class, 'validation'])->name("validation_reclamation"); 
Route::post('/soumettre_demande_evaluation',[App\Http\Controllers\GestionDemande\Etudiant\MakeEvaluationRequestController::class, 'validation'])->name("validation_demande_evaluation");       
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");    
   


Auth::routes();

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle."], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
});

// Route::group(["prefix"=>"gestion_demandes", "as"=>"gestion_demande."], function ()
// {
    
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

