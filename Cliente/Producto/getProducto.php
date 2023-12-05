<?php

include '../tools/bd_conn.php';

$productID = $_GET['productID'];

// Llama al procedimiento almacenado para obtener el producto por ID
$stmt = $con->prepare("CALL GetProductByID(?)");
$stmt->bind_param("i", $productID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array('error' => 'Producto no encontrado'));
}

$stmt->close();
include '../tools/bd_disconn.php';


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';


//     $productID = $_GET['productID'];
    

//     $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
    
//     $result = $con->query($sql);

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         echo json_encode($row);
//     } else {
//         echo json_encode(array('error' => 'Producto no encontrado'));
//     }
// // } else {
// //     // No se proporcionó un ID de usuario válido
// //     echo json_encode(array('error' => 'ID de usuario no válido'));
// // }

// include '../tools/bd_disconn.php';
?>