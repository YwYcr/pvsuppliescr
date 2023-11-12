<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del usuario

    $userID=$_POST['userID'];

    $sql = "DELETE FROM USERS WHERE IDUSER = '$userID'";
    
    if ($con->query($sql) === TRUE) {
        echo "Usuario BORRADO exitosamente.";
    } else {
        echo "Error al borrar el usuario: " . $con->error;
    }

    include '../adminTool/bd_disconn.php';
}else{
    echo "acceso no autorizado";
}
?>