<?php

namespace starter\repositories;
use PDOException;
use PDO;

class SQLConnection
{
    private static $instance = NULL;
    private static $connection;

    public static function getInstance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        static::$instance = new static;
        return static::$instance;
    }

    public static function getConnection()
    {
        return self::$connection;
    }

    public static function connect()
    {
        try {
            self::$connection = new PDO("mysql:host=" . DB_SERVER . ";port=" . DB_PORT . ";dbname=" . DB_DBNAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"]);
        } catch (PDOException $e) {
            $msg = "Try again later";
            if (ENV == 0) {
                print_r($e);
            }
            exit($msg);
        }
    }

    public static function close()
    {
        self::$connection = null;
    }

    public static function query($query, $params)
    {
        if ($params) {
            $stmt = static::$connection->prepare($query);

            foreach ($params as $k => $v) {
                $stmt->bindValue($k, $v);
            }

            $result = $stmt->execute();
        } else {
            $result = self::$connection->exec($query);
        }
        return $result;
    }

    public static function insert($query, $params)
    {
        if ($params) {
            $stmt = static::$connection->prepare($query);

            foreach ($params as $k => $v) {
                $stmt->bindValue($k, $v);
            }

            $result = $stmt->execute();
        } else {
            $result = self::$connection->exec($query);
        }
        return $result;
    }
    public static function delete($query, $params)
    {
        if ($params) {
            $stmt = static::$connection->prepare($query);

            foreach ($params as $k => $v) {
                $stmt->bindValue($k, $v);
            }

            $result = $stmt->execute();
        } else {
            $result = self::$connection->exec($query);
        }
    }

    public static function update($query, $params)
    {
        if ($params) {
            $stmt = static::$connection->prepare($query);

            foreach ($params as $k => $v) {
                $stmt->bindValue($k, $v);
            }

            $result = $stmt->execute();
        } else {
            $result = self::$connection->exec($query);
        }
    }

    public static function commit($query, $params)
    {
    }

    private static function isEmpty(&$result)
    {
        if (!$result->rowCount()) {
            return true;
        }
        return false;
    }

    public static function read($query, $params = null)
    {
        $result = self::query($query, $params);

        if (!$result || self::isEmpty($result)) return NULL;
        return $result;
    }


    public static function single($query)
    {
        $result = self::read($query);
        if (!$result || self::isEmpty($result)) {
            return NULL;
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function fetch(&$result)
    {
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function fetchAll(&$result)
    {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
