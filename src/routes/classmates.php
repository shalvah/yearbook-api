<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$dbh = require_once __DIR__.'\..\db\init.php';

$app->get('/classmates', function (Request $request, Response $response) use ($dbh) {
    $result = Db::table("classmates")->select()->where([["is_verified", "=", true]])->get();

    $data = [];
    foreach ($result as $row) {
        $data[] = array_except($row, ["id", "password", "created_at", "updated_at"]);
    }

    $response->getBody()->write(json_encode($data));
    $dbh = null;

    return $response->withHeader("Content-Type", "application/json");
});


$app->get('/classmates/{id}', function (Request $request, Response $response) use ($dbh) {
    $id = $request->getAttribute("id");
    $result = Db::table("classmates")->select()
        ->where([["id", "=", $id], ["is_verified", "=", true]])->get();
    $data = [];
    if(isset($result[0])) {
        $data = array_except($result[0], ["id", "password", "created_at", "updated_at"]);
    }
    $response->getBody()->write(json_encode($data));

    return $response->withHeader("Content-Type", "application/json");
});

$app->post('/classmates', function (Request $request, Response $response) use ($dbh) {
    $body = $request->getParsedBody();
    $body["is_verified"] = false;
    $id = Db::table("classmates")->insert($body)->run();

    $response->getBody()->write(json_encode($id));

    return $response->withHeader("Content-Type", "application/json");
});
