<?php

use App\Http\Controllers\ContactsController;

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

$router->get('/api/contacts', 'ContactsController@index');
$router->get('/api/contacts/{id}', 'ContactsController@show');
$router->post('/api/contacts', 'ContactsController@store');
$router->put('/api/contacts/{id}', 'ContactsController@update');
$router->delete('/api/contacts/{id}', 'ContactsController@destroy');