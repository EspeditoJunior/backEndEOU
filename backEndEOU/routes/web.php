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

$router->get('/', 'UserController@Buscar');

$router->get('/user[/{id}]', 'UserController@Buscar');

$router->post('/user', 'UserController@Inserir');

$router->post('/user/upload/csv', 'UserController@InserirCSV');
