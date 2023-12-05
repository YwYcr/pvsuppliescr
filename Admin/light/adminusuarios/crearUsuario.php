<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $suscription = $_POST['suscription'];
    $rol = $_POST['rol'];


    $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD, PHONE, ADDRESS, SUSCRIPTION, IDROL) 
    VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password', '$phone', '$address', '$suscription', '$rol')";
    
    if ($con->query($sql) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>