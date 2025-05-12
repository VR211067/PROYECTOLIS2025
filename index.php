<?php

// Compatibilidad para str_ends_with en PHP < 8
if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle) {
        return substr($haystack, -strlen($needle)) === $needle;
    }
}

// Rutas de todos los controladores usados
include_once 'Controllers/IndexController.php';   // Página principal
include_once 'Controllers/AuthController.php';    // Login/Register
include_once 'Controllers/UsuariosController.php'; // Perfil de usuario
include_once 'Controllers/AdminDonantesController.php';   // Panel administrativo
include_once 'Controllers/AdminAuthController.php'; // Login administrativo
include_once 'Controllers/APIController.php'; // Login administrativo
include_once 'Controllers/PublicController.php';
include_once 'Controllers/DoctorController.php'; // Panel médico
const PATH = '/Red_Donantes';


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$slices = explode('/', trim($url, '/'));

$baseIndex = array_search('Red_Donantes', $slices);
$controller = isset($slices[$baseIndex + 1]) ? $slices[$baseIndex + 1] . 'Controller' : 'IndexController';
$method = isset($slices[$baseIndex + 2]) ? $slices[$baseIndex + 2] : 'index';
$params = array_slice($slices, $baseIndex + 3);


$cont = new $controller;
call_user_func_array([$cont, $method], $params);
