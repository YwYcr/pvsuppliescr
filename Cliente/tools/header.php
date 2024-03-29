<?php
session_start();

include 'bd_conn.php';
include 'redirect.php';

?>

<script src= "../../Cliente/formLogin.js"></script>
<script src= "../../Cliente/FormRegistro.js"></script>


<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b"></script>
    <!-- Recaptcha -->
    
<!-- Begin Hiraola's Header Main Area -->
<header class="header-main_area">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="ht-left_area">
                                <div class="header-shipping_area">
                                    <ul>
                                        <li>
                                            <span>Teléfono:</span>
                                            <a href="callto://+123123321345">(+506) 8888 - 8888</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                    
                                    
<?php
if(isset($_SESSION['rol'])) {
     // Si el usuario ha iniciado sesión, mostrar opciones de sesión iniciada
    echo ' 
    <li style="border-left: 1px solid #e5e5e5"><a href="my-account.php">Mi Cuenta<i class="fa fa-chevron-down"></i></a>
        <ul class="ht-dropdown ht-my_account">
            <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
        </ul>
    </li>';
} else {
     // Si el usuario no ha iniciado sesión, mostrar opciones de inicio de sesión y registro -->
    echo '
    <li style="border-left: 1px solid #e5e5e5"><a href="#">Mi Cuenta<i class="fa fa-chevron-down"></i></a>
        <ul class="ht-dropdown ht-my_account">
            <li><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasRight">Iniciar Sesión</a></li>
            <li><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRegister" aria-controls="offcanvasRight">Registrarse</a></li>
        </ul>
    </li>';
}
?>





                                        <!-- <li style="border-left: 1px solid #e5e5e5"><a href="my-account.php">Mi Cuenta<i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-my_account">
                                                <li><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasRight">Iniciar Sesion</a></li>
                                                <li><a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRegister" aria-controls="offcanvasRight">Regístrate</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLogin" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close text-reset btn-regis-close hiraola-btn-bondi_blue" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ion-android-close white-icon"></i></button>
                </div>
                <div class="offcanvas-body">
                <form action="#" id="login-form">
                            <div class="login-form">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Correo Electrónico <input type="email" placeholder="Correo Electrónico" id="emailLogin" required maxlength="200" autocomplete="email"> </label>
                                        
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Contraseña <input type="password" placeholder="Contraseña" id="passwordLogin" required autocomplete="password"> </label>
                                        
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="check-box">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Recuérdame</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12 col-12">
                                        <div class="forgotton-password_info">
                                            <a href="#"> ¿Olvidó la contraseña?</a>
                                        </div>
                                    </div>
                                    <div id="error-container"></div>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" name="loginButton" class="hiraola-btn hiraola-btn-bondi_blue hiraola-btn_fullwidth">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRegister" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Regístrate</h5>
                    <button type="button" class="btn-close text-reset btn-regis-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="ion-android-close white-icon"></i></button>
                </div>
                <div class="offcanvas-body">
                <form action="#" id="register-form">
                            <div class="login-form">                            
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">                                
                                        <label>Nombre:
                                            <input type="text" id="name" name="name" placeholder="Nombre" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{1,55}" maxlength="100" autocomplete="given-name">
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Apellido:
                                            <input type="text" id="flastname" name="flastname" placeholder="Apellido" required pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{1,55}" maxlength="100">
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Correo electrónico:
                                            <input type="email" id="email" placeholder="Correo electronico" required maxlength="200" autocomplete="email">
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Contraseña:
                                            <input type="password" id="password" placeholder="Password" required autocomplete="password">
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirme Contraseña
                                            <input type="password" id="confirmPassword" placeholder="Confirm Password" required autocomplete="password">
                                        </label>
                                    </div>
                                    <div id="message-container"></div>
                                    <input type="hidden" id="recaptchaResponse" name="recaptcha_response" />
                                    <input type="hidden" id="codigo_act" name="codigo_act" />
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" id="registrarUsuarioButton" name="registerButton" class="hiraola-btn hiraola-btn-bondi_blue hiraola-btn_fullwidth">Registrarse</button>
                                    </div>                                    
                                </div>                                
                            </div>

                            <!-- Recaptcha initialization -->
                            <script defer>
                                grecaptcha.ready(function() {
                                    // console.log("grecaptcha is ready");
                                    // Your original script inside the grecaptcha.ready callback
                                    grecaptcha.execute('6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b', { action: 'submit' }).then(function(token) {
                                        document.getElementById("recaptchaResponse").value = token;
                                    });
                                });
                            </script>
                            <!-- Recaptcha -->
                        </form>
                </div>
            </div>

            <div class="header-middle_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="header-logo">
                                <a href="index.php">
                                <img src="../../assets/images/menu/logo/1.png" alt="Puerto Viejo Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="hm-form_area">
                            <form id="buscarProductForm" action="buscarProductNombre" class="hm-searchbox">
                                <input id="searchInput" type="text" placeholder="Introduce tu búsqueda aquí ...">
                                <button id="searchButton" class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom_area header-sticky stick">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 d-lg-none d-block">
                            <div class="header-logo">
                                <a href="index.php">
                                <img src="../../assets/images/menu/logo/1.png" alt="Puerto Viejo Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 d-none d-lg-block position-static">
                            <div class="main-menu_area">
                                <nav>
                                    <ul>
                                        <li class="dropdown-holder"><a href="index.php">Inicio</a>
                                        </li>
                                        <li class="megamenu-holder"><a href="shop-left-sidebar.php">Catálogo</a>
                                        </li>
                                        <li><a href="about-us.php">Nosotros</a></li>
                                        <li><a href="contact.php">Contáctenos</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="header-right_area">
                                <ul>
                                    <li>
                                        <a href="wishlist.php" class="wishlist-btn">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cart.php" class="minicart-btn">
                                            <i class="ion-bag"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="offcanvas-menu-inner">
                    <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4>Carrito de Compras</h4>
                        </div>
                        <ul class="minicart-list">
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/2-1.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.php">Magni dolorum vel</a>
                                    <span class="product-item_quantity">1 x $120.80</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/2-2.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.php">Eius accusantium omnis</a>
                                    <span class="product-item_quantity">1 x $120.80</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/2-3.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.php">Aperiam adipisci dolorem</a>
                                    <span class="product-item_quantity">1 x $120.80</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">$360.00</span>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="cart.php" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Detalle del Carrito</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="checkout.php" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Proceder a la compra</a>
                    </div>
                </div>
            </div> -->
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_search">
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search for item..." id="searchItem">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="#"><span class="mm-text">Inicio</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.php">
                                                <span class="mm-text">Home One</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index-2.php">
                                                <span class="mm-text">Home Two</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index-3.php">
                                                <span class="mm-text">Home Three</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Shop</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-3-column.php">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-4-column.php">
                                                        <span class="mm-text">Column Four</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-left-sidebar.php">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-right-sidebar.php">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Shop List</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-list-fullwidth.php">
                                                        <span class="mm-text">Full Width</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-left-sidebar.php">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-right-sidebar.php">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Single Product Style</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product-gallery-left.php">
                                                        <span class="mm-text">Gallery Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-gallery-right.php">
                                                        <span class="mm-text">Gallery Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-left.php">
                                                        <span class="mm-text">Tab Style Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-right.php">
                                                        <span class="mm-text">Tab Style Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-left.php">
                                                        <span class="mm-text">Sticky Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-right.php">
                                                        <span class="mm-text">Sticky Right</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Single Product Type</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product.php">
                                                        <span class="mm-text">Single Product</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sale.php">
                                                        <span class="mm-text">Single Product Sale</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-group.php">
                                                        <span class="mm-text">Single Product Group</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-variable.php">
                                                        <span class="mm-text">Single Product Variable</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-affiliate.php">
                                                        <span class="mm-text">Single Product Affiliate</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-slider.php">
                                                        <span class="mm-text">Single Product Slider</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Blog</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children has-children">
                                            <a href="#">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-2-column.php">
                                                        <span class="mm-text">Column Two</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-column.php">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-left-sidebar.php">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.php">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="#">
                                                <span class="mm-text">List View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-list-fullwidth.php">
                                                        <span class="mm-text">List Fullwidth</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-left-sidebar.php">
                                                        <span class="mm-text">List Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-right-sidebar.php">
                                                        <span class="mm-text">List Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="#">
                                                <span class="mm-text">Blog Details</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-details-left-sidebar.php">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-right-sidebar.php">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="#">
                                                <span class="mm-text">Blog Format</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-gallery-format.php">
                                                        <span class="mm-text">Gallery Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-audio-format.php">
                                                        <span class="mm-text">Audio Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-video-format.php">
                                                        <span class="mm-text">Video Format</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Pages</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.php">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-.php">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.php">
                                                <span class="mm-text">Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.php">
                                                <span class="mm-text">Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="checkout.php">
                                                <span class="mm-text">Checkout</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="compare.php">
                                                <span class="mm-text">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.php">
                                                <span class="mm-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="404.php">
                                                <span class="mm-text">Error 404</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="coming-soon_page.php">
                                                <span class="mm-text">Comming Soon</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">
                                        <span class="mm-text">User
                                        Setting
                                    </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.php">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-register.php">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#"><span class="mm-text">Currency</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">EUR €</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">USD $</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#"><span class="mm-text">Language</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Romanian</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Japanese</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bcryptjs/dist/bcrypt.min.js"></script>

        </header>
        <!-- Hiraola's Header Main Area End Here -->