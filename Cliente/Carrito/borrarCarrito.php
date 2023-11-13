<?php
session_start();
if (isset($_GET['idprod'])) {
    $productIDToRemove = $_GET['idprod'];

    if (isset($_SESSION['listaCarrito']) && !empty($_SESSION['listaCarrito'])) {
        if (($key = array_search($productIDToRemove, $_SESSION['listaCarrito'])) !== false) {
            unset($_SESSION['listaCarrito'][$key]);
        }
    }
}

header('Location: ../tools/cart.php');
exit();
?>