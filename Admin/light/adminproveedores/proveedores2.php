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

        <!-- Modal info PROVEEDORES-->
        <div class="modal fade" id="infoProveedor" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoProveedorForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoProveedorID" name="infoProveedorID" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorName" class="form-label">Nombre Proveedor</label>
                                <input type="text" class="form-control" id="infoProveedorName" name="infoProveedorName" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoProveedorEmail" name="infoProveedorEmail" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorTelefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="infoProveedorTelefono" name="infoProveedorTelefono" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorPOC" class="form-label">POC</label>
                                <input type="text" class="form-control" id="infoProveedorPOC" name="infoProveedorPOC" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="infoProveedorCedJuridica" name="infoProveedorCedJuridica" required readonly >
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorDireccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="infoProveedorDireccion" name="infoProveedorDireccion" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorProvincia" class="form-label">Provincia</label>
                                <input type="text" class="form-control" id="infoProveedorProvincia" name="infoProveedorProvincia" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorCanton" class="form-label">Cantón</label>
                                <input type="text" class="form-control" id="infoProveedorCanton" name="infoProveedorCanton" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoProveedorDistrito" class="form-label">Distrito</label>
                                <input type="text" class="form-control" id="infoProveedorDistrito" name="infoProveedorDistrito" required readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Proveedor -->
        <div class="modal fade" id="createProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="createProveedorName" name="createProveedorName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createProveedorEmail" name="createProveedorEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorTelefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="createProveedorTelefono" name="createProveedorTelefono" placeholder="####-####" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorPOC" class="form-label">POC</label>
                                <input type="text" class="form-control" id="createProveedorPOC" name="createProveedorPOC" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="createProveedorCedJuridica" name="createProveedorCedJuridica" placeholder="#-###-######" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorDireccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="createProveedorDireccion" name="createProveedorDireccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorProvincia" class="form-label">Provincia</label>
                                <select class="form-select" id="createProveedorProvincia" name="createProveedorProvincia" required>
                                    <option value="" disabled selected>Selecciona una provincia</option>
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Limón">Limón</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="San José">San José</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorCanton" class="form-label">Cantón</label>
                                <select class="form-select" id="createProveedorCanton" name="createProveedorCanton" required>
                                    <option value="" disabled selected>Selecciona un cantón</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createProveedorDistrito" class="form-label">Distrito</label>
                                <select class="form-select" id="createProveedorDistrito" name="createProveedorDistrito" required>
                                    <option value="" disabled selected>Selecciona un distrito</option>
                                </select>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="createProveedorButton" class="btn btn-primary" data-bs-dismiss="modal" data-type="success">Agregar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Proveedor -->
        <div class="modal fade" id="editProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProveedorForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editProveedorID" name="editProveedorID" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editProveedorName" name="editProveedorName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editProveedorEmail" name="editProveedorEmail" required>
                            </div>

                            <div class="mb-3">
                                <label for="editProveedorTelefono" class="form-label"> Telefono </label>
                                <input type="text" class="form-control" id="editProveedorTelefono" name="editProveedorTelefono" placeholder="####-####" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorPOC" class="form-label"> POC </label>
                                <input type="text" class="form-control" id="editProveedorPOC" name="editProveedorPOC" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorCedJuridica" class="form-label">Ced. Juridica</label>
                                <input type="text" class="form-control" id="editProveedorCedJuridica" name="editProveedorCedJuridica" autocomplete="on" placeholder="#-###-######" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorDireccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="editProveedorDireccion" name="editProveedorDireccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorProvincia" class="form-label">Provincia</label>
                                <select class="form-select" id="editProveedorProvincia" name="editProveedorProvincia" required>
                                    <option value="" disabled selected>Selecciona una provincia</option>
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Limón">Limón</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="San José">San José</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorCanton" class="form-label">Cantón</label>
                                <select class="form-select" id="editProveedorCanton" name="editProveedorCanton" required>
                                    <option value="" disabled selected>Selecciona un cantón</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editProveedorDistrito" class="form-label">Distrito</label>
                                <select class="form-select" id="editProveedorDistrito" name="editProveedorDistrito" required>
                                    <option value="" disabled selected>Selecciona un distrito</option>
                                </select>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-actualizarProveedor btn-primary " data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Proveedores</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createProveedor" title=""><i class="icon-user-follow"></i><span>
                                Agregar Proveedor</span></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Información de Proveedores
                                </h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <?php
                                    include '../adminTool/bd_conn.php';

                                    $consulta = "SELECT * FROM SUPPLIER";
                                    $result = $con->query($consulta);


                                    if ($result->num_rows > 0) {
                                        echo "<table id='supplierTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                                        echo "<thead><tr><th>ID</th><th>Nombre</th><th>CedJuridica</th><th>Teléfono</th><th>POC</th><th>Email</th><th>Direccion</th><th>Acciones</th></tr></thead>";
                                        echo "<tbody id='supplierTableBody'>";

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['IDSUPPLIER'] . "</td>";
                                            $proveedorID = $row['IDSUPPLIER'];
                                            echo "<td>" . $row['NAME'] . "</td>";
                                            echo "<td>" . $row['SOCIALID'] . "</td>";
                                            echo "<td>" . $row['PHONE'] . "</td>";
                                            echo "<td>" . $row['POC'] . "</td>";
                                            echo "<td>" . $row['EMAIL'] . "</td>";
                                            echo "<td>" . $row['ADDRESS'] . "</td>";
                                            echo "<td>

                                                <button type='button' class='btn btn-info btn-infoProveedor mb-2' data-bs-toggle='modal' data-bs-target='#infoProveedor' data-bs-id='$proveedorID'> 
                                                <i class='fa fa-info-circle'></i>
                                                <span>Ver</span></button>
                                                
                                                <button type='button' class='btn btn-editarProveedor btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$proveedorID' data-bs-target='#editProveedor' >
                                                <i class='fa fa-pencil'></i>
                                                <span>Editar</span></button>
                                            
                                                <button type='button' class='btn btn-borrarProveedor btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$proveedorID'>
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
                                                    <th>CedJuridica</th>
                                                    <th>Teléfono</th>
                                                    <th>POC</th>
                                                    <th>Email</th>
                                                    <th>Direccion</th>
                                                    <th>Acciones</th>
                                                        </tr>
                                                </tfoot>";
                                        echo "</table>";
                                    } else {
                                        echo "No hay proveedores";
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
    <!-- <script src="\pvsuppliescr\Admin\assets\vendor\sweetalert\sweetalert.min.js"></script>SweetAlert Plugin Js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="\pvsuppliescr\Admin\light\adminScript\proveedores2.js"></script>
</body>

</html>