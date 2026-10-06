<?php

// Variable que guarda el título de la página
$titulo = "Consejos para reciclar";

// Arreglo que guarda los consejos de reciclaje
// Cada consejo tiene un título y una descripción
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

// Variable para mostrar una recomendación adicional
$mostrarRecomendacion = true;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración básica de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $titulo; ?> - ReciclaCDMX</title>

    <!-- Conectamos el archivo CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado -->
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
                Con pequeñas acciones podemos ayudar a reducir residuos
                y cuidar mejor el medio ambiente.
            </p>

            <p>
                Estos consejos pueden ayudarte a separar y manejar
                mejor los residuos que generas diariamente.
            </p>

        </section>


        <!-- Segunda sección: tarjetas de consejos -->
        <section class="consejos">

            <?php

            // foreach recorre todos los consejos del arreglo
            foreach ($consejos as $consejo) {

            ?>

                <!-- Se crea una tarjeta por cada consejo -->
                <div class="tarjeta">

                    <!-- Mostramos el título del consejo -->
                    <h3>
                        <?php echo $consejo["titulo"]; ?>
                    </h3>

                    <!-- Mostramos la descripción -->
                    <p>
                        <?php echo $consejo["descripcion"]; ?>
                    </p>

                </div>

            <?php

            }

            ?>

        </section>


        <!-- Tercera sección -->
        <section class="informacion">

            <h2>Una recomendación más</h2>

            <?php

            // Utilizamos una condición para mostrar una recomendación
            if ($mostrarRecomendacion) {

                echo "<p>No necesitas cambiar todos tus hábitos de un día para otro. Puedes comenzar separando papel, plástico, vidrio y aluminio.</p>";

            } else {

                echo "<p>Consulta nuestros consejos para aprender más sobre reciclaje.</p>";

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