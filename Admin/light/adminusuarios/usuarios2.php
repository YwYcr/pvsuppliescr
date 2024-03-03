<!doctype html>
<html lang="en">

<head>
    <title>PVSupplies | Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="\pvsuppliescr\Admin\light\favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/animate-css/vivify.min.css">

    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="../../assets/vendor/sweetalert/sweetalert.css" /> -->



    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/site.min.css">

    <style>
        td.details-control {
            background: url('../assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('../assets/images/details_close.png') no-repeat center center;
        }
    </style>
</head>

<body class="theme-blue">

    <!-- Page Loader -->
    <?php
    include '../pageLoader.php';
    ?>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <?php
        include '../header2.php';
        ?>

         <!-- Modal info Users -->
         <div class="modal fade" id="infoUser" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informacion del usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="infoUserForm">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="infoUserID" name="infoUserID">
                            </div>

                            <div class="mb-3">
                                <label for="infoUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="infoUserEmail" name="infoUserEmail" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="infoUserName" name="infoUserName" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="infoUserFLASTNAME" name="infoUserFLASTNAME" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="infoUserSLASTNAME" name="infoUserSLASTNAME" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserPhone" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="infoUserPhone" name="infoUserPhone" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="infoUserAddress" name="infoUserAddress" rows="3" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserProvincia" class="form-label">Provincia</label>
                                <input type="text" class="form-control" id="infoUserProvincia" name="infoUserProvincia" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserCanton" class="form-label">Cantón</label>
                                <input type="text" class="form-control" id="infoUserCanton" name="infoUserCanton" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserDistrito" class="form-label">Distrito</label>
                                <input type="text" class="form-control" id="infoUserDistrito" name="infoUserDistrito" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserCreation" class="form-label">Ingresado el</label>
                                <input type="text" class="form-control" id="infoUserCreation" name="infoUserCreation" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserSuscrito" class="form-label">Suscripcion</label>
                                <input type="text" class="form-control" id="infoUserSuscrito" name="infoUserSuscrito" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="infoUserRol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="infoUserRol" name="infoUserRol" readonly>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-type="success">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal Edit User Password -->
<div class="modal fade" id="editPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Cambio de contraseña</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="editPassUserForm" class="needs-validation" novalidate>
					<div class="mb-3">
						<input type="hidden" class="form-control" id="editPassUserID" name="editPassUserID">
					</div>
                    <div class="mb-3">
                                <label for="editPassUserEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="editPassUserEmail" name="editPassUserEmail" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editPassUserName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editPassUserName" name="editPassUserName" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editPassUserFLASTNAME" class="form-label"> Primer apellido </label>
                                <input type="text" class="form-control" id="editPassUserFLASTNAME" name="editPassUserFLASTNAME" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editPassUserSLASTNAME" class="form-label"> Segundo apellido </label>
                                <input type="text" class="form-control" id="editPassUserSLASTNAME" name="editPassUserSLASTNAME" readonly>
                            </div>
					<div class="mb-3">
						<label for="editPassUserPassword" class="form-label">Nueva Contraseña</label>
						<input type="password" class="form-control" id="editPassUserPassword" name="editPassUserPassword" autocomplete="on" required
							pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}">
						<div class="invalid-feedback">La contraseña debe tener al menos:<ul></ul><li>8 caracteres</li><li>1 mayúscula</li><li>1 minúscula</li><li>1 número</li><li>1 caracter especial</li></ul></div>
						<div class="valid-feedback">Válido</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="button" id="editPassUsuarioButton" class="btn btn-actualizarPass btn-primary " data-type="success">Modificar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

        <!-- Modal Edit User -->
