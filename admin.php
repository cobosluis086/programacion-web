<?php

require_once "includes/sesion.php";

protegerPagina();

if (!esAdministrador()) {
    header("Location: index.php");
    exit;
}

$titulo = "Panel de administración";
$nombre = $_SESSION["usuario"];
$correo = $_SESSION["correo"];
$rol = $_SESSION["rol"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($titulo); ?> - ReciclaCDMX</title>

    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body>

<header>

    <h1>ReciclaCDMX</h1>

    <?php include "includes/nav.php"; ?>

</header>

<main>

    <section class="informacion">

        <h2>Panel de administración</h2>

        <p>
            Bienvenido al apartado de administración de ReciclaCDMX.
        </p>

        <p>
            Esta sección está disponible únicamente para los
            usuarios que tienen el rol de administrador.
        </p>

    </section>

    <section class="informacion">

        <h2>Información del administrador</h2>

        <p>
            <strong>Nombre:</strong>
            <?php echo htmlspecialchars($nombre); ?>
        </p>

        <p>
            <strong>Correo:</strong>
            <?php echo htmlspecialchars($correo); ?>
        </p>

        <p>
            <strong>Rol:</strong>
            <?php echo htmlspecialchars($rol); ?>
        </p>

    </section>

    <section class="informacion">

        <h2>Funciones del administrador</h2>

        <p>
            El administrador podrá supervisar la información
            registrada en ReciclaCDMX.
        </p>

        <ul>
            <li>Administrar los centros de reciclaje.</li>
            <li>Revisar los materiales disponibles.</li>
            <li>Actualizar los consejos de reciclaje.</li>
            <li>Supervisar la información de los usuarios.</li>
        </ul>

        <p>
            Estas funciones se integrarán en futuras versiones
            del proyecto mediante una base de datos.
        </p>

    </section>

    <section class="informacion">

        <h2>Estado de la sesión</h2>

        <p>
            Tu sesión se encuentra activa.
        </p>

        <a class="boton" href="logout.php">
            Cerrar sesión
        </a>

    </section>

</main>

<?php include "includes/footer.php"; ?>

</body>
</html>