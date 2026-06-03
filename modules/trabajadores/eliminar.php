<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // Verificar préstamos activos
    $stmt = $db->prepare("
        SELECT COUNT(*) FROM prestamos
        WHERE trabajador_id = ? AND cerrado = 0
    ");
    $stmt->execute([$id]);
    if ($stmt->fetchColumn() > 0) {
        header('Location: /sistema-herramientas/modules/trabajadores/index.php?error=tiene_prestamo_activo');
        exit;
    }

    // Verificar historial de préstamos cerrados
    $stmt = $db->prepare("
        SELECT COUNT(*) FROM prestamos
        WHERE trabajador_id = ? AND cerrado = 1
    ");
    $stmt->execute([$id]);
    if ($stmt->fetchColumn() > 0) {
        header('Location: /sistema-herramientas/modules/trabajadores/index.php?error=tiene_historial');
        exit;
    }

    // Sin préstamos de ningún tipo: eliminación segura
    $stmt = $db->prepare('DELETE FROM trabajadores WHERE id = ?');
    $stmt->execute([$id]);
}

header('Location: /sistema-herramientas/modules/trabajadores/index.php?msg=eliminado_ok');
exit;