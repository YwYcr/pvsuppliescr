    <?php

    include '../tools/bd_conn.php';

    // Llama al procedimiento almacenado para obtener el proveedor por ID
    $stmt = $con->prepare("CALL GetAllCategoriesMenu()");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='javascript:void(0)' class='category-link' data-value='" . htmlspecialchars($row['NAME'], ENT_QUOTES, 'UTF-8') . "'>{$row['NAME']}</a></li>";
        }
    } else {
        echo json_encode(array('error' => 'No hay Categorias disponibles'));
    }

    $stmt->close();

    include '../tools/bd_disconn.php';

    ?>
