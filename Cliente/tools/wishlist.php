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
include 'header.php';
?>
        <!-- Hiraola's Header Main Area End Here -->

        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Lista de Favoritos</h2>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active">Favoritos</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <!--Begin Hiraola's Wishlist Area -->
        <div class="hiraola-wishlist_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive">
                            <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchProductInput"
                                    placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="searchProduct()">Buscar</button>
                            </div>
                        </div>




                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="hiraola-product_remove">Remover</th>
                                            <th class="hiraola-product-thumbnail">Imagen</th>
                                            <th class="cart-product-name">Nombre</th>
                                            <th class="hiraola-product-price">Precio</th>
                                            <th class="hiraola-cart_btn">Añadir al carrito</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                               <?php
                                                
                                                include 'bd_conn.php';
                                                if (isset($_GET['idprod'])) {
                                                $productID = $_GET['idprod'];
                                                if (!isset($_SESSION['listaFavoritos'])){
                                                    $_SESSION['listaFavoritos'] = array();
                                                }
                                                if (!in_array($productID, $_SESSION['listaFavoritos'])){
                                                    $_SESSION['listaFavoritos'][] = $productID;
                                                }
                                            }

                                                if(isset($_SESSION['listaFavoritos']) && !empty($_SESSION['listaFavoritos'])){
                                                    foreach ($_SESSION['listaFavoritos'] as $productID){
                                                    $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                                    $result = $con->query($sql); 
                                                    $row = $result->fetch_assoc(); 
                                                    echo"<tr>";
                                                    echo"<td class='hiraola-product_remove'><a href='../Favorito/borrarFavorito.php?idprod={$row['IDPRODUCT']}'><i class='fa fa-trash'
                                                    title='Eliminar'></i></a></td>";
                                                    echo"<td class='hiraola-product-thumbnail'><a href='single-product.php?idprod={$row['IDPRODUCT']}'> <img src= '{$row['IMAGE']}' width='160' height='140'/> ";
                                                    echo"<td class='hiraola-product-name'><a href='single-product.php?idprod={$row['IDPRODUCT']}'>{$row['NAME']} </a></td> ";  
                                                    echo"<td class='hiraola-product-price'><span class='amount'>₡{$row['PRICE']}</td> ";
                                                    echo"<td class='hiraola-cart_btn'><a href='javascript:void(0)'>Añadir al carrito</a></td> "; 
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Wishlist Area End Here -->
        
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
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
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