<?php

namespace App\Core;
use App\Models\Configuration;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'default')
    {
        extract($data);

        $viewFile = str_replace('.', '/', $view) . '.php';

        $filePath = __DIR__ . '/../Views/' . $viewFile;

        if (!file_exists($filePath)) {
            throw new \Exception("View {$viewFile} não encontrada.");
        }

        ob_start();
        include $filePath;
        $content = ob_get_clean();

        if (!empty($layout) && $layout == "default") {
            include __DIR__ . '/../Views/layouts/default.php';
        } 
        
        if (!empty($layout) && $layout != "default") {
            include __DIR__ . '/../Views/layouts/' . $layout . '.php';
        }
    }
}
