<?php
require_once(__DIR__ . '/../models/Usuario.php');

$u = new Usuario();
$lista = $u->listar();

echo "<h2>Usuarios</h2>";
if (empty($lista)) {
    echo "<p>No hay usuarios.</p>";
} else {
    echo "<table border='1' cellpadding='6' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Fecha registro</th>
                <th>Estado</th>
            </tr>";
    foreach ($lista as $fila) {
        echo "<tr>
                <td>{$fila['id_usuario']}</td>
                <td>{$fila['email']}</td>
                <td>{$fila['fecha_registro']}</td>
                <td>{$fila['id_estado']}</td>
              </tr>";
    }
    echo "</table>";
}
