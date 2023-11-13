
    // <!-- Script para ver usuarios -->
    // <!-- Script para ver usuarios -->

        $(document).ready(function () {
            $(document).on("click", ".btn-infoUsuarios", function () {
                var userID = $(this).data("bs-id");

                $.ajax({
                    type: "GET",
                    url: "adminusuarios/getUsuario.php",
                    data: { userID: userID },
                    dataType: "json",
                    success: function (response) {

                        $("#infoUserEmail").val(response.EMAIL);
                        $("#infoUserName").val(response.NAME);
                        $("#infoUserFLASTNAME").val(response.FLASTNAME);
                        $("#infoUserSLASTNAME").val(response.SLASTNAME);
                        $("#infoUserPassword").val(response.PASSWORD);
                        // $("#info").modal("show");

                        // console.log("Email: " + response.EMAIL);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });


    // <!-- Script para agregar usuarios nuevos -->

        $(document).ready(function () {
            $("#crearUsuarioButton").click(function () {
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
                    url: "adminusuarios/crearUsuario.php",
                    data: data,
                    success: function (response) {
                        // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                        alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta
                    },
                    error: function (xhr, status, error) {
                        // Manejar errores de la solicitud AJAX
                        console.error(error);
                    }
                });
            });
        });

  
    // <!-- Script para traer 1 usuario a modificar  -->

        $(document).ready(function () {
            $(document).on("click", ".btn-editarUser", function () {
                var userID = $(this).data("bs-id");

                $.ajax({
                    type: "GET",
                    url: "adminusuarios/getUsuario.php",
                    data: { userID: userID },
                    dataType: "json",
                    success: function (response) {
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
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });





    // <!-- Script para actualizar usuarios  -->

        $(document).ready(function () {
            $(document).on("click", ".btn-actualizarUser", function () {
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
                    url: "adminusuarios/updateUsuario.php",
                    data: data,
                    success: function (response) {
                        // window.location.href = "usuarios.php";
                        // href="#" data-page="usuarios";
                        $("#usuarios-link").click();
                        console.log("Email enviado: " + email);
                        console.log("ID enviado: " + userID);

                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
 

    // <!-- Script para borrar usuarios -->
    // <!-- Script para borrar usuarios -->

    $(document).ready(function() {
        $(document).on("click", ".btn-borrarUser", function(){
            var userID = $(this).data("bs-id");

            $.ajax({
            type: "POST",
            url: "adminusuarios/borrarUsuario.php", 
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



    // <!-- Buscar Usuarios -->

        function searchUser() {
            var searchTerm = $('#searchUserInput').val();

            // Realizar la petición AJAX
            $.ajax({
                url: 'adminusuarios/getUsuario.php',
                method: 'GET',
                data: { searchTerm: searchTerm },
                dataType: 'json',
                success: function (data) {
                    // Actualizar la tabla con los resultados
                    updateTable(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error en la petición AJAX:', error);
                }
            });
        }

        function updateTable(data) {
            // Limpiar la tabla Usuarios
            $('#userTableBody').empty();

            if (data.length === 0) {
                // Mostrar mensaje de que no se encontraron Usuarios
                $('#userTableBody').append('<tr><td colspan="6">No se encontraron usuarios.</td></tr>');
            } else {
                // Llenar la tabla con los nuevos resultados Usuarios
                $.each(data, function (index, users) {
                    var row = '<tr>' +
                        '<td>' + users.IDUSER + '</td>' +
                        '<td>' + users.NAME + '</td>' +
                        '<td>' + users.EMAIL + '</td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-info btn-infoUsuarios mb-2" data-bs-toggle="modal" data-bs-target="#infoUsuarios" data-bs-id="' + users.IDCONTACT + '"><i class="fa fa-info-circle"></i><span>Ver</span></button>' +
                        '<button type="button" class="btn btn-editar btn-editarUser btn-warning mb-2" data-bs-toggle="modal" data-bs-id="' + users.IDCONTACT + '" data-bs-target="#editUser"><i class="fa fa-pencil"></i><span>Editar</span></button>' +
                        '<button type="button" class="btn btn-borrar btn-borrarUser btn-danger mb-2 js-sweetalert" data-type="confirm" data-bs-id="' + users.IDCONTACT + '"><i class="fa fa-trash-o"></i><span>Eliminar</span></button>' +
                        '</td>' +
                        '</tr>';

                    $('#userTableBody').append(row);
                });
            }
        }


