<?php
include_once 'Model.php';

class Admin extends Model {

    public function __construct() {
        $this->open_db();
    }

    public function findByUsuario($usuario) {
        $query = "SELECT * FROM admin WHERE usuario = :usuario";
        $params = ['usuario' => $usuario];
        return $this->get_query($query, $params);
    }

    public function create($usuario, $password, $rol) {
        $query = "INSERT INTO admin (usuario, password, rol) VALUES (:usuario, :password, :rol)";
        $params = [
            'usuario' => $usuario,
            'password' => $password,
            'rol' => $rol
        ];
        return $this->insert_query($query, $params);
    }

    public function verifyCredentials($usuario, $password) {
        $admin = $this->findByUsuario($usuario);
        if ($admin && password_verify($password, $admin[0]['password'])) {
            return $admin[0]; // También incluye el rol
        }
        return null;
    }

    public function exists($usuario) {
        $admin = $this->findByUsuario($usuario);
        return !empty($admin);
    }

    public function register($usuario, $password, $rol) {
        $id = $this->create($usuario, $password, $rol);
        return $id !== null && $id !== false && $id > 0;
    }
}
