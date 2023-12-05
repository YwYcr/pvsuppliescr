<?php
 include '../adminTool/bd_conn.php';

 $consulta = "SELECT * FROM PRODUCT";
 $result = $con->query($consulta);


 if ($result->num_rows>0){
    echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
    echo "<tbody id='productTableBody'>";
     while ($row = $result->fetch_assoc()){
         echo "<tr>";
         echo "<td>" . $row['IDPRODUCT'] . "</td>";
         $productID = $row['IDPRODUCT'];
         echo "<td>" . $row['NAME'] . "</td>";
         echo "<td>" . $row['BRAND'] . "</td>";
         echo "<td>" . $row['QUANTITY'] . "</td>";
         echo "<td>" . $row['PRICE'] . "</td>";
         echo "<td>" . $row['IDCATEGORY'] . "</td>";                                  
         echo "<td><img src='" . $row['IMAGE'] . "' alt='IMGPRODUCT' style='height: 7rem;'></td>";                                  
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
    echo "<tfoot></tfoot>";
    echo "</table>";

     
 }else {
     echo "No hay productos";
 }                            
 include '../adminTool/bd_disconn.php'
 ?>