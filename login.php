<?php

require_once "includes/sesion.php";

if (sesionActiva()) {
    header("Location: index.php");
    exit;
}

$correo = $_COOKIE["correo_recordado"] ?? "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["password"] ?? "";

    $usuario = validarUsuario($correo, $password);

    if ($usuario !== false) {

        session_regenerate_id(true);

        $_SESSION["usuario"] = $usuario["nombre"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["rol"] = $usuario["rol"];

        // Guardar o eliminar la cookie del correo
        if (isset($_POST["recordar"])) {

            setcookie(
                "correo_recordado",
                $correo,
                time() + 3600,
                "/",
                "",
                false,
                true
            );

        } else {

            setcookie(
                "correo_recordado",
                "",
                time() - 3600,
                "/",
                "",
                false,
                true
            );
        }

        header("Location: index.php");
        exit;

    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - ReciclaCDMX</title>

    <link rel="stylesheet" href="CSS/estilos.css">
</head>

<body class="login-page">

    <header>
        <h1>ReciclaCDMX</h1>
        <?php include "includes/nav.php"; ?>
    </header>

    <main class="login-contenedor">

        <section class="login-tarjeta">

            <h2>Iniciar sesión</h2>

            <p class="login-descripcion">
                Ingresa tus datos para acceder a ReciclaCDMX.
            </p>

            <?php if ($error != ""): ?>
                <div class="login-error">
                    <?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php">

                <div class="login-campo">
                    <label for="correo">Correo electrónico</label>
                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        placeholder="usuario@correo.com"
                        value="<?php echo htmlspecialchars($correo, ENT_QUOTES, 'UTF-8'); ?>"
                        required
                    >
                </div>

                <div class="login-campo">
                    <label for="password">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="login-recordar">
                    <input
                        type="checkbox"
                        id="recordar"
                        name="recordar"
                        <?php echo isset($_COOKIE["correo_recordado"]) ? "checked" : ""; ?>
                    >
                    <label for="recordar">Recordar mi correo</label>
                </div>

                <button type="submit" class="login-boton">
                    Iniciar sesión
                </button>

            </form>

        </section>

    </main>

    <?php include "includes/footer.php"; ?>

</body>
</html>
