<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['middleware' => 'client.credentials'],function() use ($router) { 
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
});




