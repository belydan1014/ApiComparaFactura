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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->routeMiddleware([
    'apilumen' => 'App\Http\Middleware\ApiLumenMiddleware',
]);

$app->group(array('prefix' => 'api/v1', 'middleware' => array('apilumen')), function ($group) use($app)
{
    $group->post('comparar', 'ComparaController@store');
});
