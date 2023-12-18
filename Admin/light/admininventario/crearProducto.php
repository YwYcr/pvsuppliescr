<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];  // Ajustado para reflejar el nuevo nombre del campo
    $categoria = $_POST['categoria'];
    $valid = $_POST['valid'];

    // Llamar al stored procedure
    $stmt = $con->prepare("CALL InsertProduct(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiidis", $nombre, $descripcion, $marca, $cantidad, $precio, $descuento, $categoria, $valid);

    if ($stmt->execute()) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error al crear el Producto: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();
    
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}
?>
