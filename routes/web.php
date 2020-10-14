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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function()  {
    return str_random(32);
});

$router->get('/biodata', function() {
    return "Nama : immanuel Sihaloho <br>NIM    :185150701111020 ";
});

$router->get('hello/{name}', function($name)
{
return 'Hello, '.$name;
});

$router->get('/products', 'ProductController@index');
$router->get('/products/{id}', 'ProductController@show');

$router->post('/products', 'ProductController@store');
$router->delete('/products/{id}', 'ProductController@destroy');

$router->put('/products/{id}', 'ProductController@update');




