<?php

return array(
    "db" => [
        "conn" => env("DB_CONN", "mysql"),
        "host" => env("DB_HOST"),
        "name" => env("DB_NAME"),
        "user" => env("DB_USER"),
        "pass" => env("DB_PASS"),
        "port" => env("DB_PORT"),
    ]
);