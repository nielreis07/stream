<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $config = require dirname(__DIR__) . '/Config/database.php';

            try {
                self::$connection = new PDO(
                    $config['dsn'],
                    $config['user'],
                    $config['password'],
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                dd($e);
                die("Erro de conexão: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
