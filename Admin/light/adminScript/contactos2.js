// <!-- Contactos -->
//     <!-- Script para ver contactos -->
//     <!-- Script para ver contactos -->

$(document).ready(function () {
    $(document).on("click", ".btn-infoContacto", function () {
        var contactID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getContacto.php",
            data: { contactID: contactID },
            dataType: "json",
            success: function (response) {

                $("#infoContactoName").val((response.NAME ?? '') + ' ' + (response.FLASTNAME ?? '') + ' ' + (response.SLASTNAME ?? ''));
                $("#infoContactoEmail").val(response.EMAIL);
                $("#infoContactoAsunto").val(response.SUBJECT);
                $("#infoContactoMensaje").val(response.MESSAGE);

                // $("#info").modal("show");

                // console.log("Email: " + response.EMAIL);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para agregar contactos nuevos -->

$(document).ready(function () {
    $("#createContactoButton").click(function () {
        var nombre = $("#createContactoName").val();
        var email = $("#createContactoEmail").val();

        var data = {
            nombre: nombre,
            email: email,
        };

        $.ajax({
            type: "POST",
            url: "crearContactoModal.php",
            data: data,
            success: function (response) {
                swal("Agregado!", "Se agrego el contacto con éxito!", "success");
                // alert('Contacto creado con éxito');    
                fetch('refreshContacto.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('contactTableBody').innerHTML = data;
                    });
                // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                // alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta

            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
    });
});


// <!-- Script para traer 1 contacto a modificar  -->

$(document).ready(function () {
    $(document).on("click", ".btn-editarContacto", function () {
        var contactID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getContacto.php",
            data: { contactID: contactID },
            dataType: "json",
            success: function (response) {
                $("#editContactoID").val(response.IDCONTACT);
                $("#editContactoName").val(response.NAME);
                $("#editContactoEmail").val(response.EMAIL);

                // $("#info").modal("show");

                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDCONTACT);



            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});





// <!-- Script para actualizar contactos  -->

$(document).ready(function () {
    $(document).on("click", ".btn-actualizarContacto", function () {
        var contactID = $("#editContactoID").val();
        var nombre = $("#editContactoName").val();
        var email = $("#editContactoEmail").val();



        var data = {
            contactID: contactID,
            nombre: nombre,
            email: email,
        };


        $.ajax({
            type: "POST",
            url: "updateContacto.php",
            data: data,
            success: function (response) {
                console.log("Email enviado: " + email);
                console.log("ID enviado: " + contactID);
                swal("Modificado!", "Contacto modificado con éxito!", "success");
                // alert('Contacto modificado con éxito');
                fetch('refreshContacto.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('contactTableBody').innerHTML = data;
                    });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para borrar contactos -->
$(document).ready(function () {
    $(document).on("click", ".btn-borrarContacto", function () {
        var contactID = $(this).data("bs-id");

        swal({
            title: "Seguro que quieres eliminarlo?",
            text: "Una vez eliminado no podrás volver a recuperar este contacto!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Usuario hizo clic en "Sí"
                $.ajax({
                    type: "POST",
                    url: "borrarContacto.php",
                    data: { contactID: contactID },
                    dataType: 'json', // Asegura que el resultado se interprete como JSON
                    success: function (response) {
                        if (response.success) {
                            swal("Eliminado!", "Contacto eliminado con éxito", "success");
                            // Lógica después de recargar la lista
                            fetch('refreshContacto.php')
                                .then(response => response.text())
                                .then(data => {
                                    document.getElementById('contactTableBody').innerHTML = data;
                                    console.log("Contacto eliminado: " + contactID);
                                })
                                .catch(error => console.error(error));
                        } else {
                            // Mostrar error en SweetAlert
                            swal("Error", "Error al eliminar el contacto: " + response.error, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Mostrar error en SweetAlert
                        swal("Error", "Error al eliminar el contacto: " + error, "error");
                        console.error(error);
                    }
                });
            } else {
                // Usuario hizo clic en "Cancelar" o fuera del cuadro de diálogo
                swal("Eliminar cancelado");
            }
        });
    });
});



// <!-- Buscar Contactos -->

function searchContact() {
    var searchTerm = $('#searchContactInput').val();

    // Realizar la petición AJAX
    $.ajax({
        url: 'buscar_contactos.php', // Ajusta la URL al archivo PHP que maneja la búsqueda
        method: 'GET',
        data: { searchTerm: searchTerm },
        dataType: 'json',
        success: function (data) {
            // Actualizar la tabla con los resultados
            updateTable(data);
        },
        error: function (xhr, status, error) {
            console.error('Error en la petición AJAX:', error);
            // Puedes mostrar un mensaje al usuario indicando el error
        }
    });
}

function updateTable(data) {
    // Limpiar la tabla Contactos
    $('#contactTableBody').empty();

    if (data.length === 0) {
        // Mostrar mensaje de que no se encontraron contactos
        $('#contactTableBody').append('<tr><td colspan="6">No se encontraron contactos.</td></tr>');
    } else {
        // Llenar la tabla con los nuevos resultados Contactos
        $.each(data, function (index, contacts) {
            var row = '<tr>' +
                '<td>' + contacts.IDUSER + '</td>' +
                '<td>' + contacts.NAME + '</td>' +
                '<td>' + contacts.EMAIL + '</td>' +
                '<td>' + contacts.SUBJECT + '</td>' +
                '<td>' + contacts.MESSAGE + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-info btn-infoContacto mb-2" data-bs-toggle="modal" data-bs-target="#infoContacto" data-bs-id="' + contacts.IDCONTACT + '"><i class="fa fa-info-circle"></i><span>Ver</span></button>' +
                '<button type="button" class="btn btn-editar btn-editarContacto btn-warning mb-2" data-bs-toggle="modal" data-bs-id="' + contacts.IDCONTACT + '" data-bs-target="#editContacto"><i class="fa fa-pencil"></i><span>Editar</span></button>' +
                '<button type="button" class="btn btn-borrar btn-borrarContacto btn-danger mb-2 js-sweetalert" data-type="confirm" data-bs-id="' + contacts.IDCONTACT + '"><i class="fa fa-trash-o"></i><span>Eliminar</span></button>' +
                '</td>' +
                '</tr>';

            $('#contactTableBody').append(row);
        });
    }
}
