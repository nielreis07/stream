<?php

namespace App\Controllers;

use App\Core\View;
class HomeController
{
    public function index()
    {
        return View::render('home.index', ['title' => 'Seja bem-vindo ao Strem'], 'adm');
    }
}