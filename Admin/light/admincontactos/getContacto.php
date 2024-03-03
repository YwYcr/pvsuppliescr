<?php
include '../adminTool/bd_conn.php';

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

include '../adminTool/bd_disconn.php';
?>