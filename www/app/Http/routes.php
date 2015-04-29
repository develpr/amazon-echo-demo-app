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

$app->get('/', function() use($app) {
	return $app->welcome();
});

$app->launchRequest('/demo', 'App\Http\Controllers\Controller@launchRequest');

$app->intent('/demo', "ListMeals", 'App\Http\Controllers\Controller@listMeals');

$app->intent('/demo', "ChooseMeal", 'App\Http\Controllers\Controller@chooseMeal');

$app->sessionEnd('/demo', 'App\Http\Controllers\Controller@endSession');