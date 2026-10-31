<?php

require_once __DIR__ . "/includes/sesion.php";
require_once "includes/funciones.php";


$centros = [

    "polanco" => [
        "nombre" => "Centro de Reciclaje Polanco",
        "zona" => "Miguel Hidalgo",
        "horario" => "Lunes a sábado de 9:00 a 17:00 hrs.",
        "materiales" => "Papel, cartón, plástico y vidrio",
        "servicio" => "Recepción de materiales reciclables"
    ],

    "chapultepec" => [
        "nombre" => "Punto Verde Chapultepec",
        "zona" => "Miguel Hidalgo",
        "horario" => "Lunes a viernes de 9:00 a 16:00 hrs.",
        "materiales" => "Plástico, aluminio y papel",
        "servicio" => "Recepción y separación de materiales"
    ],

    "ecologico" => [
        "nombre" => "Centro Ecológico CDMX",
        "zona" => "Benito Juárez",
        "horario" => "Lunes a sábado de 10:00 a 17:00 hrs.",
        "materiales" => "Cartón, vidrio y electrónicos",
        "servicio" => "Recepción de residuos reciclables"
    ],

    "coyoacan" => [
        "nombre" => "Punto de Reciclaje Coyoacán",
        "zona" => "Coyoacán",
        "horario" => "Martes a domingo de 9:00 a 15:00 hrs.",
        "materiales" => "Papel, plástico, vidrio y aluminio",
        "servicio" => "Recepción de materiales separados"
    ]

];


if (isset($_GET["centro"])) {

    $seleccion = $_GET["centro"];

} else {

    $seleccion = "polanco";

}


if (isset($centros[$seleccion])) {

    $centro = $centros[$seleccion];

} else {

    $centro = $centros["polanco"];

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($centro["nombre"]); ?> - ReciclaCDMX</title>

    <link rel="stylesheet" href="CSS/estilos.css">

</head>

<body>

    <header>

        <h1>ReciclaCDMX</h1>

        <?php include "includes/nav.php"; ?>

    </header>


    <main>

        <section class="detalle-centro">

            <h2><?php echo escaparHTML($centro["nombre"]); ?></h2>

            <p>
                Este centro recibe diferentes materiales reciclables
                y busca facilitar su correcta separación y recolección.
            </p>

            <img
                class="imagen-centro"
                src="img/reciclaje.png"
                alt="Imagen del centro de reciclaje"
            >

            <h3>Información del centro</h3>

            <ul>

                <li>
                    <strong>Zona:</strong>
                    <?php echo escaparHTML($centro["zona"]); ?>
                </li>

                <li>
                    <strong>Horario:</strong>
                    <?php echo escaparHTML($centro["horario"]); ?>
                </li>

                <li>
                    <strong>Materiales:</strong>
                    <?php echo escaparHTML($centro["materiales"]); ?>
                </li>

                <li>
                    <strong>Servicio:</strong>
                    <?php echo escaparHTML($centro["servicio"]); ?>
                </li>

            </ul>

        </section>


        <section class="informacion">

            <h2>Recomendaciones</h2>

            <p>
                Se recomienda llevar los materiales limpios, secos
                y separados antes de entregarlos.
            </p>

            <?php if ($centro["zona"] == "Miguel Hidalgo") { ?>

                <p>
                    Este centro se encuentra en la zona de Miguel Hidalgo.
                </p>

            <?php } else { ?>

                <p>
                    Consulta el horario antes de acudir al centro de reciclaje.
                </p>

            <?php } ?>

            <a class="boton" href="centros.php">
                Regresar a centros
            </a>

        </section>

    </main>


    <?php include "includes/footer.php"; ?>

</body>

</html>
