<?php
include '../adminTool/bd_conn.php';

// if (isset($_GET['userId'])) {
    $contactID = $_GET['contactID'];

    $sql = "SELECT * FROM CONTACT WHERE IDCONTACT = $contactID";
    // $sql = "SELECT * FROM USERS WHERE IDUSER = $userId";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'CONTACTO no encontrado'));
    }
// } else {
//     // No se proporcionó un ID de usuario válido
//     echo json_encode(array('error' => 'ID de usuario no válido'));
// }

include '../adminTool/bd_disconn.php';
?>