<?php

use App\Http\Controllers\UsersController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

return simpleDispatcher(function(RouteCollector $r) {
    $r->addGroup('/api', function (RouteCollector $r) {
        $r->get('/users', [UsersController::class, 'index']);
        // {id} must be a number (\d+)
        $r->get('/user/{id:\d+}', [UsersController::class, 'view']);
        $r->post('/user', [UsersController::class, 'store']);
        $r->delete('/user/{id:\d+}', [UsersController::class, 'destroy']);
    });
});
