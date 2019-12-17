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
$router->group(['prefix' => 'api'], function () use ($router) {
    //Users
    $router->post('user', ['uses' => 'UsuarioController@create']);
    $router->put('user/{id}/edit',  ['uses' => 'UsuarioController@update']);
    $router->get('user/{id}',  ['uses' => 'UsuarioController@show']);
    $router->get('user/{id}/delete',  ['uses' => 'UsuarioController@delete']);

    //prestamos
    $router->post('prestamo', ['uses' => 'PrestamoController@create']);
    $router->put('prestamo/{id}/edit',  ['uses' => 'PrestamoController@update']);
    $router->get('prestamo', ['uses' => 'PrestamoController@getall']);
    $router->get('prestamo/{id}',  ['uses' => 'PrestamoController@show']);
    $router->get('prestamo/{id}/delete',  ['uses' => 'PrestamoController@delete']);

    //activos
    $router->post('activo', ['uses' => 'ActivoController@create']);
    $router->put('activo/{id}/edit',  ['uses' => 'ActivoController@update']);
    $router->get('activo', ['uses' => 'ActivoController@getall']);
    $router->get('activo/{id}',  ['uses' => 'ActivoController@show']);
    $router->get('activo/{id}/delete',  ['uses' => 'ActivoController@delete']);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
