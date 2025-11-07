<?php
require_once(__DIR__ . '/../models/Usuario.php');

$usuario = new Usuario();

$id = 2; // Cambiá este número por un ID que exista en tu base de datos
$nuevoEmail = "florencia@example.com";
$nuevaContrasena = "12345";
$nuevoEstado = 1;

$usuario->actualizar($id, $nuevoEmail, $nuevaContrasena, $nuevoEstado);
?>
