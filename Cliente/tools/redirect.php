<?php
function redirectUser($rol) {
    if ($rol == 1) {
        $response = array("redirect" => "../../Admin/light/index2.php");
        // header("Location: ../../Admin/light/index2.php");
    } else {
        $response = array("redirect" => "my-account.php");
        // header("Location: index.php");
        exit;
    }
}
?>