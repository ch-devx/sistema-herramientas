<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';
require_once '../../includes/header.php';

$db = getDB();
$categorias = $db->query('SELECT * FROM categorias ORDER BY nombre ASC')->fetchAll();
?>

<div class="page-header">
    <h2>Reporte de Inventario</h2>
    <p>Genera un PDF con el estado actual del inventario de herramientas.</p>
</div>

<div class="section" style="max-width:520px;">
    <form method="GET" action="/sistema-herramientas/modules/reportes/inventario_pdf.php" target="_blank">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado">
                <option value="">Todos</option>
                <option value="disponible">Disponible</option>
                <option value="prestada">Prestada</option>
                <option value="mantenimiento">Mantenimiento</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria">
                <option value="">Todas</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>">
                        <?= htmlspecialchars($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
            Generar PDF
        </button>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>