<?php
include_once 'Model.php';

class Usuario extends Model {

    // Crear un nuevo usuario
    public function create($usuario, $correo, $password) {
        $query = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES (?, ?, ?)";
        $this->set_query($query, [$usuario, $correo, $password]);
    }

    // Obtener todos los usuarios que han realizado donaciones
    public function getTodosConFicha() {
        $query = "SELECT u.id, u.usuario, u.nombre, u.correo, u.tipo_sangre, u.ultima_donacion, u.sexo
                  FROM usuarios u
                  WHERE EXISTS (
                      SELECT 1 FROM donaciones d
                      WHERE d.usuario_id = u.id
                  )";
        return $this->get_query($query);
    }

    // Crear usuario completo (con todos los datos)
    public function createCompleto($data) {
        $query = "INSERT INTO usuarios 
            (usuario, correo, contraseña, nombre, telefono, fecha_nacimiento, direccion, tipo_sangre, sexo, ultima_donacion, ha_donado, foto_perfil, dui, edad, ocupacion, peso)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $params = [
            $data['usuario'] ?? null,
            $data['correo'] ?? null,
            $data['contraseña'] ?? null,
            $data['nombre'] ?? null,
            $data['telefono'] ?? null,
            $data['fecha_nacimiento'] ?? null,
            $data['direccion'] ?? null,
            $data['tipo_sangre'] ?? null,
            $data['sexo'] ?? null,
            $data['ultima_donacion'] ?? null,
            $data['ha_donado'] ?? 0,
            $data['foto_perfil'] ?? null,
            $data['dui'] ?? null,
            $data['edad'] ?? null,
            $data['ocupacion'] ?? null,
            $data['peso'] ?? null
           
        ];
    
        return $this->set_query($query, $params) > 0;
    }

    // Buscar usuario por nombre de usuario
    public function findByUsuario($usuario) {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $result = $this->get_query($query, [$usuario]);
        return $result ? $result[0] : null;
    }

    // Buscar usuario por ID
    public function findById($id) {
        $query = "SELECT * FROM usuarios WHERE id = ?";
        $result = $this->get_query($query, [$id]);
        return $result ? $result[0] : null;
    }

    // Actualizar perfil de usuario
    
   public function updatePerfil($id, $data) {
    $query = "UPDATE usuarios SET 
        nombre = ?, telefono = ?, fecha_nacimiento = ?, direccion = ?, tipo_sangre = ?, sexo = ?, 
        foto_perfil = ?, peso = ?, dui = ?, edad = ?, ocupacion = ? 
        WHERE id = ?";

    $params = [
        $data['nombre'],
        $data['telefono'],
        $data['fecha_nacimiento'],
        $data['direccion'],
        $data['tipo_sangre'],
        $data['sexo'],
        $data['foto_perfil'],
        $data['peso'],
        $data['dui'],
        $data['edad'],  // Aquí se pasa la edad calculada
        $data['ocupacion'],
        $id
    ];

    return $this->set_query($query, $params);
}



    // Registrar una nueva donación
    public function registrarDonacion($id, $fecha) {
        $query = "UPDATE usuarios SET ultima_donacion = ?, ha_donado = 1 WHERE id = ?";
        return $this->set_query($query, [$fecha, $id]);
    }

    // Obtener todos los usuarios
    public function getTodos() {
        $query = "SELECT id, usuario, nombre, correo, tipo_sangre, ultima_donacion, sexo FROM usuarios";
        return $this->get_query($query);
    }

