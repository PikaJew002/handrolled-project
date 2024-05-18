<?php

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\Auth;
// to authenticate with API token
use PikaJew002\Handrolled\Http\Middleware\AuthenticateToken;
use PikaJew002\Handrolled\Http\Responses\ViewResponse;
use PikaJew002\Handrolled\Router\Definition\RouteGroup;

$route = new RouteGroup('/api');
$route->addGroup('/user', function(RouteGroup $routeGroup) {
    $routeGroup->get('', [UsersController::class, 'index']);
    // an alias for $routeGroup->addRoute('GET', '/users', [UsersController::class, 'index']);
    $routeGroup->get('/{id:\d+}', [UsersController::class, 'view']);
    $routeGroup->post('', [UsersController::class, 'store']);
    $routeGroup->delete('/{id:\d+}', [UsersController::class, 'destroy']);
})->middleware(AuthenticateToken::class);
$route->addGroup('/auth', function(RouteGroup $routeGroup) {
    $routeGroup->post('/login', Auth\LoginController::class);
    $routeGroup->post('/logout', Auth\LogoutController::class)->middleware(AuthenticateToken::class);
});

return $route;
