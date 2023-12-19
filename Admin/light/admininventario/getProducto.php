<?php
include '../adminTool/bd_conn.php';

// Verifica que se proporcionó el parámetro productID en la URL
if (isset($_GET['productID'])) {
    $productID = intval($_GET['productID']);

    // Prepara y ejecuta la llamada al procedimiento almacenado
    $stmt = $con->prepare("CALL GetProductByIDAdmin(?)");
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    
    // Obtiene los resultados
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Producto no encontrado'));
    }

    // Cierra la conexión y la declaración
    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo json_encode(array('error' => 'Falta el parámetro productID'));
}
?>
