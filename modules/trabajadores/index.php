<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';
require_once '../../includes/header.php';

$db = getDB();

$trabajadores = $db->query('
    SELECT * FROM trabajadores ORDER BY nombre ASC
')->fetchAll();
?>

<div class="page-header">
    <div class="top-bar">
        <div>
            <h2>Trabajadores</h2>
            <p>Catálogo de personal registrado en el sistema.</p>
        </div>
        <a href="/sistema-herramientas/modules/trabajadores/crear.php" class="btn btn-primary">+ Nuevo trabajador</a>
    </div>
</div>

<div class="buscador-wrap">
    <input type="text" id="buscador-tabla" placeholder="Buscar en la tabla...">
</div>
<div id="sin-resultados">No se encontraron resultados para tu búsqueda.</div>

<?php if (($_GET['error'] ?? '') === 'tiene_prestamo_activo'): ?>
    <div class="alert alert-error">No se puede eliminar un trabajador con préstamos activos. Registra la devolución primero.</div>
<?php elseif (($_GET['error'] ?? '') === 'tiene_historial'): ?>
    <div class="alert alert-error">No se puede eliminar este trabajador porque tiene préstamos registrados en el historial. Sus registros deben conservarse para trazabilidad.</div>
<?php elseif (($_GET['msg'] ?? '') === 'eliminado_ok'): ?>
    <div class="alert alert-success">Trabajador eliminado correctamente.</div>
<?php endif; ?>

<div class="section">
    <?php if (empty($trabajadores)): ?>
        <p class="empty-msg">No hay trabajadores registrados aún.</p>
    <?php else: ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trabajadores as $t): ?>
                <tr>
                    <td><?= htmlspecialchars($t['nombre']) ?></td>
                    <td><?= htmlspecialchars($t['cedula']) ?></td>
                    <td><?= htmlspecialchars($t['cargo'] ?? '—') ?></td>
                    <td class="actions">
                        <a href="/sistema-herramientas/modules/trabajadores/editar.php?id=<?= $t['id'] ?>"
                           class="btn btn-secondary btn-sm">Editar</a>
                        <a href="/sistema-herramientas/modules/trabajadores/eliminar.php?id=<?= $t['id'] ?>"
                           class="btn btn-danger btn-sm confirm-delete">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="/sistema-herramientas/assets/js/main.js"></script>
<?php require_once '../../includes/footer.php'; ?>