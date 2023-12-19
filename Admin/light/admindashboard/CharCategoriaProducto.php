<?php
include '../adminTool/bd_conn.php';

$stmt = $con->prepare("CALL GetCategoriaxProduct()");
$stmt->execute();
$data = [];

   // Obtiene los resultados
   $result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

$result->close();
$con->close();

?>
