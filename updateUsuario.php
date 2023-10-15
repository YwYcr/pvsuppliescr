<?php
// Incluye el archivo de conexión a la base de datos
include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $password = $_POST['password'];

    // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
    $sql = "UPDATE USERS SET EMAIL = '$email', NAME = '$nombre', FLASTNAME = '$primerApellido', SLASTNAME = '$segundoApellido', PASSWORD = '$password' WHERE IDUSER = '$userID'";
    // $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD) VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include 'bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>