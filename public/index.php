<?php

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../boot/boot.php';

if($app->hasBootExceptions()) {
    $app->renderExceptions();
} else {
    $response = $app->handleRequest();
    $response->render();
}
