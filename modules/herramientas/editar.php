<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$error = '';

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    header('Location: /sistema-herramientas/modules/herramientas/index.php');
    exit;
}

$stmt = $db->prepare('SELECT * FROM herramientas WHERE id = ? AND activo = 1');
$stmt->execute([$id]);
$h = $stmt->fetch();

if (!$h) {
    header('Location: /sistema-herramientas/modules/herramientas/index.php');
    exit;
}

$categorias = $db->query('SELECT * FROM categorias ORDER BY nombre ASC')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre        = trim($_POST['nombre'] ?? '');
    $codigo        = trim($_POST['codigo'] ?? '');
    $categoria_id  = (int)($_POST['categoria_id'] ?? 0);
    $estado        = $_POST['estado'] ?? '';
    $observaciones = trim($_POST['observaciones'] ?? '');

    $estados_validos = ['disponible', 'prestada', 'mantenimiento'];

    if (!$nombre || !$codigo) {
        $error = 'Nombre y código son obligatorios.';
    } elseif (!in_array($estado, $estados_validos)) {
        $error = 'Estado no válido.';
    } else {
        try {
            $stmt = $db->prepare('
                UPDATE herramientas
                SET nombre = ?, codigo = ?, categoria_id = ?, estado = ?, observaciones = ?
                WHERE id = ?
            ');
            $stmt->execute([
                $nombre,
                $codigo,
                $categoria_id ?: null,
                $estado,
                $observaciones ?: null,
                $id
            ]);
            header('Location: /sistema-herramientas/modules/herramientas/index.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = 'Ya existe una herramienta con ese código.';
            } else {
                $error = 'Error al actualizar: ' . $e->getMessage();
            }
        }
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Editar herramienta</h2>
    <p>Modifica los datos del equipo o herramienta.</p>
</div>

<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="section" style="max-width:520px;">
    <form method="POST" data-validate>
        <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input type="text" id="nombre" name="nombre" maxlength="100" required
                   value="<?= htmlspecialchars($_POST['nombre'] ?? $h['nombre']) ?>">
        </div>
        <div class="form-group">
            <label for="codigo">Código / Serial *</label>
            <input type="text" id="codigo" name="codigo" maxlength="50" required
                   value="<?= htmlspecialchars($_POST['codigo'] ?? $h['codigo']) ?>">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select id="categoria_id" name="categoria_id">
                <option value="">— Sin categoría —</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>"
                        <?= (int)($_POST['categoria_id'] ?? $h['categoria_id']) === (int)$cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- ESTADO: editable solo desde mantenimiento -->
        <div class="form-group">
            <label>Estado</label>
            <?php if ($h['estado'] === 'mantenimiento'): ?>
                <select id="estado" name="estado">
                    <option value="mantenimiento" <?= $h['estado'] === 'mantenimiento' ? 'selected' : '' ?>>Mantenimiento</option>
                    <option value="disponible">Disponible</option>
                </select>
                <small style="color:var(--text-light); font-size:0.82rem;">
                    Cambia a "Disponible" una vez completado el mantenimiento.
                </small>
            <?php else: ?>
                <?php
                    $badges = [
                        'disponible' => 'badge-green',
                        'prestada'   => 'badge-yellow',
                    ];
                    $clase = $badges[$h['estado']] ?? 'badge-gray';
                ?>
                <div style="margin-top:0.35rem;">
                    <span class="badge <?= $clase ?>"><?= ucfirst($h['estado']) ?></span>
                </div>
                <small style="color:var(--text-light); font-size:0.82rem;">
                    El estado se gestiona automáticamente desde el módulo de Préstamos.
                </small>
                <input type="hidden" name="estado" value="<?= htmlspecialchars($h['estado']) ?>">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" rows="3" maxlength="500"><?= htmlspecialchars($_POST['observaciones'] ?? $h['observaciones'] ?? '') ?></textarea>
        </div>
        <div style="display:flex; gap:0.75rem;">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/sistema-herramientas/modules/herramientas/index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>