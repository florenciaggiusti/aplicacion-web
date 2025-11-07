<?php
require_once(__DIR__ . '/../../../models/Usuario.php');

$usuario = new Usuario();
$lista = $usuario->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            margin-bottom: 15px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1>Usuarios registrados</h1>

    <a href="crear-usuario.php">Crear nuevo usuario</a>
<br><br>

    <?php if (empty($lista)) : ?>
        <p>No hay usuarios cargados.</p>
    <?php else : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Fecha de registro</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($lista as $fila): ?>
                <tr>
    <td><?php echo $fila['id_usuario']; ?></td>
    <td><?php echo $fila['email']; ?></td>
    <td><?php echo $fila['fecha_registro']; ?></td>
    <td><?php echo $fila['id_estado']; ?></td>
    <td>
        <a href="eliminar-usuario.php?id=<?php echo $fila['id_usuario']; ?>" 
           onclick="return confirm('¿Seguro que querés eliminar este usuario?');">
            Eliminar
        </a>
    </td>
    <td>
    <a href="editar-usuario.php?id=<?php echo $fila['id_usuario']; ?>">Editar</a>
    |
    <a href="eliminar-usuario.php?id=<?php echo $fila['id_usuario']; ?>"
       onclick="return confirm('¿Seguro que querés eliminar este usuario?');">
        Eliminar
    </a>
</td>

</tr>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
