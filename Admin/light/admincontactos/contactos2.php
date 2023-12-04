<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="\PVSupplies\Admin\light\favicon.ico" type="image/x-icon">
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

        <!-- Modal info Contactos-->
        <div class="modal fade" id="infoContacto" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoContactoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoContactoID" name="infoContactoID" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoContactoName" class="form-label">Nombre Contacto</label>
                                <input type="text" class="form-control" id="infoContactoName" name="infoContactoName" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoContactoEmail" name="infoContactoEmail" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Contactos -->
        <div class="modal fade" id="createContacto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="createContactoName" name="createContactoName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createContactoEmail" name="createContactoEmail" required>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="createContactoButton" class="btn btn-primary " data-bs-dismiss="modal" data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Contactos -->
        <div class="modal fade" id="editContacto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Contacto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editContactoForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editContactoID" name="editContactoID" required>
                            </div>
                            <div class="mb-3">
                                <label for="editContactoName" class="form-label">Nombre Contacto</label>
                                <input type="text" class="form-control" id="editContactoName" name="editContactoName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editContactoEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editContactoEmail" name="editContactoEmail" required>
                            </div>


                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Orden</button>
                        <button class="btn btn-actualizarContacto btn-primary " data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Contactos</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\PVSupplies\Admin\light\index2.php"><img src="\PVSupplies\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contactos</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createContacto" title=""><i class="icon-user-follow"></i><span>
                                Agregar Contacto</span></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Información de contactos
                                </h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <?php
                                        include '../adminTool/bd_conn.php';

                                        $consulta = "SELECT * FROM CONTACT";
                                        $result = $con->query($consulta);


                                        if ($result->num_rows > 0) {
                                            echo "<table id='contactTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                                            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Asunto</th><th>Mensaje</th><th>Acciones</th></tr></thead>";
                                            echo "<tbody id='contactTableBody'>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['IDCONTACT'] . "</td>";
                                                $contactID = $row['IDCONTACT'];
                                                echo "<td>" . $row['NAME'] . "</td>";
                                                echo "<td>" . $row['EMAIL'] . "</td>";
                                                echo "<td>" . $row['SUBJECT'] . "</td>";
                                                echo "<td>" . $row['MESSAGE'] . "</td>";

                                                echo "<td>

                                                <button type='button' class='btn btn-info btn-infoContacto mb-2' data-bs-toggle='modal' data-bs-target='#infoContacto' data-bs-id='$contactID'> 
                                                <i class='fa fa-info-circle'></i>
                                                <span>Ver</span></button>
                                                
                                                <button type='button' class='btn btn-editar btn-editarContacto btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$contactID' data-bs-target='#editContacto' >
                                                <i class='fa fa-pencil'></i>
                                                <span>Editar</span></button>
                                            
                                                <button type='button' class='btn btn-borrar btn-borrarContacto btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$contactID'>
                                                <i class='fa fa-trash-o'></i> 
                                                <span>Eliminar</span></button>
                                        
                                                </td>";

                                                echo "</tr>";
                                            }

                                            echo "</tbody>";
                                            echo "<tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Email</th>
                                                        <th>Asunto</th>
                                                        <th>Mensaje</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>";
                                            echo "</table>";
                                        } else {
                                            echo "No hay contactos";
                                        }
                                        include '../adminTool/bd_disconn.php'
                                    ?>
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
    <script src="\PVSupplies\Admin\assets\vendor\sweetalert\sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="\PVSupplies\Admin\light\adminScript\contactos2.js"></script>
</body>

</html>