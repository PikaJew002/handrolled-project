<?php

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../boot/boot.php';

$response = $app->handleRequest();

$response->render();
