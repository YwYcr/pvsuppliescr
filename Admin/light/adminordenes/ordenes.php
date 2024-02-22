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

        <!-- Modal info OrdenES-->
        <div class="modal fade" id="infoOrden" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion de la Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoOrdenForm">
                            <div class="mb-3">
                                <label for="infoOrdenID" class="form-label">Numero de Orden</label>
                                <input type="text" class="form-control" id="infoOrdenID" name="infoOrdenID" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenTotal" class="form-label">Total</label>
                                <input type="text" class="form-control" id="infoOrdenTotal" name="infoOrdenTotal" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenCreacion" class="form-label">Fecha de Creacion</label>
                                <input type="text" class="form-control" id="infoOrdenCreacion" name="infoOrdenCreacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenStatus" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="infoOrdenStatus" name="infoOrdenStatus" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="infoOrdenAddress" name="infoOrdenAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenUser" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="infoOrdenUser" name="infoOrdenUser" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoOrdenDetalle" class="form-label">Detalle de Orden</label>
                                <input type="text" class="form-control" id="infoOrdenDetalle" name="infoOrdenDetalle" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create Orden -->
        <div class="modal fade" id="createOrden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createOrdenForm">
                            <div class="mb-3">
                                <label for="createOrdenTotal" class="form-label">Total</label>
                                <input type="text" class="form-control" id="createOrdenTotal" name="createOrdenTotal" required>
                            </div>
                            <div class="mb-3">
                                <label for="createOrdenStatus" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="createOrdenStatus" name="createOrdenStatus" required>
                            </div>
                            <div class="mb-3">
                                <label for="createOrdenAddress" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="createOrdenAddress" name="createOrdenAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="createOrdenUser" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="createOrdenUser" name="createOrdenUser" required>
                            </div>
                            <div class="mb-3">
                                <label for="createOrdenDetalle" class="form-label">Detalle de Orden</label>
                                <input type="text" class="form-control" id="createOrdenDetalle" name="createOrdenDetalle" required>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="createOrdenButton" class="btn btn-primary" data-bs-dismiss="modal" data-type="success">Crear Orden</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Orden -->
        <div class="modal fade" id="editOrden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editOrdenForm">
                        <div class="mb-3">
                                <label for="editOrdenID" class="form-label">Numero de Orden</label>
                                <input type="text" class="form-control" id="editOrdenID" name="editOrdenID" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenTotal" class="form-label">Total</label>
                                <input type="text" class="form-control" id="editOrdenTotal" name="editOrdenTotal" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenCreacion" class="form-label">Fecha de Creacion</label>
                                <input type="text" class="form-control" id="editOrdenCreacion" name="editOrdenCreacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenStatus" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="editOrdenStatus" name="editOrdenStatus" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenAddress" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="editOrdenAddress" name="editOrdenAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenUser" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="editOrdenUser" name="editOrdenUser" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrdenDetalle" class="form-label">Detalle de Orden</label>
                                <input type="text" class="form-control" id="editOrdenDetalle" name="editOrdenDetalle" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-actualizarOrden btn-primary " data-bs-dismiss="modal" data-type="success">Modificar</button>

                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Órdenes</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Órdenes</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createOrden" title=""><i class="icon-user-follow"></i><span>
                                Agregar Orden</span></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Información de Órdenes
                                </h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <?php
                                        include '../adminTool/bd_conn.php';

                                        $consulta = "SELECT * FROM ORDERS";
                                        $result = $con->query($consulta);


                                        if ($result->num_rows > 0) {
                                            echo "<table id='orderTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                                            echo "<thead><tr><th>Order ID</th>
                                            <th>Total</th>
                                            <th>Fecha de creacion</th>
                                            <th>Status</th>
                                            <th>Direccion</th>
                                            <th>Usuario</th>
                                            <th>Detalle</th>
                                            <th>Acciones</th>
                                            </tr></thead>";
                                            echo "<tbody id='orderTableBody'>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['IDORDER'] . "</td>";
                                                $orderID = $row['IDORDER'];
                                                echo "<td>" . $row['TOTAL'] . "</td>";
                                                echo "<td>" . $row['CREATEDATE'] . "</td>";
                                                echo "<td>" . $row['STATUS'] . "</td>";
                                                echo "<td>" . $row['ADDRESS'] . "</td>";
                                                echo "<td>" . $row['IDUSER'] . "</td>";
                                                echo "<td>" . $row['ORDERDETAIL'] . "</td>";
                                                echo "<td>

                                                <button type='button' class='btn btn-info btn-infoOrden mb-2' data-bs-toggle='modal' data-bs-target='#infoOrden' data-bs-id='$orderID'> 
                                                <i class='fa fa-info-circle'></i>
                                                <span>Ver</span></button>
                                                
                                                <button type='button' class='btn btn-editarOrden btn-warning mb-2' data-bs-toggle='modal'  data-bs-target='#editOrden' data-bs-id='$orderID' >
                                                <i class='fa fa-pencil'></i>
                                                <span>Editar</span></button>
                                            
                                                <button type='button' class='btn btn-borrarOrden btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$orderID'>
                                                <i class='fa fa-trash-o'></i> 
                                                <span>Eliminar</span></button>
                                        
                                                </td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";

                                            echo "<tfoot>
                                                    <tr>
                                                    <th>Order ID</th>
                                                    <th>Total</th>
                                                    <th>Fecha de creacion</th>
                                                    <th>Status</th>
                                                    <th>Direccion</th>
                                                    <th>Usuario</th>
                                                    <th>Detalle</th>
                                                    <th>Acciones</th>
                                                    </tr>
                                                </tfoot>";
                                            echo "</table>";
                                        } else {
                                            echo "No hay Ordenes";
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
    <script src="\pvsuppliescr\Admin\assets\vendor\sweetalert\sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="\pvsuppliescr\Admin\light\adminScript\ordenes.js"></script>
</body>

</html>