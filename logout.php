<?php
session_start();
session_destroy();
header('Location: /sistema-herramientas/login.php');
exit;