<div class="table-responsive"> 

<?php
        include '../adminTool/bd_conn.php';

        $stmt = $con->prepare("CALL GetAllProducts()");
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            echo "<table id='productTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
            echo "<thead><tr>
                    <th>Product ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Descuento %</th>
                    <th>Categoria</th>
                    <th>Valido</th>
                    <th>Acciones</th>
                    </tr></thead>";
            echo "<tbody id='productTableBody'>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IDPRODUCT'] . "</td>";
                $productID = $row['IDPRODUCT'];
                echo "<td>" . $row['NAME'] . "</td>";
                echo "<td>" . $row['BRAND'] . "</td>";
                echo "<td>" . $row['QUANTITY'] . "</td>";
                echo "<td>" . $row['PRICE'] . "</td>";
                echo "<td>" . $row['DISCOUNT'] . "</td>";
                echo "<td>" . $row['CATEGORYNAME'] . "</td>";
                echo "<td>" . ($row['VALID'] == 1 ? 'Sí' : 'No') . "</td>";
                echo "<td>

                    <button type='button' class='btn btn-info btn-infoProducto  mb-2' data-bs-toggle='modal' data-bs-target='#infoProducto' data-bs-id='$productID'> 
                    <i class='fa fa-info-circle'></i>
                    <span>Ver</span></button>
                    
                    <button type='button' class='btn btn-editar btn-editarProducto btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$productID' data-bs-target='#editProducto' >
                    <i class='fa fa-pencil'></i>
                    <span>Editar</span></button>
                
                    <button type='button' class='btn btn-borrar btn-borrarProducto btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$productID'>
                    <i class='fa fa-trash-o'></i> 
                    <span>Eliminar</span></button>
            
                    </td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "<tfoot>
                    <tr>
                    <th>Product ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descuento %</th>
                <th>Categoria</th>
                <th>Valido</th>
                <th>Acciones</th>
                    </tr>
                </tfoot>";
            echo "</table>";
        } else {
            echo "No hay productos";
        }
        $stmt->close();
        include '../adminTool/bd_disconn.php'
?>

</div>

<script src="../assets/js/pages/tables/jquery-datatable.js"></script>