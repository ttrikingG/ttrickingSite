<?php

namespace core;

class RenderView
{
    public static function render($view, $data = [])
    {
        // Lógica para carregar e exibir a view
        $viewFile = "../app/views/" . str_replace('.', '/', $view) . '.php';
        
        if (file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        } else {
            throw new \Exception("View not found: {$view}");
        }
    }
}


