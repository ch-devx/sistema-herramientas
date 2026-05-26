<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

$db = getDB();
$error = '';

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    header('Location: /sistema-herramientas/modules/trabajadores/index.php');
    exit;
}

$stmt = $db->prepare('SELECT * FROM trabajadores WHERE id = ?');
$stmt->execute([$id]);
$trabajador = $stmt->fetch();

if (!$trabajador) {
    header('Location: /sistema-herramientas/modules/trabajadores/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $cedula = trim($_POST['cedula'] ?? '');
    $cargo  = trim($_POST['cargo'] ?? '');

    if (!$nombre || !$cedula) {
        $error = 'Nombre y cédula son obligatorios.';
    } else {
        try {
            $stmt = $db->prepare('UPDATE trabajadores SET nombre = ?, cedula = ?, cargo = ? WHERE id = ?');
            $stmt->execute([$nombre, $cedula, $cargo ?: null, $id]);
            header('Location: /sistema-herramientas/modules/trabajadores/index.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = 'Ya existe un trabajador con esa cédula.';
            } else {
                $error = 'Error al actualizar: ' . $e->getMessage();
            }
        }
    }
}

require_once '../../includes/header.php';
?>

<div class="page-header">
    <h2>Editar trabajador</h2>
    <p>Modifica los datos del trabajador.</p>
</div>

<?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="section" style="max-width: 500px;">
    <form method="POST" data-validate>
        <div class="form-group">
            <label for="nombre">Nombre completo *</label>
            <input type="text" id="nombre" name="nombre" maxlength="100" required
                   value="<?= htmlspecialchars($_POST['nombre'] ?? $trabajador['nombre']) ?>">
        </div>
        <div class="form-group">
            <label for="cedula">Cédula *</label>
            <input type="text" id="cedula" name="cedula" maxlength="20" required
                   value="<?= htmlspecialchars($_POST['cedula'] ?? $trabajador['cedula']) ?>">
        </div>
        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" name="cargo" maxlength="80"
                   value="<?= htmlspecialchars($_POST['cargo'] ?? $trabajador['cargo'] ?? '') ?>">
        </div>
        <div style="display:flex; gap:0.75rem;">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/sistema-herramientas/modules/trabajadores/index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>