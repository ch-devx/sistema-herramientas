<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // Bloquear si tiene préstamos activos (herramienta aún fuera)
    $stmt = $db->prepare("
        SELECT COUNT(*) FROM prestamos
        WHERE trabajador_id = ? AND cerrado = 0
    ");
    $stmt->execute([$id]);
    if ($stmt->fetchColumn() > 0) {
        header('Location: /sistema-herramientas/modules/trabajadores/index.php?error=tiene_prestamo_activo');
        exit;
    }

    // Bloquear solo si tiene historial vinculado a herramientas que aún existen
    $stmt = $db->prepare("
        SELECT COUNT(*)
        FROM prestamos p
        JOIN herramientas h ON p.herramienta_id = h.id
        WHERE p.trabajador_id = ?
          AND p.cerrado = 1
          AND h.activo = 1
    ");
    $stmt->execute([$id]);
    if ($stmt->fetchColumn() > 0) {
        header('Location: /sistema-herramientas/modules/trabajadores/index.php?error=tiene_historial');
        exit;
    }

    // Sin trazabilidad relevante: eliminar préstamos huérfanos y luego al trabajador
    $stmt = $db->prepare('DELETE FROM prestamos WHERE trabajador_id = ?');
    $stmt->execute([$id]);

    $stmt = $db->prepare('DELETE FROM trabajadores WHERE id = ?');
    $stmt->execute([$id]);
}

header('Location: /sistema-herramientas/modules/trabajadores/index.php?msg=eliminado_ok');
exit;