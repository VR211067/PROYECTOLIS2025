<?php

// Clase abstracta base que sirve como controlador padre para todos los controladores del sistema
abstract class Controller {

    public function render($view, $viewBag = []) {
        // Si la vista contiene una barra, asumimos que es ruta directa (Auth/register.php)
        if (strpos($view, '/') !== false) {
            $file = "Views/" . $view;
        } else {
            $file = "Views/" . static::class . "/$view";
            $file = str_replace("Controller", "", $file);
        }

        if (is_file($file)) {
            extract($viewBag);
            ob_start();
            require($file);
            $content = ob_get_contents();
            ob_end_clean();
            echo $content;
        } else {
            echo "<h1>VIEW NOT FOUND: $file</h1>";
        }
    }
}
