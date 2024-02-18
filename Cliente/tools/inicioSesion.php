<?php
session_start();
include 'bd_conn.php';


// Verificar si el usuario ya inició sesión
// if(isset($_SESSION['IDROL'])) {
//     // Redirigir según el rol
//     if($_SESSION['IDROL'] == 1) {
//         header("Location: ../../Admin/light/index2.php");
//         exit;
//     } else {
//         header("Location: index.php");
//         exit;
//     }
// }

// Verificar si se enviaron datos de inicio de sesión
if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
    // Obtener las credenciales del formulario
    $email = $_POST['emailLogin'];
    $password = $_POST['passwordLogin'];
    

    // Realizar la consulta SQL para obtener la contraseña hash del usuario
    $sql = "SELECT IDUSER, PASSWORD, IDROL FROM USERS WHERE email = '$email'";
    $result = $con->query($sql);

    if($result->num_rows == 1) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        echo json_encode($row);
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['PASSWORD'];
        // Verificar la contraseña
        if(password_verify($password, $hashedPassword)) {
            // Contraseña válida
            $_SESSION['IDROL'] = $row['IDROL'];
            // Redirigir según el rol
            if($_SESSION['IDROL'] == 1) {
                header("Location: ../../Admin/light/index2.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            // Contraseña incorrecta
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario o contraseña incorrectos";
    }
}
?>
