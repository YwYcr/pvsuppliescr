<?php
include '../tools/bd_conn.php';

// if (isset($_GET['userId'])) {
    $proveedorID = $_GET['proveedorID'];

    $sql = "SELECT * FROM SUPPLIER WHERE IDSUPPLIER = $proveedorID";
    // $sql = "SELECT * FROM USERS WHERE IDUSER = $userId";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Proveedor no encontrado'));
    }
// } else {
//     // No se proporcionó un ID de usuario válido
//     echo json_encode(array('error' => 'ID de usuario no válido'));
// }

include '../tools/bd_disconn.php';
?>