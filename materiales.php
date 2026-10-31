<?php

require_once __DIR__ . "/includes/sesion.php";
require_once "includes/funciones.php";


$titulo = "Materiales reciclables";

$materiales = obtenerMateriales();

$busquedaRealizada = false;
$encontrado = false;
$resultado = [];
$materialBusqueda = "";

if (isset($_GET["material"])) {

    $busquedaRealizada = true;

    $materialBusqueda = trim($_GET["material"]);

    $materialEncontrado = buscarMaterial(
        $materiales,
        $materialBusqueda
    );

    if ($materialEncontrado !== null) {
        $resultado = $materialEncontrado;
        $encontrado = true;
    }
}

$separarMateriales = true;

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
                Algunos materiales pueden separarse y llevarse
                a centros de reciclaje para ser aprovechados nuevamente.
            </p>

            <p>
                Conocer los diferentes tipos de materiales nos ayuda
                a realizar una mejor separación de nuestros residuos.
            </p>

        </section>


        <section class="informacion">

            <h2>Buscar material reciclable</h2>

            <p>
                Escribe el nombre de un material para consultar su información.
            </p>

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


        <?php if ($busquedaRealizada) { ?>

            <?php if ($encontrado) { ?>

                <section class="informacion">

                    <h2>Material encontrado</h2>

                    <div class="icono-material">
                        <?php echo escaparHTML($resultado["simbolo"]); ?>
                    </div>

                    <h3>
                        <?php echo escaparHTML($resultado["nombre"]); ?>
                    </h3>

                    <p>
                        <?php echo escaparHTML($resultado["descripcion"]); ?>
                    </p>

                </section>

            <?php } else { ?>

                <section class="informacion">

                    <h2>Resultado</h2>

                    <p>
                        No se encontró el material.
                    </p>

                </section>

            <?php } ?>

        <?php } ?>


        <section class="materiales">

            <?php
            foreach ($materiales as $material) {
            ?>

                <div class="tarjeta">

                    <div class="icono-material">
                        <?php echo escaparHTML($material["simbolo"]); ?>
                    </div>

                    <h3>
                        <?php echo escaparHTML($material["nombre"]); ?>
                    </h3>

                    <p>
                        <?php echo escaparHTML($material["descripcion"]); ?>
                    </p>

                </div>

            <?php
            }
            ?>

        </section>


        <section class="informacion">

            <h2>¿Cómo preparar los materiales?</h2>

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


    <?php include "includes/footer.php"; ?>

</body>

</html>
