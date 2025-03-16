<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function getAll(): array
    {
        $stmt = Database::getConnection()->query('SELECT * FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
