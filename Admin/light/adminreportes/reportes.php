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

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Reportes</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Generación de Reportes</li>
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
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#productTab">1- Productos</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#proveedoresTab">2- Proveedores</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ordernesTab">3- Ordenes</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="productTab">

                                    <div class="header">
                                        <h2>Reporte de productos
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="body">
                                        <div class="table-responsive"> 
                                            <?php
                                            include '../adminTool/bd_conn.php';

                                            $stmt = $con->prepare("CALL GetAllProducts()");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-striped table-hover dataTable js-exportable'>";
                                                echo "<thead><tr>
                                                        <th>Product ID</th>
                                                        <th>Nombre</th>
                                                        <th>Marca</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Descuento %</th>
                                                        <th>Categoria</th>
                                                        <th>Valido</th>
                                                        </tr></thead>";
                                                echo "<tbody>";

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['IDPRODUCT'] . "</td>";
                                                    $productID = $row['IDPRODUCT'];
                                                    echo "<td>" . $row['NAME'] . "</td>";
                                                    echo "<td>" . $row['BRAND'] . "</td>";
                                                    echo "<td>" . $row['QUANTITY'] . "</td>";
                                                    echo "<td>" . $row['PRICE'] . "</td>";
                                                    echo "<td>" . $row['DISCOUNT'] . "</td>";
                                                    echo "<td>" . $row['CATEGORYNAME'] . "</td>";
                                                    echo "<td>" . ($row['VALID'] == 1 ? "Si" : "No") . "</td>";
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
                                                        <th>Descuento %</th>
                                                        <th>Categoria</th>
                                                        <th>Valido</th>
                                                        </tr>
                                                    </tfoot>";
                                                echo "</table>";
                                            } else {
                                                echo "No hay productos";
                                            }

                                            $stmt->close();
                                            include '../adminTool/bd_disconn.php';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="proveedoresTab">

                                    <div class="header">
                                        <h2>Reporte de Órdenes
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="body">
                                    <div class="table-responsive"> 
                                            <?php
                                            include '../adminTool/bd_conn.php';

                                            $stmt = $con->prepare("CALL GetAllSuppliers()");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-striped table-hover dataTable js-exportable'>";
                                                echo "<thead><tr>
                                                        <th>Proveedor ID</th>
                                                        <th>Nombre</th>
                                                        <th>No. Social</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>POC</th>
                                                        <th>Dirreccion</th>
                                                        <th>Fecha de Registro</th>
                                                        </tr></thead>";
                                                echo "<tbody>";

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['IDSUPPLIER'] . "</td>";
                                                    echo "<td>" . $row['NAME'] . "</td>";
                                                    echo "<td>" . $row['SOCIALID'] . "</td>";
                                                    echo "<td>" . $row['PHONE'] . "</td>";
                                                    echo "<td>" . $row['EMAIL'] . "</td>";
                                                    echo "<td>" . $row['POC'] . "</td>";
                                                    echo "<td>" . $row['ADDRESS'] . "</td>";
                                                    echo "<td>" . $row['CREATEDATE'] . "</td>";
                                                    echo "</tr>";
                                                }

                                                echo "</tbody>";
                                                echo "<tfoot>
                                                        <tr>
                                                        <th>Proveedor ID</th>
                                                        <th>Nombre</th>
                                                        <th>No. Social</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>POC</th>
                                                        <th>Dirreccion</th>
                                                        <th>Fecha de Registro</th>
                                                        </tr>
                                                    </tfoot>";
                                                echo "</table>";
                                            } else {
                                                echo "No hay productos";
                                            }

                                            $stmt->close();
                                            include '../adminTool/bd_disconn.php';
                                            ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="ordernesTab">

                                    <div class="header">
                                        <h2>Reporte de Proveedores
                                        </h2>
                                        <ul class="header-dropdown dropdown">
                                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                        </ul>
                                        
                                    </div>

                                    <div class="body">
                                    <div class="table-responsive"> 
                                            <?php
                                            include '../adminTool/bd_conn.php';

                                            $stmt = $con->prepare("CALL GetAllOrders()");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-striped table-hover dataTable js-exportable'>";
                                                echo "<thead><tr>
                                                        <th>No Orden</th>
                                                        <th>Subtotal</th>
                                                        <th>Total</th>
                                                        <th>Fecha de Orden</th>
                                                        <th>Estado</th>
                                                        <th>Dirrección</th>
                                                        <th>ID Usuario</th>
                                                        </tr></thead>";
                                                echo "<tbody>";

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['IDORDER'] . "</td>";
                                                    echo "<td>" . $row['SUBTOTAL'] . "</td>";
                                                    echo "<td>" . $row['TOTAL'] . "</td>";
                                                    echo "<td>" . $row['CREATEDATE'] . "</td>";
                                                    echo "<td>" . $row['STATUS'] . "</td>";
                                                    echo "<td>" . $row['ADDRESS'] . "</td>";
                                                    echo "<td>" . $row['IDUSER'] . "</td>";
                                                    echo "</tr>";
                                                }

                                                echo "</tbody>";
                                                echo "<tfoot>
                                                        <tr>
                                                        <th>No Orden</th>
                                                        <th>Subtotal</th>
                                                        <th>Total</th>
                                                        <th>Fecha de Orden</th>
                                                        <th>Estado</th>
                                                        <th>Dirrección</th>
                                                        <th>ID Usuario</th>
                                                        </tr>
                                                    </tfoot>";
                                                echo "</table>";
                                            } else {
                                                echo "No hay productos";
                                            }

                                            $stmt->close();
                                            include '../adminTool/bd_disconn.php';
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


</body>

</html>