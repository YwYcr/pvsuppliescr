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
                                                        $quantity = isset($_SESSION['cantidad'][$productID]) ? $_SESSION['cantidad'][$productID] : 1;
                                                        echo"<tr>";
                                                        echo"<td class='hiraola-product_remove'><a href='../Carrito/borrarCarrito.php?idprod={$row['IDPRODUCT']}'><i class='fa fa-trash'
                                                        title='Eliminar'></i></a></td>";
                                                        echo"<td class='hiraola-product-thumbnail'><a href='single-product.php?idprod={$row['IDPRODUCT']}'> <img src= '{$row['IMAGE']}' width='160' height='140'/> ";
                                                        echo"<td class='hiraola-product-name'><a href='single-product.php?idprod={$row['IDPRODUCT']}'>{$row['NAME']} </a></td> ";  
                                                        echo"<td class='hiraola-product-price'><span class='amount'>₡{$row['PRICE']}</td> ";  
                                                        echo "<td class='quantity'>";
                                                        echo "<div class='quantity-wrapper'>";
                                                        echo "<i class='fa fa-arrow-up' onclick='changeQuantity({$row['IDPRODUCT']}, 1)'></i>";
                                                        echo "<span id='quantity{$row['IDPRODUCT']}'>{$quantity}</span>";
                                                        echo "<i class='fa fa-arrow-down' onclick='changeQuantity({$row['IDPRODUCT']}, -1)'></i>";
                                                        echo "</div>";
                                                        echo "</td>";
                                                      $totalConImpuesto=0;
                                                      $total=0;
                                                      $subtotal = $row['PRICE'] * $quantity;
                                                      $total = $subtotal;
                                                      $totalConImpuesto = $total * 1.13;

                                                      
                                                      
                                                        echo "<td class='product-subtotal' id='subtotal{$row['IDPRODUCT']}'><span class='amount'>₡{$subtotal}</span></td>";


                                                        echo"</tr>";
                                                    }    

                                                    $stmt->close();
                                                    
                                                    }
                                                                                                        
                                                    echo "<tr><td colspan='5' align='right'>Total IVA (13%):</td><td id='totalWithTax' class='product-subtotal'><span class='amount'>₡{$totalConImpuesto}</span></td></tr>";

                                                } else {
                                                  echo "No hay productos";
                                                            }

                                                    include 'bd_disconn.php';
                                                ?> 
                               
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            
                            echo "<div class='row'>";
                            echo "<div class='col-12'>";
                            echo " <div class='coupon-all'>";
                            echo "   <div class='coupon2'>";
                            echo "         <a href='../Carrito/limpiarCarrito.php' class='btn btn-light'>Confirmar Compra</a>";
                            echo "       </div>";
                            echo "    <div class='coupon2'>";
                            echo "       <a href='../Carrito/limpiarCarrito.php' class='btn btn-danger'>Limpiar carrito</a>";
                            echo "    </div>";

                            echo "   </div>";
                            echo "  </div>";
                            echo "  </div>";
                            ?>
                            
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


    <script>
function changeQuantity(productId, change) {
    var quantityElement = document.getElementById('quantity' + productId);
    var currentQuantity = parseInt(quantityElement.innerHTML);
    var newQuantity = currentQuantity + change;

    if (newQuantity >= 1) {
        var price = <?php echo $row['PRICE']; ?>;
        var newSubtotal = price * newQuantity;
        document.getElementById('subtotal' + productId).innerHTML = "<span class='amount'>₡" + newSubtotal + "</span>";

        var currentTotalWithTax = parseFloat(document.getElementById('totalWithTax').innerText.replace('₡', ''));
        var originalSubtotal = <?php echo $subtotal; ?>;
        
        var newTotalWithTax = currentTotalWithTax - originalSubtotal + newSubtotal;
        document.getElementById('totalWithTax').innerHTML = "<span class='amount'>₡" + newTotalWithTax + "</span>";

        quantityElement.innerHTML = newQuantity;

    }
}
</script>


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