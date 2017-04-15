<?php

return [
    "settings" => [
        "displayErrorDetails" => true,

        "logger" => [
            "name" => "yearbook-api",
            "level" => Monolog\Logger::DEBUG,
            "path" => __DIR__."\\..\\logs\\app.log",
        ]
    ]
];