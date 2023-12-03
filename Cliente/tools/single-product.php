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

    <?php
include 'header.php'
?>

        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
        <img class="breadcrumb-area" src="https://drive.google.com/uc?export=download&id=1_3flLnN5iN1XnirK9sXlF48xu2TrD3Oz" alt="Single Product">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Detalle de producto</h2>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active">Detalle Producto</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->

        <!-- Begin Hiraola's Single Product Area -->
        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border">
 
                                <?php
                                include 'bd_conn.php';
                                if (isset($_GET['idprod'])) {
                                    $productID = $_GET['idprod'];
                                    /********* OLD CODE ***********/
                                    // $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                    // $result = $con->query($sql); 
                                    // $row = $result->fetch_assoc(); 


                                    /****WITH STORED PROCEDURE****/
                                    // Llama al procedimiento almacenado para obtener el producto por ID
                                    $stmt = $con->prepare("CALL GetProductByID(?)");
                                    $stmt->bind_param("i", $productID);

                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows == 1) {
                                        $row = $result->fetch_assoc();
                                        // Consulta la base de datos o realiza la lógica necesaria para mostrar el producto con $idprod
                                        echo"<img class='zoompro' src= '{$row['IMAGE']}' alt='Imagen del Producto'/>";                                 
                                    } else {
                                        echo "No hay productos";
                                    }

                                    $stmt->close();
                                }

                                include 'bd_disconn.php'
                                ?>

                                <?php
                                    include 'bd_conn.php';
                                    if (isset($_GET['idprod'])) {
                                        $productID = $_GET['idprod'];
                                        /********* OLD CODE ***********/
                                        // $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                        // $result = $con->query($sql); 
                                        // $row = $result->fetch_assoc(); 


                                        /****WITH STORED PROCEDURE****/
                                        // Llama al procedimiento almacenado para obtener el producto por ID
                                        $stmt = $con->prepare("CALL GetAllImagesProduct(?)");
                                        $stmt->bind_param("i", $productID);

                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows > 0) {
                                            echo"<div id='gallery' class='sp-img_slider'>";
                                            while ($row = $result->fetch_assoc()) {
                                                echo"    <a data-image='{$row['IMAGE']}' data-zoom-image='{$row['IMAGE']}'>";
                                                echo"        <img src='{$row['IMAGE']}' alt='Product Image'>";
                                                echo"    </a>";
                                            }
                                            echo"</div>";
                                            
                                        } else {
                                            echo json_encode(array('error' => 'No hay IMAGENES disponibles'));
                                        }
                                        
                                        $stmt->close();
                                    }

                                    include 'bd_disconn.php'
                                ?>
   
                                </div>
 
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content">
                                <div class="sp-heading">

                                <?php
                                include 'bd_conn.php';
                                if (isset($_GET['idprod'])) {
                                    $productID = $_GET['idprod'];
                                    /********* OLD CODE ***********/
                                    // $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                    // $result = $con->query($sql); 
                                    // $row = $result->fetch_assoc(); 


                                    /****WITH STORED PROCEDURE****/
                                    // Llama al procedimiento almacenado para obtener el producto por ID
                                    $stmt = $con->prepare("CALL GetProductByID(?)");
                                    $stmt->bind_param("i", $productID);

                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows == 1) {
                                        $row = $result->fetch_assoc();
                                        // Consulta la base de datos o realiza la lógica necesaria para mostrar el producto con $idprod
                                        echo"<h5> {$row['NAME']}</a></h6>";                       
                                    } else {
                                        echo "No hay productos";
                                    }

                                    $stmt->close();
                                }
                                include 'bd_disconn.php'
                                ?>  

                            </div>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                    </ul>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                    <?php
                                        include 'bd_conn.php';
                                     
                                        if (isset($_GET['idprod'])) {
                                            $productID = $_GET['idprod'];
                                            /********* OLD CODE ***********/
                                            // $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                            // $result = $con->query($sql); 
                                            // $row = $result->fetch_assoc(); 


                                            /****WITH STORED PROCEDURE****/
                                            // Llama al procedimiento almacenado para obtener el producto por ID
                                            $stmt = $con->prepare("CALL GetProductByID(?)");
                                            $stmt->bind_param("i", $productID);

                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows == 1) {
                                                $row = $result->fetch_assoc();
                                                // Consulta la base de datos o realiza la lógica necesaria para mostrar el producto con $idprod                              
                                                echo"<li>Precio: ₡{$row['PRICE']} </li>";
                                                echo"<li>Marca: {$row['BRAND']} </li>";              
                                            } else {
                                                echo "No hay productos";
                                            }

                                            $stmt->close();
                                        }
                                        include 'bd_disconn.php'
                                    ?>
                                        
                                        <li>Disponibilidad: <a href="javascript:void(0)">In Stock</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div> -->
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><a class="qty-cart_btn" href="cart.php">Add To Cart</a></li>
                                        <li><a class="qty-wishlist_btn" href="wishlist.php" data-bs-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a class="qty-compare_btn" href="compare.php" data-bs-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    </ul>
                                </div>

                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Area End Here -->

        <!-- Begin Hiraola's Single Product Tab Area -->
        <div class="hiraola-product-tab_area-2 sp-product-tab_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav ">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-bs-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                    <!-- <li><a data-bs-toggle="tab" href="#specification"><span>Specification</span></a></li>
                                    <li><a data-bs-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li> -->
                                </ul>
                            </div>

                            <div class="tab-content hiraola-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>

                                        <?php
                                            include 'bd_conn.php';
                                     
                                            if (isset($_GET['idprod'])) {
                                                $productID = $_GET['idprod'];
                                                /********* OLD CODE ***********/
                                                // $sql = "SELECT * FROM PRODUCT WHERE IDPRODUCT = $productID";
                                                // $result = $con->query($sql); 
                                                // $row = $result->fetch_assoc(); 


                                                /****WITH STORED PROCEDURE****/
                                                // Llama al procedimiento almacenado para obtener el producto por ID
                                                $stmt = $con->prepare("CALL GetProductByID(?)");
                                                $stmt->bind_param("i", $productID);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows == 1) {
                                                    $row = $result->fetch_assoc();
                                                    // Consulta la base de datos o realiza la lógica necesaria para mostrar el producto con $idprod                          
                                                    echo"<li><strong> {$row['NAME']}</strong> </li>";
                                                    echo"<span> {$row['DESCRIPTION']}</span>";
                                                    echo"<li><a class='hiraola-add_cart' href='cart.php?idprod={$row['IDPRODUCT']}' data-bs-toggle='tooltip' data-placement='top' title='Agregar al Carrito'><i class='ion-bag'></i></a></li>";     
                                                                    
                                                } else {
                                                    echo "No hay productos";
                                                }

                                                $stmt->close();
                                            }
                                            include 'bd_disconn.php'
                                        ?>


                                            

                                        </ul>
                                    </div>
                                </div> 


                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Tab Area End Here -->





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