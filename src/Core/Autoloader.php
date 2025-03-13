<?php

spl_autoload_register(function ($class) {
    $baseDir = dirname(__DIR__) . '/';
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
