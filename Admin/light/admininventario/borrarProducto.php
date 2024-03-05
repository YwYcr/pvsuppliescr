<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del formulario
        $productID = $_POST['productID'];

        // Llama al stored procedure
        $stmt = $con->prepare("CALL DeleteProduct(?)");
        $stmt->bind_param('i', $productID);
        $stmt->execute();

        // Éxito al eliminar el producto
        echo json_encode(['success' => true]);
    } catch (mysqli_sql_exception $e) {
        // Error al eliminar el producto
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        $stmt->close();
        include '../adminTool/bd_disconn.php';
    }
} else {
    echo "Acceso no autorizado.";
}
?>