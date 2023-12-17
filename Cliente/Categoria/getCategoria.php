<?php

include '../tools/bd_conn.php';

// Llama al procedimiento almacenado para obtener el proveedor por ID
$stmt = $con->prepare("CALL GetAllCategorias()");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='shop-left-sidebar.php'>{$row['NAME']}</a></li>";
    }
} else {
    echo json_encode(array('error' => 'No hay Categorias disponibles'));
}

$stmt->close();

include '../tools/bd_disconn.php';

?>
