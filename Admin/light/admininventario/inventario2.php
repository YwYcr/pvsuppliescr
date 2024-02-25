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
    <!-- <link rel="stylesheet" href="../../assets/vendor/sweetalert/sweetalert.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css"> -->

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
                                <input type="text" class="form-control" id="infoProductDescription" name="infoProductDescription" style="height: 100px; resize: none;" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="infoProductMarca" name="infoProductMarca" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCantidad" class="form-label"> Cantidad </label>
                                <input type="number" class="form-control" id="infoProductCantidad" name="infoProductCantidad" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductPrecio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="infoProductPrecio" name="infoProductPrecio" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductDescuento" class="form-label">Descuento (%)</label>
                                <input type="number" class="form-control" id="infoProductDescuento" name="infoProductDescuento" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCategoria" class="form-label">Categoria</label>
                                <select class="form-select" id="infoProductCategoria" name="infoProductCategoria" required></select>
                            </div>
                            <div class="mb-3">
                                <label for="infoproductoValido" class="form-label">Mostrar producto?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infoproductoValido" id="infoproductoValidoSi" value="1" readonly>
                                    <label class="form-check-label" for="infoproductoValidoSi">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infoproductoValido" id="infoproductoValidoNo" value="0" readonly>
                                    <label class="form-check-label" for="infoproductoValidoNo">No</label>
                                </div>
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
                        <h5 class="modal-title" id="staticBackdropLabel">Editar producto</h5>
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
                                <input type="number" class="form-control" id="editProductCantidad" name="editProductCantidad" required value="1">
                            </div>
                            <div class="mb-3">
                                <label for="editProductPrecio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="editProductPrecio" name="editProductPrecio" required value="0">
                            </div>
                            <div class="mb-3">
                                <label for="editProductDescuento" class="form-label">Descuento (%)</label>
                                <input type="number" class="form-control" id="editProductDescuento" name="editProductDescuento" required value="0">
                            </div>
                            <div class="mb-3">
                                <label for="editProductCategoria" class="form-label">Categoria</label>
                                <select class="form-select" id="editProductCategoria" name="editProductCategoria" required></select>
                            </div>
                            <div class="mb-3">
                                <label for="editproductoValido" class="form-label">Mostrar producto?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editproductoValido" id="editproductoValidoSi" value="1" checked>
                                    <label class="form-check-label" for="editproductoValidoSi">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editproductoValido" id="editproductoValidoNo" value="0" >
                                    <label class="form-check-label" for="editproductoValidoNo">No</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                                <input type="number" class="form-control" id="createProductCantidad" name="createProductCantidad" required value="1">
                            </div>
                            <div class="mb-3">
                                <label for="createProductPrecio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="createProductPrecio" name="createProductPrecio" required value="0">
                            </div>
                            <div class="mb-3">
                                <label for="createProductDescuento" class="form-label">Descuento (%)</label>
                                <input type="number" class="form-control" id="createProductDescuento" name="createProductDescuento" required value="0">
                            </div>
                            <div class="mb-3">
                                <label for="createProductCategoria" class="form-label">Categoria</label>
                                <select class="form-select" id="createProductCategoria" name="createProductCategoria" required></select>
                            </div>
                            <div class="mb-3">
                                <label for="createproductoValido" class="form-label">Mostrar producto?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="createproductoValido" id="createproductoValidoSi" value="1" checked>
                                    <label class="form-check-label" for="createproductoValidoSi">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="createproductoValido" id="createproductoValidoNo" value="0" >
                                    <label class="form-check-label" for="createproductoValidoNo">No</label>
                                </div>
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

        <!-- Modal Create Imagen producto -->
        <div class="modal fade" id="createImagen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Imagen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createImagenForm">
                            <div class="mb-3">
                                <label for="createProductID" class="form-label">Producto Número</label>
                                <input type="text" class="form-control" id="createProductID" name="createProductID" required>
                            </div>
                            <div class="mb-3">
                                <label for="createImagenName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createImagenName" name="createImagenName" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="createImagenUrl" class="form-label">Seleccionar Imagen</label>
                                <input type="file" class="form-control" id="createImagenUrl" name="createImagenUrl" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="createImagenPrincipal" class="form-label">Imagen principal?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="createImagenPrincipal" id="createImagenPrincipalSi" value="1">
                                    <label class="form-check-label" for="createImagenPrincipalSi">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="createImagenPrincipal" id="createImagenPrincipalNo" value="0" checked>
                                    <label class="form-check-label" for="createImagenPrincipalNo">No</label>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearImagenButton" class="btn btn-primary " data-bs-dismiss="modal" data-type="success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Imagen producto -->
        <div class="modal fade" id="editImagen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Imagen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editImagenForm">
                            <div class="mb-3">
                                <label for="editImageProdID" class="form-label">Producto Número</label>
                                <input type="text" class="form-control" id="editImageProdID" name="editImageProdID" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editImagenName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editImagenName" name="editImagenName" readonly>
                                <input type="text" class="form-control" id="editImagenNameoriginal" name="editImagenNameoriginal" readonly hidden>
                            </div>
                            <div class="mb-3">
                                <label for="editImagenUrl" class="form-label">Seleccionar Imagen</label>
                                <input type="file" class="form-control" id="editImagenUrl" name="editImagenUrl" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="editImagenPrincipal" class="form-label">Imagen principal?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editImagenPrincipal" id="editImagenPrincipalSi" value="1">
                                    <label class="form-check-label" for="editImagenPrincipalSi">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editImagenPrincipal" id="editImagenPrincipalNo" value="0" checked>
                                    <label class="form-check-label" for="editImagenPrincipalNo">No</label>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="editImagenButton" class="btn btn-primary " data-bs-dismiss="modal" data-type="success">Editar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create categoria -->
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
                                    <div class="col-md-12 col-sm-12 text-right hidden-xs">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="crearImagen" title=""><i class="icon-plus"></i><span> Agregar Imagen</span></a>
                                    </div>
                                    <div class="body">
                                    

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
    <!-- <script src="../../assets/vendor/sweetalert/sweetalert.min.js"></script>  SweetAlert Plugin Js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="\pvsuppliescr\Admin\light\adminScript\inventario2.js"></script>

</body>

</html>