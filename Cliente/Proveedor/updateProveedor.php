<?php

// Incluye el archivo de conexión a la base de datos
include '../tools/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $proveedorID = $_POST['proveedorID'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $poc = $_POST['poc'];
    $cedJuridica = $_POST['cedJuridica'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL UpdateSupplierByID(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $proveedorID, $nombre, $email, $telefono, $poc, $cedJuridica);

    if ($stmt->execute()) {
        echo "Proveedor modificado exitosamente.";
    } else {
        echo "Error al modificar el proveedor: " . $stmt->error;
    }

    $stmt->close();
    // Cierra la conexión a la base de datos
    include '../tools/bd_disconn.php';
} else {
    echo "Acceso no autorizado.";
}


/**************************************************/
/******************** OLD CODE ********************/
/******************** WITH NO *********************/
/**************** STORE PROCEDURE *****************/
/**************************************************/

// // Incluye el archivo de conexión a la base de datos
// include '../tools/bd_conn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtén los datos del formulario
//     $proveedorID = $_POST['proveedorID'];  
//     $nombre = $_POST['nombre'];
//     $email = $_POST['email'];
//     $telefono = $_POST['telefono'];   
//     $poc = $_POST['poc'];
//     $cedJuridica = $_POST['cedJuridica'];

//     // Realiza la inserción en la base de datos (asegúrate de escapar y validar los datos)
//     $sql = "UPDATE SUPPLIER SET NAME = '$nombre',EMAIL = '$email',PHONE = '$telefono', POC = '$poc',SOCIALID = '$cedJuridica'  WHERE IDSUPPLIER = '$proveedorID'";
//     // $sql = "INSERT INTO USERS (EMAIL, NAME, FLASTNAME, SLASTNAME, PASSWORD) VALUES ('$email', '$nombre', '$primerApellido', '$segundoApellido', '$password')";

//     if ($con->query($sql) === TRUE) {
//         echo "Proveedor modificado exitosamente.";
//     } else {
//         echo "Error al modificar el proveedor: " . $con->error;
//     }

//     // Cierra la conexión a la base de datos
//     include '../tools/bd_disconn.php';
// } else {
//     echo "Acceso no autorizado.";
// }
?>