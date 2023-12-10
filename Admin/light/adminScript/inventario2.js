// <!-- Productos del inventario -->
// <!-- Script para ver productos -->
    $(document).ready(function () {
        $(document).on("click", ".btn-infoProducto", function () {
            var productID = $(this).data("bs-id");

            $.ajax({
                type: "GET",
                url: "getProducto.php",
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
                    $("#infoProductImagen").val(response.IMAGE);
                    $("#infoProductSize").val(response.IDSIZE);

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
            var imagen = $("#createProductImagen").val();
            var size = $("#createProductSize").val();

            var data = {

                nombre: nombre,
                descripcion: descripcion,
                marca: marca,
                cantidad: cantidad,
                precio: precio,
                categoria: categoria,
                imagen: imagen,
                size:size
            };

            $.ajax({
                type: "POST",
                url: "crearProducto.php",
                data: data,
                success: function (response) {
                alert('Producto creado con éxito');
                fetch('refreshProducto.php')
                .then(response => response.text())                   
                .then(data => {
                    document.getElementById('productTableBody').innerHTML = data;
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
                url: "crearCategoria.php",
                data: data,
                success: function (response) {
                alert('Categoria creada con éxito');
                fetch('refreshProducto.php')
                .then(response => response.text())                   
                .then(data => {
                    document.getElementById('productoTableBody').innerHTML = data;
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



// <!-- Script para traer 1 producto a modificar  -->
    $(document).ready(function () {
        $(document).on("click", ".btn-editarProducto", function () {
            var productID = $(this).data("bs-id");

            $.ajax({
                type: "GET",
                url: "getProducto.php",
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
                    $("#editProductImagen").val(response.IMAGE);
                    $("#editProductSize").val(response.IDSIZE);


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
            var imagen = $("#editProductImagen").val();
            var size = $("#editProductSize").val();

            var data = {
                productID: productID,
                nombre: nombre,
                descripcion: descripcion,
                marca: marca,
                cantidad: cantidad,
                precio: precio,
                categoria: categoria,
                imagen:imagen,
                size:size
            };


            $.ajax({
                type: "POST",
                url: "updateProducto.php",
                data: data,
                success: function (response) {
                alert('Producto modificado con éxito');
                fetch('refreshProducto.php')
                .then(response => response.text())                   
                .then(data => {
                    document.getElementById('productTableBody').innerHTML = data;
                });

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
                url: "borrarProducto.php",
                data: { productID: productID },
                success: function (response) {
                alert('Producto eliminado con éxito');    
                fetch('refreshProducto.php')
                .then(response => response.text())                   
                .then(data => {
                    document.getElementById('productTableBody').innerHTML = data;
                });
                    console.log("Producto eliminado: " + productID);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });


    // Imagenes!!

// Declarar una variable global para almacenar el productID
var selectedProductID = "";

// Abre el model de crear imagen nueva    
$(document).ready(function() {
    // Manejar el clic en una fila de la primera tabla
    $('#prodTable tbody').on('click', 'tr', function() {
        // Obtener el ID del producto de la fila clicada
        selectedProductID = $(this).find('td:first-child').text();
        // Realizar una solicitud AJAX al servidor para obtener datos para la segunda tabla
        $.ajax({
            url: 'getImages.php',
            method: 'POST',
            data: { productID: selectedProductID },
            success: function(data) {
                $('#imageTable').html(data);
            },
            error: function() {
                console.error('Error al cargar los datos');
            }
        });
    });

// Manejar el clic en el botón de crear imagen
$('#crearImagen').on('click', function() {
    // Verificar si hay un productID seleccionado
    if (selectedProductID !== "") {
        // Realizar alguna acción con el productID, por ejemplo, enviarlo a otra parte del servidor
        $('#createProductID').val(selectedProductID).prop('readonly', true);
        
        // Mostrar el modal solo si hay un productID seleccionado
        $('#createImagen').modal('show');
    } else {
        // Mostrar un mensaje de error o realizar otra acción si no hay un productID seleccionado
        swal("Atención!", "Primero debes seleccionar un producto de la lista", "info");
    }
});

});

// <!-- le asigna el nombre de la imagen con el archivo que se selecciona -->    
$('#createImagenUrl').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $('#createImagenName').val(fileName);
});


// <!-- Script para Descargar Imagen -->    
	function downloadFile(url) {
        var link = document.createElement('a');
        link.href = url;
        link.download = url.substring(url.lastIndexOf('/') + 1);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        }

// <!-- Script para Cargar Imagen y guardar en BD -->       
$('#crearImagenButton').on('click', function() {
    // Aquí puedes realizar la lógica para enviar los datos a tu servidor, incluida la URL de la imagen

    // Por ejemplo, podrías utilizar AJAX para enviar los datos al servidor PHP
    var formData = new FormData($('#createImagenForm')[0]);

    $.ajax({
        url: 'crearImagen.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            swal("Agregado!", "Se agrego la imagen con éxito!", "success");
        },
        error: function(error) {
            // console.error('Error en la solicitud AJAX:', error);
        }
    });
});

    
    
    
    
    
