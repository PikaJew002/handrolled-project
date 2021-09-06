<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

return simpleDispatcher(function(RouteCollector $r) {
    $r->addGroup('/api', function (RouteCollector $r) {
        $r->get('/users', [
            'class' => UsersController::class,
            'method' => 'index',
            'middleware' => [
                \PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible::class,
            ],
        ]);
        // {id} must be a number (\d+)
        $r->get('/user/{id:\d+}', [
            'class' => UsersController::class,
            'method' => 'view',
            'middleware' => [
                \PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible::class,
            ],
        ]);
        $r->post('/user', [
            'class' => UsersController::class,
            'method' => 'store',
            'middleware' => [
                \PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible::class,
            ],
        ]);
        $r->delete('/user/{id:\d+}', [
            'class' => UsersController::class,
            'method' => 'destroy',
            'middleware' => [
                \PikaJew002\Handrolled\Http\Middleware\AuthenticateEdible::class,
            ],
        ]);
        $r->post('/user/login', Auth\LoginController::class);
        $r->post('/user/logout', Auth\LogoutController::class);
    });
});
