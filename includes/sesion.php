<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuarios = [
    [
        "nombre" => "Usuario ReciclaCDMX",
        "correo" => "usuario@reciclacdmx.com",
        "password" => "Usuario123",
        "rol" => "usuario"
    ],
    [
        "nombre" => "Administrador",
        "correo" => "admin@reciclacdmx.com",
        "password" => "Admin123",
        "rol" => "administrador"
    ]
];

function validarUsuario($correo, $password) {
    global $usuarios;

    foreach ($usuarios as $usuario) {
        if ($usuario["correo"] === $correo &&
            $usuario["password"] === $password) {
            return $usuario;
        }
    }

    return false;
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