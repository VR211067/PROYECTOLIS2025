<?php
include_once 'Controller.php';
include_once 'Models/Usuario.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/autoload.php';

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuarioModel = new Usuario();
            $user = $usuarioModel->findByUsuario($usuario);

            if ($user && $user['contraseña'] && password_verify($password, $user['contraseña'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['usuario'] = $user['usuario'];
                header('Location: /Red_Donantes/Usuarios/perfil');
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                $this->render('Auth/login.php', ['error' => $error]);
            }
        } else {
            $this->render('Auth/login.php');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $usuario = $_POST['usuario'];
                $correo = $_POST['correo'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                $usuarioModel = new Usuario();
    
                // Validaciones
                if ($usuarioModel->existsByUsuario($usuario)) {
                    throw new Exception("El nombre de usuario ya está registrado.");
                }
    
                if ($usuarioModel->existsByCorreo($correo)) {
                    throw new Exception("El correo electrónico ya está registrado.");
                }
    
                // Si pasa validaciones, registrar
                $usuarioModel->create($usuario, $correo, $password);
    
                header('Location: /Red_Donantes/Auth/login');
                exit();
            } catch (Exception $e) {
                $error = "Error: " . $e->getMessage();
                $this->render('Auth/register.php', ['error' => $error]);
            }
        } else {
            $this->render('Auth/register.php');
        }
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Red_Donantes/Auth/login');
        exit();
    }

    public function googleLogin() {
        $client = new Google_Client();
        $client->setClientId(GOOGLE_CLIENT_ID);
        $client->setClientSecret(GOOGLE_CLIENT_SECRET);
        $client->setRedirectUri(GOOGLE_REDIRECT_URI);
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        header("Location: " . $authUrl);
        exit();
    }

    public function googleCallback() {
        $client = new Google_Client();
        $client->setClientId(GOOGLE_CLIENT_ID);
        $client->setClientSecret(GOOGLE_CLIENT_SECRET);
        $client->setRedirectUri(GOOGLE_REDIRECT_URI);
    
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
            if (isset($token['error'])) {
                echo "Error al obtener el token de Google: " . htmlspecialchars($token['error_description']);
                exit();
            }
    
            $client->setAccessToken($token);
    
            $oauth = new Google_Service_Oauth2($client);
            $google_user = $oauth->userinfo->get();
    
            $usuarioModel = new Usuario();
            $user = $usuarioModel->buscarPorCorreo($google_user->email);
    
            if (!$user) {
                $creado = $usuarioModel->createCompleto([
                    'usuario' => $google_user->givenName ?? $google_user->name,
                    'correo' => $google_user->email,
                    'contraseña' => null,
                    'nombre' => $google_user->name,
                    'telefono' => null,
                    'fecha_nacimiento' => null,
                    'direccion' => null,
                    'tipo_sangre' => null,
                    'sexo' => null,
                    'ultima_donacion' => null,
                    'ha_donado' => 0,
                    'foto_perfil' => $google_user->picture ?? null
                ]);
    
                if (!$creado) {
                    echo "Error al registrar el usuario con Google.";
                    exit();
                }
    
                $user = $usuarioModel->buscarPorCorreo($google_user->email);
            }
    
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
    
            header('Location: /Red_Donantes/Usuarios/perfil');
            exit();
        } else {
            echo "Error: No se recibió el código de autenticación de Google.";
        }
    }
    
    
}
