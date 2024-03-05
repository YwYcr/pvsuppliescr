<?php
include '../adminTool/bd_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
    // Obtén los datos del usuario

    $userID = intval($_POST['userID']);

     // Llama al procedimiento almacenado
     $stmt = $con->prepare("CALL DeleteUserByID(?, @p_status)");
     $stmt->bind_param("i", $userID);
     $stmt->execute();

      // Obtiene el valor de la variable de usuario desde la sesión
      $result = $con->query("SELECT @p_status AS p_status");
      $row = $result->fetch_assoc();
      $p_status = $row['p_status'];

      // Verifica si la llamada al procedimiento fue exitosa y devuelve el resultado del parámetro de salida
      if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'result' => $p_status]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se pudo eliminar el usuario.']);
    }
 } catch (mysqli_sql_exception $e) {
     // Error al eliminar la categoría
     echo json_encode(['success' => false, 'error' => $e->getMessage()]);
 } finally {
     $stmt->close();
     include '../adminTool/bd_disconn.php';
 }
} else {
 echo "Acceso no autorizado";
}

?>
