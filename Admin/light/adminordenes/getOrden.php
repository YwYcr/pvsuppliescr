<?php
include '../adminTool/bd_conn.php';

    $ordenID = $_GET['ordenID'];

    $sql = "SELECT * FROM ORDERS WHERE IDORDER = $ordenID";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'orden no encontrado'));
    }

include '../adminTool/bd_disconn.php';
?>