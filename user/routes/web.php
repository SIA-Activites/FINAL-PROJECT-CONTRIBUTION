<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// event table routes
$router->get('/user',['uses' => 'UserController@getUser']);                          
$router->post('/user',['uses' => 'UserController@add']);                         
$router->get('/user/{id}',['uses' => 'UserController@show']);                     
$router->put('user/{id}',['uses' => 'UserController@updateUser']);          
$router->delete('/user/{id}',['uses' => 'UserController@delete']);          

// role table routes
$router->get('/role',['uses' => 'RoleController@getrole']);                          
$router->post('/role',['uses' => 'RoleController@add']);                         
$router->get('/role/{id}',['uses' => 'RoleController@show']);                     
$router->put('role/{id}',['uses' => 'RoleController@updaterole']);          
$router->delete('/role/{id}',['uses' => 'RoleController@delete']);   

