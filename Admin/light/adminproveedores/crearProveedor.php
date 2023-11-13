<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $poc = $_POST['poc'];
    $cedJuridica = $_POST['cedJuridica'];

    $sql = "INSERT INTO SUPPLIER (NAME, EMAIL, PHONE, POC, SOCIALID) 
    VALUES ('$nombre', '$email', '$telefono', '$poc', '$cedJuridica')";
    
    if ($con->query($sql) === TRUE) {
        echo "Proveedor creado exitosamente.";
    } else {
        echo "Error al crear el proveedor: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>