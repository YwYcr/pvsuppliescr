<?php

include '../tools/bd_conn.php';

// Obtener los parámetros de paginación
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = isset($_GET['perPage']) ? intval($_GET['perPage']) : 9; // Cambia 5 por el número deseado de productos por página

// Calcular el índice de inicio y la cantidad de productos a obtener
$param = '7vjLvjUJ9c2TX0I2KqfTyKTV5jb4XC12bPlAjtZsHMGT5jPnFL';
$startIndex = ($page - 1) * $perPage;
$endIndex = $startIndex + $perPage;

$stmt = $con->prepare("CALL GetAllProductsPagination(?, ?, ?)");
$stmt->bind_param('sii', $param, $startIndex, $endIndex);
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
