<?php

require __DIR__.'\..\app\bootstrap.php';

$app = new \Slim\App(["settings" => ["displayErrorDetails" => true]]);

require_once __DIR__.'\..\routes\classmates.php';

$app->run();
