<?php

require __DIR__.'\..\app\bootstrap.php';

$app = new \Slim\App;

require_once __DIR__.'\..\routes\classmates.php';

$app->run();
