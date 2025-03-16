<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\UsuarioController;
use App\Controllers\VideoController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);

$router->get('/video', [VideoController::class, 'index']);
$router->post('/', [VideoController::class, 'index']);

$router->get('/usuario', [UsuarioController::class, 'index']);
$router->post('/', [UsuarioController::class, 'index']);

$router->get('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);
$router->post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);

$router->get('/usuario/atualizar/{id}', [UsuarioController::class, 'atualizar']);
$router->post('/usuario/atualizar/{id}', [UsuarioController::class, 'atualizar']);

$router->get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir']);
$router->post('/usuario/excluir/{id}', [UsuarioController::class, 'excluir']);

$router->get('/usuario/pesquisa', [UsuarioController::class, 'pesquisa']);
$router->post('/usuario/pesquisa', [UsuarioController::class, 'pesquisa']);

