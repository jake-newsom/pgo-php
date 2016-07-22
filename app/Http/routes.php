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

$app->get('/', function () use ($app) {
    return $app->version();
});

//list routes for api calls here
$app->group(['prefix'=>'v1','namespace'=>'App\Http\Controllers'],function($app){
	$app->get('trainer','TrainerController@index');

});

?>