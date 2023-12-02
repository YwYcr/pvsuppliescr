<?php
// Incluye el archivo de conexión a la base de datos
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $suscription = $_POST['suscription'];
    $rol = $_POST['rol'];

    // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
    $sql = "UPDATE USERS 
    SET EMAIL = '$email', 
    NAME = '$nombre', 
    FLASTNAME = '$primerApellido', 
    SLASTNAME = '$segundoApellido', 
    PASSWORD = '$password',
    PHONE = '$phone',
    ADDRESS = '$address',
    SUSCRIPTION = '$suscription',
    IDROL = '$rol'
    WHERE IDUSER = '$userID'";

    if ($con->query($sql) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>