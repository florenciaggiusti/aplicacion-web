<?php
require_once('connection/Connection.php');

$conexion = new Connection();
$conn = $conexion->getConnection();

if ($conn) {
    echo "Conexión exitosa a la base de datos.";
}
?>
