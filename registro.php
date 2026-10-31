<?php

require_once "includes/funciones.php";

require_once "includes/sesion.php";
protegerPagina();

$titulo = "Registro de material";

$formularioEnviado = false;

$errores = [];

$nombre = "";
$correo = "";
$material = "";
$cantidad = "";

if (isset($_POST["nombre"])) {

    $formularioEnviado = true;

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"] ?? "");
    $material = $_POST["material"] ?? "";
    $cantidad = trim($_POST["cantidad"] ?? "");

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

    if (!empty($nombre) && strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres";
    }

    if (!empty($correo) && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no tiene un formato válido";
    }

    $materiales = obtenerMateriales();

    if ($material !== "" && buscarMaterial($materiales, $material) === null) {
        $errores[] = "El material seleccionado no es válido";
    }

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

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($titulo); ?> - ReciclaCDMX</title>

    <link rel="stylesheet" href="CSS/estilos.css">

</head>

<body>

    <header>

        <h1>ReciclaCDMX</h1>

        <?php include "includes/nav.php"; ?>

    </header>


    <main>

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


        <?php if ($formularioEnviado && !empty($errores)) { ?>

            <section class="errores-formulario">

                <h2>Revisa la información</h2>

                <ul>

                    <?php
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


        <section class="informacion">

            <h2>Datos del material</h2>

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


        <section class="informacion">

            <h2>Importante</h2>

            <p>
                Antes de llevar tus materiales a un centro de reciclaje,
                procura que estén limpios, secos y separados.
            </p>

        </section>

    </main>


    <?php include "includes/footer.php"; ?>

</body>

</html>