<?

return array(
    "paths" => [
        "migrations" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/migrations",
        "seeds" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/seeds"
    ],
    "confiironments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "development",
        "production" => [
            "adapter" => "mysql",
            "host" => config("db.host"),
            "name" => config("db.name"),
            "user" => config("db.user"),
            "pass" => config("db.pass"),
            "port" => config("db.port"),
            "charset" => "utf8"
        ],
        "development" => [
            "adapter" => "mysql",
            "host" => config("db.host"),
            "name" => config("db.name"),
            "user" => config("db.user"),
            "pass" => config("db.pass"),
            "port" => config("db.port"),
            "charset" => "utf8"
        ],
        "testing" => [
            "adapter" => "mysql",
            "host" => config("db.host"),
            "name" => config("db.name"),
            "user" => config("db.user"),
            "pass" => config("db.pass"),
            "port" => config("db.port"),
            "charset" => "utf8"
        ]
    ],
    "version_order" => "creation"
);