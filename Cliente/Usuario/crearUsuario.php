<?php

include '../tools/bd_conn.php';
include '../tools/enviarcorreo.php';

// Check if it's a POST request and if 'recaptcha_response' is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['recaptcha_response'])) {
    
    // Extract form data
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $codigo_act = $_POST['codigo_act'];

    // echo "Valor de codigo_act: " . $codigo_act;

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
    if ($email_exists == 0) {

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
            // Continue with user registration logic

            // Procedimiento almacenado para insertar un nuevo usuario
            $stmtInsertUser = $con->prepare("CALL InsertUser(?, ?, ?, ?, ?, @success)");
            $stmtInsertUser->bind_param("sssss", $nombre, $primerApellido, $email, $hashedPassword, $codigo_act);
            $stmtInsertUser->execute();
            $stmtInsertUser->close();

            // Get the result from the session variable
            $result = $con->query("SELECT @success AS insertion_success");
            $row = $result->fetch_assoc();
            $insertion_success = $row['insertion_success'];

            // Check if the insertion was successful
            if ($insertion_success == 1) {

                correo_activacion($email, $nombre, $primerApellido, $codigo_act);
                echo "Registro exitoso. Revisa tu correo para confirmar tu cuenta";

            } else {
                echo "Error al registrar: El correo electrónico ya está en uso.";
            }

        } else {
            // reCAPTCHA verification failed
            echo "Acceso no autorizado";
        }

    } else {
        // Email already in use
        echo "El correo electrónico ya está en uso. Por favor, utilice otro correo.";
    }

} else {
    // Handle the case where 'recaptcha_response' is not set in the POST request
    echo "Missing reCAPTCHA response";
}

include '../tools/bd_conn.php';


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';

// // Check if it's a POST request and if 'recaptcha_response' is set
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['recaptcha_response'])) {
    
//     // Extract form data
//     $nombre = $_POST['nombre'];
//     $primerApellido = $_POST['primerApellido'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password

//     // Validate email
//     $checkEmailQuery = "SELECT * FROM USERS WHERE EMAIL = '$email'";
//     $result = $con->query($checkEmailQuery);

//     if ($result->num_rows > 0) {
//         // Email already in use
//         echo "El correo electrónico ya está en uso. Por favor, utilice otro correo.";
//         // Handle form cleanup if needed
//     } else {

//         // Build POST request for reCAPTCHA verification:
//         $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
//         $recaptcha_secret = '6LeXSA4pAAAAAO6btJGji3vA3l2yZuHlEK2Y_0Bt'; // Replace with your actual secret key
//         $recaptcha_response = $_POST['recaptcha_response'];

//         // Set up options for the cURL request
//         $recaptcha_data = array(
//             'secret' => $recaptcha_secret,
//             'response' => $recaptcha_response
//         );
//         $options = array(
//             'http' => array(
//                 'header' => "Content-type: application/x-www-form-urlencoded\r\n",
//                 'method' => 'POST',
//                 'content' => http_build_query($recaptcha_data)
//             )
//         );

//         // Create a stream context for the cURL request
//         $context = stream_context_create($options);

//         // Make the cURL request to verify the reCAPTCHA response
//         $recaptcha_result = file_get_contents($recaptcha_url, false, $context);

//         // Check if the cURL request was successful
//         if ($recaptcha_result === FALSE) {
//             // Handle cURL error
//             die('Error while verifying reCAPTCHA');
//         }

//         // Decode the JSON response from the reCAPTCHA verification
//         $recaptcha_data = json_decode($recaptcha_result);

//         // Checking Score
//         $recaptcha_score = $recaptcha_data->score;
//         echo "reCAPTCHA Score: $recaptcha_score";

//         // Check if the reCAPTCHA verification was successful
//         if ($recaptcha_data->success && $recaptcha_score >= 0.5) {
//             // reCAPTCHA verification passed
//             // Continue with user registration logic

//             // New email, proceed with registration
//             $sql = "INSERT INTO USERS (NAME, FLASTNAME, EMAIL, PASSWORD) 
//                     VALUES ('$nombre', '$primerApellido', '$email', '$hashedPassword')";

//             if ($con->query($sql) === TRUE) {
//                 echo "Registro exitoso. Revisa tu correo para confirmar tu cuenta";
//             } else {
//                 echo "Error al registrar: " . $con->error;
//             }

//         } else {
//             // reCAPTCHA verification failed
//             echo "Acceso no autorizado";
//         }
//     }

//     include '../tools/bd_conn.php';
// } else {
//     // Handle the case where 'recaptcha_response' is not set in the POST request
//     echo "Missing reCAPTCHA response";
// }

?>
