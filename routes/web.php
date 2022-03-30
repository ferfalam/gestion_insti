<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle."], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
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
