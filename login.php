
<?php
require_once __DIR__ . "/includes/sesion.php";
require_once __DIR__ . "/config/conexion.php";

if (sesionActiva()) {
    header("Location: index.php");
    exit;
}

$correo = $_COOKIE["correo_recordado"] ?? "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recibir los datos de acceso
    $correo = strtolower(trim($_POST["correo"] ?? ""));
    $password = $_POST["password"] ?? "";

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || $password === "") {
        $error = "Ingresa un correo y contraseña válidos.";
    } else {
        try {

            // Buscar al usuario registrado en MySQL
            $consulta = $conexion->prepare(
                "SELECT id, nombre, correo, contrasena, rol
                 FROM usuarios
                 WHERE correo = ?"
            );

            $consulta->bind_param("s", $correo);
            $consulta->execute();

            $resultado = $consulta->get_result();
            $usuario = $resultado->fetch_assoc();
            $consulta->close();

            // Comprobar la contraseña protegida
            if ($usuario && password_verify($password, $usuario["contrasena"])) {

                session_regenerate_id(true);

                // Guardar los datos del usuario en la sesión
                $_SESSION["id_usuario"] = $usuario["id"];
                $_SESSION["usuario"] = $usuario["nombre"];
                $_SESSION["correo"] = $usuario["correo"];
                $_SESSION["rol"] = $usuario["rol"];

                // Mantener la cookie para recordar el correo
                $recordar = isset($_POST["recordar"]);

                setcookie("correo_recordado", $recordar ? $correo : "", [
                    "expires" => $recordar ? time() + 3600 : time() - 3600,
                    "path" => "/",
                    "secure" => !empty($_SERVER["HTTPS"]) &&
                                $_SERVER["HTTPS"] !== "off",
                    "httponly" => true,
                    "samesite" => "Lax"
                ]);

                header("Location: index.php");
                exit;

            } else {
                $error = "Correo o contraseña incorrectos.";
            }

        } catch (mysqli_sql_exception $e) {
            $error = "No se pudo verificar el acceso. Intenta nuevamente.";
        }
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

        <?php if ($error !== ""): ?>
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
                    <?php echo isset($_COOKIE["correo_recordado"])
                        ? "checked" : ""; ?>
                >
                <label for="recordar">Recordar mi correo</label>
            </div>

            <button type="submit" class="login-boton">
                Iniciar sesión
            </button>

        </form>

        <p class="enlace-cuenta">
            ¿No tienes una cuenta?
            <a href="crear_cuenta.php">Regístrate aquí</a>
        </p>

    </section>
</main>

<?php include "includes/footer.php"; ?>

</body>
</html>
