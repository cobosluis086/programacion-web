<?php

require_once __DIR__ . "/includes/sesion.php";
require_once "includes/funciones.php";

$titulo = "ReciclaCDMX";

$mensaje = "Reciclar también es cuidar nuestra ciudad";


$beneficios = [
    "Reduce la cantidad de basura que generamos.",
    "Permite aprovechar nuevamente algunos materiales.",
    "Ayuda a disminuir la contaminación.",
    "Contribuye al cuidado del medio ambiente."
];


$mostrarMensaje = true;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($titulo); ?></title>

    <link rel="stylesheet" href="CSS/estilos.css">

</head>

<body>

    <header>

        <h1><?php echo escaparHTML($titulo); ?></h1>

        <?php include "includes/nav.php"; ?>

    </header>


    <main>

        <section class="inicio">

            <div class="inicio-texto">

                <h2><?php echo escaparHTML($mensaje); ?></h2>

                <p>
                    ReciclaCDMX es un sitio creado para ayudar a las personas
                    a conocer lugares donde pueden llevar diferentes tipos
                    de residuos para su correcto reciclaje.
                </p>

                <a class="boton" href="centros.php">
                    Consultar centros de reciclaje →
                </a>

            </div>


            <div class="inicio-imagen">

                <img
                    src="img/reciclaje.png"
                    alt="Contenedores para separar materiales reciclables"
                >

            </div>

        </section>


        <section class="informacion">

            <h2>¿Por qué reciclar?</h2>

            <p>
                Reciclar ayuda a reducir la cantidad de basura,
                aprovechar nuevamente algunos materiales y cuidar
                el medio ambiente.
            </p>

            <?php
            if ($mostrarMensaje) {
            ?>

                <p>
                    <strong>Recuerda:</strong>
                    pequeñas acciones pueden generar grandes cambios.
                </p>

            <?php
            }
            ?>

        </section>


        <section class="informacion">

            <h2>Beneficios del reciclaje</h2>

            <p>
                Separar y reciclar nuestros residuos puede generar
                diferentes beneficios para nuestra ciudad.
            </p>

            <ul>

                <?php
                foreach ($beneficios as $beneficio) {
                ?>

                    <li>
                        <?php echo escaparHTML($beneficio); ?>
                    </li>

                <?php
                }
                ?>

            </ul>

        </section>

    </main>


    <!-- Pie de página -->
    <?php include "includes/footer.php"; ?>

</body>

</html>