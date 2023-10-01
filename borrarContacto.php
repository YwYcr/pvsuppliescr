<?php
include 'bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del cotnacto

    $contactID=$_POST['contactID'];

    $sql = "DELETE FROM CONTACT WHERE IDCONTACT = '$contactID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Contacto BORRADO exitosamente.";
    } else {
        echo "Error al borrar el contacto: " . $con->error;
    }

    include 'bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>