<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario

    $orderID=$_POST['orderID'];

    $sql = "DELETE FROM ORDERS WHERE IDORDER = '$orderID'";
    
    if ($con->query($sql) === TRUE) {
        echo "orden BORRADA exitosamente.";
    } else {
        echo "Error al borrar el orden: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>