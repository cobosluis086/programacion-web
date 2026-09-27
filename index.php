<?php

// Variable que guarda el nombre de la página
$titulo = "ReciclaCDMX";

// Variable que guarda el mensaje principal
$mensaje = "Reciclar también es cuidar nuestra ciudad";

// Arreglo que guarda diferentes beneficios del reciclaje
// El arreglo tiene 4 elementos como pide la actividad
$beneficios = [
    "Reduce la cantidad de basura que generamos.",
    "Permite aprovechar nuevamente algunos materiales.",
    "Ayuda a disminuir la contaminación.",
    "Contribuye al cuidado del medio ambiente."
];

// Variable de tipo booleano (verdadero o falso)
// La utilizaremos más adelante en una condición
$mostrarMensaje = true;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración básica de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Mostramos con PHP el contenido de la variable $titulo -->
    <title><?php echo $titulo; ?></title>

    <!-- Conectamos nuestro archivo CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado de la página -->
    <header>

        <!-- PHP muestra el nombre guardado en la variable $titulo -->
        <h1><?php echo $titulo; ?></h1>

        <!-- Menú de navegación -->
        <nav>
            <a href="index.php">Inicio</a>
            <a href="centros.php">Centros de reciclaje</a>
            <a href="consejos.php">Consejos</a>
            <a href="materiales.php">Materiales</a>
        </nav>

    </header>


    <!-- Contenido principal -->
    <main>

    <!-- Sección principal de la página -->
    <section class="inicio">

    <!-- Parte izquierda -->
        <div class="inicio-texto">

        <h2><?php echo $mensaje; ?></h2>

        <p>
            ReciclaCDMX es un sitio creado para ayudar a las personas
            a conocer lugares donde pueden llevar diferentes tipos
            de residuos para su correcto reciclaje.
        </p>

        <a class="boton" href="centros.php">
            Consultar centros de reciclaje →
        </a>

        </div>

    <!-- Parte derecha: imagen -->
    <div class="inicio-imagen">

        <img src="img/reciclaje.png"
             alt="Contenedores para separar materiales reciclables">

    </div>

    </section>


        <!-- Segunda sección -->
        <section class="informacion">

            <h2>¿Por qué reciclar?</h2>

            <p>
                Reciclar ayuda a reducir la cantidad de basura,
                aprovechar nuevamente algunos materiales y cuidar
                el medio ambiente.
            </p>

            <?php

            // Utilizamos un if para comprobar si la variable es verdadera
            if ($mostrarMensaje) {

                // Si es verdadera, mostramos este mensaje
                echo "<p><strong>Recuerda:</strong> pequeñas acciones pueden generar grandes cambios.</p>";

            }

            ?>

        </section>


        <!-- Tercera sección -->
        <section class="informacion">

            <h2>Beneficios del reciclaje</h2>

            <p>
                Separar y reciclar nuestros residuos puede generar
                diferentes beneficios para nuestra ciudad.
            </p>

            <ul>

                <?php

                // foreach recorre todos los elementos del arreglo $beneficios
                foreach ($beneficios as $beneficio) {

                    // Por cada beneficio se crea un elemento de la lista
                    echo "<li>$beneficio</li>";

                }

                ?>

            </ul>

        </section>

    </main>


    <!-- Pie de página -->
    <footer>

        <p>ReciclaCDMX - Programación Web</p>

    </footer>

</body>

</html>