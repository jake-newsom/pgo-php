<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){
    return "Test";
});

//list routes for api calls here
Route::group(['prefix'=>'v1'],function(){
	Route::get('trainer','TrainerController@index');

	Route::post('mapcell','MapController@cell');
});


/*$app->group(['prefix'=>'v1','namespace'=>'App\Http\Controllers'],function($app){
	$app->get('trainer','TrainerController@index');

});*/

?>