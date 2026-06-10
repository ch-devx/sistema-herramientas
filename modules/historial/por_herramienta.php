<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';
require_once '../../includes/header.php';

$db = getDB();

$herramientas = $db->query("
    SELECT id, nombre, codigo FROM herramientas
    ORDER BY nombre ASC
")->fetchAll();

$id_sel  = (int)($_GET['herramienta_id'] ?? 0);
$historial = [];
$herramienta_sel = null;

if ($id_sel) {
    $stmt = $db->prepare('SELECT id, nombre, codigo, estado FROM herramientas WHERE id = ?');
    $stmt->execute([$id_sel]);
    $herramienta_sel = $stmt->fetch();

    if ($herramienta_sel) {
        $stmt = $db->prepare('
            SELECT p.id,
                   t.nombre AS trabajador, t.cedula,
                   p.fecha_prestamo, p.fecha_devolucion,
                   p.estado_devolucion, p.observaciones_devolucion,
                   p.cerrado
            FROM prestamos p
            JOIN trabajadores t ON p.trabajador_id = t.id
            WHERE p.herramienta_id = ?
            ORDER BY p.fecha_prestamo DESC
        ');
        $stmt->execute([$id_sel]);
        $historial = $stmt->fetchAll();
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Historial por herramienta</h2>
    <p>Consulta todos los movimientos de una herramienta específica.</p>
</div>

<!-- Selector -->
<div class="section" style="padding:1rem 1.5rem;">
    <form method="GET" style="display:flex; gap:1rem; align-items:flex-end; flex-wrap:wrap;">
        <div class="form-group" style="margin:0; min-width:280px;">
            <label>Selecciona una herramienta</label>
            <select name="herramienta_id" required>
                <option value="">— Selecciona —</option>
                <?php foreach ($herramientas as $h): ?>
                    <option value="<?= $h['id'] ?>" <?= $id_sel === (int)$h['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($h['nombre']) ?> (<?= htmlspecialchars($h['codigo']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
        <?php if ($id_sel): ?>
            <a href="/sistema-herramientas/modules/historial/por_herramienta.php" class="btn btn-secondary">Limpiar</a>
        <?php endif; ?>
    </form>
</div>

<!-- Resultados -->
<?php if ($herramienta_sel): ?>
    <div class="section">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem; flex-wrap:wrap; gap:0.5rem;">
            <h3><?= htmlspecialchars($herramienta_sel['nombre']) ?> — <?= htmlspecialchars($herramienta_sel['codigo']) ?></h3>
            <?php
                $badges = ['disponible' => 'badge-green', 'prestada' => 'badge-yellow', 'mantenimiento' => 'badge-red'];
                $clase  = $badges[$herramienta_sel['estado']] ?? 'badge-gray';
            ?>
            <span class="badge <?= $clase ?>"><?= ucfirst($herramienta_sel['estado']) ?></span>
        </div>

        <?php if (empty($historial)): ?>
            <p class="empty-msg">Esta herramienta no tiene movimientos registrados.</p>
        <?php else: ?>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem; flex-wrap:wrap; gap:0.5rem;">
                <p style="color:var(--text-light); font-size:0.9rem; margin:0;">
                    <?= count($historial) ?> movimiento(s) registrado(s)
                </p>
                <a href="/sistema-herramientas/modules/reportes/historial_herramienta_pdf.php?herramienta_id=<?= $id_sel ?>"
                   target="_blank" class="btn btn-secondary btn-sm">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                    Exportar PDF
                </a>
            </div>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Trabajador</th>
                        <th>Cédula</th>
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
                        <td><?= htmlspecialchars($mov['trabajador']) ?></td>
                        <td><?= htmlspecialchars($mov['cedula']) ?></td>
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