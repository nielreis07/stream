<?php

namespace App\Core;

class EnvLoader
{
    public static function load(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \Exception("Arquivo .env não encontrado!");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos($line, '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);

            putenv("$name=$value");
            $_ENV[$name] = $value;
        }
    }
}
