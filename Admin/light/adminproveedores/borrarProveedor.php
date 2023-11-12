<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario

    $proveedorID=$_POST['proveedorID'];

    $sql = "DELETE FROM SUPPLIER WHERE IDSUPPLIER = '$proveedorID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Proveedor BORRADO exitosamente.";
    } else {
        echo "Error al borrar el proveedor: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>