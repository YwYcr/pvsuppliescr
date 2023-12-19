<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $categoryID = $_POST['categoryID'];

    // Llama al stored procedure
    $stmt = $con->prepare("CALL DeleteCategory(?)");
    $stmt->bind_param('i', $categoryID);
    $stmt->execute();
    
    // echo "Categoría borrada exitosamente.";

    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>
