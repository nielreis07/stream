<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\UsuarioController;

$router->get('/home', [HomeController::class, 'index']);

$router->get('/usuario', [UsuarioController::class, 'index']);
