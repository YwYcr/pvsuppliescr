<?php
// Incluye el archivo de conexión a la base de datos
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $productID = $_POST['productID'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
    $sql = "UPDATE PRODUCT SET NAME = '$nombre', DESCRIPTION = '$descripcion', BRAND = '$marca', QUANTITY = '$cantidad', PRICE = '$precio', IDCATEGORY = '$categoria' WHERE IDPRODUCT = '$productID'";
    // $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD) VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "PRODUCTO MODIFICADO exitosamente.";
    } else {
        echo "Error al modificar el producto: " . $con->error;
    }

    // Cierra la conexión a la base de datos
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>