<?php

include '../tools/bd_conn.php';

try {
    // Prepara y ejecuta la llamada al procedimiento almacenado
    $stmt = $con->prepare("CALL getProductsIndex()");
    $stmt->execute();

    // Obtiene los resultados
    $result = $stmt->get_result();

    // Verifica si hay resultados
    if ($result->num_rows > 0) {
        // Inicializa un array para almacenar los resultados
        $productos = array();

        // Itera sobre los resultados y agrega cada fila al array
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        // Devuelve el array de productos como JSON
        echo json_encode($productos);
    } else {
        // Si no hay resultados, devuelve un mensaje de error
        echo json_encode(array('error' => 'No se encontraron productos'));
    }

    // Cierra la conexión y la declaración
    $stmt->close();
    include '../tools/bd_disconn.php';
} catch (Exception $e) {
    // Maneja cualquier excepción generada durante la ejecución
    echo json_encode(array('error' => 'Error en la ejecución de la consulta: ' . $e->getMessage()));
}
