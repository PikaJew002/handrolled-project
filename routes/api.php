<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth;
use PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible;
use PikaJew002\Handrolled\Http\Responses\ViewResponse;
use PikaJew002\Handrolled\Router\Definition\RouteCollector;
use PikaJew002\Handrolled\Router\Definition\RouteGroup;

$route = new RouteCollector();

$route->get('/', function() {
    return new ViewResponse('home.twig.html', ['variable' => 'This is some variable content']);
});

$route->addGroup('/api', function (RouteGroup $routeGroup) {
    $routeGroup->get('/users', [UsersController::class, 'index']);
    // an alias for $routeGroup->addRoute('GET', '/users', [UsersController::class, 'index']);
    $routeGroup->get('/user/{id:\d+}', [UsersController::class, 'view']);
    $routeGroup->post('/user', [UsersController::class, 'store']);
    $routeGroup->delete('/user/{id:\d+}', [UsersController::class, 'destroy']);
})->middleware(AuthenticateEdible::class);

$route->addGroup('/auth', function(RouteGroup $routeGroup) {
    $routeGroup->post('/user/login', Auth\LoginController::class);
    $routeGroup->post('/user/logout', Auth\LogoutController::class);
});

return $route;
