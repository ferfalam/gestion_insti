<?php

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

Route::group(["prefix" => "gestion_salle", "as" => "gestion_salle."], function () {
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
});

Route::group(["prefix" => "gestion_conseil_pedagogique", "as" => "gestion_conseil_pedagogique."], function () {
    Route::get('/', [CouncilControler::class, "index"]);


    Route::get('/index', [CouncilControler::class, "index"])->middleware(['auth'])->name('index');

    // the site route


    Route::get('/councils', [CouncilControler::class, "councils"])->name("councils");

    Route::get('/my_councils', [CouncilControler::class, "my_councils"])->name("my_councils");

    Route::get('/index', [CouncilControler::class, "index"])->name("index");

    Route::get('/councils/view/{id}', [CouncilControler::class, "view_done"])->whereNumber("id")->name("view_done");

    Route::get('/my_councils/view/{id}', [CouncilControler::class, "view_own_done"])->whereNumber("id")->name("view_own_done");

    Route::get('/index/new_council/{id}', [CouncilControler::class, "view_new"])->whereNumber("id")->name("view_new");

    Route::post("/store_report", [CouncilControler::class, "store_report"])->name("store_report");

    Route::post('/report', [CouncilControler::class, "report"])->name("report");

    Route::get('/program', [CouncilControler::class, "program"])->name("program");

    Route::get("/view_council", [CouncilControler::class, "program_view"])->name("view_program");

    Route::post('/store_program', [CouncilControler::class, "store_program"])->name("store_program");

    Route::any('/vaidate_program', [CouncilControler::class, "vaidate_program"])->name("vaidate_program");

    Route::post('/validate_report', [CouncilControler::class, "validate_report"])->name("validate_report");

    Route::post('/delete_council', [CouncilControler::class, "delete_council"])->name("delete_council");

    Route::any('/guests', [CouncilControler::class, "guests"])->name("guests");

    Route::post('/add_guest', [CouncilControler::class, "add_guest"])->name("add_guest");

    Route::post('/del_guest', [CouncilControler::class, "del_guest"])->name("del_guest");
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