    // Obtener donantes aptos para donar
   public function getDonantesAptos() {
    $query = "SELECT id, usuario, nombre, correo, telefono, tipo_sangre, ultima_donacion, sexo, edad, peso
              FROM usuarios
              WHERE 
                ha_donado = 1 AND
                edad >= 18 AND
                edad <= 65 AND  -- Agregado para limitar la edad a un máximo de 65 años
                peso >= 50 AND
                (
                    -- Donantes que han donado, con la última donación en el tiempo requerido
                    (sexo = 'M' AND ultima_donacion <= DATE_SUB(CURDATE(), INTERVAL 4 MONTH)) OR
                    (sexo = 'F' AND ultima_donacion <= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)) OR
                    -- O donantes que nunca han donado, siempre que sean mayores de 18 años y pesen más de 50 kg
                    ha_donado = 0
                )";
    return $this->get_query($query);
}



    // Buscar usuario por correo
    public function buscarPorCorreo($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = ?";
        $result = $this->get_query($query, [$correo]);
        return $result ? $result[0] : null;
    }

    // Buscar usuario por nombre de usuario
    public function buscarPorUsuario($usuario) {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $result = $this->get_query($query, [$usuario]);
        return $result ? $result[0] : null;
    }

    //para vista doctor
    public function getDonantesConCamposCompletos() {
    $query = "SELECT id, nombre, correo, tipo_sangre, ultima_donacion, sexo, edad, peso, ocupacion 
              FROM usuarios";
    return $this->get_query($query);
}


    // Actualizar información general del usuario
    public function update($id, $data) {
        $query = "UPDATE usuarios SET 
            usuario = ?, correo = ?, nombre = ?, telefono = ?, 
            fecha_nacimiento = ?, direccion = ?, tipo_sangre = ?, 
            sexo = ?, ultima_donacion = ?, ha_donado = ?, foto_perfil = ?, 
            dui = ?, edad = ?, ocupacion = ?, peso = ?, nombre_paciente = ?, numero_afiliacion_paciente = ? 
            WHERE id = ?";
    
        $params = [
            $data['usuario'] ?? null,
            $data['correo'] ?? null,
            $data['nombre'] ?? null,
            $data['telefono'] ?? null,
            $data['fecha_nacimiento'] ?? null,
            $data['direccion'] ?? null,
            $data['tipo_sangre'] ?? null,
            $data['sexo'] ?? null,
            $data['ultima_donacion'] ?? null,
            $data['ha_donado'] ?? null,
            $data['foto_perfil'] ?? null,
            $data['dui'] ?? null,
            $data['edad'] ?? null,
            $data['ocupacion'] ?? null,
              $data['peso'] ?? null,
            $data['nombre_paciente'] ?? null,
            $data['numero_afiliacion_paciente'] ?? null,
            $id
        ];
        return $this->set_query($query, $params);
    }

    // Eliminar usuario
    public function delete($id) {
        $query = "DELETE FROM usuarios WHERE id = ?";
        return $this->set_query($query, [$id]);
    }

    // Obtener donaciones de un usuario específico
    public function obtenerDonacionesPorUsuario($id) {
        $query = "SELECT * FROM donaciones WHERE usuario_id = ? ORDER BY fecha DESC";
        return $this->get_query($query, [$id]);
    }

    // Registrar una donación completa
    public function registrarDonacionCompleta($user_id, $datos) {
        $this->open_db(); // Asegúrate de abrir la conexión
    
        $stmt = $this->conn->prepare("INSERT INTO donaciones (usuario_id, fecha, tipo_donacion, nombre_paciente, numero_afiliacion_paciente) 
                                    VALUES (:usuario_id, :fecha, :tipo_donacion, :nombre_paciente, :numero_afiliacion_paciente)");
        $stmt->execute([
            ':usuario_id' => $user_id,
            ':fecha' => $datos['fecha'],
            ':tipo_donacion' => $datos['tipo_donacion'],
            ':nombre_paciente' => $datos['nombre_paciente'],
            ':numero_afiliacion_paciente' => $datos['numero_afiliacion_paciente']
        ]);
    
        // Actualizar la fecha de última donación en la tabla de usuarios
        $stmt2 = $this->conn->prepare("UPDATE usuarios SET ultima_donacion = :fecha, ha_donado = 1 WHERE id = :id");
        $stmt2->execute([
            ':fecha' => $datos['fecha'],
            ':id' => $user_id
        ]);
    
        $this->close_db(); // Cierra la conexión después de ejecutar
    }

    // Verificar si el usuario existe por nombre de usuario
    public function existsByUsuario($usuario) {
        $query = "SELECT id FROM usuarios WHERE usuario = ?";
        $this->open_db();
        $stm = $this->conn->prepare($query);
        $stm->execute([$usuario]);
        $result = $stm->fetch();
        $this->close_db();
        return $result ? true : false;
    }

    // Verificar si el usuario existe por correo
    public function existsByCorreo($correo) {
        $query = "SELECT id FROM usuarios WHERE correo = ?";
        $this->open_db();
        $stm = $this->conn->prepare($query);
        $stm->execute([$correo]);
        $result = $stm->fetch();
        $this->close_db();
        return $result ? true : false;
    }
}
?>
