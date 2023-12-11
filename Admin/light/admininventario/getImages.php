<?php
include '../adminTool/bd_conn.php';


$productID = $_POST['productID'];

$sql = "SELECT * FROM PRODUCT_IMAGE WHERE IDPRODUCT = $productID";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    echo "<table id='imageTable' class='table table-hover js-basic-example table-custom spacing5'>";
    echo "<thead><tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Principal</th>
            <th>Acción</th>
            </tr></thead>";
    echo "<tbody id='imageTableBody'>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['IDIMAGE'] . "</td>";
        $imageID = $row['IDIMAGE'];
        echo "<td><img src='" . $row['IMGURL'] . "' style='height:8rem'></td>";
        echo "<td>" . ($row['IMGMAIN'] == 1 ? 'Sí' : 'No') . "</td>";

        echo "<td>
                <div style='display:flex; flex-direction:column'>
                <button class='btn btn-info mb-2' onclick=\"downloadFile('" . $row['IMGURL'] . "')\">
                <i class='fa fa-download'></i>
                <span>Descargar</span></button>
                
                <button type='button' class='btn btn-editar btn-editarImagen btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$imageID' data-bs-target='#editImagen' >
                <i class='fa fa-pencil'></i>
                <span>Editar</span></button>
              
                <button type='button' class='btn btn-borrar btn-borrarImagen btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$imageID'>
                <i class='fa fa-trash-o'></i> 
                <span>Eliminar</span></button>
            </div>
                </td>";

        echo "</tr>";
    }

    echo "</tbody>";                
    echo "<tfoot>
            <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Principal</th>
            <th>Acción</th>
            </tr>
        </tfoot>";
    echo "</table>";
} else {
    echo '<script>';
    echo 'swal("Atención!", "Este producto no tiene imagenes asociadas", "info");';
    echo '</script>';
}
// } else {
//     // No se proporcionó un ID de usuario válido
//     echo json_encode(array('error' => 'ID de usuario no válido'));
// }

include '../adminTool/bd_disconn.php';

?>