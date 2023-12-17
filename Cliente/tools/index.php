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

 <!-- Begin Hiraola's Newsletter Popup Area -->
 <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off"><i class="ion-android-close"></i></span>
                <div class="subscribe_area">
                    <h2>Suscribete</h2>
                    <p>Registrate para recibir nuestras ofertas como nuevos productos, descuentos y mucho mas.</p>
                    <div class="subscribe-form-group">
                        <form class="subscribe-form" action="#">
                            <input autocomplete="on" type="text" name="txtEmail" id="txtEmail" placeholder="Correo Electronico">
                            <button id="btnCrearContacto" type="submit">Suscribirme</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">No mostrar de nuevo</label>
                    </div>
                </div>
            </div>
        </div>
 <!-- Hiraola's Newsletter Popup Area Here -->

<?php
include 'header.php';
?>

<?php
include 'home.php';
?> 

<?php
include 'footer.php';
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
<script src="../busqueda.js"></script>
<!-- <script src="assets/js/main.min.js"></script> -->

<script>
    $(document).ready(function() {
        $("#btnCrearContacto").click(function() {
        var email = $("#txtEmail").val();

        console.log("Email: " + email);

        var data = {
            email: email,
        };

        $.ajax({
            type: "POST",
            url: "../Contacto/crearContacto.php", 
            data: data,
            success: function(response) {
                // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
        });
    });

 </script>



</body>

</html>
    
