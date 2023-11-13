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

    // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
    $sql = "UPDATE SUPPLIER SET NAME = '$nombre',EMAIL = '$email',PHONE = '$telefono', POC = '$poc',SOCIALID = '$cedJuridica'  WHERE IDSUPPLIER = '$proveedorID'";
    // $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD) VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "Proveedor modificado exitosamente.";
    } else {
        echo "Error al modificar el proveedor: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>