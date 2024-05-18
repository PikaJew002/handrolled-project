<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\PagesController;
// to authenticate with cookies
use PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible;
use PikaJew002\Handrolled\Http\Responses\ViewResponse;
use PikaJew002\Handrolled\Router\Definition\RouteGroup;

$route = new RouteGroup();
// public 'home' page
$route->get('/', function(ViewResponse $response) {
    return $response->use('welcome.twig.html', ['variable' => 'This is some variable content']);
});

$route->get('/login', [PagesController::class, 'login']);

// auth guarded home page
$route->get('/home', [PagesController::class, 'index'])->middleware(AuthenticateEdible::class);

$route->group('/auth', function(RouteGroup $routeGroup) {
    $routeGroup->post('/login', Auth\LoginController::class);
    $routeGroup->post('/logout', Auth\LogoutController::class)->middleware(AuthenticateEdible::class);
});

return $route;
