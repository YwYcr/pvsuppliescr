<?php

include 'bd_conn.php';

if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL GetUserByID(?)");
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Usuario no encontrado'));
    }

    $stmt->close();
} else {
    // No se proporcionó un ID de usuario válido
    echo json_encode(array('error' => 'ID de usuario no válido'));
}

include 'bd_disconn.php';

/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include 'bd_conn.php';

// // if (isset($_GET['userId'])) {
//     $userID = $_GET['userID'];

//     $sql = "SELECT * FROM USERS WHERE IDUSER = $userID";
//     // $sql = "SELECT * FROM USERS WHERE IDUSER = $userId";
//     $result = $con->query($sql);

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         echo json_encode($row);
//     } else {
//         echo json_encode(array('error' => 'Usuario no encontrado'));
//     }
// // } else {
// //     // No se proporcionó un ID de usuario válido
// //     echo json_encode(array('error' => 'ID de usuario no válido'));
// // }

// include 'bd_disconn.php';

?>