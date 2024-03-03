<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del formulario
        $categoryID = $_POST['categoryID'];

        // Llama al stored procedure
        $stmt = $con->prepare("CALL DeleteCategory(?)");
        $stmt->bind_param('i', $categoryID);
        $stmt->execute();

        // Éxito al eliminar la categoría
        echo json_encode(['success' => true]);
    } catch (mysqli_sql_exception $e) {
        // Error al eliminar la categoría
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        include '../adminTool/bd_disconn.php';
    }
} else {
    echo "Acceso no autorizado.";
}
?>
