
<?php

// Incluimos las funciones de nuestro proyecto
require_once "includes/funciones.php";

// Variable que guarda el título de la página
$titulo = "Centros de reciclaje";

// Arreglo que contiene la información de los centros de reciclaje
// Cada centro tiene nombre, zona, materiales y disponibilidad
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

    <!-- Configuración básica de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($titulo); ?> - ReciclaCDMX</title>

    <!-- Archivo de estilos -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado -->
    <header>

        <h1>ReciclaCDMX</h1>

        <!-- Menú de navegación -->
        <?php include "includes/nav.php"; ?>

    </header>


    <main>

        <!-- Primera sección: introducción -->
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


        <!-- Segunda sección: centros disponibles -->
        <section class="centros">

            <?php
            // foreach recorre todos los centros guardados en el arreglo
            foreach ($centros as $centro) {
            ?>

                <!-- Se crea una tarjeta por cada centro -->
                <div class="tarjeta">

                    <!-- Mostramos el nombre del centro -->
                    <h3>
                        <?php echo escaparHTML($centro["nombre"]); ?>
                    </h3>

                    <!-- Mostramos la zona -->
                    <p>
                        <strong>Zona:</strong>
                        <?php echo escaparHTML($centro["zona"]); ?>
                    </p>

                    <!-- Mostramos los materiales -->
                    <p>
                        <strong>Materiales:</strong>
                        <?php echo escaparHTML($centro["materiales"]); ?>
                    </p>


                    <!-- Comprobamos si el centro está disponible -->
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


                    <!-- Enlace a la página con más información -->
                    <a class="boton" href="detalle.php?centro=<?php echo urlencode($centro["id"]); ?>">
                        Ver detalles
                    </a>

                </div>

            <?php
            }
            ?>

        </section>


        <!-- Tercera sección: recomendación -->
        <section class="informacion">

            <h2>Antes de llevar tus residuos</h2>

            <p>
                Procura llevar los materiales limpios, secos y separados.
                Esto ayuda a facilitar su clasificación y aprovechamiento
                dentro de los centros de reciclaje.
            </p>

        </section>

    </main>


    <!-- Pie de página -->
    <?php include "includes/footer.php"; ?>

</body>

</html>
