<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categoryID=$_POST['categoryID'];

    $sql = "DELETE FROM CATEGORY WHERE IDCATEGORY = '$categoryID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Categoria BORRADa exitosamente.";
    } else {
        echo "Error al borrar la Categoria: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>