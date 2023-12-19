<?php
include '../adminTool/bd_conn.php';

// Llamada al stored procedure para obtener todas las categorías
$sql = "CALL GetAllCategorias()";

// Usar un prepared statement
if ($stmt = $con->prepare($sql)) {
    // Ejecutar el statement
    if ($stmt->execute()) {
        // Vincular resultados
        $stmt->bind_result($idcategory, $name, $description);

        $categorias = array();

        // Obtener resultados
        while ($stmt->fetch()) {
            $categorias[] = array(
                'idcategory' => $idcategory,
                'name' => $name,
                'description' => $description
            );
        }

        echo json_encode($categorias);
    } else {
        echo json_encode(array('error' => 'Error al ejecutar el stored procedure'));
    }

    // Cerrar el statement
    $stmt->close();
} else {
    echo json_encode(array('error' => 'Error al preparar el statement'));
}

include '../adminTool/bd_disconn.php';
?>
