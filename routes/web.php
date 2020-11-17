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

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->post('/signin', 'AuthController@signin');
});

$router->group(['middleware' => 'auth', 'prefix' => 'v1'], function () use ($router) {
    $router->get('/me', 'AuthController@me');
    $router->get('/refresh', 'AuthController@refresh');
    $router->get('/signout', 'AuthController@signout');

    $router->get('/users', 'UserController@index');
    $router->get('/user/{id}', 'UserController@show');

    $router->get('/clients', 'ClientController@index');
    $router->get('/client/{id}', 'ClientController@show');

    $router->get('/policies', 'PolicyController@index');
    $router->get('/policy/{id}', 'PolicyController@show');

    $router->get('/insurances', 'InsuranceController@index');
    $router->get('/insurance/{id}', 'InsuranceController@show');

    $router->get('/policy/{policy}/cashlesses', 'CashlessController@index');
    $router->get('/cashless/{id}', 'CashlessController@show');
    $router->get('/cashless/details/{code}', 'CashlessController@details');
    $router->put('/cashless/{id}', 'CashlessController@update');
    $router->post('/cashless', 'CashlessController@store');

    $router->get('/policy/{policy}/reimburses', 'ReimburseController@index');
    $router->get('/reimburse/{id}', 'ReimburseController@show');
    $router->get('/reimburse/details/{code}', 'ReimburseController@details');
    $router->put('/reimburse/{id}', 'ReimburseController@update');
    $router->post('/reimburse', 'ReimburseController@store');

    $router->get('/policy/{policy}/members', 'MemberController@index');
    $router->get('/member/{id}', 'MemberController@show');
    $router->get('/member/{id}/dependents', 'MemberController@dependents');
});
