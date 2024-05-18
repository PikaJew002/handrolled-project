<?php

return [
    /*
      dbname: The database name
      user: The username to connect to the database
      password: The password that goes with the username
      host: The host of the database
      port (optional): The port to connect on
      driver: The database driver to use

      Currently supported database drivers:
        - Whatever doctrine/dbal version 3.3 supports
    */
    'driver' => env('DB_DRIVER', 'mysql'),
    'drivers' => [
        'mysql' => [
            'dbname' => env('DB_DATABASE', 'handrolled'),
            'user' => env('DB_USERNAME', 'handrolled'),
            'password' => env('DB_PASSWORD', ''),
            'host' => env('DB_HOST', '127.0.0.1'),
            'driver' => 'pdo_mysql',
        ],
        'pgsql' => [
            'dbname' => env('DB_DATABASE', 'handrolled'),
            'user' => env('DB_USERNAME', 'handrolled'),
            'password' => env('DB_PASSWORD', ''),
            'host' => env('DB_HOST', '127.0.0.1'),
            'driver' => 'pdo_pgsql',
        ],
    ],
];
