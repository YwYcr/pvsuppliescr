<?php

include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario
    $userID = $_POST['userID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL DeleteUserByID(?)");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        echo "Usuario BORRADO exitosamente.";
    } else {
        echo "Error al borrar el usuario: " . $stmt->error;
    }

    $stmt->close();
    include 'bd_disconn.php';
} else {
    echo "acceso no autorizado";
}

/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include 'bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del usuario

//     $userID=$_POST['userID'];

//     $sql = "DELETE FROM USERS WHERE IDUSER = '$userID'";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Usuario BORRADO exitosamente.";
//     } else {
//         echo "Error al borrar el usuario: " . $con->error;
//     }

//     include 'bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }

?>