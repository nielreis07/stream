<?php

use App\Core\EnvLoader;

EnvLoader::load(dirname(__DIR__, 2) . '/.env');

return [
    'dsn' => sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        getenv('DB_HOST'),
        getenv('DB_NAME'),
        getenv('DB_CHARSET')
    ),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASS')
];
