// <!-- Script para ver Ordenes -->

$(document).ready(function () {
    $(document).on("click", ".btn-infoOrden", function () {
        var ordenID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getOrden.php",
            data: { ordenID: ordenID },
            dataType: "json",
            success: function (response) {

                $("#infoOrdenID").val(response.IDORDER);
                $("#infoOrdenTotal").val(response.TOTAL);
                $("#infoOrdenCreacion").val(response.CREATEDATE);
                $("#infoOrdenStatus").val(response.STATUS);
                $("#infoOrdenAddress").val(response.ADDRESS);
                $("#infoOrdenUser").val(response.IDUSER);
                $("#infoOrdenDetalle").val(response.ORDERDETAIL);

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});



// <!-- Script para agregar Ordenes nuevos -->

$(document).ready(function () {
    $("#createOrdenButton").click(function () {
        var total = $("#createOrdenTotal").val();
        var status = $("#createOrdenStatus").val();
        var address = $("#createOrdenAddress").val();
        var user = $("#createOrdenUser").val();
        var detalle = $("#createOrdenDetalle").val();


        var data = {
            total: total,
            status: status,
            address: address,
            user: user,
            detalle: detalle
        };

        $.ajax({
            type: "POST",
            url: "crearOrden.php",
            data: data,
            success: function (response) {
                swal("Agregado!", "Se agrego el Orden con éxito!", "success");
                // alert('Orden creado con éxito');
                fetch('refreshOrden.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('orderTableBody').innerHTML = data;
                    });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});




// <!-- Script para traer 1 Orden a modificar  -->

$(document).ready(function () {
    $(document).on("click", ".btn-editarOrden", function () {
        var ordenID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getOrden.php",
            data: { ordenID: ordenID },
            dataType: "json",
            success: function (response) {
                $("#editOrdenID").val(response.IDORDER);
                $("#editOrdenTotal").val(response.TOTAL);
                $("#editOrdenCreacion").val(response.CREATEDATE);
                $("#editOrdenStatus").val(response.STATUS);
                $("#editOrdenAddress").val(response.ADDRESS);
                $("#editOrdenUser").val(response.IDUSER);
                $("#editOrdenDetalle").val(response.ORDERDETAIL);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para actualizar Orden  -->

$(document).ready(function () {
    $(document).on("click", ".btn-actualizarOrden", function () {
        var orderID = $("#editOrdenID").val();
        var total = $("#editOrdenTotal").val();
        var status = $("#editOrdenStatus").val();
        var address = $("#editOrdenAddress").val();
        var user = $("#editOrdenUser").val();
        var detalle = $("#editOrdenDetalle").val();

        var data = {
            orderID: orderID,
            total: total,
            status: status,
            address: address,
            user: user,
            detalle: detalle
        };


        $.ajax({
            type: "POST",
            url: "updateOrden.php",
            data: data,
            success: function (response) {
                swal("Modificado!", "Se modificó el Orden con éxito!", "success");
                // alert('Orden modificado con éxito');
                fetch('refreshOrden.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('orderTableBody').innerHTML = data;
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
    $(document).on("click", ".btn-borrarOrden", function () {
        var orderID = $(this).data("bs-id");

        $.ajax({
            type: "POST",
            url: "borrarOrden.php",
            data: { orderID: orderID },
            success: function (response) {

                swal({
                    title: "Seguro que quieres eliminarlo?",
                    text: "Una vez eliminado no podras volver a recuperar este Orden!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Si, Eliminalo!",
                    closeOnConfirm: false
                }, function () {
                    swal("Eliminado!", "Orden eliminado con éxito", "success");
                    // alert('Contacto eliminado con éxito');
                    fetch('refreshOrden.php')
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('orderTableBody').innerHTML = data;
                        });
                    console.log("Orden eliminado: " + OrdenID);
                });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }

        });
    });
});