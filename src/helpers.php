<?php


if(!function_exists("env")) {
    function env($key, $default = "")
    {
        $value = getenv($key);
        if(!empty($value)) {
            return $value;
        }
        return $default;
    }
}

/*
if(!function_exists("config")) {
    function config($keyString, $default = "")
    {
        $keys = explode(".", $keyString);
        $config = require_once("app/config.php");

        $value = $config;
        foreach($keys as $key) {
            if(isset($value[$key])) {
                $value = $value[$key];
            } else {
                return $default;
            }
        }
        return $value;
    }
}
*/