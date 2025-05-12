<?php
include_once 'Controller.php';
include_once 'Models/Admin.php';

class AdminAuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $adminModel = new Admin();
            $admin = $adminModel->verifyCredentials($usuario, $password);

            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin['usuario'];
                $_SESSION['rol'] = $admin['rol'];

                if ($admin['rol'] === 'administrador') {
                    header('Location: /Red_Donantes/AdminDonantes/index');
                } elseif ($admin['rol'] === 'doctor') {
                    header('Location: /Red_Donantes/Doctor/donantes');
                }
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                $this->render('admin/admin_login.php', ['error' => $error]);
            }
        } else {
            $this->render('admin/admin_login.php');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $rol = $_POST['rol'] ?? 'administrador'; // valor por defecto

            if ($password !== $confirm_password) {
                $error = "Las contraseñas no coinciden.";
                $this->render('admin/admin_register.php', ['error' => $error]);
                return;
            }

            $adminModel = new Admin();

            if ($adminModel->exists($usuario)) {
                $error = "El usuario ya existe.";
                $this->render('admin/admin_register.php', ['error' => $error]);
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $result = $adminModel->register($usuario, $hashedPassword, $rol);

            if ($result) {
                $success = "Registro exitoso. Ahora puedes iniciar sesión.";
                $this->render('admin/admin_register.php', ['success' => $success]);
            } else {
                $error = "Error al registrar. Intenta nuevamente.";
                $this->render('admin/admin_register.php', ['error' => $error]);
            }
        } else {
            $this->render('admin/admin_register.php');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Red_Donantes/AdminAuth/login');
        exit();
    }
}

