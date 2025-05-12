<?php
include_once 'Controller.php';
include_once 'Models/Usuario.php';

class UsuariosController extends Controller {

    public function perfil() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }
    
        $usuarioModel = new Usuario();
        $user = $usuarioModel->findById($_SESSION['user_id']);
        $donaciones = $usuarioModel->obtenerDonacionesPorUsuario($_SESSION['user_id']);
    
        $this->render('Usuarios/perfil.php', [
            'user' => $user,
            'donaciones' => $donaciones
        ]);
    }
    
public function actualizarPerfil() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /Red_Donantes/Auth/login');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuarioModel = new Usuario();
        $foto = $_POST['foto_actual'] ?? null;

        // Validación y carga de imagen
        if (!empty($_FILES['foto_perfil']['name'])) {
            $tipoMime = mime_content_type($_FILES['foto_perfil']['tmp_name']);
            $permitidos = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($tipoMime, $permitidos)) {
                $nombreArchivo = uniqid() . "_" . basename($_FILES['foto_perfil']['name']);
                $rutaDestino = __DIR__ . '/../Public/Uploads/' . $nombreArchivo;

                if (!move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaDestino)) {
                    echo "<p>Error al mover el archivo</p>";
                    echo "<p>Código de error: " . $_FILES['foto_perfil']['error'] . "</p>";
                    exit();
                }

                $foto = 'Public/Uploads/' . $nombreArchivo;
            }
        }

        // Calcular edad
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $hoy = new DateTime();
        $nacimiento = new DateTime($fechaNacimiento);
        $edad = $hoy->diff($nacimiento)->y;

        // Construir el array de datos con la edad calculada
        $data = [
            'nombre' => $_POST['nombre'],
            'telefono' => $_POST['telefono'],
            'fecha_nacimiento' => $_POST['fecha_nacimiento'],
            'direccion' => $_POST['direccion'],
            'tipo_sangre' => $_POST['tipo_sangre'],
            'sexo' => $_POST['sexo'],
            'foto_perfil' => $foto,
            'peso' => $_POST['peso'],
            'dui' => $_POST['dui'],
            'edad' => $edad,  // Aquí estamos asignando la edad calculada
            'ocupacion' => $_POST['ocupacion'],
            'nombre_paciente' => null,
            'numero_afiliacion_paciente' => null
        ];

        // Actualizar el perfil
        $usuarioModel->updatePerfil($_SESSION['user_id'], $data);

        // Obtener datos actualizados
        $user = $usuarioModel->findById($_SESSION['user_id']);
        $donaciones = $usuarioModel->obtenerDonacionesPorUsuario($_SESSION['user_id']);

        // Renderizar vista
        $this->render('Usuarios/perfil.php', [
            'user' => $user,
            'donaciones' => $donaciones
        ]);
    }
}



    public function registrarDonacion() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /Red_Donantes/Auth/login');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['fecha_donacion'];
            $tipo_donacion = $_POST['tipo_donacion'];
            $nombre_paciente = $_POST['nombre_paciente'] ?? null;
            $numero_afiliacion_paciente = $_POST['numero_afiliacion_paciente'] ?? null;
    
            $usuarioModel = new Usuario();
            $usuarioModel->registrarDonacionCompleta($_SESSION['user_id'], [
                'fecha' => $fecha,
                'tipo_donacion' => $tipo_donacion,
                'nombre_paciente' => $tipo_donacion === 'paciente' ? $nombre_paciente : null,
                'numero_afiliacion_paciente' => $tipo_donacion === 'paciente' ? $numero_afiliacion_paciente : null
            ]);
    
            header('Location: /Red_Donantes/Usuarios/perfil');
            exit();
        }
    }
    
    
}
