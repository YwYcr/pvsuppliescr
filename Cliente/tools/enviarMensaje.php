<?php

include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertContactMessage(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje);

    if ($stmt->execute()) {
        echo "Mensaje enviado exitosamente.";
    } else {
        echo "Error al enviar el mensaje: " . $stmt->error;
    }

    $stmt->close();
    include 'bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}

/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include 'bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $nombre = $_POST['nombre'];
//     $email = $_POST['email'];
//     $asunto = $_POST['asunto'];
//     $mensaje = $_POST['mensaje'];
 
//     $sql = "INSERT INTO CONTACT (NAME, EMAIL, SUBJECT, MESSAGE ) 
//     VALUES ('$nombre', '$email', '$asunto', '$mensaje')";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Mensaje enviado exitosamente.";
//     } else {
//         echo "Error al enviar el mensaje: " . $con->error;
//     }

//     include 'bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>