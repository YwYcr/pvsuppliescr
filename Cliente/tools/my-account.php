<?php include 'bd_conn.php'; ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PVSupplies</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="../../assets/css/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="../../assets/css/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="../../assets/css/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="../../assets/css/nice-select.min.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="../../assets/css/timecircles.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Hiraola's Header Main Area -->
        <?php
        include 'header.php'
            ?>
        <!-- Hiraola's Header Main Area End Here -->

        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <img class="breadcrumb-area" src="../../assets/images/banner/Perfil1.png" alt="Perfil1">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Mi Perfil</h2>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active">Mi Cuenta</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <!-- Begin Hiraola's Page Content Area -->
        <main class="page-content">
            <!-- Begin Hiraola's Account Page Area -->
            <div class="account-page-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                        href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                        aria-selected="true">Panel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab"
                                        href="#account-orders" role="tab" aria-controls="account-orders"
                                        aria-selected="false">Ordenes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-bs-toggle="tab"
                                        href="#account-address" role="tab" aria-controls="account-address"
                                        aria-selected="false">Direcciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-bs-toggle="tab"
                                        href="#account-details" role="tab" aria-controls="account-details"
                                        aria-selected="false">Detalles de la cuenta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="index.php" role="tab"
                                        aria-selected="false">Cerrar sesion</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                    aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hola <b>$nombre</b> (No es $nombre? <a href="index.php">Cerrar Sesion</a>)
                                        </p>
                                        <p>Desde el panel de su cuenta puede ver sus pedidos recientes, administrar su
                                            envío y
                                            direcciones de facturación y <a href="javascript:void(0)">editar su
                                                contraseña y los
                                                detalles de su cuenta.</a>.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                    aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MIS ORDENES</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ÓRDENES</th>
                                                        <th>FECHAS</th>
                                                        <th>ESTADOS</th>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td><a class="account-order-id"
                                                                href="javascript:void(0)">#5364</a></td>
                                                        <td>Mar 27, 2022</td>
                                                        <td>On Hold</td>
                                                        <td>£162.00 for 2 items</td>
                                                        <td><a href="javascript:void(0)"
                                                                class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a class="account-order-id"
                                                                href="javascript:void(0)">#5356</a></td>
                                                        <td>Mar 27, 2022</td>
                                                        <td>On Hold</td>
                                                        <td>£162.00 for 2 items</td>
                                                        <td><a href="javascript:void(0)"
                                                                class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-address" role="tabpanel"
                                    aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>Las siguientes direcciones se utilizarán en la página de pago de forma
                                            predeterminada.</p>
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="small-title">DIRECCIÓN DE ENVIO</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                            <div class="col">
                                                <h4 class="small-title">DIRECCIÓN DE ENVÍO</h4>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel"
                                    aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="#" class="hiraola-form">
                                            <div class="hiraola-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">Nombre*</label>
                                                    <input type="text" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-lastname">Apellido*</label>
                                                    <input type="text" id="account-details-lastname">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-email">Correo*</label>
                                                    <input type="email" id="account-details-email">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Contraseña actual (dejar en
                                                        blanco para salir
                                                        sin modificar)</label>
                                                    <input type="password" id="account-details-oldpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-newpass">Nueva contraseña (dejar en
                                                        blanco para salir
                                                        sin modificar)</label>
                                                    <input type="password" id="account-details-newpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-confpass">Confirmar nueva
                                                        contraseña</label>
                                                    <input type="password" id="account-details-confpass">
                                                </div>
                                                <div class="single-input">
                                                    <button class="hiraola-btn hiraola-btn_dark"
                                                        type="submit"><span>Guardar Cambios</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hiraola's Account Page Area End Here -->
        </main>
        <!-- Hiraola's Page Content Area End Here -->
        <!-- Begin Hiraola's Footer Area -->
        <?php
        include 'footer.php'
            ?>
        <!-- Hiraola's Footer Area End Here -->

    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="../../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="../../assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="../../assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="../../assets/js/plugins/countdown.min.js"></script>
    <!-- Barrating JS -->
    <script src="../../assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="../../assets/js/plugins/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="../../assets/js/plugins/waypoints.min.js"></script>
    <!-- Nice Select JS -->
    <script src="../../assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="../../assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="../../assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="../../assets/js/plugins/scroll-top.min.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="../../assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- ElevateZoom JS -->
    <script src="../../assets/js/plugins/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- Timecircles JS -->
    <script src="../../assets/js/plugins/timecircles.min.js"></script>
    <!-- Mailchimp Ajax JS -->
    <script src="../../assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    <script src="../busqueda.js"></script>
    <!-- <script src="assets/js/main.min.js"></script> -->

</body>

</html>

<?php include 'bd_conn.php'; ?>