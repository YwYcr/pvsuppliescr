<?php
// Incluye el archivo de credenciales de S3
require '../adminTool/s3-credentials.php';

// Tu lógica para conectar a la base de datos
include '../adminTool/bd_conn.php';


if (isset($_FILES['createImagenUrl']) && isset($_POST['createProductID'])) {
    $productID = $_POST['createProductID'];
    $imagenName = $_FILES['createImagenUrl']['name'];
    $imagenTmp = $_FILES['createImagenUrl']['tmp_name'];
    $imagenPrincipal = isset($_POST['createImagenPrincipal']) ? $_POST['createImagenPrincipal'] : 0;

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
    $stmt->bind_param("ssii",$imagenName, $imagenUrl, $imagenPrincipal, $productID);

    // Devuelve la URL de la imagen para que el cliente la utilice si es necesario
    echo json_encode(['imagenUrl' => $imagenUrl]);

    if ($stmt->execute()) {
        echo "Imagen creada exitosamente.";
    } else {
        echo "Error al crear la Imagen: " . $stmt->error;
    }

    $stmt->close();
    include '../adminTool/bd_disconn.php';

} else {
    echo json_encode(['error' => 'No se recibieron datos de imagen']);
}



// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $nombre = $_POST['nombre'];
//     $email = $_POST['email'];
//     $telefono = $_POST['telefono'];
//     $poc = $_POST['poc'];
//     $cedJuridica = $_POST['cedJuridica'];
// 
//     // Llama al procedimiento almacenado
//     $stmt = $con->prepare("CALL InsertSupplier(?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $nombre, $email, $telefono, $poc, $cedJuridica);
// 
//     if ($stmt->execute()) {
//         echo "Proveedor creado exitosamente.";
//     } else {
//         echo "Error al crear el proveedor: " . $stmt->error;
//     }
// 
//     $stmt->close();
//     include '../tools/bd_disconn.php';
// } else {
//     echo "Acceso no autorizado";
// }
// 

?>
