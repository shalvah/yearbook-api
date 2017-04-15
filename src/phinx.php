<?php

require_once "app/bootstrap.php";

return array(
    'paths' => [
        'migrations' => env('PHINX_env_DIR', __DIR__) . '/db/migrations',
        'seeds' => env('PHINX_env_DIR', __DIR__) . '/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => env('APP_ENV', 'dev'),
        'prod' => [
            'adapter' => env('DB_CONN', 'mysql'),
            'host' => env('DB_HOST'),
            'name' => env('DB_NAME'),
            'user' => env('DB_USER'),
            'pass' => env('DB_PASS'),
            'port' => env('DB_PORT'),
            'charset' => 'utf8'
        ],
        'dev' => [
            'adapter' => env('DB_CONN', 'mysql'),
            'host' => env('DB_HOST'),
            'name' => env('DB_NAME'),
            'user' => env('DB_USER'),
            'pass' => env('DB_PASS'),
            'port' => env('DB_PORT'),
            'charset' => 'utf8'
        ],
    ],
    'version_order' => 'creation'
);