<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryID = $_POST['categoryID'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];


    $sql = "UPDATE CATEGORY SET NAME = '$nombre', DESCRIPTION = '$descripcion'
    WHERE IDCATEGORY = '$categoryID'";

    if ($con->query($sql) === TRUE) {
        echo "Categoria MODIFICADa exitosamente.";
    } else {
        echo "Error al modificar la categoria: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}
?>