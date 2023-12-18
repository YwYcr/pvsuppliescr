<?php
include '../adminTool/bd_conn.php';

if (isset($_GET['categoryID'])) {
    $categoryID = $_GET['categoryID'];

    // Llama al stored procedure
    $stmt = $con->prepare("CALL GetCategoryDetails(?)");
    $stmt->bind_param('i', $categoryID);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Categoría no encontrada'));
    }

    $stmt->close();
} else {
    echo json_encode(array('error' => 'No se proporcionó el ID de la categoría'));
}

include '../adminTool/bd_disconn.php';
?>
