<?php
include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password

    $sql = "INSERT INTO USERS (NAME, FLASTNAME, EMAIL, PASSWORD) 
    VALUES ('$nombre', '$primerApellido', '$email', '$hashedPassword')";
    
    if ($con->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar: " . $con->error;
    }

    include 'bd_disconn.php';
}else{
    echo "Acceso no autorizado";
}
?>