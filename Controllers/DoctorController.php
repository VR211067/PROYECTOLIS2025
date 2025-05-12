<?php
include_once 'Controller.php';
include_once 'Models/Usuario.php';
require_once 'Models/Model.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class DoctorController extends Controller {

   public function donantes() {
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['rol'] !== 'doctor') {
        header('Location: /Red_Donantes/AdminAuth/login');
        exit();
    }

    $usuarioModel = new Usuario();
    // Usa el nuevo método para obtener los donantes con los campos completos
    $donantes = $usuarioModel->getDonantesConCamposCompletos();

    $this->render('doctor/Donantes.php', ['donantes' => $donantes]);
}

    
    public function verFichaPDF($nombreArchivo) {
    $ruta = "Public/Storage/Fichas/" . basename($nombreArchivo); // evita rutas maliciosas

    if (file_exists($ruta)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $nombreArchivo . '"');
        header('Content-Length: ' . filesize($ruta));
        readfile($ruta);
        exit();
    } else {
        echo "<h3>La ficha PDF no existe.</h3>";
    }
}


public function logout() {
    session_start();  // Iniciar sesión si no ha sido iniciada

    // Destruir todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir al login de la administración (o donde se corresponda)
    header('Location: /Red_Donantes/AdminAuth/login');
    exit();
}




    public function entrevista($id) {
        session_start();
        if (!isset($_SESSION['admin']) || $_SESSION['rol'] !== 'doctor') {
            header('Location: /Red_Donantes/AdminAuth/login');
            exit();
        }

        $usuarioModel = new Usuario();
        $donante = $usuarioModel->findById($id);

        $this->render('doctor/form.php', ['donante' => $donante]);
    }
     private function limpiarNombreArchivo($nombre) {
        // Elimina acentos
        $nombre = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre);
        
        // Reemplaza espacios por guiones bajos
        $nombre = str_replace(' ', '_', $nombre);

        // Elimina cualquier carácter que no sea letra, número o guion bajo
        $nombre = preg_replace('/[^A-Za-z0-9_]/', '', $nombre);

        return $nombre;
    }

    public function guardarFichaEvaluacion() {
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['rol'] !== 'doctor') {
        header('Location: /Red_Donantes/AdminAuth/login');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $datos = $_POST;
        $datos['primera_vez'] = ($_POST['primera_vez'] ?? '') === 'si' ? 1 : 0;
        // Repite este proceso para las demás variables booleanas, igual que antes.

        // Cargar nombre del donante
        include_once 'Models/Usuario.php';
        $usuarioModel = new Usuario();
        $donante = $usuarioModel->findById($datos['usuario_id']);
        $nombre = $donante['nombre'];

        // Incluir la vista HTML como contenido para PDF
        ob_start();
        include 'Views/pdf/ficha_pdf.php';  // archivo que renderiza HTML del PDF
        $html = ob_get_clean();

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Guardar PDF en servidor
$fecha = $donante['ultima_donacion']; // Usar la que ya está en BD
$nombreSinTildes = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre);
$nombreSanitizado = $this->limpiarNombreArchivo($nombre);

$nombreArchivo = $nombreSanitizado . "_{$fecha}.pdf";

$ruta = "Public/Storage/Fichas/{$nombreArchivo}";
file_put_contents($ruta, $dompdf->output());

        // Redirigir o mostrar confirmación
        header("Location: /Red_Donantes/Doctor/donantes");
        exit();
    }
}

}
