<?php
session_start();

if (isset($_SESSION['listaCarrito']) && !empty($_SESSION['listaCarrito'])) {
    // Borra la lista de productos en el carrito.
    $_SESSION['listaCarrito'] = array();
}

// Redirige de nuevo a la página de la lista de favoritos o a donde desees.
header('Location: cart.php');
exit();
?>