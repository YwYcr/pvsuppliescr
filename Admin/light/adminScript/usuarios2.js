
    // <!-- Script para ver usuarios -->
    // <!-- Script para ver usuarios -->

        $(document).ready(function () {
            $(document).on("click", ".btn-infoUsuarios", function () {
                var userID = $(this).data("bs-id");

                $.ajax({
                    type: "GET",
                    url: "getUsuario.php",
                    data: { userID: userID },
                    dataType: "json",
                    success: function (response) {

                        $("#infoUserEmail").val(response.EMAIL);
                        $("#infoUserName").val(response.NAME);
                        $("#infoUserFLASTNAME").val(response.FLASTNAME);
                        $("#infoUserSLASTNAME").val(response.SLASTNAME);
                        $("#infoUserPassword").val(response.PASSWORD);
                        $("#infoUserPhone").val(response.PHONE);
                        $("#infoUserAddress").val(response.ADDRESS);
                        $("#infoUserCreation").val(response.CREATEDATE);
                        $("#infoUserSuscrito").val(response.SUSCRIPTION);
                        $("#infoUserRol").val(response.IDROL);
                        
                        
                        // $("#infoUser").modal("show");

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
                var phone = $("#createUserPhone").val();
                var address = $("#createUserAddress").val();
                var suscription = $("#createUserSuscrito").val();
                var rol = $("#createUserRol").val();
                
                var data = {
                    email: email,
                    nombre: nombre,
                    primerApellido: primerApellido,
                    segundoApellido: segundoApellido,
                    password: password,
                    phone: phone,
                    address: address,
                    suscription:suscription,
                    rol:rol

                };

                $.ajax({
                    type: "POST",
                    url: "crearUsuario.php",
                    data: data,
                    success: function (response) {
                        // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                        swal("Agregado!", "Se agrego el usuario con éxito!", "success");
                        // alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta
                        fetch('refreshUsuario.php')
                        .then(response => response.text())                   
                        .then(data => {
                            document.getElementById('userTableBody').innerHTML = data;
                        });
                        
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
                    url: "getUsuario.php",
                    data: { userID: userID },
                    dataType: "json",
                    success: function (response) {
                        $("#editUserID").val(response.IDUSER)
                        $("#editUserEmail").val(response.EMAIL);
                        $("#editUserName").val(response.NAME);
                        $("#editUserFLASTNAME").val(response.FLASTNAME);
                        $("#editUserSLASTNAME").val(response.SLASTNAME);
                        $("#editUserPassword").val(response.PASSWORD);
                        $("#editUserPhone").val(response.PHONE);
                        $("#editUserAddress").val(response.ADDRESS);
                        $("#editUserCreation").val(response.CREATEDATE);
                        $("#editUserSuscrito").val(response.SUSCRIPTION);
                        $("#editUserRol").val(response.IDROL);
                        

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
                var phone = $("#editUserPhone").val();
                var address = $("#editUserAddress").val();
                var suscription = $("#editUserSuscrito").val();
                var rol = $("#editUserRol").val();

                var data = {
                    userID: userID,
                    email: email,
                    nombre: nombre,
                    primerApellido: primerApellido,
                    segundoApellido: segundoApellido,
                    password: password,
                    phone:phone,
                    address:address,
                    suscription:suscription,
                    rol:rol
                };


                $.ajax({
                    type: "POST",
                    url: "updateUsuario.php",
                    data: data,
                    success: function (response) {
                        // window.location.href = "usuarios.php";
                        // href="#" data-page="usuarios";
                        
                        console.log("Email enviado: " + email);
                        console.log("ID enviado: " + userID);
                        swal("Modificado!", "Usuario modificado con éxito!", "success");
                        // alert('Usuario modificado con éxito');
                        fetch('refreshUsuario.php')
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('userTableBody').innerHTML = data;
                        });


                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
                // location.reload();
                // window.location.href = '/adminusuarios/usuarios.php';
            });
            // location.reload();
        });
 

    // <!-- Script para borrar usuarios -->
    // <!-- Script para borrar usuarios -->

    $(document).ready(function() {
        $(document).on("click", ".btn-borrarUser", function(){
            var userID = $(this).data("bs-id");

            $.ajax({
            type: "POST",
            url: "borrarUsuario.php", 
            data: { userID: userID },
            success: function(response) {
                swal({
                    title: "Seguro que quieres eliminarlo?",
                    text: "Una vez eliminado no podras volver a recuperar este usuario!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Si, Eliminalo!",
                    closeOnConfirm: false
                }, function () {
                    swal("Eliminado!", "Usuario eliminado con éxito", "success");
                    // alert('Usuario eliminado con éxito');
                    fetch('refreshUsuario.php')
                    .then(response => response.text())                   
                    .then(data => {
                        document.getElementById('userTableBody').innerHTML = data;
                });
                console.log("Usuario eliminado: " + userID);
                });
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
                url: 'getUsuario.php',
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


