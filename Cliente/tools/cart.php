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
        session_start();
include 'header.php'
?>
        <!-- Hiraola's Header Main Area End Here -->

        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
        <img class="breadcrumb-area" src="https://drive.google.com/uc?export=download&id=1CdIbHV4Sdvjis6gKxHJPwDpoPmmuGzCX" alt="Carrito1">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Detalle de Carrito de compras</h2>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active">Carrito de compras</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <!-- Begin Hiraola's Cart Area -->
        <div class="hiraola-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="hiraola-product-remove">Remover</th>
                                            <th class="hiraola-product-thumbnail">Imagen</th>
                                            <th class="cart-product-name">Producto</th>
                                            <th class="hiraola-product-price">Precio</th>
                                            <th class="hiraola-product-quantity">Cantidad</th>
                                            <th class="hiraola-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        <?php
                                                
                                                include 'bd_conn.php';
                                                if (isset($_GET['idprod'])) {
                                                $productID = $_GET['idprod'];
                                                if (!isset($_SESSION['listaCarrito'])){
                                                    $_SESSION['listaCarrito'] = array();
                                                }
                                                if (!in_array($productID, $_SESSION['listaCarrito'])){
                                                    $_SESSION['listaCarrito'][] = $productID;
                                                }
                                            }

                                                if(isset($_SESSION['listaCarrito']) && !empty($_SESSION['listaCarrito'])){
                                                    foreach ($_SESSION['listaCarrito'] as $productID){
                                                    $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                                    $result = $con->query($sql); 
                                                    $row = $result->fetch_assoc(); 
                                                    echo"<tr>";
                                                    echo"<td class='hiraola-product_remove'><a href='../Carrito/borrarCarrito.php?idprod={$row['IDPRODUCT']}'><i class='fa fa-trash'
                                                    title='Eliminar'></i></a></td>";
                                                    echo"<td class='hiraola-product-thumbnail'><a href='single-product.php?idprod={$row['IDPRODUCT']}'> <img src= '{$row['IMAGE']}' width='160' height='140'/> ";
                                                    echo"<td class='hiraola-product-name'><a href='single-product.php?idprod={$row['IDPRODUCT']}'>{$row['NAME']} </a></td> ";  
                                                    echo"<td class='hiraola-product-price'><span class='amount'>₡{$row['PRICE']}</td> ";  
                                                    echo"<td class='quantity'><div class='cart-plus-minus'>  
                                                    <input class='cart-plus-minus-box' value='1' type='text'> 
                                                    <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                                    <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div></div></td> ";
                                                    echo "<td class='product-subtotal'><span class='amount'>₡{$row['PRICE']}</span></td>";

                                                    echo"</tr>";


                                                    }

                                                } else {
                                                  echo "No hay productos";
                                                            }

                                                    include 'bd_disconn.php';
                                                ?> 
                               
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Código del cupón" type="text">
                                            <input class="button" name="apply_coupon" value="Aplicar Cupón" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button" href="limpiarCarrito.php" value="Limpiar carrito" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Total a pagar</h2>
                                        <ul>
                                            <li>Subtotal <span>$118.60</span></li>
                                            <li>Total <span>$118.60</span></li>
                                        </ul>
                                        <a href="limpiarCarrito.php">Proceder a la compra</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Cart Area End Here -->
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
    <!-- <script src="assets/js/main.min.js"></script> -->

</body>

</html>