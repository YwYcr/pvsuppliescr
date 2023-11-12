<?php
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $email = $_POST['email'];

    $sql = "INSERT INTO CONTACT (EMAIL) VALUES ('$email')";
    
    if ($con->query($sql) === TRUE) {
        echo "Contacto creado exitosamente.";
    } else {
        echo "Error al crear el contacto: " . $con->error;
    }

    include '../tools/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>