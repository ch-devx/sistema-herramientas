<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$error = '';

$categorias = $db->query('SELECT * FROM categorias ORDER BY nombre ASC')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre       = trim($_POST['nombre'] ?? '');
    $codigo       = trim($_POST['codigo'] ?? '');
    $categoria_id = (int)($_POST['categoria_id'] ?? 0);
    $estado       = $_POST['estado'] ?? 'disponible';
    $observaciones= trim($_POST['observaciones'] ?? '');

    $estados_validos = ['disponible', 'prestada', 'mantenimiento'];

    if (!$nombre || !$codigo) {
        $error = 'Nombre y código son obligatorios.';
    } elseif (!in_array($estado, $estados_validos)) {
        $error = 'Estado no válido.';
    } else {
        try {
            $stmt = $db->prepare('
                INSERT INTO herramientas (nombre, codigo, categoria_id, estado, observaciones)
                VALUES (?, ?, ?, ?, ?)
            ');
            $stmt->execute([
                $nombre,
                $codigo,
                $categoria_id ?: null,
                $estado,
                $observaciones ?: null
            ]);
            header('Location: /sistema-herramientas/modules/herramientas/index.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = 'Ya existe una herramienta con ese código.';
            } else {
                $error = 'Error al guardar: ' . $e->getMessage();
            }
        }
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Nueva herramienta</h2>
    <p>Registra un nuevo equipo o herramienta en el inventario.</p>
</div>

<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="section" style="max-width:520px;">
    <form method="POST" data-validate>
        <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input type="text" id="nombre" name="nombre" maxlength="100" required
                   value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="codigo">Código / Serial *</label>
            <input type="text" id="codigo" name="codigo" maxlength="50" required
                   value="<?= htmlspecialchars($_POST['codigo'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select id="categoria_id" name="categoria_id">
                <option value="">— Sin categoría —</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>"
                        <?= (int)($_POST['categoria_id'] ?? 0) === (int)$cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado inicial *</label>
            <select id="estado" name="estado">
                <option value="disponible"    <?= ($_POST['estado'] ?? 'disponible') === 'disponible'    ? 'selected' : '' ?>>Disponible</option>
                <option value="mantenimiento" <?= ($_POST['estado'] ?? '') === 'mantenimiento' ? 'selected' : '' ?>>Mantenimiento</option>
            </select>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" rows="3" maxlength="500"><?= htmlspecialchars($_POST['observaciones'] ?? '') ?></textarea>
        </div>
        <div style="display:flex; gap:0.75rem;">
            <button type="submit" class="btn btn-primary">Guardar herramienta</button>
            <a href="/sistema-herramientas/modules/herramientas/index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>