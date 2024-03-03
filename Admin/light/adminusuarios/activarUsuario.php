<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del usuario
        $userID = intval($_POST['userID']);

        // Llama al procedimiento almacenado
        $stmt = $con->prepare("CALL ActiveUserByID(?)");
        $stmt->bind_param("i", $userID);
        $stmt->execute();

        // Verifica si la llamada al procedimiento fue exitosa
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se pudo activar el usuario.']);
        }
    } catch (mysqli_sql_exception $e) {
        // Error al activar el usuario
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        include '../adminTool/bd_disconn.php';
    }
} else {
    echo "Acceso no autorizado";
}
?>
