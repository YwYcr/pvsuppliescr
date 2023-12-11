<?php
// activate.php

include 'tools/bd_conn.php'; // Ajusta la ruta según tu estructura de archivos

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    // Verificar el código de activación en la base de datos
    $stmt = $con->prepare("SELECT * FROM USERS WHERE email = ? AND codigo_act = ? AND activo = 0");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Activar la cuenta
        $stmtActivate = $con->prepare("UPDATE USERS SET activo = 1 WHERE email = ? AND codigo_act = ?");
        $stmtActivate->bind_param("ss", $email, $code);
        $stmtActivate->execute();
        $stmtActivate->close();

        echo '¡Tu cuenta ha sido activada con éxito! <a href="my-account.php">Click aquí</a> para ir a tu perfil.';
    } else {
        echo 'La activación no pudo ser completada. Por favor, verifica tu enlace de activación.';
    }

    $stmt->close();
} else {
    echo 'Parámetros incompletos. Por favor, verifica tu enlace de activación.';
}

include 'tools/bd_conn.php'; // Ajusta la ruta según tu estructura de archivos
?>
