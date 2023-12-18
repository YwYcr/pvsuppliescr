<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryID = $_POST['categoryID'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Llamada al procedimiento almacenado
    $stmt = $con->prepare("CALL UpdateCategory(?, ?, ?)");
    $stmt->bind_param("iss", $categoryID, $nombre, $descripcion);
    $stmt->execute();

    // Verificar si se ejecutó correctamente
    if ($stmt->error) {
        echo "Error al modificar la categoría: " . $stmt->error;
    } else {
        echo "Categoría modificada exitosamente.";
    }

    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>
