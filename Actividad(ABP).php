<?php
$texto = "Hola, ¿cómo estás? Bien. :)"; // Puedes cambiar este texto

// Inicializar contadores
$vocales = 0;
$consonantes = 0;
$signos = 0;
$espacios = 0;

// Conjuntos
$vocales_lista = "AEIOUaeiou";
$signos_lista = ".,;:!?¿¡()[]{}<>-\"'";

// Recorrer texto
for ($i = 0; $i < strlen($texto); $i++) {
    $char = $texto[$i];
    
    if (ctype_alpha($char)) {
        if (strpos($vocales_lista, $char) !== false) {
            $vocales++;
        } else {
            $consonantes++;
        }
    } elseif (strpos($signos_lista, $char) !== false) {
        $signos++;
    } elseif ($char == " ") {
        $espacios++;
    }
}

// Cálculo de totales y porcentajes
$total = $vocales + $consonantes + $signos + $espacios;
$porcVocales = ($total > 0) ? round(($vocales / $total) * 100, 2) : 0;
$porcConsonantes = ($total > 0) ? round(($consonantes / $total) * 100, 2) : 0;
$porcSignos = ($total > 0) ? round(($signos / $total) * 100, 2) : 0;
$porcEspacios = ($total > 0) ? round(($espacios / $total) * 100, 2) : 0;

// Mensaje personalizado
if ($total < 20) {
    $mensaje = "El texto es bastante corto.";
} elseif ($total <= 50) {
    $mensaje = "El texto tiene una longitud media.";
} else {
    $mensaje = "El texto es largo. ¡Buen trabajo!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Análisis de Texto</title>
</head>
<body>
    <h2>Análisis del Texto</h2>
    <p><strong>Texto Analizado:</strong> <?= $texto ?></p>
    <p><strong>Total de caracteres analizados:</strong> <?= $total ?></p>
    <ul>
        <li>Vocales: <?= $vocales ?> (<?= $porcVocales ?>%)</li>
        <li>Consonantes: <?= $consonantes ?> (<?= $porcConsonantes ?>%)</li>
        <li>Signos de puntuación: <?= $signos ?> (<?= $porcSignos ?>%)</li>
        <li>Espacios: <?= $espacios ?> (<?= $porcEspacios ?>%)</li>
    </ul>
    <p><strong>Mensaje:</strong> <?= $mensaje ?></p>
</body>
</html>
