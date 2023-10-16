<?php
include '../../bd_conn.php';

// Obtener el valor del campo de búsqueda y prevenir SQL injection
$searchTerm = $con->real_escape_string($_GET['searchTerm']);

// Modificar la consulta SQL para incluir la búsqueda por nombre
$consulta = "SELECT * FROM SUPPLIER WHERE NAME IS NOT NULL AND NAME LIKE '%$searchTerm%' ORDER BY NAME LIMIT 10";
$result = $con->query($consulta);

$suppliers = array();

if (!$result) {
    die('Error en la consulta: ' . $con->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
    }
}

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($suppliers);

include '../../bd_disconn.php';
?>
