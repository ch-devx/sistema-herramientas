<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // Obtener estado actual
    $stmt = $db->prepare('SELECT activo FROM trabajadores WHERE id = ?');
    $stmt->execute([$id]);
    $t = $stmt->fetch();

    if ($t) {
        // Solo bloquear si se está intentando DESactivar (activo = 1 → 0)
        if ($t['activo'] == 1) {
            $stmt = $db->prepare("
                SELECT COUNT(*) FROM prestamos
                WHERE trabajador_id = ? AND cerrado = 0
            ");
            $stmt->execute([$id]);
            $tiene_prestamo = $stmt->fetchColumn();

            if ($tiene_prestamo) {
                header('Location: /sistema-herramientas/modules/trabajadores/index.php?error=tiene_prestamo');
                exit;
            }
        }

        $stmt = $db->prepare('UPDATE trabajadores SET activo = NOT activo WHERE id = ?');
        $stmt->execute([$id]);
    }
}

header('Location: /sistema-herramientas/modules/trabajadores/index.php');
exit;