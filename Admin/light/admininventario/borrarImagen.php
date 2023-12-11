<?php
// Incluye el archivo de credenciales de S3
require '../adminTool/s3-credentials.php';

// Tu lógica para conectar a la base de datos
include '../adminTool/bd_conn.php';

if (isset($_POST['imageID'])) {
    $imageID = $_POST['imageID'];

    // Elimina la imagen de S3
    try {
        $s3->deleteObject([
            'Bucket' => 'pvsupplies-s3',
            'Key' => $imageID,
        ]);
    } catch (Exception $e) {
        error_log("Error al eliminar la imagen de S3: " . $e->getMessage());
        echo "Error al eliminar la imagen.";
        include '../adminTool/bd_disconn.php';
        exit;
    }

    // Elimina la entrada de la base de datos
    $stmt = $con->prepare("DELETE FROM PRODUCT_IMAGE WHERE IDIMAGE = ?");
    $stmt->bind_param("s", $imageID);

    if ($stmt->execute()) {
        echo "La imagen se eliminó con éxito.";
    } else {
        $errorMessage = "Error al eliminar la imagen: " . $stmt->error;
        error_log($errorMessage);
        echo $errorMessage;
    }

    $stmt->close();
    include '../adminTool/bd_disconn.php';
} else {
    echo "Error: No se proporcionó el ID de la imagen.";
}
?>
