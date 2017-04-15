<?

return array(
    "paths" => [
        "migrations" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/migrations",
        "seeds" => env("PHINX_CONFIG_DIR", __DIR__) . "/db/seeds"
    ],
    "confiironments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => env("APP_ENV", "dev"),
        "prod" => [
            "adapter" => config("db.conn"),
            "host" => config("db.host"),
            "name" => config("db.name"),
            "user" => config("db.user"),
            "pass" => config("db.pass"),
            "port" => config("db.port"),
            "charset" => "utf8"
        ],
        "dev" => [
            "adapter" => config("db.conn"),
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