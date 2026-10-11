
<?php

// Función para mostrar texto de forma segura
function escaparHTML($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

// Función que devuelve los materiales reciclables
function obtenerMateriales() {
    return [
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
}

// Función para buscar un material por su nombre
function buscarMaterial($materiales, $nombre) {
    foreach ($materiales as $material) {
        if ($material["nombre"] == $nombre) {
            return $material;
        }
    }

    return null;
}

?>
