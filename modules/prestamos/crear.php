<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$error = '';

// Solo herramientas disponibles
$herramientas = $db->query("
    SELECT id, nombre, codigo FROM herramientas
    WHERE estado = 'disponible' AND activo = 1
    ORDER BY nombre ASC
")->fetchAll();

// Solo trabajadores activos
$trabajadores = $db->query("
    SELECT id, nombre, cedula FROM trabajadores
    WHERE activo = 1
    ORDER BY nombre ASC
")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $herramienta_id = (int)($_POST['herramienta_id'] ?? 0);
    $trabajador_id  = (int)($_POST['trabajador_id']  ?? 0);

    if (!$herramienta_id || !$trabajador_id) {
        $error = 'Debes seleccionar una herramienta y un trabajador.';
    } else {
        // Verificar que la herramienta sigue disponible al momento de guardar
        $stmt = $db->prepare("SELECT estado FROM herramientas WHERE id = ? AND activo = 1");
        $stmt->execute([$herramienta_id]);
        $h = $stmt->fetch();

        if (!$h || $h['estado'] !== 'disponible') {
            $error = 'La herramienta seleccionada ya no está disponible.';
        } else {
            try {
                $db->beginTransaction();

                // Re-verificar disponibilidad DENTRO de la transacción con lock
                $stmt = $db->prepare("
                    SELECT estado FROM herramientas
                    WHERE id = ? AND activo = 1
                    FOR UPDATE
                ");
                $stmt->execute([$herramienta_id]);
                $h_lock = $stmt->fetch();

                if (!$h_lock || $h_lock['estado'] !== 'disponible') {
                    $db->rollBack();
                    $error = 'La herramienta ya no está disponible. Actualiza la página.';
                } else {
                    $stmt = $db->prepare('
                        INSERT INTO prestamos (herramienta_id, trabajador_id, fecha_prestamo)
                        VALUES (?, ?, NOW())
                    ');
                    $stmt->execute([$herramienta_id, $trabajador_id]);

                    $stmt = $db->prepare("UPDATE herramientas SET estado = 'prestada' WHERE id = ?");
                    $stmt->execute([$herramienta_id]);

                    $db->commit();
                    header('Location: /sistema-herramientas/modules/prestamos/index.php?msg=prestamo_ok');
                    exit;
                }
            } catch (PDOException $e) {
                $db->rollBack();
                $error = 'Error al registrar el préstamo: ' . $e->getMessage();
            }
        }
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Registrar préstamo</h2>
    <p>Selecciona la herramienta y el trabajador solicitante.</p>
</div>

<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if (empty($herramientas)): ?>
    <div class="alert alert-error">No hay herramientas disponibles en este momento.</div>
<?php elseif (empty($trabajadores)): ?>
    <div class="alert alert-error">No hay trabajadores registrados. <a href="/sistema-herramientas/modules/trabajadores/crear.php">Registrar trabajador</a>.</div>
<?php else: ?>
<div class="section" style="max-width:520px;">
    <form method="POST" data-validate>
        <div class="form-group">
            <label for="herramienta_id">Herramienta *</label>
            <select id="herramienta_id" name="herramienta_id" required>
                <option value="">— Selecciona una herramienta —</option>
                <?php foreach ($herramientas as $h): ?>
                    <option value="<?= $h['id'] ?>"
                        <?= (int)($_POST['herramienta_id'] ?? 0) === (int)$h['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($h['nombre']) ?> (<?= htmlspecialchars($h['codigo']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="trabajador_id">Trabajador solicitante *</label>
            <select id="trabajador_id" name="trabajador_id" required>
                <option value="">— Selecciona un trabajador —</option>
                <?php foreach ($trabajadores as $t): ?>
                    <option value="<?= $t['id'] ?>"
                        <?= (int)($_POST['trabajador_id'] ?? 0) === (int)$t['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($t['nombre']) ?> — <?= htmlspecialchars($t['cedula']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="display:flex; gap:0.75rem;">
            <button type="submit" class="btn btn-primary">Confirmar préstamo</button>
            <a href="/sistema-herramientas/modules/prestamos/index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php endif; ?>

<?php require_once '../../includes/footer.php'; ?>