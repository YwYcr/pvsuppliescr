<?php

include '../tools/bd_conn.php';

// session_start();
// echo "session_start();";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Extract form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $rememberMe = isset($_POST["rememberMe"]) ? true : false;

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    $query = "SELECT PASSWORD, NAME FROM PVSUPPLIES_DB.USERS WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($storedHashedPassword, $storedName);
    $stmt->fetch();
    $stmt->close();
    $con->close();

    if ($storedHashedPassword !== null && password_verify($password, $storedHashedPassword)) {
        // Authentication successful
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["currentuser"] = $storedName;
        // Redireccionamiento por login correcto
        header("Location: ../tools/my-account.php");

        // Redirect to a secure page or send a success message
        echo "Inicio sesion correcto!";
        

        // Optionally, set a cookie for "Remember Me" functionality
        // if ($rememberMe) {
        //     // Set a cookie or implement your remember me logic
        // }
    } else {
        echo "Correo o clave incorrectos. Intente de nuevo.";
    }
}
?>
