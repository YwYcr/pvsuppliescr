<?php

include '../tools/bd_conn.php';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = isset($_GET['perPage']) ? intval($_GET['perPage']) : 9;
$startIndex = ($page - 1) * $perPage;
$endIndex = $startIndex + $perPage;
$category = isset($_GET['category']) ? $_GET['category'] : '';

$stmt = $con->prepare("CALL GetProductsByCategory(?, ?, ?)");
$stmt->bind_param("sii", $category, $startIndex, $endIndex);
$stmt->execute();
$result = $stmt->get_result();

$productos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

        $productos[] = $producto;
    }
}

header('Content-Type: application/json');
echo json_encode($productos);

$stmt->close();
include '../tools/bd_disconn.php';
?>
