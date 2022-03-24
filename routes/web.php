<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle."], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
});

Route::group(["prefix"=>"gestion_entreprises_stage", "as"=>"gestion_entreprises_stage."], function ()
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
        ->name('students.add_intern');});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
