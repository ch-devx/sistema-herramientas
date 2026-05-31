<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';
require_once '../../includes/header.php';

$db = getDB();

// Filtros
$filtro_estado    = $_GET['estado'] ?? '';
$filtro_categoria = (int)($_GET['categoria'] ?? 0);

$where  = ['h.activo = 1'];
$params = [];

if ($filtro_estado) {
    $where[]  = 'h.estado = ?';
    $params[] = $filtro_estado;
}
if ($filtro_categoria) {
    $where[]  = 'h.categoria_id = ?';
    $params[] = $filtro_categoria;
}

$sql = '
    SELECT h.*, c.nombre AS categoria_nombre
    FROM herramientas h
    LEFT JOIN categorias c ON h.categoria_id = c.id
    WHERE ' . implode(' AND ', $where) . '
    ORDER BY h.nombre ASC
';

$stmt = $db->prepare($sql);
$stmt->execute($params);
$herramientas = $stmt->fetchAll();

$categorias = $db->query('SELECT * FROM categorias ORDER BY nombre ASC')->fetchAll();
?>

<div class="page-header">
    <div class="top-bar">
        <div>
            <h2>Herramientas</h2>
            <p>Inventario completo de equipos y herramientas.</p>
        </div>
        <a href="/sistema-herramientas/modules/herramientas/crear.php" class="btn btn-primary">
            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nueva herramienta
        </a>
    </div>
</div>

<div class="buscador-wrap">
    <input type="text" id="buscador-tabla" placeholder="Buscar en la tabla...">
</div>
<div id="sin-resultados">No se encontraron resultados para tu búsqueda.</div>

<?php if (($_GET['error'] ?? '') === 'prestada'): ?>
    <div class="alert alert-error">No se puede dar de baja una herramienta que está actualmente prestada.</div>
<?php endif; ?>

<!-- Filtros -->
<div class="section" style="padding: 1rem 1.5rem;">
    <form method="GET" style="display:flex; gap:1rem; align-items:flex-end; flex-wrap:wrap;">
        <div class="form-group" style="margin:0; min-width:160px;">
            <label>Estado</label>
            <select name="estado">
                <option value="">Todos</option>
                <option value="disponible"    <?= $filtro_estado === 'disponible'    ? 'selected' : '' ?>>Disponible</option>
                <option value="prestada"      <?= $filtro_estado === 'prestada'      ? 'selected' : '' ?>>Prestada</option>
                <option value="mantenimiento" <?= $filtro_estado === 'mantenimiento' ? 'selected' : '' ?>>Mantenimiento</option>
            </select>
        </div>
        <div class="form-group" style="margin:0; min-width:180px;">
            <label>Categoría</label>
            <select name="categoria">
                <option value="">Todas</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $filtro_categoria === (int)$cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            Filtrar
        </button>
        <a href="/sistema-herramientas/modules/herramientas/index.php" class="btn btn-secondary">Limpiar</a>
    </form>
</div>

<!-- Tabla -->
<div class="section">
    <h3>Resultados: <?= count($herramientas) ?> herramienta(s)</h3>
    <?php if (empty($herramientas)): ?>
        <p class="empty-msg">No se encontraron herramientas con los filtros aplicados.</p>
    <?php else: ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($herramientas as $h): ?>
                <tr>
                    <td><?= htmlspecialchars($h['nombre']) ?></td>
                    <td><?= htmlspecialchars($h['codigo']) ?></td>
                    <td><?= htmlspecialchars($h['categoria_nombre'] ?? '—') ?></td>
                    <td><?php
                        $badges = [
                            'disponible'    => 'badge-green',
                            'prestada'      => 'badge-yellow',
                            'mantenimiento' => 'badge-red',
                        ];
                        $clase = $badges[$h['estado']] ?? 'badge-gray';
                        echo '<span class="badge ' . $clase . '">' . ucfirst($h['estado']) . '</span>';
                    ?></td>
                    <td><?= htmlspecialchars($h['observaciones'] ?? '—') ?></td>
                    <td class="actions">
                        <a href="/sistema-herramientas/modules/herramientas/editar.php?id=<?= $h['id'] ?>" class="btn btn-secondary btn-sm">Editar</a>
                        <a href="/sistema-herramientas/modules/herramientas/baja.php?id=<?= $h['id'] ?>" class="btn btn-danger btn-sm confirm-delete">Dar de baja</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="/sistema-herramientas/assets/js/main.js"></script>
<?php require_once '../../includes/footer.php'; ?>