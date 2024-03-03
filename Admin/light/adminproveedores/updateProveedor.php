<?php
// Incluye el archivo de conexión a la base de datos

include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $proveedorID = $_POST['proveedorID'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $poc = $_POST['poc'];
    $cedJuridica = $_POST['cedJuridica'];
    $direccion = $_POST['direccion'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL UpdateSupplierByID(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $proveedorID, $nombre, $email, $telefono, $poc, $cedJuridica, $direccion, $provincia, $canton, $distrito);

    if ($stmt->execute()) {
        echo "Proveedor modificado exitosamente.";
    } else {
        echo "Error al modificar el proveedor: " . $stmt->error;
    }

    $stmt->close();
    // Cierra la conexión a la base de datos
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>