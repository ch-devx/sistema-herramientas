<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$error = '';

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    header('Location: /sistema-herramientas/modules/prestamos/index.php');
    exit;
}

// Cargar préstamo activo
$stmt = $db->prepare('
    SELECT p.id, p.herramienta_id,
           h.nombre AS herramienta, h.codigo,
           t.nombre AS trabajador,
           p.fecha_prestamo
    FROM prestamos p
    JOIN herramientas h ON p.herramienta_id = h.id
    JOIN trabajadores t ON p.trabajador_id  = t.id
    WHERE p.id = ? AND p.cerrado = 0
');
$stmt->execute([$id]);
$prestamo = $stmt->fetch();

if (!$prestamo) {
    header('Location: /sistema-herramientas/modules/prestamos/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estado_devolucion = trim($_POST['estado_devolucion'] ?? '');
    $observaciones     = trim($_POST['observaciones']     ?? '');

    if (!$estado_devolucion) {
        $error = 'Debes indicar el estado de la herramienta al devolver.';
    } else {
        try {
            $db->beginTransaction();

            // Cerrar préstamo
            $stmt = $db->prepare('
                UPDATE prestamos
                SET cerrado = 1,
                    fecha_devolucion = NOW(),
                    estado_devolucion = ?,
                    observaciones_devolucion = ?
                WHERE id = ?
            ');
            $stmt->execute([$estado_devolucion, $observaciones ?: null, $id]);

            // Actualizar estado herramienta según condición de devolución
            $nuevo_estado = ($estado_devolucion === 'mantenimiento') ? 'mantenimiento' : 'disponible';
            $stmt = $db->prepare("UPDATE herramientas SET estado = ? WHERE id = ?");
            $stmt->execute([$nuevo_estado, $prestamo['herramienta_id']]);

            $db->commit();
            header('Location: /sistema-herramientas/modules/prestamos/index.php?msg=devolucion_ok');
            exit;
        } catch (PDOException $e) {
            $db->rollBack();
            $error = 'Error al registrar la devolución: ' . $e->getMessage();
        }
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Registrar devolución</h2>
    <p>Confirma el retorno de la herramienta al inventario.</p>
</div>

<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="section" style="max-width:520px;">

    <div style="background:var(--bg); border-radius:var(--radius); padding:1rem; margin-bottom:1.5rem;">
        <p><strong>Herramienta:</strong> <?= htmlspecialchars($prestamo['herramienta']) ?> (<?= htmlspecialchars($prestamo['codigo']) ?>)</p>
        <p style="margin-top:0.4rem;"><strong>Trabajador:</strong> <?= htmlspecialchars($prestamo['trabajador']) ?></p>
        <p style="margin-top:0.4rem;"><strong>Fecha de préstamo:</strong> <?= $prestamo['fecha_prestamo'] ?></p>
    </div>

    <form method="POST" data-validate>
        <div class="form-group">
            <label for="estado_devolucion">Estado al devolver *</label>
            <select id="estado_devolucion" name="estado_devolucion" required>
                <option value="">— Selecciona el estado —</option>
                <option value="bueno"         <?= ($_POST['estado_devolucion'] ?? '') === 'bueno'          ? 'selected' : '' ?>>Bueno</option>
                <option value="con_desgaste"  <?= ($_POST['estado_devolucion'] ?? '') === 'con_desgaste'   ? 'selected' : '' ?>>Con desgaste</option>
                <option value="mantenimiento" <?= ($_POST['estado_devolucion'] ?? '') === 'mantenimiento'  ? 'selected' : '' ?>>Requiere mantenimiento</option>
            </select>
            <small style="color:var(--text-light); font-size:0.82rem;">
                Si seleccionas "Requiere mantenimiento", la herramienta quedará en ese estado y no estará disponible para préstamos.
            </small>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" rows="3" maxlength="500"><?= htmlspecialchars($_POST['observaciones'] ?? '') ?></textarea>
        </div>
        <div style="display:flex; gap:0.75rem;">
            <button type="submit" class="btn btn-success">Confirmar devolución</button>
            <a href="/sistema-herramientas/modules/prestamos/index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>