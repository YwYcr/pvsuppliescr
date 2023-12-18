<!doctype html>
<html lang="en">

<head>
<title>PVSupplies | Administrador</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<link rel="icon" href="\pvsuppliescr\Admin\light\favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

<link rel="stylesheet" href="../assets/vendor/c3/c3.min.css"/>
<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

</head>
<body class="theme-blue">

<!-- Page Loader -->
    <?php
        include 'pageLoader.php';
    ?>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <?php
        include 'header2.php';
    ?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>            
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="../light/adminreportes/reportes.php" class="btn btn-sm btn-primary" title="">Ver Reportes</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="w_summary">
                                <!-- <div class="s_chart">
                                    <span class="chart">5,2,3,6,9,8,4,1,2,8</span>
                                </div> -->
                                <div class="s_detail">
                                <?php
                                    include 'adminTool/bd_conn.php';

                                    // Llama al stored procedure usando una sentencia preparada
                                    $stmt = $con->prepare("CALL GetTotalOrders()");
                                    $stmt->execute();
                                    $stmt->bind_result($totalOrders);
                                    $stmt->fetch();

                                    // Formatea el resultado como dinero
                                    $formattedTotalOrders = number_format($totalOrders, 2, '.', ',');

                                    echo "<h2 class='font700 mb-0'>₡$formattedTotalOrders</h2>";

                                    $stmt->close();
                                    include 'adminTool/bd_disconn.php';
                                ?>
                                    <span><i class="fa fa-level-up text-success"></i> Total en Ordenes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="w_summary">
                                <!-- <div class="s_chart">
                                    <span class="chart">6,3,2,5,8,9,5,4,2,3</span>
                                </div> -->
                                <div class="s_detail">
                                    <?php
                                        include 'adminTool/bd_conn.php';

                                        // Llama al stored procedure usando una sentencia preparada
                                        $stmt = $con->prepare("CALL GetCountProducts()");
                                        $stmt->execute();
                                        $stmt->bind_result($totalProducts);
                                        $stmt->fetch();

                                        // Formatea el resultado como dinero
                                        $formattedTotalProducts = number_format($totalProducts, 0, '.', ',');

                                        echo "<h2 class='font700 mb-0'>$formattedTotalProducts</h2>";

                                        $stmt->close();
                                        include 'adminTool/bd_disconn.php';
                                    ?>
                                    <span><i class="fa fa-level-up text-success"></i> Cantidad de Productos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="w_summary">
                                <!-- <div class="s_chart">
                                    <span class="chart">3,5,1,6,2,4,8,5,3,2</span>
                                </div> -->
                                <div class="s_detail">
                                    <?php
                                        include 'adminTool/bd_conn.php';

                                        // Llama al stored procedure usando una sentencia preparada
                                        $stmt = $con->prepare("CALL GetTotalClientes()");
                                        $stmt->execute();
                                        $stmt->bind_result($totalClientes);
                                        $stmt->fetch();

                                        // Formatea el resultado como dinero
                                        $formattedTotalClientes = number_format($totalClientes, 0, '.', ',');

                                        echo "<h2 class='font700 mb-0'>$formattedTotalClientes</h2>";

                                        $stmt->close();
                                        include 'adminTool/bd_disconn.php';
                                    ?>
                                    <span><i class="fa fa-level-up text-success"></i> Cantidad de Clientes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix">

                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Productos por Categoria</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <small class="text-muted">Gráfico de Productos por categoria</small>
                            <div class="body text-center">
                                <div id="Order_status" style="height: 268px"></div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Top Clientes con mas ordenes</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID Cliente</th>
                                        <th>Nombre cliente</th>
                                        <th>Total en compras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'adminTool/bd_conn.php';

                                        // Llama al stored procedure
                                        $stmt = $con->prepare("CALL GetTopClients()");
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        // Obtén los resultados
                                        while ($row = $result->fetch_assoc()) {
                                            $idUsuario = $row['IDUSER'];
                                            $nombreCompleto = $row['FULLNAME'];
                                            $total = $row['TOTAL'];
                                            echo "<tr>";
                                            echo "<td>$idUsuario</td>";
                                            echo "<td>$nombreCompleto</td>";
                                            echo "<td>$total</td>";
                                            echo "</tr>";
                                        }

                                        // Cierra la conexión a la base de datos
                                        $stmt->close();
                                        include 'adminTool/bd_disconn.php';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
          

            </div>

            <!-- <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Product Valuation</h2>
                        </div>
                        <div class="body">
                            <div id="chart-bar" style="height: 350px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Sales Revenue</h2>
                        </div>
                        <div class="body text-center">
                            <div class="mt-4">
                                <input type="text" class="knob" value="34" data-width="147" data-height="147" data-thickness="0.07" data-bgColor="#ebeeef" data-fgColor="#395bb6">
                            </div>
                            <h3 class="mb-0 mt-3 font300">24,301 <span class="text-green font-15">+3.7%</span></h3>
                            <small>Lorem Ipsum is simply dummy text <br> <a href="#">Read more</a> </small>
                            <div class="mt-4">
                                <span class="chart_3">2,5,8,3,6,9,4,5,6,3</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>My Balance</h2>
                        </div>
                        <div class="body">
                            <div class="card-value float-right text-blue">+15%</div>
                            <h4 class="mb-0 mt-2">$5,021.00</h4>
                        </div>
                        <div class="card-chart-bg">
                            <span id="linecustom">6,7,5,9,7,8,4,7,6,9,11,16,10,8,9,12</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body top_counter">
                            <div class="icon bg-success text-white"><i class="fa fa-area-chart"></i> </div>
                            <div class="content">
                                <span>Growth</span>
                                <h5 class="number mb-0">62%</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body top_counter">
                            <div class="icon bg-warning text-white"><i class="fa fa-building"></i> </div>
                            <div class="content">
                                <span>Properties</span>
                                <h5 class="number mb-0">53,251</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row clearfix">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Resumen de Ordenes</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID Orden</th>
                                        <th>Nombre cliente</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Total de Orden</th>
                                        <th>Fecha de Pedido</th>
                                        <th>Estado de Orden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'adminTool/bd_conn.php';

                                        // Llama al stored procedure
                                        $stmt = $con->prepare("CALL GetListadoOrdernesDashboard()");
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        // Obtén los resultados
                                        while ($row = $result->fetch_assoc()) {
                                            $idOrden = $row['IDORDER'];
                                            $nombreCompleto = $row['FULLNAME'];
                                            $phone = $row['PHONE'];
                                            $address = $row['ADDRESS'];
                                            $total = $row['TOTAL'];
                                            $cratedate = date('d/m/Y H:i', strtotime($row['CREATEDATE']));
                                            $status= $row['STATUS'];

                                            echo "<tr>";
                                            echo "<td>$idOrden</td>";
                                            echo "<td>$nombreCompleto</td>";
                                            echo "<td>$phone</td>";
                                            echo "<td>$address</td>";
                                            echo "<td>$total</td>";
                                            echo "<td>$cratedate</td>";
                                            echo "<td>$status</td>";
                                            echo "</tr>";
                                        }

                                        // Cierra la conexión a la base de datos
                                        $stmt->close();
                                        include 'adminTool/bd_disconn.php';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
</div>

<!-- Javascript -->
<!-- Latest jQuery -->
<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Bootstrap 4x JS  -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/bundles/c3.bundle.js"></script>
<script src="assets/bundles/flotscripts.bundle.js"></script><!-- flot charts Plugin Js --> 
<script src="assets/bundles/knob.bundle.js"></script>

<!-- Project Common JS -->
<script src="assets/js/common.js"></script>
<script src="assets/js/index.js"></script>
<script src="../../Admin/light/adminScript/dashboard.js"></script>
</body>
</html>
