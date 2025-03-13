<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__DIR__) . '/vendor/autoload.php';
\App\Core\EnvLoader::load(__DIR__ . '/../.env');

use App\Core\Router;
use App\Core\Request;

$router = new Router(new Request);
require_once dirname(__DIR__) . '/src/Routes/web.php';

$router->resolve();

function dd() {
    echo '<pre>';
    var_dump(func_get_args());
    echo '</pre>';
    die();
}

function dump() {
    echo '<pre>';
    var_dump(func_get_args());
    echo '</pre>';
}
