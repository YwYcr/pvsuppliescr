<?php
// getPriceRange.php

include '../tools/bd_conn.php';

// Llama al procedimiento almacenado para obtener el rango de precios
$stmt = $con->prepare("CALL GetPriceRange()");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $minPrice = $row['min_price'];
    $maxPrice = $row['max_price'];
    echo json_encode(['min' => $minPrice, 'max' => $maxPrice]);
} else {
    echo json_encode(['error' => 'No se encontraron resultados']);
}

$stmt->close();
include '../tools/bd_disconn.php';
?>
