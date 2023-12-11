<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];


    $sql = "INSERT INTO CATEGORY (NAME, DESCRIPTION) 
    VALUES ('$nombre', '$descripcion')";
    
    if ($con->query($sql) === TRUE) {
        echo "Categoria creado exitosamente.";
    } else {
        echo "Error al crear el Categoria: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>