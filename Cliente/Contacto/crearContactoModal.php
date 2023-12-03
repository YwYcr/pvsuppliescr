<?php

include '../../bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertContactModal(?, ?)");
    $stmt->bind_param("ss", $nombre, $email);

    if ($stmt->execute()) {
        echo "CONTACTO creado exitosamente.";
    } else {
        echo "Error al crear el contacto: " . $stmt->error;
    }

    $stmt->close();
    include '../../bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../../bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $nombre = $_POST['nombre'];
//     $email = $_POST['email'];


//     $sql = "INSERT INTO CONTACT (NAME, EMAIL) VALUES ('$nombre', '$email')";
    
//     if ($con->query($sql) === TRUE) {
//         echo "CONTACTO creado exitosamente.";
//     } else {
//         echo "Error al crear el contacto: " . $con->error;
//     }

//     include '../../bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>