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
            <div class="m-t-30"><img src="/PVSupplies/assets/images/menu/logo/1.png"></div>
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

        <!-- Modal -->
        <div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <div class="mb-3">
                                <label for="editUserName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editUserName" name="editUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPosition" class="form-label">Position</label>
                                <input type="text" class="form-control" id="editUserPosition" name="editUserPosition" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserOffice" class="form-label">Office</label>
                                <input type="text" class="form-control" id="editUserOffice" name="editUserOffice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserAge" class="form-label">Age</label>
                                <input type="number" class="form-control" id="editUserAge" name="editUserAge" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserStartDate" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="editUserStartDate" name="editUserStartDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserSalary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="editUserSalary" name="editUserSalary" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <div class="mb-3">
                                <label for="editUserName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editUserName" name="editUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserPosition" class="form-label">Position</label>
                                <input type="text" class="form-control" id="editUserPosition" name="editUserPosition" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserOffice" class="form-label">Office</label>
                                <input type="text" class="form-control" id="editUserOffice" name="editUserOffice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserAge" class="form-label">Age</label>
                                <input type="number" class="form-control" id="editUserAge" name="editUserAge" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserStartDate" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="editUserStartDate" name="editUserStartDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUserSalary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="editUserSalary" name="editUserSalary" required>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary js-sweetalert" data-bs-dismiss="modal" data-type="success">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="controlmenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    
    <script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->

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