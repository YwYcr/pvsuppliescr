<?php
// Incluye el archivo de conexión a la base de datos
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Obtén los datos del formulario
        $userID = mysqli_real_escape_string($con, $_POST['userID']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $primerApellido = mysqli_real_escape_string($con, $_POST['primerApellido']);
        $segundoApellido = mysqli_real_escape_string($con, $_POST['segundoApellido']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $province = mysqli_real_escape_string($con, $_POST['province']);
        $canton = mysqli_real_escape_string($con, $_POST['canton']);
        $district = mysqli_real_escape_string($con, $_POST['district']);
        $suscription = mysqli_real_escape_string($con, $_POST['suscription']);
        $rol = mysqli_real_escape_string($con, $_POST['rol']);

        $stmt = $con->prepare("CALL UpdateUserAdminByID(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @p_success)");

        $stmt->bind_param("sssssssssssi", $userID ,$email, $nombre, $primerApellido, $segundoApellido, $phone, $address, $province, $canton, $district, $suscription, $rol);
        $stmt->execute();

        // Obtiene el valor de la variable de usuario desde la sesión
        $result = $con->query("SELECT @p_success AS p_success");
        $row = $result->fetch_assoc();
        $p_success = $row['p_success'];

        if ($p_success == 1) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'El correo Electronico ya se encuentra asociado a un usuario.']);
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