<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UsuarioController;
use App\Controllers\VideoController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);

$router->get('/video', [VideoController::class, 'index']);
$router->post('/', [VideoController::class, 'index']);

$router->get('/usuario', [UsuarioController::class, 'index']);
$router->post('/', [UsuarioController::class, 'index']);

$router->get('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);
$router->get('/usuario/cadastrar/{id}', [UsuarioController::class, 'cadastrar']);

$router->post('/usuario/salvar', [UsuarioController::class, 'salvar']);

$router->get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir']);


$router->get('/usuario/pesquisa', [UsuarioController::class, 'pesquisa']);
$router->post('/usuario/pesquisa', [UsuarioController::class, 'pesquisa']);


$router->get('/video/cadastrar', [VideoController::class, 'cadastrar']);
$router->post('/video/cadastrar', [VideoController::class, 'cadastrar']);

$router->get('/video/excluir/{id}', [VideoController::class, 'excluir']);

$router->get('/video/editar/{id}', [VideoController::class, 'editar']);
$router->post('/video/editar/{id}', [VideoController::class, 'editar']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/autenticar', [LoginController::class, 'autenticar']);
$router->get('/logout', [LoginController::class, 'logout']);