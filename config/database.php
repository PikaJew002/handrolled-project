<?php

use PikaJew002\Handrolled\Database\Implementations\MySQL;
use PikaJew002\Handrolled\Database\Implementations\PostgreSQL;;

return [
    /*
      host: The host of the database
      database: The Database name
      username: The username to connect to the database
      password: The password that goes with the username
      class: The implementation class that extends the PDO class
      port (optional): The port to connect on

      Currently supported database drivers:
        - MySQL
        - PostgreSQL
    */
    'mysql' => [
        'host' => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'class' => MySQL::class,
    ],
    'pgsql' => [
        'host' => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'class' => PostgreSQL::class,
    ],
];
