<?php

namespace Strem\Src\Controllers;

use App\Core\View;
use App\Models\UsuarioModel;
use App\Models\VideoModel;

class HomeController
{
    public function index()
    {
        $video = UsuarioModel::listarUsuario();
        return View::render('home.index', ['title' => '', 'usuarios' => $video, 'Video' => $video]);
    }
}