<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del contacto
    $contactID = $_POST['contactID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL DeleteContactByID(?)");
    $stmt->bind_param("i", $contactID);

    if ($stmt->execute()) {
        echo "Contacto BORRADO exitosamente.";
    } else {
        echo "Error al borrar el contacto: " . $stmt->error;
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
//     // Obtén los datos del cotnacto

//     $contactID=$_POST['contactID'];

//     $sql = "DELETE FROM CONTACT WHERE IDCONTACT = '$contactID'";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Contacto BORRADO exitosamente.";
//     } else {
//         echo "Error al borrar el contacto: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }
?>