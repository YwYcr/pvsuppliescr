<?php
include '../adminTool/bd_conn.php';

if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Utiliza un procedimiento almacenado para obtener la información del usuario por ID
    $stmt = $con->prepare("CALL GetUserByID(?)");
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    // Obtiene el resultado del procedimiento almacenado
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Usuario no encontrado'));
    }

    // Cierra la conexión y la sentencia preparada
    $stmt->close();
} else {
    echo json_encode(array('error' => 'ID de usuario no proporcionado'));
}

include '../adminTool/bd_disconn.php';
?>
