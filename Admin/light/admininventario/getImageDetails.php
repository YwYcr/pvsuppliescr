<?php
include '../adminTool/bd_conn.php';

header('Content-Type: application/json');

if (isset($_GET['imageID'])) {
    $imageID = $_GET['imageID'];

    $sql = "SELECT * FROM PRODUCT_IMAGE WHERE IDIMAGE = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $imageID);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Imagen no encontrada'));
    }

    $stmt->close();
} else {
    echo json_encode(array('error' => 'No se proporcionó el ID de la imagen del producto'));
}

include '../adminTool/bd_disconn.php';
?>
