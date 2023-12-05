<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario
    $proveedorID = $_POST['proveedorID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL DeleteSupplierByID(?)");
    $stmt->bind_param("i", $proveedorID);

    if ($stmt->execute()) {
        echo "Proveedor BORRADO exitosamente.";
    } else {
        echo "Error al borrar el proveedor: " . $stmt->error;
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

//     $proveedorID=$_POST['proveedorID'];

//     $sql = "DELETE FROM SUPPLIER WHERE IDSUPPLIER = '$proveedorID'";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Proveedor BORRADO exitosamente.";
//     } else {
//         echo "Error al borrar el proveedor: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>