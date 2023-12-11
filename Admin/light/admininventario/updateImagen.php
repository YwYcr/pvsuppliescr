<?php
// Incluye el archivo de credenciales de S3
require '../adminTool/s3-credentials.php';

// Tu lógica para conectar a la base de datos
include '../adminTool/bd_conn.php';

if (isset($_FILES['editImagenUrl']) && isset($_POST['editImageProdID'])) {
    $productID = $_POST['editImageProdID'];
    $imagenName = $_FILES['editImagenUrl']['name'];
    $imagenTmp = $_FILES['editImagenUrl']['tmp_name'];
    $imagenPrincipal = isset($_POST['editImagenPrincipal']) ? $_POST['editImagenPrincipal'] : 0;

    // Verificar si ya existe un registro con el mismo IDIMAGE (usando consulta preparada)
    $sqlcheck = $con->prepare("SELECT COUNT(*) AS count FROM PRODUCT_IMAGE WHERE IDIMAGE = ?");
    $sqlcheck->bind_param("s", $imagenName);
    $sqlcheck->execute();
    $resultCheck = $sqlcheck->get_result();
    $count = $resultCheck->fetch_assoc()['count'];
    $sqlcheck->close();
    // echo "<script>swal('Error!', 'Ya existe una imagen con ese nombre, intenta cambiar el nombre de la imagen. ". $count ."', 'error');</script>";

    if ($count > 0) {
        echo "Error al crear la Imagen ya que esta duplicada";
    } else {
        // Guarda la imagen en S3
        $uploadObject = $s3->putObject([
            'Bucket' => 'pvsupplies-s3',
            'Key' => $imagenName,
            'SourceFile' => $imagenTmp,
            'ACL' => 'public-read'
        ]);

        // Obtiene la URL de la imagen en S3
        $imagenUrl = $s3->getObjectUrl('pvsupplies-s3', $imagenName);

        // Inserta los detalles de la imagen en la base de datos
        // Asegúrate de usar consultas preparadas para evitar inyecciones SQL
        $stmt = $con->prepare("INSERT INTO PRODUCT_IMAGE (IDIMAGE, IMGURL, IMGMAIN, IDPRODUCT) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $imagenName, $imagenUrl, $imagenPrincipal, $productID);

        if ($stmt->execute()) {
            echo "La imagen se agrego con exito";
        } else {
            echo "Error al crear la Imagen: " . $stmt->error;
        }

        $stmt->close();
    }

    include '../adminTool/bd_disconn.php';
} else {
    echo json_encode(['error' => 'No se recibieron datos de imagen']);
}
?>
