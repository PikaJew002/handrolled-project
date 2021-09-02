<?php

$app = new \PikaJew002\Handrolled\Application\Application();

$app->bootConfig();

$app->bootRoutes();

$app->bootDatabase();

$app->bootAuth();

return $app;
