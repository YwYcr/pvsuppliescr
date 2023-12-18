<div class="table-responsive">
<?php
    include '../adminTool/bd_conn.php';
    
    $stmt = $con->prepare("CALL GetAllCategorias()");
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows>0){
    echo "<table id='categoryTableBody' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
    echo "<thead><tr>
        <th>Category ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acciones</th>
        </tr></thead>";
        echo "<tbody id='categoryTableBody'>";

        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['IDCATEGORY'] . "</td>";
            $categoryID = $row['IDCATEGORY'];
            echo "<td>" . $row['NAME'] . "</td>";
            echo "<td>" . $row['DESCRIPTION'] . "</td>";                                                                      
            echo "<td>

            <button type='button' class='btn btn-info btn-infoCategoria  mb-2' data-bs-toggle='modal' data-bs-target='#infoCategoria' data-bs-id='$categoryID'> 
            <i class='fa fa-info-circle'></i>
            <span>Ver</span></button>
            
            <button type='button' class='btn btn-editar btn-editarCategoria btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$categoryID' data-bs-target='#editCategoria' >
            <i class='fa fa-pencil'></i>
            <span>Editar</span></button>
        
            <button type='button' class='btn btn-borrar btn-borrarCategoria btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$categoryID'>
            <i class='fa fa-trash-o'></i> 
            <span>Eliminar</span></button>
    
            </td>";
    echo "</tr>";
        }

        echo "</tbody>";
    echo "<tfoot>
        <tr>
        <th>Category ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acciones</th>
        </tr>
    </tfoot>";
    echo "</table>";
        
    }else {
        echo "No hay productos";
    }  
    $stmt->close();                          
    include '../adminTool/bd_disconn.php'

?>
</div>


<script src="../assets/js/pages/tables/jquery-datatable.js"></script>