<?php

require_once __DIR__ . "/includes/sesion.php";
require_once "includes/funciones.php";


$titulo = "Centros de reciclaje";

$centros = [

    [
        "id" => "polanco",
        "nombre" => "Centro de Reciclaje Polanco",
        "zona" => "Miguel Hidalgo",
        "materiales" => "Papel, cartón, plástico y vidrio",
        "disponible" => true
    ],

    [
        "id" => "chapultepec",
        "nombre" => "Punto Verde Chapultepec",
        "zona" => "Miguel Hidalgo",
        "materiales" => "Plástico, aluminio y papel",
        "disponible" => true
    ],

    [
        "id" => "ecologico",
        "nombre" => "Centro Ecológico CDMX",
        "zona" => "Benito Juárez",
        "materiales" => "Cartón, vidrio y electrónicos",
        "disponible" => false
    ],

    [
        "id" => "coyoacan",
        "nombre" => "Punto de Reciclaje Coyoacán",
        "zona" => "Coyoacán",
        "materiales" => "Papel, plástico, vidrio y aluminio",
        "disponible" => true
    ]

];

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
                Consulta algunos centros donde puedes llevar
                diferentes materiales para reciclar.
            </p>

            <p>
                Antes de acudir a un centro, recuerda separar tus residuos
                y revisar qué tipos de materiales recibe.
            </p>

        </section>


        <section class="centros">

            <?php
            foreach ($centros as $centro) {
            ?>

                <div class="tarjeta">

                    <h3>
                        <?php echo escaparHTML($centro["nombre"]); ?>
                    </h3>

                    <p>
                        <strong>Zona:</strong>
                        <?php echo escaparHTML($centro["zona"]); ?>
                    </p>

                    <p>
                        <strong>Materiales:</strong>
                        <?php echo escaparHTML($centro["materiales"]); ?>
                    </p>


                    <?php if ($centro["disponible"]) { ?>

                        <p>
                            <strong>Estado:</strong>
                            Disponible
                        </p>

                    <?php } else { ?>

                        <p>
                            <strong>Estado:</strong>
                            Temporalmente no disponible
                        </p>

                    <?php } ?>


                    <a class="boton" href="detalle.php?centro=<?php echo urlencode($centro["id"]); ?>">
                        Ver detalles
                    </a>

                </div>

            <?php
            }
            ?>

        </section>


        <section class="informacion">

            <h2>Antes de llevar tus residuos</h2>

            <p>
                Procura llevar los materiales limpios, secos y separados.
                Esto ayuda a facilitar su clasificación y aprovechamiento
                dentro de los centros de reciclaje.
            </p>

        </section>

    </main>


    <?php include "includes/footer.php"; ?>

</body>

</html>
