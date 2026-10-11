
<?php

// Incluimos las funciones de nuestro proyecto
require_once "includes/funciones.php";

// Título de la página
$titulo = "Materiales reciclables";

// Obtenemos los materiales utilizando una función
$materiales = obtenerMateriales();

// Variables para controlar la búsqueda
$busquedaRealizada = false;
$encontrado = false;
$resultado = [];
$materialBusqueda = "";

// Verificamos si se envió un material mediante GET
if (isset($_GET["material"])) {

    $busquedaRealizada = true;

    // Limpiamos el texto recibido
    $materialBusqueda = trim($_GET["material"]);

    // Buscamos el material utilizando una función
    $materialEncontrado = buscarMaterial(
        $materiales,
        $materialBusqueda
    );

    if ($materialEncontrado !== null) {
        $resultado = $materialEncontrado;
        $encontrado = true;
    }
}

// Variable utilizada para mostrar recomendaciones
$separarMateriales = true;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <!-- Configuración básica de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo escaparHTML($titulo); ?> - ReciclaCDMX</title>

    <!-- Conectamos nuestro archivo CSS -->
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <!-- Encabezado de la página -->
    <header>

        <h1>ReciclaCDMX</h1>

        <!-- Menú de navegación -->
        <?php include "includes/nav.php"; ?>

    </header>


    <!-- Contenido principal -->
    <main>

        <!-- Primera sección -->
        <section class="titulo-pagina">

            <!-- Mostramos el título utilizando PHP -->
            <h2><?php echo escaparHTML($titulo); ?></h2>

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
                    value="<?php echo escaparHTML($materialBusqueda); ?>"
                >

                <button type="submit">
                    Buscar
                </button>

            </form>

        </section>


        <!-- Comprobamos si el usuario realizó una búsqueda -->
        <?php if ($busquedaRealizada) { ?>

            <!-- Si encontramos el material mostramos su información -->
            <?php if ($encontrado) { ?>

                <!-- Resultado de la búsqueda -->
                <section class="informacion">

                    <h2>Material encontrado</h2>

                    <!-- Mostramos el símbolo del material -->
                    <div class="icono-material">
                        <?php echo escaparHTML($resultado["simbolo"]); ?>
                    </div>

                    <!-- Mostramos el nombre del material -->
                    <h3>
                        <?php echo escaparHTML($resultado["nombre"]); ?>
                    </h3>

                    <!-- Mostramos la descripción del material -->
                    <p>
                        <?php echo escaparHTML($resultado["descripcion"]); ?>
                    </p>

                </section>

            <?php } else { ?>

                <!-- Mensaje cuando no encontramos coincidencias -->
                <section class="informacion">

                    <h2>Resultado</h2>

                    <p>
                        No se encontró el material.
                    </p>

                </section>

            <?php } ?>

        <?php } ?>


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
                        <?php echo escaparHTML($material["simbolo"]); ?>
                    </div>

                    <!-- Nombre del material -->
                    <h3>
                        <?php echo escaparHTML($material["nombre"]); ?>
                    </h3>

                    <!-- Descripción del material -->
                    <p>
                        <?php echo escaparHTML($material["descripcion"]); ?>
                    </p>

                </div>

            <?php
            }
            ?>

        </section>


        <!-- Tercera sección -->
        <section class="informacion">

            <h2>¿Cómo preparar los materiales?</h2>

            <!-- La condición determina qué mensaje se muestra -->
            <?php if ($separarMateriales) { ?>

                <p>
                    Antes de llevar los materiales a reciclar,
                    procura separarlos, limpiarlos y mantenerlos secos.
                </p>

            <?php } else { ?>

                <p>
                    Consulta las recomendaciones para preparar tus materiales.
                </p>

            <?php } ?>

        </section>

    </main>


    <!-- Pie de página -->
    <?php include "includes/footer.php"; ?>

</body>

</html>
