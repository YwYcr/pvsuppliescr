<?php

include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $poc = $_POST['poc'];
    $cedJuridica = $_POST['cedJuridica'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertSupplier(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $email, $telefono, $poc, $cedJuridica);

    if ($stmt->execute()) {
        echo "Proveedor creado exitosamente.";
    } else {
        echo "Error al crear el proveedor: " . $stmt->error;
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
//     $email = $_POST['email'];
//     $telefono = $_POST['telefono'];
//     $poc = $_POST['poc'];
//     $cedJuridica = $_POST['cedJuridica'];

//     $sql = "INSERT INTO SUPPLIER (NAME, EMAIL, PHONE, POC, SOCIALID) 
//     VALUES ('$nombre', '$email', '$telefono', '$poc', '$cedJuridica')";
    
//     if ($con->query($sql) === TRUE) {
//         echo "Proveedor creado exitosamente.";
//     } else {
//         echo "Error al crear el proveedor: " . $con->error;
//     }

//     include '../tools/bd_disconn.php';
// }else{
//     echo "acceso no autorizado";
// }

?>