<div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Modificar usuario</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="editUserForm" class="needs-validation" novalidate>
					<div class="mb-3">
						<input type="hidden" class="form-control" id="editUserID" name="editUserID" required>
					</div>
					<div class="mb-3">
						<label for="editUserEmail" class="form-label">Email</label>
						<input type="email" class="form-control" id="editUserEmail" name="editUserEmail" placeholder="name@example.com" required pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
						<div class="invalid-feedback">Por favor, introduce un correo electrónico válido.</div>
						<div class="valid-feedback">Válido</div>
					</div>
					<div class="mb-3">
						<label for="editUserName" class="form-label">Nombre</label>
						<input type="text" class="form-control" id="editUserName" name="editUserName" required>
						<div class="invalid-feedback">Por favor, introduce un nombre válido.</div>
						<div class="valid-feedback">Válido</div>
					</div>
					<div class="mb-3">
						<label for="editUserFLASTNAME" class="form-label"> Primer apellido </label>
						<input type="text" class="form-control" id="editUserFLASTNAME" name="editUserFLASTNAME" required>
						<div class="invalid-feedback">Por favor, introduce un apellido válido.</div>
						<div class="valid-feedback">Válido</div>
					</div>
					<div class="mb-3">
						<label for="editUserSLASTNAME" class="form-label"> Segundo apellido </label>
						<input type="text" class="form-control" id="editUserSLASTNAME" name="editUserSLASTNAME">
						<div class="invalid-feedback">Por favor, introduce un apellido válido.</div>
						<div class="valid-feedback">Válido</div>
					</div>
					<div class="mb-3">
						<label for="editUserPhone" class="form-label">Telefono</label>
						<input type="text" class="form-control" id="editUserPhone" name="editUserPhone" placeholder="####-####">
					</div>
					<div class="mb-3">
						<label for="editUserAddress" class="form-label">Direccion</label>
						<input type="text" class="form-control" id="editUserAddress" name="editUserAddress" rows="3">
					</div>
					<div class="mb-3">
						<label for="editUserProvincia" class="form-label">Provincia</label>
						<select class="form-select" id="editUserProvincia" name="editUserProvincia">
							<option value="" disabled selected>Selecciona una provincia</option>
							<option value="Alajuela">Alajuela</option>
							<option value="Cartago">Cartago</option>
							<option value="Guanacaste">Guanacaste</option>
							<option value="Heredia">Heredia</option>
							<option value="Limón">Limón</option>
							<option value="Puntarenas">Puntarenas</option>
							<option value="San José">San José</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="editUserCanton" class="form-label">Cantón</label>
						<select class="form-select" id="editUserCanton" name="editUserCanton">
							<option value="" disabled selected>Selecciona un cantón</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="editUserDistrito" class="form-label">Distrito</label>
						<select class="form-select" id="editUserDistrito" name="editUserDistrito">
							<option value="" disabled selected>Selecciona un distrito</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="editUserCreation" class="form-label">Ingresado el</label>
						<input type="text" class="form-control" id="editUserCreation" name="editUserCreation" readonly>
					</div>
                    <div class="mb-3">
                        <label for="editUserSuscrito" class="form-label">Suscripcion</label>
                        <select class="form-select" id="editUserSuscrito" name="editUserSuscrito">
                            <option value="0" selected>No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editUserRol" class="form-label">Rol</label>
                        <select class="form-select" id="editUserRol" name="editUserRol">
                            <option value="3" selected>Cliente</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="button" id="editUsuarioButton" class="btn btn-actualizarUser btn-primary " data-type="success">Modificar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

        <!-- Modal Create Users -->
        <div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createUserForm" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="createUserEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="createUserEmail" name="createUserEmail" placeholder="name@example.com" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                <div class="invalid-feedback">Por favor, introduce un correo electrónico válido.</div>
                                <div class="valid-feedback">Válido</div>
                            </div>
                            <div class="mb-3">
                                <label for="createUserName" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="createUserName" name="createUserName" required>
                                <div class="invalid-feedback">Por favor, introduce un nombre válido.</div>
                                <div class="valid-feedback">Válido</div>
                            </div>
                            <div class="mb-3">
                                <label for="createUserFLASTNAME" class="form-label">Primer apellido *</label>
                                <input type="text" class="form-control" id="createUserFLASTNAME" name="createUserFLASTNAME" required>
                                <div class="invalid-feedback">Por favor, introduce un apellido válido.</div>
                                <div class="valid-feedback">Válido</div>
                            </div>
                            <div class="mb-3">
                                <label for="createUserSLASTNAME" class="form-label">Segundo apellido *</label>
                                <input type="text" class="form-control" id="createUserSLASTNAME" name="createUserSLASTNAME" required>
                                <div class="invalid-feedback">Por favor, introduce un apellido válido.</div>
                                <div class="valid-feedback">Válido</div>
                            </div>
                            <div class="mb-3">
                                <label for="createUserPassword" class="form-label">Contraseña *</label>
                                <input type="password" class="form-control" id="createUserPassword" name="createUserPassword" autocomplete="on" required
                                    pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}">
                                <div class="invalid-feedback">La contraseña debe tener al menos:<ul></ul><li>8 caracteres</li><li>1 mayúscula</li><li>1 minúscula</li><li>1 número</li><li>1 caracter especial</li></ul></div>
                                <div class="valid-feedback">Válido</div>
                            </div>

                            <div class="mb-3">
                                <label for="createUserPhone" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="createUserPhone" name="createUserPhone" placeholder="####-####">
                            </div>
                            <div class="mb-3">
                                <label for="createUserAddress" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="createUserAddress" name="createUserAddress" rows="3">
                            </div>
                            <div class="mb-3">
                                <label for="createUserProvincia" class="form-label">Provincia</label>
                                <select class="form-select" id="createUserProvincia" name="createUserProvincia">
                                    <option value="" disabled selected>Selecciona una provincia</option>
                                    <option value="Alajuela">Alajuela</option>
                                    <option value="Cartago">Cartago</option>
                                    <option value="Guanacaste">Guanacaste</option>
                                    <option value="Heredia">Heredia</option>
                                    <option value="Limón">Limón</option>
                                    <option value="Puntarenas">Puntarenas</option>
                                    <option value="San José">San José</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createUserCanton" class="form-label">Cantón</label>
                                <select class="form-select " id="createUserCanton" name="createUserCanton">
                                    <option value="" disabled selected>Selecciona un cantón</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createUserDistrito" class="form-label">Distrito</label>
                                <select class="form-select" id="createUserDistrito" name="createUserDistrito">
                                    <option value="" disabled selected>Selecciona un distrito</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createUserSuscrito" class="form-label">Suscripcion</label>
                                <select class="form-select" id="createUserSuscrito" name="createUserSuscrito">
                                    <option value="0" selected>No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="createUserRol" class="form-label">Rol</label>
                                <select class="form-select" id="createUserRol" name="createUserRol">
                                    <option value="3" selected>Cliente</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="crearUsuarioButton" class="btn btn-primary" data-type="success">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Control de Usuarios</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="\pvsuppliescr\Admin\light\index2.php"><img src="\pvsuppliescr\Admin\light\bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createUser" title=""><i class="icon-user-follow"></i><span>
                                Agregar Usuario</span></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Información de usuarios
                                </h2>
                                <ul class="header-dropdown dropdown">
                                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                </ul>
                            </div>
                            <div class="body">
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="../../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
    <!-- <script src="\pvsuppliescr\Admin\assets\vendor\sweetalert\sweetalert.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="\pvsuppliescr\Admin\light\adminScript\usuarios2.js"></script>
</body>

</html>