<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api) {
    $api->get('/', function () {
        throw new
        Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException([], "Method Not Allowed");
    });

    //mahasiswa
    $api->get('colstudents', 'App\Http\Controllers\ColstudentController@index');
    $api->post('colstudents', 'App\Http\Controllers\ColstudentController@store');
    $api->put('colstudents/{id}', 'App\Http\Controllers\ColstudentController@update');
    $api->get('colstudents/{id}', 'App\Http\Controllers\ColstudentController@show');
    $api->delete('colstudents/{id}', 'App\Http\Controllers\ColstudentController@destroy');
});
