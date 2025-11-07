<?php
require_once(__DIR__ . '/../../models/Usuario.php');

if (!isset($_GET['id'])) {
    echo "Falta el ID de usuario.";
    exit;
}

$id = (int) $_GET['id'];

$usuario = new Usuario();
$resultado = $usuario->eliminar($id);

// Después de eliminar, volvemos al listado
header("Location: listar-usuarios.php");
exit;
