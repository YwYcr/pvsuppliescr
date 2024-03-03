<?php
session_start();
include 'bd_conn.php';
include 'redirect.php';
// Verificar si el usuario ya inició sesión
if(isset($_SESSION['rol'])) {
    redirectUser($_SESSION['rol']);
}
// Verificar si se enviaron datos de inicio de sesión
if(isset($_POST["email"]) && isset($_POST["password"])) {
    // if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Obtener las credenciales del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Realizar la consulta SQL para obtener la contraseña hash del usuario
    // Aquí deberías utilizar consultas preparadas para protegerte contra la inyección SQL
    $sql = "SELECT IDUSER, PASSWORD, IDROL, NAME, EMAIL, FLASTNAME, PHONE, ADDRESS, CREATEDATE FROM USERS WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        $hashedPassword = $row['PASSWORD'];
        // Verificar la contraseña
        if(password_verify($password, $hashedPassword)) {
            // Contraseña válida
            $_SESSION['rol'] = $row['IDROL'];
            $_SESSION['userID'] = $row['IDUSER'];
            $_SESSION['emailID'] = $row['EMAIL'];
            $_SESSION['nombre'] = $row['NAME'];
            $_SESSION['primerApellido'] = $row['FLASTNAME'];
            $_SESSION['telefono'] = $row['PHONE'];
            $_SESSION['Direccion'] = $row['ADDRESS'];
            $_SESSION['cuentaCreada'] = $row['CREATEDATE'];

            // Redirigir según el rol
             $response = array();
            if($_SESSION['rol'] == 1) {
                $response = array("redirect" => "../../Admin/light/index2.php");
                // redirectUser($_SESSION['rol']);
                // header('Content-Type: application/json');
                // echo json_encode($response);
                // header("Location: ../../Admin/light/index2.php");
                // exit;
            } else {
                $response = array("redirect" => "my-account.php");
                // $response['redirect'] = "index.php";
                // header("Location: index.php");
                // exit;
            }
             header('Content-Type: application/json');
             echo json_encode($response);
             exit;
        } else {
            // Contraseña incorrecta
            http_response_code(401); // Unauthorized
            echo json_encode(array("error" => "Contraseña incorrecta"));
            // echo "Usuario o contraseña incorrectos ROL";
            exit;
        }
    } else {
        // Usuario no encontrado
        http_response_code(404); // Not Found
        echo json_encode(array("error" => "Usuario no encontrado"));
        // echo "Usuario o contraseña incorrectos USER";
        exit;
    }
}else{
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Falta información de inicio de sesión"));
    exit;

    // echo "primer error";  
}

include 'bd_disconn.php';
?>