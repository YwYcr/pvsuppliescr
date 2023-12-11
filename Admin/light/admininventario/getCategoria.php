<?php
include '../adminTool/bd_conn.php';


    $categoryID = $_GET['categoryID'];
    

    $sql = "SELECT * FROM CATEGORY WHERE IDCATEGORY = $categoryID";
    
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Categoria no encontrado'));
    }
// } else {
//     // No se proporcionó un ID de usuario válido
//     echo json_encode(array('error' => 'ID de usuario no válido'));
// }

include '../adminTool/bd_disconn.php';
?>