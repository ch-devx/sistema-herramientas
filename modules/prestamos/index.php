<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';
require_once '../../includes/header.php';

$db = getDB();

$activos = $db->query('
    SELECT p.id, h.nombre AS herramienta, h.codigo,
           t.nombre AS trabajador, t.cedula,
           p.fecha_prestamo
    FROM prestamos p
    JOIN herramientas h ON p.herramienta_id = h.id
    JOIN trabajadores t ON p.trabajador_id  = t.id
    WHERE p.cerrado = 0
    ORDER BY p.fecha_prestamo DESC
')->fetchAll();
?>

<div class="page-header">
    <div class="top-bar">
        <div>
            <h2>Préstamos activos</h2>
            <p>Herramientas actualmente fuera del inventario.</p>
        </div>
        <a href="/sistema-herramientas/modules/prestamos/crear.php" class="btn btn-primary">
            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Registrar préstamo
        </a>
    </div>
</div>

<div class="buscador-wrap">
    <input type="text" id="buscador-tabla" placeholder="Buscar en la tabla...">
</div>
<div id="sin-resultados">No se encontraron resultados para tu búsqueda.</div>

<?php if (($_GET['msg'] ?? '') === 'prestamo_ok'): ?>
    <div class="alert alert-success">Préstamo registrado correctamente.</div>
<?php elseif (($_GET['msg'] ?? '') === 'devolucion_ok'): ?>
    <div class="alert alert-success">Devolución registrada. Herramienta disponible nuevamente.</div>
<?php endif; ?>

<div class="section">
    <?php if (empty($activos)): ?>
        <p class="empty-msg">No hay préstamos activos en este momento.</p>
    <?php else: ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Herramienta</th>
                    <th>Código</th>
                    <th>Trabajador</th>
                    <th>Cédula</th>
                    <th>Fecha préstamo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['herramienta']) ?></td>
                    <td><?= htmlspecialchars($p['codigo']) ?></td>
                    <td><?= htmlspecialchars($p['trabajador']) ?></td>
                    <td><?= htmlspecialchars($p['cedula']) ?></td>
                    <td><?= $p['fecha_prestamo'] ?></td>
                    <td>
                        <a href="/sistema-herramientas/modules/prestamos/devolver.php?id=<?= $p['id'] ?>"
                        class="btn btn-success btn-sm">Registrar devolución</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="/sistema-herramientas/assets/js/main.js"></script>
<?php require_once '../../includes/footer.php'; ?>