<?php
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario

    $productID=$_POST['productID'];

    $sql = "DELETE FROM PRODUCT WHERE IDPRODUCT = '$productID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Producto BORRADO exitosamente.";
    } else {
        echo "Error al borrar el Producto: " . $con->error;
    }

    include '../tools/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>