<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$msg = '';

// Crear
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $nombre = trim($_POST['nombre'] ?? '');
    if ($nombre === '') {
        $msg = ['tipo' => 'error', 'texto' => 'El nombre no puede estar vacío.'];
    } else {
        try {
            $stmt = $db->prepare('INSERT INTO categorias (nombre) VALUES (?)');
            $stmt->execute([$nombre]);
            $msg = ['tipo' => 'success', 'texto' => 'Categoría creada correctamente.'];
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $msg = ['tipo' => 'error', 'texto' => 'Ya existe una categoría con ese nombre.'];
            } else {
                $msg = ['tipo' => 'error', 'texto' => 'Error al crear: ' . $e->getMessage()];
            }
        }
    }
}

// Eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        try {
            $stmt = $db->prepare('DELETE FROM categorias WHERE id = ?');
            $stmt->execute([$id]);
            $msg = ['tipo' => 'success', 'texto' => 'Categoría eliminada.'];
        } catch (PDOException $e) {
            $msg = ['tipo' => 'error', 'texto' => 'No se puede eliminar: está en uso por alguna herramienta.'];
        }
    }
}

$categorias = $db->query('SELECT * FROM categorias ORDER BY nombre ASC')->fetchAll();

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Categorías</h2>
    <p>Gestiona las categorías de herramientas y equipos.</p>
</div>

<?php if ($msg): ?>
    <div class="alert alert-<?= $msg['tipo'] ?>"><?= htmlspecialchars($msg['texto']) ?></div>
<?php endif; ?>

<div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem; align-items: start;">

    <!-- Formulario -->
    <div class="section">
        <h3>Nueva categoría</h3>
        <form method="POST" data-validate>
            <input type="hidden" name="accion" value="crear">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="50" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Agregar categoría</button>
        </form>
    </div>

    <!-- Tabla -->
    <div class="section">
        <h3>Categorías registradas</h3>
        <?php if (empty($categorias)): ?>
            <p class="empty-msg">No hay categorías registradas aún.</p>
        <?php else: ?>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $cat): ?>
                    <tr>
                        <td><?= htmlspecialchars($cat['nombre']) ?></td>
                        <td>
                            <form method="POST" style="display:inline;" data-validate>
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm confirm-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>

<script src="/sistema-herramientas/assets/js/main.js"></script>
<?php require_once '../../includes/footer.php'; ?>