<?php

use Illuminate\Routing\Route;


//       Gestion TFE
Route::group(["prefix"=>"gestion_tfe", "as"=>"gestion_tfe."], function ()
{
    Route::get('/search', ['as'=>'search','uses'=>'GestionTfe\SearchController@search']);
    Route::get('/',["as"=>'welcome', 'uses'=>'GestionTfe\TfeController@index']);

    Route::group(['middleware'=>'auth'], function () {
        Route::resource('/tfe',"GestionTfe\TfeController"); 
        Route::get("/profil/{id}",'GestionTfe\ProfilController@index')->name('profil');
        Route::get("/edit/{id}",'GestionTfe\TfeController@edit')->name('editTfe');
        Route::get("/update/{id}",'GestionTfe\TfeController@update')->name('updateTfe');
        Route::get("/delete/{id}",'GestionTfe\TfeController@destroy')->name('tfeDelete');
        
    });
});

?>