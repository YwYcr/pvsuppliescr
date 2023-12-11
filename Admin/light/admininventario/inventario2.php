<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="\pvsuppliescr\Admin\light\favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/sweetalert/sweetalert.css" />



    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/site.min.css">

    <style>
        td.details-control {
            background: url('../assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('../assets/images/details_close.png') no-repeat center center;
        }
    </style>
</head>

<body class="theme-blue">

    <!-- Page Loader -->
    <?php
    include '../pageLoader.php';
    ?>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <?php
        include '../header2.php';
        ?>

        <!-- Modal info Producto -->
        <div class="modal fade" id="infoProducto" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoProductoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoProductID" name="infoProductID" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoProductName" name="infoProductName" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductDescription" class="form-label">Descripcion</label>
                                <!-- <textarea class="form-control" id="infoProductDescription"
                                    name="infoProductDescription" required> -->
                                <input type="text" class="form-control" id="infoProductDescription" name="infoProductDescription" style="height: 100px; resize: none;" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="infoProductMarca" name="infoProductMarca" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="infoProductCantidad" name="infoProductCantidad" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="infoProductPrecio" name="infoProductPrecio" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="infoProductCategoria" name="infoProductCategoria" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductImagen" class="form-label">Imagen</label>
                                <input type="text" class="form-control" id="infoProductImagen" name="infoProductImagen" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductSize" class="form-label">Tamano</label>
                                <input type="text" class="form-control" id="infoProductSize" name="infoProductSize" readonly>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Producto -->
        <div class="modal fade" id="editProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editProductID" name="editProductID" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="editProductDescription" name="editProductDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="editProductMarca" name="editProductMarca" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="editProductCantidad" name="editProductCantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="editProductPrecio" name="editProductPrecio" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="editProductCategoria" name="editProductCategoria" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductImagen" class="form-label">Imagen</label>
                                <input type="text" class="form-control" id="editProductImagen" name="editProductImagen">
                            </div>
                            <div class="mb-3">
                                <label for="editProductSize" class="form-label">Tamano</label>
                                <input type="text" class="form-control" id="editProductSize" name="editProductSize">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-actualizarProducto btn-primary" data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Producto -->
        <div class="modal fade" id="createProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createProductoForm">
                            <div class="mb-3">
                                <label for="createProductName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createProductName" name="createProductName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="createProductDescription" name="createProductDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="createProductMarca" name="createProductMarca" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="createProductCantidad" name="createProductCantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="createProductPrecio" name="createProductPrecio" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="createProductCategoria" name="createProductCategoria" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductImagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="createProductImagen" name="createProductImagen">
                            </div>
                            <div class="mb-3">
                                <label for="createProductSize" class="form-label">Tamano</label>
                                <input type="text" class="form-control" id="createProductSize" name="createProductSize">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearProductoButton" class="btn btn-primary " data-bs-dismiss="modal" data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Categoria -->
        <div class="modal fade" id="createCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createCategoriaForm">
                            <div class="mb-3">
                                <label for="createCategoriaName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createCategoriaName" name="createCategoriaName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createCategoriaDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="createCategoriaDescription" name="createCategoriaDescription" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearCategoriaButton" class="btn btn-primary " data-bs-dismiss="modal" data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal info Categoria -->
        <div class="modal fade" id="infoCategoria" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion de la Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoCategoriaForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoCategoryID" name="infoCategoryID" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoCategoryName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoCategoryName" name="infoCategoryName" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoCategoryDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="infoCategoryDescription" name="infoCategoryDescription" style="height: 100px; resize: none;" required readonly>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Categoria -->
        <div class="modal fade" id="editCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCategoriaForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editCategoryID" name="editCategoryID" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCategoryName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCategoryDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="editCategoryDescription" name="editCategoryDescription" required>
                            </div>                      
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-actualizarCategoria btn-primary" data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>




        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Inventario</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inventario</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>


            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#productTab"><i class="icon-list"></i> Productos</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#categoryTab"><i class="icon-folder-alt"></i> Categorias</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imgTab"><i class="icon-picture"></i> Imagenes</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="productTab">

                                    <div class="header">
                                        <h2>Listado de productos
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-right hidden-xs">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createProducto" title=""><i class="icon-plus"></i><span> Agregar Producto</span></a>
                                    </div>

                                    <div class="body">
                                        <div class="table-responsive">
                                            <?php
 include '../adminTool/bd_conn.php';

 $consulta = "SELECT * FROM PRODUCT";
 $result = $con->query($consulta);


 if ($result->num_rows>0){
    echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
    echo "<thead><tr>
     <th>Product ID</th>
     <th>Nombre</th>
     <th>Marca</th>
     <th>Cantidad</th>
     <th>Precio</th>
     <th>Categoria</th>
     <th>Imagen</th>
     <th>Acciones</th>
     </tr></thead>";
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
    echo "<tfoot>
        <tr>
        <th>Product ID</th>
     <th>Nombre</th>
     <th>Marca</th>
     <th>Cantidad</th>
     <th>Precio</th>
     <th>Categoria</th>
     <th>Imagen</th>
     <th>Acciones</th>
        </tr>
    </tfoot>";
    echo "</table>";
     
 }else {
     echo "No hay productos";
 }                            
 include '../adminTool/bd_disconn.php'
 ?>
                                           
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="categoryTab">

                                <div class="header">
                                        <h2>Listado de Categorias
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-right hidden-xs">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoria" title=""><i class="icon-plus"></i><span> Agregar Categoria</span></a>
                                    </div>

                                    <div class="body">
                                        <div class="table-responsive">
                                            <?php
                                             include '../adminTool/bd_conn.php';

$consulta = "SELECT * FROM CATEGORY";
$result = $con->query($consulta);


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
include '../adminTool/bd_disconn.php'

                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="imgTab">

                                <div class="header">
                                        <h2>Imagenes
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <?php

                                            ?>
                                        </div>
                                    </div>

                                </div>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
    <script src="\pvsuppliescr\Admin\assets\vendor\sweetalert\sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="\pvsuppliescr\Admin\light\adminScript\inventario2.js"></script>
</body>

</html>