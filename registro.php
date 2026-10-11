
<?php

// Incluimos las funciones del proyecto
require_once "includes/funciones.php";

// Variable que guarda el título de la página
$titulo = "Registro de material";

// Variable de tipo bandera para saber si se envió el formulario
$formularioEnviado = false;

// Arreglo donde guardaremos los errores
$errores = [];

// Variables para guardar la información del formulario
$nombre = "";
$correo = "";
$material = "";
$cantidad = "";

// Verificamos si el formulario fue enviado mediante POST
if (isset($_POST["nombre"])) {

    $formularioEnviado = true;

    // Recuperamos los datos enviados desde el formulario
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"] ?? "");
    $material = $_POST["material"] ?? "";
    $cantidad = trim($_POST["cantidad"] ?? "");

    // Validamos que los campos no estén vacíos
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio";
    }

    if (empty($correo)) {
        $errores[] = "El correo es obligatorio";
    }

    if (empty($material)) {
        $errores[] = "Debes seleccionar un material";
    }

    if ($cantidad === "") {
        $errores[] = "La cantidad es obligatoria";
    }

    // Validamos que el nombre tenga al menos 3 caracteres
    if (!empty($nombre) && strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres";
    }

    // Validamos que el correo tenga un formato correcto
    if (!empty($correo) && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no tiene un formato válido";
    }

    // Validamos que el material sea una opción disponible
    $materiales = obtenerMateriales();

    if ($material !== "" && buscarMaterial($materiales, $material) === null) {
        $errores[] = "El material seleccionado no es válido";
    }

    // Validamos que la cantidad sea un número mayor a cero
    if ($cantidad !== "") {

        if (!is_numeric($cantidad)) {

            $errores[] = "La cantidad debe ser un valor numérico";

        } elseif ($cantidad <= 0) {

            $errores[] = "La cantidad debe ser mayor a 0";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración básica de la página -->
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($titulo); ?> - ReciclaCDMX</title>

    <!-- Conectamos nuestro archivo CSS -->
    <link rel="stylesheet" href="CSS/estilos.css">

</head>

<body>

    <!-- Encabezado de la página -->
    <header>

        <h1>ReciclaCDMX</h1>

        <!-- Incluimos el menú de navegación -->
        <?php include "includes/nav.php"; ?>

    </header>


    <!-- Contenido principal -->
    <main>

        <!-- Título de la página -->
        <section class="titulo-pagina">

            <h2><?php echo escaparHTML($titulo); ?></h2>

            <p>
                Registra un material que deseas llevar a reciclar.
            </p>

            <p>
                Esta función representa una futura opción para
                los usuarios registrados de ReciclaCDMX.
            </p>

        </section>


        <!-- Mostramos los errores arriba del formulario -->
        <?php if ($formularioEnviado && !empty($errores)) { ?>

            <section class="errores-formulario">

                <h2>Revisa la información</h2>

                <ul>

                    <?php
                    // Recorremos el arreglo de errores
                    foreach ($errores as $error) {
                    ?>

                        <li>
                            <?php echo escaparHTML($error); ?>
                        </li>

                    <?php
                    }
                    ?>

                </ul>

            </section>

        <?php } ?>


        <!-- Formulario de registro -->
        <section class="informacion">

            <h2>Datos del material</h2>

            <!-- El formulario utiliza POST para enviar la información -->
            <form action="registro.php" method="POST">

                <p>
                    <label for="nombre">
                        Nombre:
                    </label>
                </p>

                <p>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Ej. Luis"
                        value="<?php echo escaparHTML($nombre); ?>"
                    >
                </p>


                <p>
                    <label for="correo">
                        Correo:
                    </label>
                </p>

                <p>
                    <input
                        type="text"
                        id="correo"
                        name="correo"
                        placeholder="Ej. usuario@correo.com"
                        value="<?php echo escaparHTML($correo); ?>"
                    >
                </p>


                <p>
                    <label for="material">
                        Material:
                    </label>
                </p>

                <p>
                    <select id="material" name="material">

                        <option value="">
                            Selecciona una opción
                        </option>

                        <option value="Papel y cartón"
                            <?php if ($material === "Papel y cartón") { echo "selected"; } ?>>
                            Papel y cartón
                        </option>

                        <option value="Plástico"
                            <?php if ($material === "Plástico") { echo "selected"; } ?>>
                            Plástico
                        </option>

                        <option value="Vidrio"
                            <?php if ($material === "Vidrio") { echo "selected"; } ?>>
                            Vidrio
                        </option>

                        <option value="Aluminio"
                            <?php if ($material === "Aluminio") { echo "selected"; } ?>>
                            Aluminio
                        </option>

                    </select>
                </p>


                <p>
                    <label for="cantidad">
                        Cantidad aproximada en kilogramos:
                    </label>
                </p>

                <p>
                    <input
                        type="number"
                        id="cantidad"
                        name="cantidad"
                        step="0.1"
                        placeholder="Ej. 2.5"
                        value="<?php echo escaparHTML($cantidad); ?>"
                    >
                </p>


                <button type="submit">
                    Registrar material
                </button>

            </form>

        </section>


        <!-- Confirmación cuando no existen errores -->
        <?php if ($formularioEnviado && empty($errores)) { ?>

            <section class="informacion">

                <h2>Material registrado</h2>

                <p>
                    La información fue recibida correctamente.
                </p>


                <p>
                    <strong>Nombre:</strong>

                    <?php echo escaparHTML($nombre); ?>
                </p>


                <p>
                    <strong>Correo:</strong>

                    <?php echo escaparHTML($correo); ?>
                </p>


                <p>
                    <strong>Material:</strong>

                    <?php echo escaparHTML($material); ?>
                </p>


                <p>
                    <strong>Cantidad aproximada:</strong>

                    <?php echo escaparHTML($cantidad); ?> kg
                </p>

            </section>

        <?php } ?>


        <!-- Información adicional -->
        <section class="informacion">

            <h2>Importante</h2>

            <p>
                Antes de llevar tus materiales a un centro de reciclaje,
                procura que estén limpios, secos y separados.
            </p>

        </section>

    </main>


    <!-- Incluimos el pie de página -->
    <?php include "includes/footer.php"; ?>

</body>

</html>
