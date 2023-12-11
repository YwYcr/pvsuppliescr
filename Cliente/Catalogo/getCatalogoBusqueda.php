<?php

include '../tools/bd_conn.php';

// Obtener el parámetro de búsqueda
$searchParam = isset($_GET['search']) ? $_GET['search'] : '';

// Utilizar el parámetro en el procedimiento almacenado
$stmt = $con->prepare("CALL GetAllProducts(?)");
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

$productos = array(); // Arreglo para almacenar los resultados

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Construir un arreglo asociativo para cada producto
        $producto = array(
            'IDPRODUCT' => $row['IDPRODUCT'],
            'NAME' => $row['NAME'],
            'DESCRIPTION' => $row['DESCRIPTION'],
            'BRAND' => $row['BRAND'],
            'QUANTITY' => $row['QUANTITY'],
            'PRICE' => $row['PRICE'],
            'DISCOUNT' => $row['DISCOUNT'],
            'VALID' => $row['VALID'],
            'IDCATEGORY' => $row['IDCATEGORY'],
            'IDSIZE' => $row['IDSIZE'],
            'IMAGE' => $row['IMAGE'],
            'IMGURL' => $row['IMGURL']
        );

        // Agregar el producto al arreglo de productos
        $productos[] = $producto;
    }
}

// Devolver resultados como JSON
header('Content-Type: application/json');
echo json_encode($productos);

$stmt->close();
include '../tools/bd_disconn.php';
?>
