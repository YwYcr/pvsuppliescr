<?php
include '../../bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];


    $sql = "INSERT INTO CONTACT (NAME, EMAIL) VALUES ('$nombre', '$email')";
    
    if ($con->query($sql) === TRUE) {
        echo "CONTACTO creado exitosamente.";
    } else {
        echo "Error al crear el contacto: " . $con->error;
    }

    include '../../bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>