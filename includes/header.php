<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Herramientas</title>
    <link rel="stylesheet" href="/sistema-herramientas/assets/css/style.css">
</head>
<body>
<div class="app-layout">

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sb-top">
        <button class="hamburger" id="hbg" onclick="toggleSidebar()" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>
        <span class="sb-brand">SistemaHerr.</span>
    </div>
    <nav class="sb-links">
        <a href="/sistema-herramientas/dashboard.php" class="sb-link <?= basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
            <span class="sb-link-txt">Inicio</span>
        </a>
        <a href="/sistema-herramientas/modules/herramientas/index.php" class="sb-link <?= strpos($_SERVER['PHP_SELF'], '/herramientas/') !== false ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            <span class="sb-link-txt">Herramientas</span>
        </a>
        <a href="/sistema-herramientas/modules/trabajadores/index.php" class="sb-link <?= strpos($_SERVER['PHP_SELF'], '/trabajadores/') !== false ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span class="sb-link-txt">Trabajadores</span>
        </a>
        <a href="/sistema-herramientas/modules/prestamos/index.php" class="sb-link <?= strpos($_SERVER['PHP_SELF'], '/prestamos/') !== false ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            <span class="sb-link-txt">Préstamos</span>
        </a>
        <a href="/sistema-herramientas/modules/historial/por_herramienta.php" class="sb-link <?= strpos($_SERVER['PHP_SELF'], '/historial/') !== false ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            <span class="sb-link-txt">Historial</span>
        </a>
        <a href="/sistema-herramientas/modules/categorias/index.php" class="sb-link <?= strpos($_SERVER['PHP_SELF'], '/categorias/') !== false ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h7"/></svg>
            <span class="sb-link-txt">Categorías</span>
        </a>
    </nav>
    <div class="sb-bottom">
        <a href="/sistema-herramientas/logout.php" class="sb-logout">
            <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span class="sb-logout-txt">Cerrar sesión</span>
        </a>
    </div>
</aside>

<!-- CONTENIDO -->
<div class="main-content" id="main-content">
    <div class="topbar">
        <div class="topbar-left">
            <?php
                $pages = [
                    'dashboard'    => ['section' => 'Sistema', 'page' => 'Inicio'],
                    'herramientas' => ['section' => 'Inventario', 'page' => 'Herramientas'],
                    'trabajadores' => ['section' => 'Personal', 'page' => 'Trabajadores'],
                    'prestamos'    => ['section' => 'Operaciones', 'page' => 'Préstamos'],
                    'historial'    => ['section' => 'Operaciones', 'page' => 'Historial'],
                    'categorias'   => ['section' => 'Inventario', 'page' => 'Categorías'],
                ];
                $self    = $_SERVER['PHP_SELF'];
                $section = 'Sistema';
                $page    = 'Inicio';
                foreach ($pages as $key => $val) {
                    if (strpos($self, $key) !== false) {
                        $section = $val['section'];
                        $page    = $val['page'];
                        break;
                    }
                }
            ?>
            <span class="topbar-section"><?= $section ?></span>
            <span class="topbar-sep">/</span>
            <span class="topbar-page"><?= $page ?></span>
        </div>
        <div class="topbar-user">
            <div class="topbar-avatar"><?= mb_substr($_SESSION['usuario_nombre'] ?? 'U', 0, 1) ?></div>
            <span class="topbar-username"><?= htmlspecialchars($_SESSION['usuario_nombre'] ?? '') ?></span>
        </div>
    </div>
    <main class="container">