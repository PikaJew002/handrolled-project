<?php

return [
    'name' => env('APP_NAME', 'Handrolled'),
    'url' => env('APP_URL', 'http://localhost'),
    'encryption_key' => env('APP_ENC_KEY', null),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'response_type' => 'text/html',
    'paths' => [
        'project' => env('APP_PATH', '../'),
        'routes' => env('APP_ROUTES', 'routes'),
        'views' => env('APP_VIEWS', 'resources/views'),
        'cache' => env('APP_CACHE', 'boot/cache'),
    ],
    'services' => [
        \PikaJew002\Handrolled\Application\Services\DatabaseService::class,
        \PikaJew002\Handrolled\Application\Services\AuthService::class,
        \PikaJew002\Handrolled\Application\Services\RouteService::class,
        \PikaJew002\Handrolled\Application\Services\ViewService::class,
    ],
];
