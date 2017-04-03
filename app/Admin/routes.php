<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('college', CollegeController::class);
    $router->resource('project', ProjectController::class);
    $router->resource('submit', ProjectSubmitController::class);
    $router->resource('auth/users', UserController::class);

});
