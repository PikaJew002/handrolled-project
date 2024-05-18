<?php

require __DIR__.'/../vendor/autoload.php';

$app = new \PikaJew002\Handrolled\Application\Application();

$app->boot();

$app->handleRequest()->render();
