<?php
require_once 'Controller.php';

class IndexController extends Controller {

    public function index() {
        $this->render('Index/index.php');

    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: /Red_Donantes/Auth/login"); // ← esta línea estaba mal
            exit();
        }
    
        $nombre = $_SESSION['usuario']['nombre'];
        $rol = $_SESSION['usuario']['rol'];
        $this->render('dashboard.php', ['nombre' => $nombre, 'rol' => $rol]);
    }
    
}