
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function sesionActiva() {
    return isset($_SESSION["usuario"]);
}

function obtenerRol() {
    return $_SESSION["rol"] ?? null;
}

function protegerPagina() {
    if (!sesionActiva()) {
        header("Location: login.php");
        exit;
    }
}

function esAdministrador() {
    return sesionActiva() && obtenerRol() === "administrador";
}
