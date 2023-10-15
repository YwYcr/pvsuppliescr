 <div class="block-header">
     <div class="row clearfix">
         <div class="col-md-6 col-sm-12">
             <h1>Control de Inventario</h1>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php"><img src="bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                     <li class="breadcrumb-item active" aria-current="page">Inventario</li>
                 </ol>
             </nav>
         </div>
         <div class="col-md-6 col-sm-12 text-right hidden-xs" data-bs-toggle="modal" data-bs-target="#createProducto">
             <a href="javascript:void(0);" class="btn btn-sm btn-primary" title=""><i class="icon-user-follow"></i><span> Crear Producto</span></a>
         </div>
         <div class="col-md-6 col-sm-12 text-right hidden-xs" data-bs-toggle="modal" data-bs-target="#createCategoria">
             <a href="javascript:void(0);" class="btn btn-sm btn-primary" title=""><i class="icon-user-follow"></i><span> Crear Categoria</span></a>
         </div>
     </div>
 </div>

 <div class="container-fluid">

     <div class="row clearfix">
         <div class="col-lg-12">
             <div class="card">
                 <div class="header">
                     <h2>Listado de Productos
                         <!-- <small>Basic example without any additional modification classes</small> -->
                     </h2>
                     <ul class="header-dropdown dropdown">

                         <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                         <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li> -->
                     </ul>
                 </div>
                 <div class="body">
                 <?php
                            include '../../bd_conn.php';

                            $consulta = "SELECT * FROM PRODUCT";
                            $result = $con->query($consulta);


                            if ($result->num_rows>0){
                                echo "<table  class='table table-hover js-basic-example dataTable table-custom spacing5>'";
                                echo "<tr><th>Product ID</th><th>Nombre</th><th>Descripcion</th><th>Marca</th><th>Cantidad</th><th>Precio</th><th>Categoria</th><th>Acciones</th></tr>";

                                while ($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row['IDPRODUCT'] . "</td>";
                                    $productID = $row['IDPRODUCT'];
                                    echo "<td>" . $row['NAME'] . "</td>";
                                    echo "<td>" . $row['DESCRIPTION'] . "</td>";
                                    echo "<td>" . $row['BRAND'] . "</td>";
                                    echo "<td>" . $row['QUANTITY'] . "</td>";
                                    echo "<td>" . $row['PRICE'] . "</td>";
                                    echo "<td>" . $row['IDCATEGORY'] . "</td>";                                  
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

                                }
                                echo "</table>";
                            }else {
                                echo "No hay productos";
                            }                            
                            include '../../bd_disconn.php'
                            ?>
                    
                 </div>
             </div>
         </div>
     </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="title" id="defaultModalLabel">Nuevo Producto</h4>
             </div>
             <div class="modal-body">
                 <form id="productForm">
                     <div class="form-group">
                         <input type="text" class="form-control" id="productName" name="productName" placeholder="Nombre del Producto">
                     </div>
                     <div class="form-group">
                         <select class="form-control " id="productCategory" name="productCategory">
                             <option value="">Seleccionar Categoría</option>
                             <option value="categoria1">Categoria 1</option>
                             <option value="categoria2">Categoria 2</option>
                             <option value="categoria3">Categoria 3</option>
                             <option value="categoria4">Categoria 4</option>
                             <option value="categoria5">Categoria 5</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <div class="input-group">
                             <span class="input-group-text">$</span>
                             <input type="text" class="form-control " id="productPrice" name="productPrice" placeholder="Precio Unitario">
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="input-group">
                             <input type="number" class="form-control " id="productTax" name="productTax" placeholder="Impuesto (%)">
                             <span class="input-group-text">%</span>
                         </div>
                     </div>
                     <div class="form-group">
                         <input type="number" class="form-control " id="productQuantity" name="productQuantity" placeholder="Cantidad">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto1">Foto1</label>
                         <input type="file" class="form-control " id="productPhoto1" name="productPhoto1">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto2">Foto2</label>
                         <input type="file" class="form-control " id="productPhoto2" name="productPhoto2">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto3">Foto3</label>
                         <input type="file" class="form-control " id="productPhoto3" name="productPhoto3">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto4">Foto4</label>
                         <input type="file" class="form-control " id="productPhoto4" name="productPhoto4">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto5">Foto5</label>
                         <input type="file" class="form-control " id="productPhoto5" name="productPhoto5">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-simple" data-bs-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal" data-type="success">Guardar</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="seeproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="title" id="defaultModalLabel">Nuevo Producto</h4>
             </div>
             <div class="modal-body">
                 <form id="productForm">
                     <div class="form-group">
                         <input type="text" class="form-control " id="productName" name="productName" placeholder="Nombre del Producto">
                     </div>
                     <div class="form-group">
                         <select class="form-control " id="productCategory" name="productCategory">
                             <option value="">Seleccionar Categoría</option>
                             <option value="categoria1">Categoria 1</option>
                             <option value="categoria2">Categoria 2</option>
                             <option value="categoria3">Categoria 3</option>
                             <option value="categoria4">Categoria 4</option>
                             <option value="categoria5">Categoria 5</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <div class="input-group">
                             <span class="input-group-text">$</span>
                             <input type="text" class="form-control " id="productPrice" name="productPrice" placeholder="Precio Unitario">
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="input-group">
                             <input type="number" class="form-control " id="productTax" name="productTax" placeholder="Impuesto (%)">
                             <span class="input-group-text">%</span>
                         </div>
                     </div>
                     <div class="form-group">
                         <input type="number" class="form-control " id="productQuantity" name="productQuantity" placeholder="Cantidad">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto1">Foto1</label>
                         <input type="file" class="form-control " id="productPhoto1" name="productPhoto1">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto2">Foto2</label>
                         <input type="file" class="form-control " id="productPhoto2" name="productPhoto2">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto3">Foto3</label>
                         <input type="file" class="form-control " id="productPhoto3" name="productPhoto3">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto4">Foto4</label>
                         <input type="file" class="form-control " id="productPhoto4" name="productPhoto4">
                     </div>
                     <div class="form-group">
                         <label for="productPhoto5">Foto5</label>
                         <input type="file" class="form-control " id="productPhoto5" name="productPhoto5">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-simple" data-bs-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal" data-type="success">Guardar</button>
             </div>
         </div>
     </div>
 </div>