<?php

namespace App\model;

use PDO;
use PDOException;

abstract class DatabaseModel
{

    protected static $pdo = null;

    protected static function getPdo()
    {
        if (is_null(self::$pdo)) {
            try {
                self::$pdo = new PDO('mysql:host=localhost;port=3306;dbname=compets_management; charset=utf8', 'root', 'admin');

            } catch (PDOException $e) {
                var_dump('error :' . $e);
            }
        }
        var_dump(self::$pdo);
        return self::$pdo;
    }
}
