<?php

namespace App\Controllers;

class Controller
{
    public function render(string $path, array $data = [])
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../Views/' . $path . '.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layout.php';
    }
}
