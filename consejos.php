<?php

require_once __DIR__ . "/includes/sesion.php";
require_once "includes/funciones.php";


$titulo = "Consejos para reciclar";


$consejos = [

    [
        "titulo" => "Separa los residuos",
        "descripcion" => "Divide la basura en materiales como papel, plástico, vidrio y residuos orgánicos."
    ],

    [
        "titulo" => "Limpia los envases",
        "descripcion" => "Antes de reciclar botellas, latas o recipientes, procura que estén limpios y secos."
    ],

    [
        "titulo" => "Reutiliza",
        "descripcion" => "Algunos objetos pueden utilizarse nuevamente antes de ser desechados."
    ],

    [
        "titulo" => "Reduce el uso de plástico",
        "descripcion" => "Utiliza bolsas reutilizables y evita productos de plástico de un solo uso cuando sea posible."
    ]

];

$mostrarRecomendacion = true;

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
                Con pequeñas acciones podemos ayudar a reducir residuos
                y cuidar mejor el medio ambiente.
            </p>

            <p>
                Estos consejos pueden ayudarte a separar y manejar
                mejor los residuos que generas diariamente.
            </p>

        </section>


        <section class="consejos">

            <?php
            foreach ($consejos as $consejo) {
            ?>

                <div class="tarjeta">

                    <h3>
                        <?php echo escaparHTML($consejo["titulo"]); ?>
                    </h3>

                    <p>
                        <?php echo escaparHTML($consejo["descripcion"]); ?>
                    </p>

                </div>

            <?php
            }
            ?>

        </section>


        <section class="informacion">

            <h2>Una recomendación más</h2>

            <?php if ($mostrarRecomendacion) { ?>

                <p>
                    No necesitas cambiar todos tus hábitos de un día para otro.
                    Puedes comenzar separando papel, plástico, vidrio y aluminio.
                </p>

            <?php } else { ?>

                <p>
                    Consulta nuestros consejos para aprender más sobre reciclaje.
                </p>

            <?php } ?>

        </section>

    </main>


    <?php include "includes/footer.php"; ?>

</body>

</html>
