<?php
// Incluye el archivo de conexión a la base de datos
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del formulario
        $userID = mysqli_real_escape_string($con, $_POST['userID']);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

        $stmt = $con->prepare("CALL UpdatePassUserAdminByID(?, ?)");
        $stmt->bind_param("ss", $userID , $hashedPassword );

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } catch (mysqli_sql_exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    } finally {
        // Cierre de la conexión
        $stmt->close();
        include '../adminTool/bd_disconn.php';
    }
} else {
    echo json_encode(['success' => false, 'error' => "Acceso no autorizado"]);
}
?>