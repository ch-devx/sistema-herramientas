<?php
require_once 'includes/auth.php';
requireLogin();
require_once 'config/db.php';
require_once 'includes/header.php';

$db = getDB();

$total         = $db->query('SELECT COUNT(*) FROM herramientas WHERE activo = 1')->fetchColumn();
$disponibles   = $db->query("SELECT COUNT(*) FROM herramientas WHERE estado = 'disponible' AND activo = 1")->fetchColumn();
$prestadas     = $db->query("SELECT COUNT(*) FROM herramientas WHERE estado = 'prestada' AND activo = 1")->fetchColumn();
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
        <div class="acceso-icon">
            <svg viewBox="0 0 24 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
            </svg>
        </div>
        <div class="acceso-label">Registrar herramienta</div>
    </a>
    <a href="/sistema-herramientas/modules/prestamos/crear.php" class="acceso-card">
        <div class="acceso-icon">
            <svg viewBox="0 0 24 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"/><path d="M12 5l7 7-7 7"/>
            </svg>
        </div>
        <div class="acceso-label">Registrar préstamo</div>
    </a>
    <a href="/sistema-herramientas/modules/prestamos/index.php" class="acceso-card">
        <div class="acceso-icon">
            <svg viewBox="0 0 24 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
        </div>
        <div class="acceso-label">Ver préstamos activos</div>
    </a>
    <a href="/sistema-herramientas/modules/trabajadores/crear.php" class="acceso-card">
        <div class="acceso-icon">
            <svg viewBox="0 0 24 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>
            </svg>
        </div>
        <div class="acceso-label">Registrar trabajador</div>
    </a>
    <a href="/sistema-herramientas/modules/historial/por_herramienta.php" class="acceso-card">
        <div class="acceso-icon">
            <svg viewBox="0 0 50 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="2 12 6 12 9 3 15 21 18 12 22 12"/>
                <g transform="translate(26,0)">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </g>
            </svg>
        </div>
        <div class="acceso-label">Historial por herramienta</div>
    </a>
    <a href="/sistema-herramientas/modules/historial/por_trabajador.php" class="acceso-card">
        <div class="acceso-icon">
            <svg viewBox="0 0 50 24" style="height:1.5rem; width:auto;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="2 12 6 12 9 3 15 21 18 12 22 12"/>
                <g transform="translate(26,0)">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                </g>
            </svg>
        </div>
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