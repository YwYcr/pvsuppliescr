

// <!-- Script para ver proveedores -->
// <!-- Script para ver proveedores -->

$(document).ready(function () {
    $(document).on("click", ".btn-infoProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getProveedor.php",
            data: { proveedorID: proveedorID },
            dataType: "json",
            success: function (response) {

                $("#infoProveedorName").val(response.NAME);
                $("#infoProveedorEmail").val(response.EMAIL);
                $("#infoProveedorTelefono").val(response.PHONE);
                $("#infoProveedorPOC").val(response.POC);
                $("#infoProveedorCedJuridica").val(response.SOCIALID);
                // $("#info").modal("show");

                // console.log("Email: " + response.EMAIL);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});







// <!-- Script para agregar proveedores nuevos -->

$(document).ready(function () {
    $("#createProveedorButton").click(function () {
        var nombre = $("#createProveedorName").val();
        var email = $("#createProveedorEmail").val();
        var telefono = $("#createProveedorTelefono").val();
        var poc = $("#createProveedorPOC").val();
        var cedJuridica = $("#createProveedorCedJuridica").val();

        // console.log("Email: " + email);
        // console.log("Nombre: " + nombre);
        // console.log("Primer Apellido: " + primerApellido);
        // console.log("Segundo Apellido: " + segundoApellido);
        // console.log("Contraseña: " + password);

        var data = {
            nombre: nombre,
            email: email,
            telefono: telefono,
            poc: poc,
            cedJuridica: cedJuridica
        };

        $.ajax({
            type: "POST",
            url: "crearProveedor.php",
            data: data,
            success: function (response) {
                swal("Agregado!", "Se agrego el proveedor con éxito!", "success");
                // alert('Proveedor creado con éxito');
                fetch('refreshProveedor.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('supplierTableBody').innerHTML = data;
                    });

            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
    });
});




// <!-- Script para traer 1 proveedor a modificar  -->

$(document).ready(function () {
    $(document).on("click", ".btn-editarProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getProveedor.php",
            data: { proveedorID: proveedorID },
            dataType: "json",
            success: function (response) {
                $("#editProveedorID").val(response.IDSUPPLIER);
                $("#editProveedorEmail").val(response.EMAIL);
                $("#editProveedorName").val(response.NAME);
                $("#editProveedorTelefono").val(response.PHONE);
                $("#editProveedorPOC").val(response.POC);
                $("#editProveedorCedJuridica").val(response.SOCIALID);
                // $("#info").modal("show");

                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDSUPPLIER);

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para actualizar proveedor  -->

$(document).ready(function () {
    $(document).on("click", ".btn-actualizarProveedor", function () {
        var proveedorID = $("#editProveedorID").val();
        var email = $("#editProveedorEmail").val();
        var nombre = $("#editProveedorName").val();
        var telefono = $("#editProveedorTelefono").val();
        var poc = $("#editProveedorPOC").val();
        var cedJuridica = $("#editProveedorCedJuridica").val();

        var data = {
            proveedorID: proveedorID,
            email: email,
            nombre: nombre,
            telefono: telefono,
            poc: poc,
            cedJuridica: cedJuridica
        };


        $.ajax({
            type: "POST",
            url: "updateProveedor.php",
            data: data,
            success: function (response) {
                swal("Modificado!", "Se modificó el proveedor con éxito!", "success");
                // alert('Proveedor modificado con éxito');
                fetch('refreshProveedor.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('supplierTableBody').innerHTML = data;
                    });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});




// <!-- Script para borrar provveedor -->

$(document).ready(function () {
    $(document).on("click", ".btn-borrarProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        $.ajax({
            type: "POST",
            url: "borrarProveedor.php",
            data: { proveedorID: proveedorID },
            success: function (response) {

                swal({
                    title: "Seguro que quieres eliminarlo?",
                    text: "Una vez eliminado no podras volver a recuperar este proveedor!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Si, Eliminalo!",
                    closeOnConfirm: false
                }, function () {
                    swal("Eliminado!", "Proveedor eliminado con éxito", "success");
                    // alert('Contacto eliminado con éxito');
                    fetch('refreshProveedor.php')
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('supplierTableBody').innerHTML = data;
                        });
                    console.log("proveedor eliminado: " + proveedorID);
                });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }

        });
    });
});


// <!-- Buscar Proveedores -->

function searchSupplier() {
    var searchTerm = $('#searchSupplierInput').val();

    // Realizar la petición AJAX
    $.ajax({
        url: 'buscar_proveedores.php', // Ajusta la URL al archivo PHP que maneja la búsqueda
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
    // Limpiar la tabla Proveedores
    $('#supplierTableBody').empty();

    if (data.length === 0) {
        // Mostrar mensaje de que no se encontraron Proveedores
        $('#supplierTableBody').append('<tr><td colspan="6">No se encontraron proveedores.</td></tr>');
    } else {
        // Llenar la tabla con los nuevos resultados Proveedores
        $.each(data, function (index, suppliers) {
            var row = '<tr>' +
                '<td>' + suppliers.IDSUPPLIER + '</td>' +
                '<td>' + suppliers.NAME + '</td>' +
                '<td>' + suppliers.SOCIALID + '</td>' +
                '<td>' + suppliers.PHONE + '</td>' +
                '<td>' + suppliers.POC + '</td>' +
                '<td>' + suppliers.EMAIL + '</td>' +
                '<td>' + suppliers.ADDRESS + '</td>' + // Corrección aquí
                '<td>' +
                '<button type="button" class="btn btn-info btn-infoProveedor mb-2" data-bs-toggle="modal" data-bs-target="#infoProveedor" data-bs-id="' + suppliers.IDSUPPLIER + '"><i class="fa fa-info-circle"></i><span>Ver</span></button>' +
                '<button type="button" class="btn btn-editar btn-editarProveedor btn-warning mb-2" data-bs-toggle="modal" data-bs-id="' + suppliers.IDSUPPLIER + '" data-bs-target="#editProveedor"><i class="fa fa-pencil"></i><span>Editar</span></button>' +
                '<button type="button" class="btn btn-borrar btn-borrarProveedor btn-danger mb-2 js-sweetalert" data-type="confirm" data-bs-id="' + suppliers.IDSUPPLIER + '"><i class="fa fa-trash-o"></i><span>Eliminar</span></button>' +
                '</td>' +
                '</tr>';

            $('#supplierTableBody').append(row);
        });
    }
}


