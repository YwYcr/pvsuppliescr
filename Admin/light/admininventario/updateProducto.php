<?php
// Incluye el archivo de conexión a la base de datos
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $productID = $_POST['productID'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $valid = $_POST['valid'];

    // Utiliza consultas preparadas para evitar la inyección de SQL
    $stmt = $con->prepare("CALL UpdateProductByID(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiidis", $productID, $nombre, $descripcion, $marca, $cantidad, $precio, $descuento, $categoria, $valid);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "PRODUCTO MODIFICADO exitosamente.";
    } else {
        echo "Error al modificar el producto: " . $stmt->error;
    }

    // Cierra la conexión a la base de datos
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>
