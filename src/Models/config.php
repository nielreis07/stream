<?php

namespace App\Models;

use App\Core\Database;

class Config
{
    public static function getHeaderData()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM video LIMIT 1");
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
