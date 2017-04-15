<?

return array(
    "paths" => [
        "migrations" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/migrations",
        "seeds" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/seeds"
    ],
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "development",
        "production" => [
            "adapter" => "mysql",
            "host" => env("PHINX_DBHOST"),
            "name" => env("PHINX_DBNAME"),
            "user" => env("PHINX_DBUSER"),
            "pass" => env("PHINX_DBPASS"),
            "port" => env("PHINX_DBPORT"),
            "charset" => "utf8"
        ],
        "development" => [
            "adapter" => "mysql",
            "host" => env("PHINX_DBHOST"),
            "name" => env("PHINX_DBNAME"),
            "user" => env("PHINX_DBUSER"),
            "pass" => env("PHINX_DBPASS"),
            "port" => env("PHINX_DBPORT"),
            "charset" => "utf8"
        ],
        "testing" => [
            "adapter" => "mysql",
            "host" => env("PHINX_DBHOST"),
            "name" => env("PHINX_DBNAME"),
            "user" => env("PHINX_DBUSER"),
            "pass" => env("PHINX_DBPASS"),
            "port" => env("PHINX_DBPORT"),
            "charset" => "utf8"
        ]
    ],
    "version_order" => "creation"
);