<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $poc = $_POST['poc'];
    $cedJuridica = $_POST['cedJuridica'];
    $direccion = $_POST['direccion'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];

    // Llama al procedimiento almacenado
    $stmt = $con->prepare("CALL InsertSupplier(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nombre, $email, $telefono, $poc, $cedJuridica, $direccion, $provincia, $canton, $distrito);
    $stmt->execute();

    echo json_encode(['success' => true]);
} catch (mysqli_sql_exception $e) {
    
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} finally {
    $stmt->close();
    include '../adminTool/bd_disconn.php';
}
} else {
echo "Acceso no autorizado.";
}
?>