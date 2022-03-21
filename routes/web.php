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

Auth::routes();

Route::group(["prefix"=>"gestion_salle", "as"=>"gestion_salle."], function ()
{
    Route::get('/', "GestionSalleDeClasse\SalleController@index")->name("index");
});

Route::group(["prefix"=>"gestion_authClass", "as"=>"gestion_authClass."], function ()
{
    Route::get('/', "GestionAuthAttClassement\AuthClassController@index")->name("index");
    Route::get('/profile', "GestionAuthAttClassement\AuthClassController@profile")->name("profile");
   
    
    // Route::get('/updatede/{id}','App\Http\Controllers\DemandeeController@show')->middleware(['auth'])->name('showd');
    Route::get('/demande', "GestionAuthAttClassement\DemandeAuthController@index1")->name("demande");
    Route::get('/demandeaff', "GestionAuthAttClassement\DemandeAuth@demaff")->name("demandeaff");
    Route::get('/updatede/{id}', 'GestionAuthAttClassement\DemandeAuthController@show')->name('edit');
    Route::get('/demandeaff/{id}', 'GestionAuthAttClassement\DemandeAuthController@edit')->name('medit');
    Route::get('/update/{id}', 'GestionAuthAttClassement\DemandeAuthController@show2')->name('edit2');
    Route::post('/updatede/{id}', 'GestionAuthAttClassement\DemandeAuthController@update')->name('update');
    Route::get('/listdemande','GestionAuthAttClassement\DemandeAuthController@create')->name('listdemande');   
    Route::post('/listdemande','GestionAuthAttClassement\DemandeAuthController@store')->name('dem'); 
    Route::get('/demande_r','GestionAuthAttClassement\DemandeAuthController@index')->name('demande_r');
    


    Route::get('/classement','GestionAuthAttClassement\ClassementController@create')->name('classement');
    Route::post('/classement','GestionAuthAttClassement\ClassementController@store')->name('dam');
    
    
    Route::get('/pages/ficheDeliberation','GestionAuthAttClassement\FileController@ImportForm')->name('deliber');
    // Route::get('pages/ficheDeliberation', [FileController::class, 'ImportForm'])->name('deliber');
    // Route::post('/import', [FileController::class, 'Import'])->name('employee.import');
    // Route::get('/export-excel', [FileController::class, 'exportIntoExcel'])->name('export-excel');
    
    
    
    
    Route::get('/send-mail', [\App\Http\Controllers\MailController::class, 'sendMail'])->middleware(['auth'])->name('send-mail');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
