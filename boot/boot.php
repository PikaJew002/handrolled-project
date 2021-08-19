<?php

$app = new \PikaJew002\Handrolled\Application\Application();

$app->bootConfig(realpath(__DIR__.'/../'), realpath(__DIR__.'/../config/'));

$app->bootRoutes(realpath(__DIR__.'/../routes/api.php'));

$app->bootDatabase();

return $app;
