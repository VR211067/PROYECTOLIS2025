<?php
include_once 'Controller.php';
include_once 'Models/Usuario.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

class AdminDonantesController extends Controller {

    public function index() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }

        $usuarioModel = new Usuario();
        $donantes = $usuarioModel->getTodos();

        usort($donantes, function ($a, $b) {
            return strtotime($a['ultima_donacion']) <=> strtotime($b['ultima_donacion']);
        });

        $this->render('admin/donantes.php', ['donantes' => $donantes]);
    }

    public function aptos() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }

        $usuarioModel = new Usuario();
        $donantes = $usuarioModel->getDonantesAptos();

        usort($donantes, function ($a, $b) {
            return strtotime($a['ultima_donacion']) <=> strtotime($b['ultima_donacion']);
        });

        $this->render('admin/aptos.php', ['donantes' => $donantes]);
    }

    public function agregar() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioModel = new Usuario();

            // Sanitizar entradas
            $usuario = htmlspecialchars(trim($_POST['usuario']));
            $correo = htmlspecialchars(trim($_POST['correo']));
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $telefono = htmlspecialchars(trim($_POST['telefono']));
            $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));
            $direccion = htmlspecialchars(trim($_POST['direccion']));
            $tipo_sangre = htmlspecialchars(trim($_POST['tipo_sangre']));
            $sexo = htmlspecialchars(trim($_POST['sexo']));
            $ultima_donacion = htmlspecialchars(trim($_POST['ultima_donacion']));
            $ha_donado = !empty($ultima_donacion) ? 1 : 0;

            // Validación
            if (empty($usuario) || empty($correo) || empty($nombre)) {
                $this->render('admin/agregar.php', ['error' => 'Por favor completa los campos obligatorios.']);
                return;
            }

            // Verificar duplicados
            if ($usuarioModel->buscarPorCorreo($correo)) {
                $this->render('admin/agregar.php', ['error' => 'El correo ya está registrado.']);
                return;
            }
            if ($usuarioModel->buscarPorUsuario($usuario)) {
                $this->render('admin/agregar.php', ['error' => 'El nombre de usuario ya existe.']);
                return;
            }

            // Crear donante
            $passwordHash = password_hash('123456', PASSWORD_DEFAULT);
            $usuarioModel->createCompleto([
                'usuario' => $usuario,
                'correo' => $correo,
                'contraseña' => $passwordHash,
                'nombre' => $nombre,
                'telefono' => $telefono,
                'fecha_nacimiento' => $fecha_nacimiento,
                'direccion' => $direccion,
                'tipo_sangre' => $tipo_sangre,
                'sexo' => $sexo,
                'ultima_donacion' => $ultima_donacion,
                'ha_donado' => $ha_donado
            ]);

            header('Location: /Red_Donantes/AdminDonantes/index');
            exit();
        }

        $this->render('admin/agregar.php');
    }

    public function exportarAptosPDF() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }

        $usuarioModel = new Usuario();
        $donantes = $usuarioModel->getDonantesAptos();

        usort($donantes, function ($a, $b) {
            return strtotime($a['ultima_donacion']) <=> strtotime($b['ultima_donacion']);
        });

        ob_start();
        include 'Views/admin/pdf_aptos.php';
        $html = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("Donantes_Aptos_" . date('Ymd') . ".pdf", ["Attachment" => true]);
    }

    public function editar($id) {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }
    
        if (!isset($id) || !is_numeric($id)) {
            echo "<script>alert('ID de donante no proporcionado o inválido'); window.location.href='/Red_Donantes/AdminDonantes/index';</script>";
            exit();
        }
        
        
    
        $usuarioModel = new Usuario();
        $donante = $usuarioModel->findById($id);
    
        if (!$donante) {
            echo "Donante no encontrado";
            return;
        }
    
        // Si es POST, procesar actualización
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí procesarías la actualización
            // Ejemplo: recoger campos del formulario y actualizar
        }
    
        // Si no es POST, mostrar formulario
        $this->render('Admin/editar.php', ['donante' => $donante]);
    }
    
}
