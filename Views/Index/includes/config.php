<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost:3306');    
define('DB_USER', 'root');         
define('DB_PASS', '');             
define('DB_NAME', 'red_donantes'); 

// Config la aplicación
define('APP_NAME', 'Sistema de Donantes de Sangre');
define('APP_VERSION', '1.0.0');
define('APP_DEBUG', true); 

// seguridad
define('SECRET_KEY', 'tu_clave_secreta_unica_aqui'); 

// Conexión 
try {
    $conn = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", 
        DB_USER, 
        DB_PASS
    );
    
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch(PDOException $e) {
    
    if (APP_DEBUG) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    } else {
        die("Error al conectar con la base de datos. Por favor, intente más tarde.");
    }
}

// Iniciar sesión
session_start();

date_default_timezone_set('America/Lima'); 

// redireccionar
function redirect($url) {
    header("Location: " . $url);
    exit();
}

function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

// Verifica si el usuario está logueado (para admin)
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireAuth() {
    if (!isLoggedIn()) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        redirect('usuario-login.php');
    }
}

set_error_handler(function($errno, $errstr, $errfile, $errline) {
    if (APP_DEBUG) {
        error_log("Error [$errno]: $errstr en $errfile línea $errline");
    }
});

set_exception_handler(function($exception) {
    if (APP_DEBUG) {
        error_log("Excepción no capturada: " . $exception->getMessage());
    }
});