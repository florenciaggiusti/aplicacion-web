<?php
require_once(__DIR__ . '/../models/Usuario.php');

$u = new Usuario(
    "flor.prueba+" . rand(1000,9999) . "@example.com",
    "12345",
    date("Y-m-d"),
    1
);

echo $u->guardar()
    ? "Usuario guardado. ID: " . $u->getIdUsuario()
    : "Error guardando usuario";
