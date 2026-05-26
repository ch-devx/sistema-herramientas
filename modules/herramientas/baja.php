<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // Verificar si tiene préstamo abierto (independiente del estado)
    $stmt = $db->prepare("
        SELECT COUNT(*) FROM prestamos
        WHERE herramienta_id = ? AND cerrado = 0
    ");
    $stmt->execute([$id]);
    $tiene_prestamo = $stmt->fetchColumn();

    if ($tiene_prestamo) {
        header('Location: /sistema-herramientas/modules/herramientas/index.php?error=prestada');
        exit;
    }

    $stmt = $db->prepare('UPDATE herramientas SET activo = 0 WHERE id = ?');
    $stmt->execute([$id]);
}

header('Location: /sistema-herramientas/modules/herramientas/index.php');
exit;