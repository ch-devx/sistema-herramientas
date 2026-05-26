<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();

$trabajadores = $db->query("
    SELECT id, nombre, cedula FROM trabajadores
    ORDER BY nombre ASC
")->fetchAll();

$id_sel      = (int)($_GET['trabajador_id'] ?? 0);
$historial   = [];
$trabajador_sel = null;

if ($id_sel) {
    $stmt = $db->prepare('SELECT id, nombre, cedula, cargo FROM trabajadores WHERE id = ?');
    $stmt->execute([$id_sel]);
    $trabajador_sel = $stmt->fetch();

    if ($trabajador_sel) {
        $stmt = $db->prepare('
            SELECT p.id,
                   h.nombre AS herramienta, h.codigo,
                   p.fecha_prestamo, p.fecha_devolucion,
                   p.estado_devolucion, p.observaciones_devolucion,
                   p.cerrado
            FROM prestamos p
            JOIN herramientas h ON p.herramienta_id = h.id
            WHERE p.trabajador_id = ?
            ORDER BY p.fecha_prestamo DESC
        ');
        $stmt->execute([$id_sel]);
        $historial = $stmt->fetchAll();
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Historial por trabajador</h2>
    <p>Consulta todos los préstamos realizados por un trabajador específico.</p>
</div>

<!-- Selector -->
<div class="section" style="padding:1rem 1.5rem;">
    <form method="GET" style="display:flex; gap:1rem; align-items:flex-end; flex-wrap:wrap;">
        <div class="form-group" style="margin:0; min-width:280px;">
            <label>Selecciona un trabajador</label>
            <select name="trabajador_id" required>
                <option value="">— Selecciona —</option>
                <?php foreach ($trabajadores as $t): ?>
                    <option value="<?= $t['id'] ?>" <?= $id_sel === (int)$t['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($t['nombre']) ?> — <?= htmlspecialchars($t['cedula']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
        <?php if ($id_sel): ?>
            <a href="/sistema-herramientas/modules/historial/por_trabajador.php" class="btn btn-secondary">Limpiar</a>
        <?php endif; ?>
    </form>
</div>

<!-- Resultados -->
<?php if ($trabajador_sel): ?>
    <div class="section">
        <div style="margin-bottom:1rem;">
            <h3><?= htmlspecialchars($trabajador_sel['nombre']) ?></h3>
            <p style="color:var(--text-light); font-size:0.9rem;">
                Cédula: <?= htmlspecialchars($trabajador_sel['cedula']) ?>
                <?= $trabajador_sel['cargo'] ? ' — ' . htmlspecialchars($trabajador_sel['cargo']) : '' ?>
            </p>
        </div>

        <?php if (empty($historial)): ?>
            <p class="empty-msg">Este trabajador no tiene préstamos registrados.</p>
        <?php else: ?>
            <p style="color:var(--text-light); font-size:0.9rem; margin-bottom:1rem;">
                <?= count($historial) ?> préstamo(s) registrado(s)
            </p>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Herramienta</th>
                        <th>Código</th>
                        <th>Fecha préstamo</th>
                        <th>Fecha devolución</th>
                        <th>Estado devolución</th>
                        <th>Observaciones</th>
                        <th>Ciclo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $mov): ?>
                    <tr>
                        <td><?= htmlspecialchars($mov['herramienta']) ?></td>
                        <td><?= htmlspecialchars($mov['codigo']) ?></td>
                        <td><?= $mov['fecha_prestamo'] ?></td>
                        <td><?= $mov['fecha_devolucion'] ?? '—' ?></td>
                        <td><?= $mov['estado_devolucion'] ? ucfirst(str_replace('_', ' ', $mov['estado_devolucion'])) : '—' ?></td>
                        <td><?= htmlspecialchars($mov['observaciones_devolucion'] ?? '—') ?></td>
                        <td>
                            <?php if ($mov['cerrado']): ?>
                                <span class="badge badge-green">Cerrado</span>
                            <?php else: ?>
                                <span class="badge badge-yellow">Activo</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php require_once '../../includes/footer.php'; ?>