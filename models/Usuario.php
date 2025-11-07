<?php
require_once(__DIR__ . '/../connection/Connection.php');

class Usuario {
    private $id_usuario;
    private $email;
    private $contrasena;      // mapea a columna `contraseña`
    private $fecha_registro;
    private $id_estado;

    public function __construct($email = "", $contrasena = "", $fecha_registro = "", $id_estado = 1) {
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->fecha_registro = $fecha_registro;
        $this->id_estado = $id_estado;
    }

    public function getIdUsuario() { return $this->id_usuario; }

    public function setEmail($email) { $this->email = $email; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }
    public function setFechaRegistro($fecha) { $this->fecha_registro = $fecha; }
    public function setIdEstado($id_estado) { $this->id_estado = $id_estado; }

    public function guardar() {
        $db = new Connection();
        $conn = $db->getConnection();

        $sql = "INSERT INTO usuario (email, `contraseña`, fecha_registro, id_estado)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            $conn->close();
            return false;
        }

        $stmt->bind_param("sssi", $this->email, $this->contrasena, $this->fecha_registro, $this->id_estado);
        $ok = $stmt->execute();

        if ($ok) {
            $this->id_usuario = $stmt->insert_id;
        }

        $stmt->close();
        $conn->close();
        return $ok;
    }

    public function listar() {
    $db = new Connection();
    $conn = $db->getConnection();

    $sql = "SELECT id_usuario, email, fecha_registro, id_estado FROM usuario ORDER BY id_usuario DESC";
    $res = $conn->query($sql);

    $usuarios = [];
    if ($res) {
        while ($fila = $res->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        $res->free();
    }

    $conn->close();
    return $usuarios;
}

}

