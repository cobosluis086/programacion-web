<?php

// Variable que guarda el título de la página
$titulo = "Registro de material";

// Variable de tipo bandera para saber si se envió el formulario
$formularioEnviado = false;

// Arreglo donde guardaremos los errores
$errores = [];


// Verificamos si el formulario fue enviado mediante POST
if (isset($_POST["nombre"])) {

    $formularioEnviado = true;

    // Recuperamos los datos enviados desde el formulario
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $material = $_POST["material"];
    $cantidad = trim($_POST["cantidad"]);


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

    <title><?php echo $titulo; ?> - ReciclaCDMX</title>

    <!-- Conectamos nuestro archivo CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado de la página -->
    <header>

        <h1>ReciclaCDMX</h1>

        <!-- Menú de navegación -->
        <nav>
            <a href="index.php">Inicio</a>
            <a href="centros.php">Centros de reciclaje</a>
            <a href="consejos.php">Consejos</a>
            <a href="materiales.php">Materiales</a>
            <a href="registro.php">Registro</a>
        </nav>

    </header>


    <!-- Contenido principal -->
    <main>

        <!-- Título de la página -->
        <section class="titulo-pagina">

            <h2><?php echo $titulo; ?></h2>

            <p>
                Registra un material que deseas llevar a reciclar.
            </p>

            <p>
                Esta función representa una futura opción para
                los usuarios registrados de ReciclaCDMX.
            </p>

        </section>


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

                        <option value="Papel y cartón">
                            Papel y cartón
                        </option>

                        <option value="Plástico">
                            Plástico
                        </option>

                        <option value="Vidrio">
                            Vidrio
                        </option>

                        <option value="Aluminio">
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
                    >
                </p>


                <button type="submit">
                    Registrar material
                </button>

            </form>

        </section>


        <?php

        // Si el formulario fue enviado revisamos los resultados
        if ($formularioEnviado) {

            // Si existen errores los mostramos
            if (!empty($errores)) {

        ?>

                <!-- Sección donde mostramos los errores -->
                <section class="informacion">

                    <h2>Revisa la información</h2>

                    <ul>

                        <?php

                        // Recorremos el arreglo de errores
                        foreach ($errores as $error) {

                        ?>

                            <li>
                                <?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
                            </li>

                        <?php

                        }

                        ?>

                    </ul>

                </section>

        <?php

            } else {

        ?>

                <!-- Si no hay errores mostramos la confirmación -->
                <section class="informacion">

                    <h2>Material registrado</h2>

                    <p>
                        La información fue recibida correctamente.
                    </p>

                    <p>
                        <strong>Nombre:</strong>

                        <?php
                        echo htmlspecialchars(
                            $nombre,
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </p>


                    <p>
                        <strong>Correo:</strong>

                        <?php
                        echo htmlspecialchars(
                            $correo,
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </p>


                    <p>
                        <strong>Material:</strong>

                        <?php
                        echo htmlspecialchars(
                            $material,
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </p>


                    <p>
                        <strong>Cantidad aproximada:</strong>

                        <?php
                        echo htmlspecialchars(
                            $cantidad,
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>

                        kg
                    </p>

                </section>

        <?php

            }
        }

        ?>


        <!-- Información adicional -->
        <section class="informacion">

            <h2>Importante</h2>

            <p>
                Antes de llevar tus materiales a un centro de reciclaje,
                procura que estén limpios, secos y separados.
            </p>

        </section>

    </main>


    <!-- Pie de página -->
    <footer>

        <p>ReciclaCDMX - Programación Web</p>

    </footer>

</body>

</html>