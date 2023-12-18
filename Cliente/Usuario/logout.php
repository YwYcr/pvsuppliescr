<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cerrar sesion</title>
  <style>
    p {
        text-align: center;
        font-weight: bold;
        color: #4e555f;
    }

    #spinner-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        text-align: center;
        visibility: hidden;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    #spinner {
    display: inline-block;
    width: 50px;
    height: 50px;
    border: 5px solid #4e555f;
    border-top: 5px solid green;
    border-radius: 50%;
    animation: spin 2s linear infinite; /* Adjusted duration to 8 seconds */
}
</style>
</head>

<body>
    <div id="spinner-container">
        <div id="spinner">        
        </div>
    </div>    
        <?php
        session_start();
        session_destroy();
        $redirectUrl = "../tools/index.php"; // Redirect immediately
        $redirectDelay = 5000; // milliseconds
        echo "<p>Sesión cerrada exitosamente. Redireccionando a la página de inicio</p>";
        ?>
       
<script>
    //Spinner
    document.getElementById("spinner-container").style.visibility = "visible";
    // Redirect page using JavaScript after delay
    setTimeout(() => 
            {
                window.location.href = "<?= $redirectUrl ?>";
                document.getElementById("spinner-container").style.visibility = "hidden";
            } , <?= $redirectDelay ?>);
  </script>
</body>
</html>        