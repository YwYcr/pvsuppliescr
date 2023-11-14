<?php
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['recaptcha_response'])) {
    
    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LeXSA4pAAAAAO6btJGji3vA3l2yZuHlEK2Y_0Bt';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.6) 
    {

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los datos del formulario
            $nombre = $_POST['nombre'];
            $primerApellido = $_POST['primerApellido'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password

            // Validacion de email
            $checkEmailQuery = "SELECT * FROM USERS WHERE EMAIL = '$email'";
            $result = $con->query($checkEmailQuery);

            if ($result->num_rows > 0) 
            {
                // Correo en uso
                echo "El correo electrónico ya está en uso. Por favor, utilice otro correo.";
                //REVISAR LIMPIEZA DEL FORM
            } else {
                    // Correo nuevo, se procede con registro
                    $sql = "INSERT INTO USERS (NAME, FLASTNAME, EMAIL, PASSWORD) 
                    VALUES ('$nombre', '$primerApellido', '$email', '$hashedPassword')";
                    
                    if ($con->query($sql) === TRUE) {
                        echo "Registro exitoso. Revisa tu correo para confirmar tu cuenta";

                    } else {
                        echo "Error al registrar: " . $con->error;
                    }
                }

                include '../tools/bd_conn.php';
                } else {
                    echo "Acceso no autorizado";
                }
    } else {
        // Not verified - show form error
        echo "Google Captcha fallado. Intenta de nuevo";
    }
?>