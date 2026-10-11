
<?php

// Incluimos las funciones de nuestro proyecto
require_once "includes/funciones.php";

// Arreglo que guarda la información de los centros
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


// Revisamos si recibimos el nombre de un centro desde la URL
if (isset($_GET["centro"])) {

    // Guardamos el centro recibido en una variable
    $seleccion = $_GET["centro"];

} else {

    // Si no recibimos ninguno, mostramos Polanco
    $seleccion = "polanco";

}


// Revisamos que el centro seleccionado exista
if (isset($centros[$seleccion])) {

    // Guardamos la información del centro seleccionado
    $centro = $centros[$seleccion];

} else {

    // Si el centro no existe, mostramos Polanco
    $centro = $centros["polanco"];

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración básica -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PHP coloca automáticamente el nombre del centro -->
    <title><?php echo escaparHTML($centro["nombre"]); ?> - ReciclaCDMX</title>

    <!-- Archivo CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado -->
    <header>

        <h1>ReciclaCDMX</h1>

        <!-- Menú de navegación -->
        <?php include "includes/nav.php"; ?>

    </header>


    <!-- Contenido principal -->
    <main>

        <!-- Primera sección -->
        <section class="detalle-centro">

            <!-- Mostramos el nombre del centro seleccionado -->
            <h2><?php echo escaparHTML($centro["nombre"]); ?></h2>

            <p>
                Este centro recibe diferentes materiales reciclables
                y busca facilitar su correcta separación y recolección.
            </p>

            <!-- Imagen del centro de reciclaje -->
            <img
                class="imagen-centro"
                src="img/centro-reciclaje.jpg"
                alt="Centro de reciclaje"
            >

            <h3>Información del centro</h3>

            <ul>

                <!-- Mostramos la información guardada en el arreglo -->
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


        <!-- Segunda sección -->
        <section class="informacion">

            <h2>Recomendaciones</h2>

            <p>
                Se recomienda llevar los materiales limpios, secos
                y separados antes de entregarlos.
            </p>

            <!-- Condición para mostrar un mensaje dependiendo de la zona -->
            <?php if ($centro["zona"] == "Miguel Hidalgo") { ?>

                <p>
                    Este centro se encuentra en la zona de Miguel Hidalgo.
                </p>

            <?php } else { ?>

                <p>
                    Consulta el horario antes de acudir al centro de reciclaje.
                </p>

            <?php } ?>

            <!-- Botón para regresar -->
            <a class="boton" href="centros.php">
                Regresar a centros
            </a>

        </section>

    </main>


    <!-- Pie de página -->
    <?php include "includes/footer.php"; ?>

</body>

</html>
