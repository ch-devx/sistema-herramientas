<?php
function requireLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['usuario_id'])) {
        header('Location: /sistema-herramientas/login.php');
        exit;
    }
}