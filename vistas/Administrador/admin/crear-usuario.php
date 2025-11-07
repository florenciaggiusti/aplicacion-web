<?php
require_once(__DIR__ . '/../../../models/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        echo "Faltan datos. Por favor completá todos los campos.";
        exit;
    }

    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setContrasena($password);

    $ok = $usuario->guardar();

    if ($ok) {
        header("Location: listar-usuarios.php");
        exit;
    } else {
        echo "No se pudo guardar el usuario.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear usuario</title>
</head>
<body>
    <h1>Crear usuario</h1>

    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br><br>

        <button type="submit">Guardar</button>
        <a href="listar-usuarios.php">Volver al listado</a>
    </form>
</body>
</html>
