<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\VideoModel;
use Exception;

class HomeController
{
    public function index()
    {
        try {
            $videos = VideoModel::listarVideos();
            return View::render('home.index', ['videos' => $videos], 'adm');
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}