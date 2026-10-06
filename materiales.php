<?php

// Variable que guarda el título de la página
$titulo = "Materiales reciclables";


// Arreglo que guarda los materiales reciclables
// Cada material tiene nombre, descripción y un símbolo visual
$materiales = [

    [
        "nombre" => "Papel y cartón",
        "descripcion" => "Periódicos, hojas, cajas y otros productos de papel pueden ser reciclados.",
        "simbolo" => "📦"
    ],

    [
        "nombre" => "Plástico",
        "descripcion" => "Botellas y algunos envases de plástico pueden separarse para reciclar.",
        "simbolo" => "🧴"
    ],

    [
        "nombre" => "Vidrio",
        "descripcion" => "Botellas y frascos de vidrio pueden reutilizarse o reciclarse.",
        "simbolo" => "🍾"
    ],

    [
        "nombre" => "Aluminio",
        "descripcion" => "Las latas de bebidas son uno de los materiales que pueden reciclarse.",
        "simbolo" => "🥫"
    ]

];


// Variables que utilizaremos para realizar la búsqueda
$busquedaRealizada = false;
$encontrado = false;
$resultado = [];


// Verificamos si el dato material fue enviado mediante GET
if (isset($_GET["material"])) {

    // Indicamos que el usuario realizó una búsqueda
    $busquedaRealizada = true;

    // Guardamos el material que escribió el usuario
    $materialBusqueda = trim($_GET["material"]);


    // Recorremos todos los materiales guardados en el arreglo
    foreach ($materiales as $material) {

        // Comparamos el nombre del material con la búsqueda
        if ($material["nombre"] == $materialBusqueda) {

            // Guardamos la información del material encontrado
            $resultado = $material;

            // Indicamos que encontramos una coincidencia
            $encontrado = true;
        }
    }
}


// Variable que utilizaremos en una condición
$separarMateriales = true;

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

        <!-- Primera sección -->
        <section class="titulo-pagina">

            <!-- Mostramos el título utilizando PHP -->
            <h2><?php echo $titulo; ?></h2>

            <p>
                Algunos materiales pueden separarse y llevarse
                a centros de reciclaje para ser aprovechados nuevamente.
            </p>

            <p>
                Conocer los diferentes tipos de materiales nos ayuda
                a realizar una mejor separación de nuestros residuos.
            </p>

        </section>


        <!-- Formulario para consultar un material -->
        <section class="informacion">

            <h2>Buscar material reciclable</h2>

            <p>
                Escribe el nombre de un material para consultar su información.
            </p>

            <!-- El formulario utiliza GET para enviar la búsqueda -->
            <form action="materiales.php" method="GET">

                <label for="material">Material:</label>

                <input
                    type="text"
                    id="material"
                    name="material"
                    placeholder="Ej. Plástico"
                >

                <button type="submit">
                    Buscar
                </button>

            </form>

        </section>


        <?php

        // Comprobamos si el usuario ya realizó una búsqueda
        if ($busquedaRealizada) {

            // Si encontramos el material mostramos su información
            if ($encontrado) {

        ?>

                <!-- Resultado de la búsqueda -->
                <section class="informacion">

                    <h2>Material encontrado</h2>

                    <!-- Mostramos el símbolo del material -->
                    <div class="icono-material">
                        <?php
                        echo htmlspecialchars(
                            $resultado["simbolo"],
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </div>

                    <!-- Mostramos el nombre del material -->
                    <h3>
                        <?php
                        echo htmlspecialchars(
                            $resultado["nombre"],
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </h3>

                    <!-- Mostramos la descripción del material -->
                    <p>
                        <?php
                        echo htmlspecialchars(
                            $resultado["descripcion"],
                            ENT_QUOTES,
                            "UTF-8"
                        );
                        ?>
                    </p>

                </section>

        <?php

            } else {

        ?>

                <!-- Mensaje cuando no encontramos coincidencias -->
                <section class="informacion">

                    <h2>Resultado</h2>

                    <p>
                        No se encontró el material.
                    </p>

                </section>

        <?php

            }
        }

        ?>


        <!-- Segunda sección: materiales -->
        <section class="materiales">

            <?php

            // foreach recorre todos los materiales del arreglo
            foreach ($materiales as $material) {

            ?>

                <!-- Creamos una tarjeta por cada material -->
                <div class="tarjeta">

                    <!-- Recurso visual del material -->
                    <div class="icono-material">
                        <?php echo $material["simbolo"]; ?>
                    </div>

                    <!-- Nombre del material -->
                    <h3>
                        <?php echo $material["nombre"]; ?>
                    </h3>

                    <!-- Descripción del material -->
                    <p>
                        <?php echo $material["descripcion"]; ?>
                    </p>

                </div>

            <?php

            }

            ?>

        </section>


        <!-- Tercera sección -->
        <section class="informacion">

            <h2>¿Cómo preparar los materiales?</h2>

            <?php

            // La condición determina qué mensaje se muestra
            if ($separarMateriales) {

                echo "<p>Antes de llevar los materiales a reciclar, procura separarlos, limpiarlos y mantenerlos secos.</p>";

            } else {

                echo "<p>Consulta las recomendaciones para preparar tus materiales.</p>";

            }

            ?>

        </section>

    </main>


    <!-- Pie de página -->
    <footer>

        <p>ReciclaCDMX - Programación Web</p>

    </footer>

</body>

</html>