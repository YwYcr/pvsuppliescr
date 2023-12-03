<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario
    $productID = $_POST['productID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL DeleteProductByID(?)");
    $stmt->bind_param("i", $productID);

    if ($stmt->execute()) {
        echo "Producto BORRADO exitosamente.";
    } else {
        echo "Error al borrar el producto: " . $stmt->error;
    }

    $stmt->close();
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}



/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del usuario

//     $productID=$_POST['productID'];

//     $sql = "DELETE FROM PRODUCT WHERE IDPRODUCT = '$productID'";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Producto BORRADO exitosamente.";
//     } else {
//         echo "Error al borrar el Producto: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>

