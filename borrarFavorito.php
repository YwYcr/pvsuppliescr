<?php
session_start();
if (isset($_GET['idprod'])) {
    $productIDToRemove = $_GET['idprod'];

    if (isset($_SESSION['listaFavoritos']) && !empty($_SESSION['listaFavoritos'])) {
        if (($key = array_search($productIDToRemove, $_SESSION['listaFavoritos'])) !== false) {
            unset($_SESSION['listaFavoritos'][$key]);
        }
    }
}

header('Location: wishlist.php');
exit();
?>