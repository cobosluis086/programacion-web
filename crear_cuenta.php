<?php
require_once "includes/sesion.php";
require_once __DIR__ . "/config/conexion.php";

$nombre = "";
$correo = "";
$errores = [];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recibir y validar los datos del formulario
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = strtolower(trim($_POST["correo"] ?? ""));
    $contrasena = $_POST["contrasena"] ?? "";

    if (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Ingresa un correo válido.";
    }

    if (strlen($contrasena) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    if (empty($errores)) {
        try {
            // Verificar que el correo no esté registrado
            $consulta = $conexion->prepare(
                "SELECT id FROM usuarios WHERE correo = ?"
            );

            $consulta->bind_param("s", $correo);
            $consulta->execute();
            $resultado = $consulta->get_result();

            if ($resultado->num_rows > 0) {
                $errores[] = "Este correo ya está registrado.";
            } else {

                // Proteger la contraseña y guardar el usuario
                $hash = password_hash(
                    $contrasena,
                    PASSWORD_DEFAULT
                );

                $rol = "usuario";

                $insertar = $conexion->prepare(
                    "INSERT INTO usuarios
                    (nombre, correo, contrasena, rol)
                    VALUES (?, ?, ?, ?)"
                );

                $insertar->bind_param(
                    "ssss",
                    $nombre,
                    $correo,
                    $hash,
                    $rol
                );

                $insertar->execute();

                $mensaje = "Usuario registrado correctamente.";

                $nombre = "";
                $correo = "";

                $insertar->close();
            }

            $consulta->close();

        } catch (mysqli_sql_exception $e) {
            $errores[] = "No se pudo registrar el usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - ReciclaCDMX</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body class="login-page">

<header>
    <h1>ReciclaCDMX</h1>
    <?php include "includes/nav.php"; ?>
</header>

<main class="login-contenedor">
    <section class="login-tarjeta">

        <h2>Crear cuenta</h2>

        <p class="login-descripcion">
            Regístrate para acceder a ReciclaCDMX.
        </p>

        <?php if ($mensaje !== ""): ?>
            <div class="mensaje-exito">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errores)): ?>
            <div class="login-error">
                <?php foreach ($errores as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="crear_cuenta.php">

            <div class="login-campo">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?php echo htmlspecialchars($nombre); ?>"
                    required
                >
            </div>

            <div class="login-campo">
                <label for="correo">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="<?php echo htmlspecialchars($correo); ?>"
                    required
                >
            </div>

            <div class="login-campo">
                <label for="contrasena">Contraseña</label>
                <input
                    type="password"
                    id="contrasena"
                    name="contrasena"
                    minlength="8"
                    required
                >
            </div>

            <button type="submit" class="login-boton">
                Crear cuenta
            </button>

        </form>

        <p class="enlace-cuenta">
            ¿Ya tienes una cuenta?
            <a href="login.php">Inicia sesión</a>
        </p>

    </section>
</main>

<?php include "includes/footer.php"; ?>

</body>
</html>
