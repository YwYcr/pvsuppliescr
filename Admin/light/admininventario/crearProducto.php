<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    $size = $_POST['size'];

    $sql = "INSERT INTO PRODUCT (NAME, DESCRIPTION, BRAND, QUANTITY, PRICE, IDCATEGORY, IMAGE, IDSIZE) 
    VALUES ('$nombre', '$descripcion', '$marca', '$cantidad', '$precio', '$categoria', '$imagen', '$size')";
    
    if ($con->query($sql) === TRUE) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error al crear el Producto: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>