<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="\PVSupplies\Admin\light\favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

         <!-- Modal info Users -->
         <div class="modal fade" id="infoUser" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="infoUserEmail" name="infoUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoUserName" name="infoUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="infoUserFLASTNAME" name="infoUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="infoUserSLASTNAME" name="infoUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="infoUserPassword" name="infoUserPassword" autocomplete="on" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserPhone" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="infoUserPhone" name="infoUserPhone">
                            </div>
                            <div class="mb-3">
                                <label for="infoUserAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="infoUserAddress" name="infoUserAddress" rows="3">
                            </div>
                            <div class="mb-3">
                                <label for="infoUserCreation" class="form-label">Ingresado el</label>
                                <input type="text" class="form-control" id="infoUserCreation" name="infoUserCreation">
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSuscrito" class="form-label">Suscripcion</label>
                                <input type="text" class="form-control" id="infoUserSuscrito" name="infoUserSuscrito">
                            </div>
                            <div class="mb-3">
                                <label for="infoUserRol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="infoUserRol" name="infoUserRol">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit User -->

        <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="editUserEmail" name="editUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editUserName" name="editUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="editUserFLASTNAME" name="editUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="editUserSLASTNAME" name="editUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editUserPassword" name="editUserPassword" autocomplete="on" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPhone" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="editUserPhone" name="editUserPhone">
                            </div>
                            <div class="mb-3">
                                <label for="editUserAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="editUserAddress" name="editUserAddress" rows="3">
                            </div>
                            <div class="mb-3">
                                <label for="editUserCreation" class="form-label">Ingresado el</label>
                                <input type="text" class="form-control" id="editUserCreation" name="editUserCreation">
                            </div>
                            <div class="mb-3">
                                <label for="editUserSuscrito" class="form-label">Suscripcion</label>
                                <input type="text" class="form-control" id="editUserSuscrito" name="editUserSuscrito">
                            </div>
                            <div class="mb-3">
                                <label for="editUserRol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="editUserRol" name="editUserRol">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-actualizarUser btn-primary " data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Users -->
        <div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="createUserEmail" name="createUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createUserName" name="createUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="createUserFLASTNAME" name="createUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="createUserSLASTNAME" name="createUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="createUserPassword" name="createUserPassword" autocomplete="on" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserPhone" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="createUserPhone" name="createUserPhone">
                            </div>
                            <div class="mb-3">
                                <label for="createUserAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="createUserAddress" name="createUserAddress" rows="3">
                            </div>
                            <div class="mb-3">
                                <label for="createUserSuscrito" class="form-label">Suscripcion</label>
                                <input type="text" class="form-control" id="createUserSuscrito" name="createUserSuscrito">
                            </div>
                            <div class="mb-3">
                                <label for="createUserRol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="createUserRol" name="createUserRol">
                            </div>


                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="crearUsuarioButton" class="btn btn-primary" data-bs-dismiss="modal" data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Usuarios</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\PVSupplies\Admin\light\index2.php"><img src="\PVSupplies\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createUser" title=""><i class="icon-user-follow"></i><span>
                                Agregar usuario</span></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Información de usuarios
                                </h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <?php
                                        include '../adminTool/bd_conn.php';

                                        $consulta = "SELECT * FROM USERS";
                                        $result = $con->query($consulta);


                                        if ($result->num_rows > 0) {
                                            echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                                            echo "<thead><tr>
                                            <th>Num de Usuario</th>
                                            <th>Nombre</th>
                                            <th>Primer Apellido</th>
                                            <th>Segundo Apellido</th>
                                            <th>Email</th>
                                            <th>Telefono</th> 
                                            <th>Acciones</th>
                                            </tr></thead>";
                                            echo "<tbody id='userTableBody'>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['IDUSER'] . "</td>";
                                                $userId = $row['IDUSER'];
                                                echo "<td>" . $row['NAME'] . "</td>";
                                                echo "<td>" . $row['FLASTNAME'] . "</td>";
                                                echo "<td>" . $row['SLASTNAME'] . "</td>";
                                                echo "<td>" . $row['EMAIL'] . "</td>";
                                                echo "<td>" . $row['PHONE'] . "</td>";

                                                echo "<td>

                                                <button type='button' class='btn btn-info btn-infoUsuarios  mb-2' data-bs-toggle='modal' data-bs-target='#infoUser' data-bs-id='$userId'> 
                                                <i class='fa fa-info-circle'></i>
                                                <span>Ver</span></button>
                                                
                                                <button type='button' class='btn btn-editar btn-editarUser btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$userId' data-bs-target='#editUser' >
                                                <i class='fa fa-pencil'></i>
                                                <span>Editar</span></button>
                                            
                                                <button type='button' class='btn btn-borrar btn-borrarUser btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$userId'>
                                                <i class='fa fa-trash-o'></i> 
                                                <span>Eliminar</span></button>
                                        
                                                </td>";

                                                echo "</tr>";
                                            }

                                            echo "</tbody>";
                                            echo "<tfoot>
                                                <tr>
                                                <th>Num de Usuario</th>
                                                <th>Nombre</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Email</th>
                                                <th>Telefono</th> 
                                                <th>Acciones</th>
                                                </tr>
                                            </tfoot>";
                                            echo "</table>";
                                        } else {
                                            echo "No hay usuarios";
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="\PVSupplies\Admin\light\adminScript\usuarios2.js"></script>
</body>

</html>