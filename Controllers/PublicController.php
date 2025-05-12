<?php
class PublicController {
    public function view($page = 'inicio') {
        $file = 'Views/Index/' . $page . '.php';

        if (file_exists($file)) {
            include $file;
        } else {
            echo "La página '$page' no existe.";
        }
    }
}
