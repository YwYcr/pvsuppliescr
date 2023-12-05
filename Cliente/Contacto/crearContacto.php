<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $email = $_POST['email'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertContact(?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Contacto creado exitosamente.";
    } else {
        echo "Error al crear el contacto: " . $stmt->error;
    }

    $stmt->close();
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $email = $_POST['email'];

//     $sql = "INSERT INTO CONTACT (EMAIL) VALUES ('$email')";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Contacto creado exitosamente.";
//     } else {
//         echo "Error al crear el contacto: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>