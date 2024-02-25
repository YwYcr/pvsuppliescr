<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario
    $proveedorID = $_POST['proveedorID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL DeleteSupplierByID(?)");
    $stmt->bind_param("i", $proveedorID);

    if ($stmt->execute()) {
        echo "Proveedor BORRADO exitosamente.";
    } else {
        echo "Error al borrar el proveedor: " . $stmt->error;
    }

    $stmt->close();
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}
?>