<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $productID = $_POST['productID'];

    // Llama al stored procedure
    $stmt = $con->prepare("CALL DeleteProduct(?)");
    $stmt->bind_param('i', $productID);
    $stmt->execute();
    
    echo "Producto borrado exitosamente.";

    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>
