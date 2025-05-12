<?php
abstract class Model {
    private $host = 'localhost:3306';
    private $user = 'root';
    private $password = '';
    private $db_name = 'red_donantes';
    protected $conn;

    protected function open_db() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function close_db() {
        $this->conn = null;
    }

    protected function get_query($query, $params = array()) {
        try {
            $rows = [];
            $this->open_db();
            $stm = $this->conn->prepare($query);
            $stm->execute($params);
            while ($rows[] = $stm->fetch(PDO::FETCH_ASSOC));
            $this->close_db();
            array_pop($rows);
            return $rows;
        } catch (Exception $e) {
            $this->close_db();
            return [];
        }
    }

public function set_query($query, $params = []) {
    $this->open_db();

    $stmt = $this->conn->prepare($query);
    if (!$stmt) {
        die("Error en prepare(): " . implode(" - ", $this->conn->errorInfo()));
    }

    if (!$stmt->execute($params)) {
        die("Error en execute(): " . implode(" - ", $stmt->errorInfo()));
    }

    $this->close_db();
    return true;
}


    protected function insert_query($query, $params = array()) {
        try {
            $this->open_db();
            if (!$this->conn) {
                throw new Exception('Conexión a la base de datos no establecida.');
            }

            $stm = $this->conn->prepare($query);
            $stm->execute($params);
            $id = $this->conn->lastInsertId();

            if (!$id) {
                throw new Exception('No se pudo obtener el ID insertado.');
            }

            $this->close_db();
            return $id;
        } catch (Exception $e) {
            echo "<strong>Error en insert_query:</strong> " . $e->getMessage();
            $this->close_db();
            return null;
        }
    }
}
