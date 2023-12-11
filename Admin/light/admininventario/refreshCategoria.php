<?php
 include '../adminTool/bd_conn.php';

 $consulta = "SELECT * FROM CATEGORY";
 $result = $con->query($consulta);


 if ($result->num_rows>0){
    echo "<table id='categoryTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
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
    echo "<tfoot></tfoot>";
    echo "</table>";

     
 }else {
     echo "No hay categorias";
 }                            
 include '../adminTool/bd_disconn.php'
 ?>