<?php
include_once 'Controller.php';
include_once 'Models/Usuario.php';

class APIController extends Controller {

    public function todos() {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->getTodos();

        header('Content-Type: application/json');
        echo json_encode($usuarios);
    }

    public function uno($id) {
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->findById($id);

        header('Content-Type: application/json');
        if ($usuario) {
            echo json_encode($usuario);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Usuario no encontrado']);
        }
    }

    public function donantesAptos() {
        $usuarioModel = new Usuario();
        $aptos = $usuarioModel->getDonantesAptos();

        header('Content-Type: application/json');
        echo json_encode($aptos);
    }

    public function donante() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $usuarioModel = new Usuario();

            // Validación básica
            if (empty($data['usuario']) || empty($data['correo']) || empty($data['nombre'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Faltan campos obligatorios']);
                return;
            }

            // Campos predeterminados
            $data['contraseña'] = password_hash('123456', PASSWORD_DEFAULT);
            $data['ha_donado'] = !empty($data['ultima_donacion']) ? 1 : 0;

            // Campos opcionales si no existen
            $data['foto_perfil'] = $data['foto_perfil'] ?? null;
            $data['dui'] = $data['dui'] ?? null;
            $data['edad'] = $data['edad'] ?? null;
            $data['ocupacion'] = $data['ocupacion'] ?? null;
            $data['nombre_paciente'] = $data['nombre_paciente'] ?? null;
            $data['numero_afiliacion_paciente'] = $data['numero_afiliacion_paciente'] ?? null;

            $creado = $usuarioModel->createCompleto($data);

            if ($creado) {
                http_response_code(201);
                echo json_encode(['status' => 'Donante creado']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'No se pudo crear el donante. Verifica si el correo o usuario ya existen.']);
            }
        }
    }

    public function donantePut($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $data = json_decode(file_get_contents('php://input'), true);
            $usuarioModel = new Usuario();

            $donante = $usuarioModel->findById($id);
            if (!$donante) {
                http_response_code(404);
                echo json_encode(['error' => 'Donante no encontrado']);
                return;
            }

            // Campos calculados o por defecto
            $data['ha_donado'] = !empty($data['ultima_donacion']) ? 1 : 0;
            $data['foto_perfil'] = $data['foto_perfil'] ?? null;
            $data['dui'] = $data['dui'] ?? null;
            $data['edad'] = $data['edad'] ?? null;
            $data['ocupacion'] = $data['ocupacion'] ?? null;
            $data['nombre_paciente'] = $data['nombre_paciente'] ?? null;
            $data['numero_afiliacion_paciente'] = $data['numero_afiliacion_paciente'] ?? null;

            $usuarioModel->update($id, $data);

            echo json_encode(['status' => 'Donante actualizado']);
        }
    }

    public function donanteDelete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $usuarioModel = new Usuario();
            $donante = $usuarioModel->findById($id);

            if (!$donante) {
                http_response_code(404);
                echo json_encode(['error' => 'Donante no encontrado']);
                return;
            }

            $usuarioModel->delete($id);
            echo json_encode(['status' => 'Donante eliminado']);
        }
    }
}
