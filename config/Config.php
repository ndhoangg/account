<?php

namespace starter\config;

class Config {
    public static function getConfig() {
        return [
            "ENV" => 0,
            "SQL_QUERY_LOGGED" => 1,
            "DB_SERVER" => "127.0.0.1",
            "DB_DBNAME" => "starter",
            "DB_USERNAME" => "root",
            "DB_PASSWORD" => "123456",
            "DB_PORT" => "3306",
            "SERVER_ADDRESS" => "http://localhost:9123/"
        ];
    }
}

