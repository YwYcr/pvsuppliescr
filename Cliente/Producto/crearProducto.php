<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertProduct(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiid", $nombre, $descripcion, $marca, $cantidad, $precio, $categoria);

    if ($stmt->execute()) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error al crear el producto: " . $stmt->error;
    }

    $stmt->close();
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado";
}



/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// include '../tools/bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $nombre = $_POST['nombre'];
//     $descripcion = $_POST['descripcion'];
//     $marca = $_POST['marca'];
//     $cantidad = $_POST['cantidad'];
//     $precio = $_POST['precio'];
//     $categoria = $_POST['categoria'];

//     $sql = "INSERT INTO PRODUCT (NAME, DESCRIPTION, BRAND, QUANTITY, PRICE, IDCATEGORY) 
//     VALUES ('$nombre', '$descripcion', '$marca', '$cantidad', '$precio', '$categoria')";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Producto creado exitosamente.";
//     } else {
//         echo "Error al crear el Producto: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }

?>