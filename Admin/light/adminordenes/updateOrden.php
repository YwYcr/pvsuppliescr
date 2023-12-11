<?php
// Incluye el archivo de conexión a la base de datos
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $orderID = $_POST['orderID'];  
    $total = $_POST['total'];
    $status = $_POST['status'];
    $address = $_POST['address'];   
    $user = $_POST['user'];
    $detalle = $_POST['detalle'];

    $sql = "UPDATE ORDERS SET TOTAL = '$total',STATUS = '$status', ADDRESS = '$address', IDUSER = '$user', ORDERDETAIL = '$detalle'  WHERE IDORDER = '$orderID'";

    if ($con->query($sql) === TRUE) {
        echo "orden modificado exitosamente.";
    } else {
        echo "Error al modificar el orden: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include '../adminTool/bd_disconn.php'; 
} else {
    echo "Acceso no autorizado.";
}
?>
