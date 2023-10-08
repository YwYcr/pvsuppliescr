<?php
include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password

    // Validacion de email
    $checkEmailQuery = "SELECT * FROM USERS WHERE EMAIL = '$email'";
    $result = $con->query($checkEmailQuery);

    if ($result->num_rows > 0) {
            // Correo en uso
            echo "El correo electrónico ya está en uso. Por favor, utilice otro correo.";
        } else {
            // Correo nuevo, se procede con registro
            $sql = "INSERT INTO USERS (NAME, FLASTNAME, EMAIL, PASSWORD) 
            VALUES ('$nombre', '$primerApellido', '$email', '$hashedPassword')";
            
            if ($con->query($sql) === TRUE) {
                echo "Registro exitoso.";
            } else {
                echo "Error al registrar: " . $con->error;
            }
        }

            include 'bd_disconn.php';
        } else {
            echo "Acceso no autorizado";
        }
?>