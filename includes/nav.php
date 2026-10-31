<?php

require_once __DIR__ . "/sesion.php";

?>

<!-- Menú de navegación de ReciclaCDMX -->
<nav>

    <a href="index.php">Inicio</a>

    <a href="centros.php">Centros de reciclaje</a>

    <a href="consejos.php">Consejos</a>

    <a href="materiales.php">Materiales</a>

    <?php if (sesionActiva()): ?>

        <a href="registro.php">Registro</a>

        <?php if (esAdministrador()): ?>

            <a href="admin.php">Administración</a>

        <?php endif; ?>

        <a href="logout.php">Cerrar sesión</a>

    <?php else: ?>

        <a href="login.php">Iniciar sesión</a>

    <?php endif; ?>

</nav>