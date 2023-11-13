<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords" content="admin template, Qubes admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>

    <link rel="stylesheet" href="../assets/vendor/c3/c3.min.css" />
    <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">

    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/vendor/fullcalendar/fullcalendar.min.css">

    <link rel="stylesheet" href="../assets/vendor/summernote/dist/summernote.css"/>

    <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/site.min.css">

</head>

<body class="theme-blue">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <!-- <div class="m-t-30"><img src="../assets/images/menu/logo/1.png"></div> -->
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <?php
        include 'header.php';
        ?>

        <div id="main-content">


        </div>

        <!-- Modal info-->
        <div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoUserForm">
                        <div class="mb-3">                                
                                <input type="hidden " class="form-control" id="infoUserID" name="infoUserID" required>
                            </div>

                            <div class="mb-3">
                                <label for="infoUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoUserEmail" name="infoUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoUserName" name="infoUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="infoUserFLASTNAME" name="infoUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="infoUserSLASTNAME" name="infoUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="infoUserPassword" name="infoUserPassword" autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Crear usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createUserForm">
                        <div class="mb-3">
                                <label for="createUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="createUserEmail" name="createUserEmail"  required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="createUserName" name="createUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="createUserFLASTNAME" name="createUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="createUserSLASTNAME" name="createUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="createUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="createUserPassword" name="createUserPassword"  autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="crearUsuarioButton" class="btn btn-primary js-sweetalert" data-bs-dismiss="modal" data-type="success">Save</button>
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->

        <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modificar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                        <div class="mb-3">                                
                                <input type="hidden " class="form-control" id="editUserID" name="editUserID" required>
                            </div>
                        <div class="mb-3">
                                <label for="editUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editUserEmail" name="editUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editUserName" name="editUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="editUserFLASTNAME" name="editUserFLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="editUserSLASTNAME" name="editUserSLASTNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editUserPassword" name="editUserPassword" autocomplete="on" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-actualizar btn-primary js-sweetalert" data-bs-dismiss="modal" data-type="success">Save</button>
                    
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de incluir jQuery -->
    <script src="controlmenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    
    <script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->


    <!-- Script para ver usuarios -->
    <script>
    $(document).ready(function() {
        $(document).on("click", ".btn-info", function(){
            var userID = $(this).data("bs-id");

            $.ajax({
            type: "GET",
            url: "../../getUsuario.php", 
            data: { userID: userID },
            dataType: "json",
            success: function(response) {
                
                $("#infoUserEmail").val(response.EMAIL);
                $("#infoUserName").val(response.NAME);
                $("#infoUserFLASTNAME").val(response.FLASTNAME);
                $("#infoUserSLASTNAME").val(response.SLASTNAME);
                $("#infoUserPassword").val(response.PASSWORD);
                // $("#info").modal("show");
                
                // console.log("Email: " + response.EMAIL);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
            });
        });
    });
    </script>

    <!-- Script para agregar usuarios nuevos -->
    <script>
    $(document).ready(function() {
        $("#crearUsuarioButton").click(function() {
        var email = $("#createUserEmail").val();
        var nombre = $("#createUserName").val();
        var primerApellido = $("#createUserFLASTNAME").val();
        var segundoApellido = $("#createUserSLASTNAME").val();
        var password = $("#createUserPassword").val();

        // console.log("Email: " + email);
        // console.log("Nombre: " + nombre);
        // console.log("Primer Apellido: " + primerApellido);
        // console.log("Segundo Apellido: " + segundoApellido);
        // console.log("Contraseña: " + password);

        var data = {
            email: email,
            nombre: nombre,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            password: password
        };

        $.ajax({
            type: "POST",
            url: "../../crearUsuario.php", 
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

    <!-- Script para modificar usuarios  -->
    <script>
    $(document).ready(function() {
        $(document).on("click", ".btn-editar", function(){
            var userID = $(this).data("bs-id");

            $.ajax({
            type: "GET",
            url: "../../getUsuario.php", 
            data: { userID: userID },
            dataType: "json",
            success: function(response) {
                $("#editUserID").val(response.IDUSER)
                $("#editUserEmail").val(response.EMAIL);
                $("#editUserName").val(response.NAME);
                $("#editUserFLASTNAME").val(response.FLASTNAME);
                $("#editUserSLASTNAME").val(response.SLASTNAME);
                $("#editUserPassword").val(response.PASSWORD);
                // $("#info").modal("show");
                
                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDUSER);

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
            });
        });
    });
 </script>

 <!-- Script para actualizar usuarios  -->
<script>
    $(document).ready(function() {
        $(document).on("click", ".btn-actualizar", function(){
            var userID = $("#editUserID").val();
            var email = $("#editUserEmail").val();
            var nombre = $("#editUserName").val();
            var primerApellido = $("#editUserFLASTNAME").val();
            var segundoApellido = $("#editUserSLASTNAME").val();
            var password = $("#editUserPassword").val();

            var data = {
            userID: userID,    
            email: email,
            nombre: nombre,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            password: password
            };


            $.ajax({
            type: "POST",
            url: "../../updateUsuario.php", 
            data: data,
            success: function(response){
                console.log("Email enviado: " + email);
                console.log("ID enviado: " + userID);

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
            });
        });
    });
 </script>
    <!-- Script para borrar usuarios -->
    <script>
    $(document).ready(function() {
        $(document).on("click", ".btn-borrar", function(){
            var userID = $(this).data("bs-id");

            $.ajax({
            type: "POST",
            url: "../../borrarUsuario.php", 
            data: { userID: userID },
            success: function(response) {
                console.log("Usuario eliminado: " + userID);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
            });
        });
    });
    </script>





    <script>
  document.addEventListener("DOMContentLoaded", function() {
    const viewProfileLink = document.getElementById("viewProfileLink");
    const mainContent = document.getElementById("main-content");

    viewProfileLink.addEventListener("click", function(event) {
      event.preventDefault();

      // Realiza una solicitud fetch para cargar el contenido de profile.php
      fetch("profile.php")
        .then(response => response.text())
        .then(data => {
          mainContent.innerHTML = data;
        })
        .catch(error => {
          console.error("Error:", error);
        });
    });
  });
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


    
    <!-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script> -->

    <!-- Bootstrap 4x JS  -->
    <!-- <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="assets/bundles/vendorscripts.bundle.js"></script> -->

    <!-- <script src="assets/bundles/c3.bundle.js"></script> -->
    <!-- <script src="assets/bundles/flotscripts.bundle.js"></script> -->
    <!-- flot charts Plugin Js -->
    <!-- <script src="assets/bundles/knob.bundle.js"></script> -->

    <!-- Project Common JS -->
    <!-- <script src="assets/js/common.js"></script> -->
    <!-- <script src="assets/js/index.js"></script> -->


</body>

</html>