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

    <?php
    session_start();
    include 'header.php'
    ?>

    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <img class="breadcrumb-area" src="../../assets/images/banner/Catalogo2.png" alt="Catálogo">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Catálogo</h2>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li class="active">Catálogo</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Content Wrapper Area -->
    <div class="hiraola-content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">

                <!-- Filters Area START -->
                    <div class="hiraola-sidebar-catagories_area">
                        <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Precio</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Precio : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <button id="filterButton" type="button">Filtrar</button>
                                </div>
                            </div>
                        </div>
                        <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Marca</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                <?php
                                    include '../tools/bd_conn.php';

                                    // Llama al procedimiento almacenado para obtener las marcas con sus productos
                                    $stmt = $con->prepare("CALL GetAllBrandsWProducts()");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $brands = []; // Array para almacenar las marcas y contar el total
                                        $totalCount = 0;

                                        while ($row = $result->fetch_assoc()) {
                                            $brandName = $row['BRAND'];
                                            $brandCount = $row['COUNT'];

                                            // Almacena cada marca en el array
                                            $brands[] = [
                                                'name' => $brandName,
                                                'count' => $brandCount,
                                            ];

                                            // Incrementa el total
                                            $totalCount += $brandCount;
                                        }

                                        // Muestra el enlace "Todos" con el total
                                        echo "<li>";
                                        echo "    <a href='../tools/shop-left-sidebar.php'>Todos ({$totalCount})</a>";
                                        echo "</li>";

                                        // Muestra enlaces individuales para cada marca
                                        foreach ($brands as $brand) {
                                            echo "<li>";
                                            echo "    <a href='javascript:void(0)' class='brand-link' data-value='{$brand['name']}'>{$brand['name']} ({$brand['count']})</a>";
                                            echo "</li>";
                                        }

                                    } else {
                                        echo json_encode(array('error' => 'No hay Marcas disponibles'));
                                    }

                                    $stmt->close();
                                    include '../tools/bd_disconn.php';
                                ?>
                            </ul>
                        </div>
                        <div class="category-module hiraola-sidebar_categories">
                            <div class="category-module_heading">
                                <h5>Categorías</h5>
                            </div>
                            <div class="module-body">
                                <ul class="module-list_item">
                                    <li>
                                        <?php
                                            include '../tools/bd_conn.php';

                                            // Llama al procedimiento almacenado para obtener las categorías con sus productos
                                            $stmt = $con->prepare("CALL GetAllCategoriesWProducts()");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                $categories = []; // Array para almacenar las categorías y contar el total
                                                $totalCount = 0;

                                                while ($row = $result->fetch_assoc()) {
                                                    $categoryName = $row['NAME'];
                                                    $categoryCount = $row['COUNT'];

                                                    // Almacena cada categoría en el array
                                                    $categories[] = [
                                                        'name' => $categoryName,
                                                        'count' => $categoryCount,
                                                    ];

                                                    // Incrementa el total
                                                    $totalCount += $categoryCount;
                                                }

                                                // Muestra el enlace "Todos" con el total
                                                echo "<a href='../tools/shop-left-sidebar.php' >Todos ({$totalCount})</a>";

                                                // Muestra enlaces individuales para cada categoría
                                                foreach ($categories as $category) {
                                                    echo "<a href='javascript:void(0)' class='category-link' data-value='{$category['name']}'>{$category['name']} ({$category['count']})</a>";
                                                }

                                            } else {
                                                echo json_encode(array('error' => 'No hay Categorias disponibles'));
                                            }

                                            $stmt->close();
                                            include '../tools/bd_disconn.php';
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- Filters Area END -->


                    <div class="sidebar-banner_area">
                        <div class="banner-item img-hover_effect">
                            <a href="javascript:void(0)">
                                <img src="../../assets/images/banner/Anuncio1.png" alt="Anuncio1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                        </div>

                <!-- Sort of the products START-->
                        <!-- <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Ordenar por:</label>
                                <select class="nice-select">
                                    <option value="1">Nombre, A a Z</option>
                                    <option value="2">Nombre, Z a A</option>
                                    <option value="3">Precio, Más Bajo al Más Alto</option>
                                    <option value="4">Precio, Más Alto to Más Bajo</option>
                                </select>
                            </div>
                        </div> -->
                <!-- Sort of the products ENDS -->


                    </div>


                <!-- List of the products START -->
                    <div class='shop-product-wrap grid gridview-3 row'>


                    </div>
                <!-- List of the products END -->

                </div>
            </div>
        </div>
        <!-- Hiraola's Content Wrapper Area End Here -->


        <?php
        include 'footer.php'
        ?>


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
    <script src="../catalogo.js"></script>
    <script src="../busqueda.js"></script>
    <!-- <script src="assets/js/main.min.js"></script> -->

</body>

</html>