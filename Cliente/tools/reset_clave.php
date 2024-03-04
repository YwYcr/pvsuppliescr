<?php
include '../tools/bd_conn.php';
include '../tools/enviarcorreo.php';

// Check if it's a POST request and if 'recaptcha_response' is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['recaptcha_response'])) {
    
    // Extract form data
    $email = $_POST['email'];
    $reset_token = $_POST['reset_token'];
    $hashedResetToken = password_hash($reset_token, PASSWORD_BCRYPT); // Hash the reset token
    // $expiration_date = (new DateTime())->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s');
    $expiration_date = date("Y-m-d H:i:s", time() + 60 * 30);

    echo "expiration_date" . $expiration_date;

    // Validate email
    $stmtCheckEmail = $con->prepare("CALL CheckEmailExists(?, @exists)");
    $stmtCheckEmail->bind_param("s", $email);
    $stmtCheckEmail->execute();
    $stmtCheckEmail->close();

    // Get the result from the session variable
    $result = $con->query("SELECT @exists AS email_exists");
    $row = $result->fetch_assoc();
    $email_exists = $row['email_exists'];

    // Check if the email already exists
    if ($email_exists == 1) {

        // Build POST request for reCAPTCHA verification:
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LeXSA4pAAAAAO6btJGji3vA3l2yZuHlEK2Y_0Bt'; // Replace with your actual secret key
        $recaptcha_response = $_POST['recaptcha_response'];

        // Set up options for the cURL request
        $recaptcha_data = array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        );
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptcha_data)
            )
        );

        // Create a stream context for the cURL request
        $context = stream_context_create($options);

        // Make the cURL request to verify the reCAPTCHA response
        $recaptcha_result = file_get_contents($recaptcha_url, false, $context);

        // Check if the cURL request was successful
        if ($recaptcha_result === FALSE) {
            // Handle cURL error
            die('Error while verifying reCAPTCHA');
        }

        // Decodificar la respuesta JSON de reCAPTCHA
        $recaptcha_data = json_decode($recaptcha_result);

        // Propiedad score
        if (isset($recaptcha_data->score)) {
            $recaptcha_score = $recaptcha_data->score;
            // echo "reCAPTCHA Score: $recaptcha_score";
        }

        // Check if the reCAPTCHA verification was successful
        if ($recaptcha_data->success && $recaptcha_score >= 0.1) {
            // reCAPTCHA verification passed
            // Continue with process to reset password

            // Procedimiento almacenado para insertar token y fecha de expiracion
            $stmtInsertUser = $con->prepare("CALL InsertUser(?, ?, ?, ?, ?, @success)");
            $stmtInsertUser->bind_param("sssss", $nombre, $primerApellido, $email, $hashedResetToken, $expiration_date);
            $stmtInsertUser->execute();
            $stmtInsertUser->close();

            // Get the result from the session variable
            $result = $con->query("SELECT @success AS insertion_success");
            $row = $result->fetch_assoc();
            $insertion_success = $row['insertion_success'];

            // Check if the insertion was successful
            if ($insertion_success == 1) {

                correo_activacion($email, $nombre, $primerApellido, $codigo_act);
                echo "Revise su correo electronico para crear una nueva clave";

            } else {
                echo "Error al registrar: El correo electrónico ya está en uso.";
            }

        } else {
            // reCAPTCHA verification failed
            echo "Acceso no autorizado";
        }

    } else {
        // Email no existe
        echo "NO EXISTE EMAIL ";
    }

} else {
    // Handle the case where 'recaptcha_response' is not set in the POST request
    echo "Missing reCAPTCHA response";
}

include '../tools/bd_conn.php';

?>
