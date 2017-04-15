<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$dbh = require_once __DIR__.'\..\db\init.php';

$app->get('/classmates', function (Request $request, Response $response) use ($dbh) {
    $sql = "SELECT * FROM classmates LIMIT 20";
    $stmnt = $dbh->prepare($sql);
    $stmnt->execute();

    $data = [];
    foreach ($stmnt->fetchAll() as $row) {
        $data[] = array_except($row, ["id", "password", "created_at", "updated_at"]);
    }

    $response->getBody()->write(json_encode($data));
    $dbh = null;

    return $response;
});

