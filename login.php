<?php
session_start();
if (!empty($_SESSION['usuario_id'])) {
    header('Location: /sistema-herramientas/dashboard.php');
    exit;
}
require_once 'config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario && $password) {
        $db = getDB();
        $stmt = $db->prepare('SELECT id, nombre, password_hash FROM usuarios WHERE usuario = ?');
        $stmt->execute([$usuario]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            header('Location: /sistema-herramientas/dashboard.php');
            exit;
        } else {
            $error = 'Usuario o contraseña incorrectos.';
        }
    } else {
        $error = 'Completa todos los campos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="/sistema-herramientas/assets/css/style.css">
</head>
<body class="login-body">
<div class="login-card">
    <div class="login-icon">⚙️</div>
    <h1>Sistema de Herramientas</h1>
    <p class="login-sub">Ingresa tus credenciales para continuar</p>
    <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" data-validate>
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </form>
</div>
</body>
</html>