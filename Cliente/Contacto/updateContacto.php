<?php
// Incluye el archivo de conexión a la base de datos
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $contactID = $_POST['contactID'];  
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
    $sql = "UPDATE CONTACT SET NAME = '$nombre',EMAIL = '$email'  WHERE IDCONTACT = '$contactID'";
    // $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD) VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "Contacto modificado exitosamente.";
    } else {
        echo "Error al modificar el Contacto: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>