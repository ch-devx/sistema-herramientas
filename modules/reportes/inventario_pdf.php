<?php
require_once '../../includes/auth.php';
requireLogin();
require_once '../../config/db.php';

// Autoload de Composer (mPDF)
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistema-herramientas/vendor/autoload.php';

$db = getDB();

// Filtros
$filtro_estado    = $_GET['estado']    ?? '';
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
    SELECT h.nombre, h.codigo, h.estado, h.observaciones,
           c.nombre AS categoria,
           t.nombre AS trabajador, t.cedula,
           p.fecha_prestamo
    FROM herramientas h
    LEFT JOIN categorias c ON h.categoria_id = c.id
    LEFT JOIN prestamos p ON p.herramienta_id = h.id AND p.cerrado = 0
    LEFT JOIN trabajadores t ON p.trabajador_id = t.id
    WHERE ' . implode(' AND ', $where) . '
    ORDER BY h.nombre ASC
';

$stmt = $db->prepare($sql);
$stmt->execute($params);
$herramientas = $stmt->fetchAll();

// Contadores
$total         = count($herramientas);
$disponibles   = count(array_filter($herramientas, fn($h) => $h['estado'] === 'disponible'));
$prestadas     = count(array_filter($herramientas, fn($h) => $h['estado'] === 'prestada'));
$mantenimiento = count(array_filter($herramientas, fn($h) => $h['estado'] === 'mantenimiento'));

// Etiqueta del filtro aplicado
$filtro_label = 'Todos los estados';
if ($filtro_estado) {
    $filtro_label = 'Estado: ' . ucfirst($filtro_estado);
}

$fecha = date('d/m/Y H:i');

// ─── HTML del PDF ────────────────────────────────────────────
$html = '
<style>
    body        { font-family: Arial, sans-serif; font-size: 11px; color: #1a1a2e; }
    h1          { font-size: 16px; margin: 0 0 2px; color: #1a6ed8; }
    .sub        { font-size: 10px; color: #666; margin-bottom: 12px; }
    .stats      { width: 100%; margin-bottom: 14px; border-collapse: collapse; }
    .stats td   { width: 25%; text-align: center; padding: 8px 4px;
                  border: 1px solid #e0e0e0; border-radius: 4px; }
    .stat-num   { font-size: 20px; font-weight: bold; color: #1a6ed8; }
    .stat-lbl   { font-size: 9px; color: #888; text-transform: uppercase; }
    .stat-green { color: #22c55e; }
    .stat-yel   { color: #f59e0b; }
    .stat-red   { color: #ef4444; }
    table.main  { width: 100%; border-collapse: collapse; margin-top: 4px; }
    table.main th { background: #1a6ed8; color: #fff; padding: 6px 8px;
                    font-size: 9px; text-transform: uppercase; text-align: left; }
    table.main td { padding: 6px 8px; border-bottom: 1px solid #eee; font-size: 10px; }
    table.main tr:nth-child(even) td { background: #f7f9ff; }
    .badge      { padding: 2px 8px; border-radius: 10px; font-size: 9px; font-weight: bold; }
    .b-green    { background: #d1fae5; color: #065f46; }
    .b-yellow   { background: #fef3c7; color: #92400e; }
    .b-red      { background: #fee2e2; color: #991b1b; }
    .footer     { margin-top: 16px; font-size: 9px; color: #aaa; text-align: center; }
</style>

<h1>Reporte de Inventario de Herramientas</h1>
<div class="sub">Generado el ' . $fecha . ' &nbsp;|&nbsp; Filtro: ' . htmlspecialchars($filtro_label) . '</div>

<table class="stats">
<tr>
    <td><div class="stat-num">' . $total . '</div><div class="stat-lbl">Total</div></td>
    <td><div class="stat-num stat-green">' . $disponibles . '</div><div class="stat-lbl">Disponibles</div></td>
    <td><div class="stat-num stat-yel">' . $prestadas . '</div><div class="stat-lbl">Prestadas</div></td>
    <td><div class="stat-num stat-red">' . $mantenimiento . '</div><div class="stat-lbl">Mantenimiento</div></td>
</tr>
</table>

<table class="main">
<thead>
    <tr>
        <th>Herramienta</th>
        <th>Código</th>
        <th>Categoría</th>
        <th>Estado</th>
        <th>Prestada a</th>
        <th>Desde</th>
    </tr>
</thead>
<tbody>';

foreach ($herramientas as $h) {
    $badge = match($h['estado']) {
        'disponible'    => '<span class="badge b-green">Disponible</span>',
        'prestada'      => '<span class="badge b-yellow">Prestada</span>',
        'mantenimiento' => '<span class="badge b-red">Mantenimiento</span>',
        default         => htmlspecialchars($h['estado']),
    };

    $trabajador  = $h['trabajador'] ? htmlspecialchars($h['trabajador']) . '<br><small>' . htmlspecialchars($h['cedula']) . '</small>' : '—';
    $fecha_prest = $h['fecha_prestamo'] ?? '—';

    $html .= '<tr>
        <td>' . htmlspecialchars($h['nombre']) . '</td>
        <td>' . htmlspecialchars($h['codigo']) . '</td>
        <td>' . htmlspecialchars($h['categoria'] ?? '—') . '</td>
        <td>' . $badge . '</td>
        <td>' . $trabajador . '</td>
        <td>' . $fecha_prest . '</td>
    </tr>';
}

$html .= '</tbody></table>
<div class="footer">Sistema de Seguimiento de Equipos y Herramientas &mdash; ' . date('Y') . '</div>';

// ─── Generar PDF ─────────────────────────────────────────────
$mpdf = new \Mpdf\Mpdf([
    'margin_top'    => 15,
    'margin_bottom' => 15,
    'margin_left'   => 15,
    'margin_right'  => 15,
]);

$mpdf->SetTitle('Reporte de Inventario');
$mpdf->WriteHTML($html);
$mpdf->Output('inventario_' . date('Ymd_Hi') . '.pdf', 'I'); // 'I' = mostrar en navegador