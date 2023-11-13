<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Qubes admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css" />

    <link rel="stylesheet" href="../assets/vendor/c3/c3.min.css" />
    <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">

    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/vendor/fullcalendar/fullcalendar.min.css">

    <link rel="stylesheet" href="../assets/vendor/summernote/dist/summernote.css" />

    <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/site.min.css">

</head>

<body class="theme-blue">



    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <!-- <div class="m-t-30"><img src="../assets/images/menu/logo/1.png"></div> -->
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <?php
        include 'header.php';
        ?>

        <div id="main-content">


        </div>

        <!-- Modal info Users -->
        <div class="modal fade" id="infoUser" data-bs-backdrop="static" data-bs-keyboard="true"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoUserForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoUserID" name="infoUserID" required>
                            </div>

                            <div class="mb-3">
                                <label for="infoUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoUserEmail" name="infoUserEmail"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoUserName" name="infoUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="infoUserFLASTNAME" name="infoUserFLASTNAME"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="infoUserSLASTNAME" name="infoUserSLASTNAME"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="infoUserPassword"
                                    name="infoUserPassword" autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit User -->

        <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editUserID" name="editUserID" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editUserEmail" name="editUserEmail"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editUserName" name="editUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="editUserFLASTNAME" name="editUserFLASTNAME"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="editUserSLASTNAME" name="editUserSLASTNAME"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editUserPassword"
                                    name="editUserPassword" autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Orden</button>
                        <button class="btn btn-actualizarUser btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Users -->
        <div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createContactoForm">
                            <div class="mb-3">
                                <label for="createUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createUserEmail" name="createUserEmail"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createUserName" name="createUserName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="createUserFLASTNAME"
                                    name="createUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="createUserSLASTNAME"
                                    name="createUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="createUserPassword"
                                    name="createUserPassword" autocomplete="on" required>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearUsuarioButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal info PROVEEDORES-->
        <div class="modal fade" id="infoProveedor" data-bs-backdrop="static" data-bs-keyboard="true"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoProveedorForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoProveedorID" name="infoProveedorID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorName" class="form-label">Nombre Proveedor</label>
                                <input type="text" class="form-control" id="infoProveedorName" name="infoProveedorName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoProveedorEmail"
                                    name="infoProveedorEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorTelefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="infoProveedorTelefono"
                                    name="infoProveedorTelefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorPOC" class="form-label">POC</label>
                                <input type="text" class="form-control" id="infoProveedorPOC" name="infoProveedorPOC"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="infoProveedorCedJuridica"
                                    name="infoProveedorCedJuridica" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Create Proveedor -->
        <div class="modal fade" id="createProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createProveedorForm">
                            <div class="mb-3">
                                <label for="createProveedorName" class="form-label">Nombre Proveedor</label>
                                <input type="text" class="form-control" id="createProveedorName"
                                    name="createProveedorName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createProveedorEmail"
                                    name="createProveedorEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorTelefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="createProveedorTelefono"
                                    name="createProveedorTelefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorPOC" class="form-label">POC</label>
                                <input type="text" class="form-control" id="createProveedorPOC"
                                    name="createProveedorPOC" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="createProveedorCedJuridica"
                                    name="createProveedorCedJuridica" required>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="createProveedorButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit Proveedor -->

        <div class="modal fade" id="editProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProveedorForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editProveedorID" name="editProveedorID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editProveedorName" name="editProveedorName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editProveedorEmail"
                                    name="editProveedorEmail" required>
                            </div>

                            <div class="mb-3">
                                <label for="editProveedorTelefono" class="form-label"> Telefono </label>
                                <input type="text" class="form-control" id="editProveedorTelefono"
                                    name="editProveedorTelefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorPOC" class="form-label"> POC </label>
                                <input type="text" class="form-control" id="editProveedorPOC" name="editProveedorPOC"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="editProveedorCedJuridica"
                                    name="editProveedorCedJuridica" autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Orden</button>
                        <button class="btn btn-actualizarProveedor btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>



        <!-- Modal info Contactos-->
        <div class="modal fade" id="infoContacto" data-bs-backdrop="static" data-bs-keyboard="true"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoContactoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoContactoID" name="infoContactoID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoContactoName" class="form-label">Nombre Contacto</label>
                                <input type="text" class="form-control" id="infoContactoName" name="infoContactoName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoContactoEmail" name="infoContactoEmail"
                                    required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Create Contactos -->
        <div class="modal fade" id="createContacto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createContactoForm">
                            <div class="mb-3">
                                <label for="createContactoName" class="form-label">Nombre Contacto</label>
                                <input type="text" class="form-control" id="createContactoName"
                                    name="createContactoName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createContactoEmail"
                                    name="createContactoEmail" required>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="createContactoButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit Contactos -->

        <div class="modal fade" id="editContacto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editContactoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editContactoID" name="editContactoID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editContactoName" class="form-label">Nombre Contacto</label>
                                <input type="text" class="form-control" id="editContactoName" name="editContactoName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editContactoEmail" name="editContactoEmail"
                                    required>
                            </div>


                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Orden</button>
                        <button class="btn btn-actualizarContacto btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>



        <!-- Modal info Producto -->
        <div class="modal fade" id="infoProducto" data-bs-backdrop="static" data-bs-keyboard="true"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoProductoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoProductID" name="infoProductID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoProductName" name="infoProductName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="infoProductDescription"
                                    name="infoProductDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="infoProductMarca" name="infoProductMarca"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="infoProductCantidad"
                                    name="infoProductCantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="infoProductPrecio" name="infoProductPrecio"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="infoProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="infoProductCategoria"
                                    name="infoProductCategoria" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Producto -->

        <div class="modal fade" id="editProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editProductID" name="editProductID"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editProductName" name="editProductName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="editProductDescription"
                                    name="editProductDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="editProductMarca" name="editProductMarca"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="editProductCantidad"
                                    name="editProductCantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="editProductPrecio" name="editProductPrecio"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="editProductCategoria"
                                    name="editProductCategoria" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Orden</button>
                        <button class="btn btn-actualizarProducto btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Producto -->
        <div class="modal fade" id="createProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="createProductName" name="createProductName"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="createProductDescription"
                                    name="createProductDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductMarca" class="form-label"> Marca </label>
                                <input type="text" class="form-control" id="createProductMarca"
                                    name="createProductMarca" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductCantidad" class="form-label"> Cantidad </label>
                                <input type="text" class="form-control" id="createProductCantidad"
                                    name="createProductCantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductPrecio" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="createProductPrecio"
                                    name="createProductPrecio" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProductCategoria" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="createProductCategoria"
                                    name="createProductCategoria" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearProductoButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Categoria -->
        <div class="modal fade" id="createCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="createCategoriaName"
                                    name="createCategoriaName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createCategoriaDescription" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="createCategoriaDescription"
                                    name="createCategoriaDescription" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearCategoriaButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal"
                            data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>





    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
    <script src="controlmenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    <script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
    <script src="adminScript/contactos.js"></script>
    <script src="adminScript/inventario.js"></script>
    <script src="adminScript/proveedores.js"></script>
    <script src="adminScript/usuarios.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const viewProfileLink = document.getElementById("viewProfileLink");
            const mainContent = document.getElementById("main-content");

            viewProfileLink.addEventListener("click", function (event) {
                event.preventDefault();

                // Realiza una solicitud fetch para cargar el contenido de profile.php
                fetch("profile.php")
                    .then(response => response.text())
                    .then(data => {
                        mainContent.innerHTML = data;
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            });
        });
    </script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>



    <!-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script> -->

    <!-- Bootstrap 4x JS  -->
    <!-- <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="assets/bundles/vendorscripts.bundle.js"></script> -->

    <!-- <script src="assets/bundles/c3.bundle.js"></script> -->
    <!-- <script src="assets/bundles/flotscripts.bundle.js"></script> -->
    <!-- flot charts Plugin Js -->
    <!-- <script src="assets/bundles/knob.bundle.js"></script> -->

    <!-- Project Common JS -->
    <!-- <script src="assets/js/common.js"></script> -->
    <!-- <script src="assets/js/index.js"></script> -->


</body>

</html>