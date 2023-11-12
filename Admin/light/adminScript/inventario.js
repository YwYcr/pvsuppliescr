// <!-- Productos del inventario -->
// <!-- Script para ver productos -->
    $(document).ready(function () {
        $(document).on("click", ".btn-infoProducto", function () {
            var productID = $(this).data("bs-id");

            $.ajax({
                type: "GET",
                url: "admininventario/getProducto.php",
                data: { productID: productID },
                dataType: "json",
                success: function (response) {
                    $("#infoProductID").val(response.IDPRODUCT);
                    $("#infoProductName").val(response.NAME);
                    $("#infoProductDescription").val(response.DESCRIPTION);
                    $("#infoProductMarca").val(response.BRAND);
                    $("#infoProductCantidad").val(response.QUANTITY);
                    $("#infoProductPrecio").val(response.PRICE);
                    $("#infoProductCategoria").val(response.IDCATEGORY);

                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

// <!-- Script para crear productos nuevos -->
    $(document).ready(function () {
        $("#crearProductoButton").click(function () {

            var nombre = $("#createProductName").val();
            var descripcion = $("#createProductDescription").val();
            var marca = $("#createProductMarca").val();
            var cantidad = $("#createProductCantidad").val();
            var precio = $("#createProductPrecio").val();
            var categoria = $("#createProductCategoria").val();

            var data = {

                nombre: nombre,
                descripcion: descripcion,
                marca: marca,
                cantidad: cantidad,
                precio: precio,
                categoria: categoria
            };

            $.ajax({
                type: "POST",
                url: "admininventario/crearProducto.php",
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


// <!-- Script para crear categorias nuevas -->
    $(document).ready(function () {
        $("#crearCategoriaButton").click(function () {

            var nombre = $("#createCategoriaName").val();
            var descripcion = $("#createCategoriaDescription").val();


            var data = {

                nombre: nombre,
                descripcion: descripcion
            };

            $.ajax({
                type: "POST",
                url: "admininventario/crearCategoria.php",
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



// <!-- Script para traer 1 producto a modificar  -->
    $(document).ready(function () {
        $(document).on("click", ".btn-editarProducto", function () {
            var productID = $(this).data("bs-id");

            $.ajax({
                type: "GET",
                url: "admininventario/getProducto.php",
                data: { productID: productID },
                dataType: "json",
                success: function (response) {

                    $("#editProductID").val(response.IDPRODUCT);
                    $("#editProductName").val(response.NAME);
                    $("#editProductDescription").val(response.DESCRIPTION);
                    $("#editProductMarca").val(response.BRAND);
                    $("#editProductCantidad").val(response.QUANTITY);
                    $("#editProductPrecio").val(response.PRICE);
                    $("#editProductCategoria").val(response.IDCATEGORY);


                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });




// <!-- Script para actualizar productos  -->
    $(document).ready(function () {
        $(document).on("click", ".btn-actualizarProducto", function () {

            var productID = $("#editProductID").val();
            var nombre = $("#editProductName").val();
            var descripcion = $("#editProductDescription").val();
            var marca = $("#editProductMarca").val();
            var cantidad = $("#editProductCantidad").val();
            var precio = $("#editProductPrecio").val();
            var categoria = $("#editProductCategoria").val();

            var data = {
                productID: productID,
                nombre: nombre,
                descripcion: descripcion,
                marca: marca,
                cantidad: cantidad,
                precio: precio,
                categoria: categoria
            };


            $.ajax({
                type: "POST",
                url: "admininventario/updateProducto.php",
                data: data,
                success: function (response) {

                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

// <!-- Script para borrar productos -->
    $(document).ready(function () {
        $(document).on("click", ".btn-borrarProducto", function () {
            var productID = $(this).data("bs-id");

            $.ajax({
                type: "POST",
                url: "admininventario/borrarProducto.php",
                data: { productID: productID },
                success: function (response) {
                    console.log("Producto eliminado: " + userID);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

