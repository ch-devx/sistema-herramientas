<?php
require_once 'includes/auth.php';
requireLogin();
require_once 'config/db.php';
require_once 'includes/header.php';

$db = getDB();

$total       = $db->query('SELECT COUNT(*) FROM herramientas WHERE activo = 1')->fetchColumn();
$disponibles = $db->query("SELECT COUNT(*) FROM herramientas WHERE estado = 'disponible' AND activo = 1")->fetchColumn();
$prestadas   = $db->query("SELECT COUNT(*) FROM herramientas WHERE estado = 'prestada' AND activo = 1")->fetchColumn();
$mantenimiento = $db->query("SELECT COUNT(*) FROM herramientas WHERE estado = 'mantenimiento' AND activo = 1")->fetchColumn();

$ultimos = $db->query('
    SELECT p.id, h.nombre AS herramienta, h.codigo,
           t.nombre AS trabajador, p.fecha_prestamo
    FROM prestamos p
    JOIN herramientas h ON p.herramienta_id = h.id
    JOIN trabajadores t ON p.trabajador_id  = t.id
    WHERE p.cerrado = 0
    ORDER BY p.fecha_prestamo DESC
    LIMIT 5
')->fetchAll();
?>

<div class="page-header">
    <h2>Dashboard</h2>
    <p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></p>
</div>

<!-- Contadores -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number"><?= $total ?></div>
        <div class="stat-label">Total herramientas</div>
    </div>
    <div class="stat-card stat-green">
        <div class="stat-number"><?= $disponibles ?></div>
        <div class="stat-label">Disponibles</div>
    </div>
    <div class="stat-card stat-yellow">
        <div class="stat-number"><?= $prestadas ?></div>
        <div class="stat-label">Prestadas</div>
    </div>
    <div class="stat-card stat-red">
        <div class="stat-number"><?= $mantenimiento ?></div>
        <div class="stat-label">En mantenimiento</div>
    </div>
</div>

<!-- Accesos rápidos -->
<div class="accesos-grid">
    <a href="/sistema-herramientas/modules/herramientas/crear.php" class="acceso-card">
        <div class="acceso-icon">🔧</div>
        <div class="acceso-label">Registrar herramienta</div>
    </a>
    <a href="/sistema-herramientas/modules/prestamos/crear.php" class="acceso-card">
        <div class="acceso-icon">📤</div>
        <div class="acceso-label">Registrar préstamo</div>
    </a>
    <a href="/sistema-herramientas/modules/prestamos/index.php" class="acceso-card">
        <div class="acceso-icon">📋</div>
        <div class="acceso-label">Ver préstamos activos</div>
    </a>
    <a href="/sistema-herramientas/modules/trabajadores/crear.php" class="acceso-card">
        <div class="acceso-icon">👤</div>
        <div class="acceso-label">Registrar trabajador</div>
    </a>
    <a href="/sistema-herramientas/modules/historial/por_herramienta.php" class="acceso-card">
        <div class="acceso-icon">📂</div>
        <div class="acceso-label">Historial por herramienta</div>
    </a>
    <a href="/sistema-herramientas/modules/historial/por_trabajador.php" class="acceso-card">
        <div class="acceso-icon">👥</div>
        <div class="acceso-label">Historial por trabajador</div>
    </a>
</div>

<!-- Préstamos activos recientes -->
<div class="section">
    <h3>Préstamos activos recientes</h3>
    <?php if (empty($ultimos)): ?>
        <p class="empty-msg">No hay préstamos activos actualmente.</p>
    <?php else: ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Herramienta</th>
                    <th>Código</th>
                    <th>Trabajador</th>
                    <th>Fecha préstamo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['herramienta']) ?></td>
                    <td><?= htmlspecialchars($p['codigo']) ?></td>
                    <td><?= htmlspecialchars($p['trabajador']) ?></td>
                    <td><?= $p['fecha_prestamo'] ?></td>
                    <td>
                        <a href="/sistema-herramientas/modules/prestamos/devolver.php?id=<?= $p['id'] ?>"
                        class="btn btn-success btn-sm">Devolver</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>