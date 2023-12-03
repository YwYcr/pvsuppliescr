<?php

include '../tools/bd_conn.php';

if (isset($_GET['contactID'])) {
    $contactID = $_GET['contactID'];

    // Llama al procedimiento almacenado para obtener el contacto por ID
    $stmt = $con->prepare("CALL GetContactByID(?)");
    $stmt->bind_param("i", $contactID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'CONTACTO no encontrado'));
    }

    $stmt->close();
} else {
    echo json_encode(array('error' => 'ID de contacto no proporcionado'));
}

include '../tools/bd_disconn.php';


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';

// // if (isset($_GET['userId'])) {
//     $contactID = $_GET['contactID'];

//     $sql = "SELECT * FROM CONTACT WHERE IDCONTACT = $contactID";
//     // $sql = "SELECT * FROM USERS WHERE IDUSER = $userId";
//     $result = $con->query($sql);

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         echo json_encode($row);
//     } else {
//         echo json_encode(array('error' => 'CONTACTO no encontrado'));
//     }
// // } else {
// //     // No se proporcionó un ID de usuario válido
// //     echo json_encode(array('error' => 'ID de usuario no válido'));
// // }

// include '../tools/bd_disconn.php';
?>
