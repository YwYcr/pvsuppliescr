<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del formulario
        $contactID = $_POST['contactID'];

        // Llama al stored procedure
        $stmt = $con->prepare("CALL DeleteContactByID(?)");
        $stmt->bind_param('i', $contactID);
        $stmt->execute();

        // Éxito al eliminar el contacto
        echo json_encode(['success' => true]);
    } catch (mysqli_sql_exception $e) {
        // Error al eliminar el contacto
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        include '../adminTool/bd_disconn.php';
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Acceso no autorizado.']);
}
?>

