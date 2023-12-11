<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $total = $_POST['total'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $user = $_POST['user'];
    $detalle = $_POST['detalle'];

    $sql = "INSERT INTO ORDERS (TOTAL, STATUS, ADDRESS, IDUSER, ORDERDETAIL) 
    VALUES ('$total', '$status', '$address', '$user', '$detalle')";
    
    if ($con->query($sql) === TRUE) {
        echo "Orden creada exitosamente.";
    } else {
        echo "Error al crear eliminar la orden: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>