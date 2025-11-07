<?php
require_once(__DIR__ . '/../../../models/Usuario.php');

$usuarioModel = new Usuario();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $estado = (int) ($_POST['estado'] ?? 1);

    if ($id <= 0 || $email === '' || $password === '') {
        echo "Datos incompletos.";
        exit;
    }

    $ok = $usuarioModel->actualizar($id, $email, $password, $estado);

    if ($ok) {
        header("Location: listar-usuarios.php");
        exit;
    } else {
        echo "No se pudo actualizar el usuario.";
    }
} else {
    if (!isset($_GET['id'])) {
        echo "Falta el ID del usuario.";
        exit;
    }

    $id = (int) $_GET['id'];
    $datos = $usuarioModel->obtenerPorId($id);

    if (!$datos) {
        echo "Usuario no encontrado.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $datos['id_usuario']; ?>">

        <label for="email">Email:</label>
        <input
            type="email"
            name="email"
            id="email"
            value="<?php echo htmlspecialchars($datos['email']); ?>"
            required
        >
        <br><br>

        <label for="password">Contraseña:</label>
        <input
            type="text"
            name="password"
            id="password"
            value="<?php echo htmlspecialchars($datos['contraseña']); ?>"
            required
        >
        <br><br>

        <label for="estado">Estado:</label>
        <input
            type="number"
            name="estado"
            id="estado"
            value="<?php echo (int)$datos['id_estado']; ?>"
            required
        >
        <br><br>

        <button type="submit">Guardar cambios</button>
        <a href="listar-usuarios.php">Cancelar</a>
    </form>
</body>
</html>
