<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Llama al stored procedure
    $stmt = $con->prepare("CALL InsertCategory(?, ?)");
    $stmt->bind_param('ss', $nombre, $descripcion);
    $stmt->execute();
    
    echo "Categoría creada exitosamente.";

    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>
