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
                fetch('refreshCategoria.php')
                .then(response => response.text())                   
                .then(data => {
                    document.getElementById('categoryTableBody').innerHTML = data;
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

// <!-- Script para Ver categorias  -->
$(document).ready(function () {
    $(document).on("click", ".btn-infoCategoria", function () {
        var categoryID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getCategoria.php",
            data: { categoryID: categoryID },
            dataType: "json",
            success: function (response) {
                $("#infoCategoryID").val(response.IDPRODUCT);
                $("#infoCategoryName").val(response.NAME);
                $("#infoCategoryDescription").val(response.DESCRIPTION);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});

// <!-- Script para traer 1 categoria a modificar  -->
$(document).ready(function () {
    $(document).on("click", ".btn-editarCategoria", function () {
        var categoryID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getCategoria.php",
            data: { categoryID: categoryID },
            dataType: "json",
            success: function (response) {

                $("#editCategoryID").val(response.IDCATEGORY);
                $("#editCategoryName").val(response.NAME);
                $("#editCategoryDescription").val(response.DESCRIPTION);
    
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
// <!-- Script para actualizar categorias  -->
$(document).ready(function () {
    $(document).on("click", ".btn-actualizarCategoria", function () {

        var categoryID = $("#editCategoryID").val();
        var nombre = $("#editCategoryName").val();
        var descripcion = $("#editCategoryDescription").val();


        var data = {
            categoryID: categoryID,
            nombre: nombre,
            descripcion: descripcion
        };


        $.ajax({
            type: "POST",
            url: "updateCategoria.php",
            data: data,
            success: function (response) {
            alert('Catgegoria modificada con éxito');
            fetch('refreshCategoria.php')
            .then(response => response.text())                   
            .then(data => {
                document.getElementById('categoryTableBody').innerHTML = data;
            });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});    
// <!-- Script para borrar categoria -->
$(document).ready(function () {
    $(document).on("click", ".btn-borrarCategoria", function () {
        var categoryID = $(this).data("bs-id");

        $.ajax({
            type: "POST",
            url: "borrarCategoria.php",
            data: { categoryID: categoryID },
            success: function (response) {
            alert('Categoria eliminada con éxito');    
            fetch('refreshCategoria.php')
            .then(response => response.text())                   
            .then(data => {
                document.getElementById('categoryTableBody').innerHTML = data;
            });
                console.log("Categoria eliminado: " + productID);
            },
            error: function (xhr, status, error) {
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

$(document).ready(function () {
    // Maneja el evento click en las filas de la tabla
    $('#prodTable tbody').on('click', 'tr', function () {
        // Desmarca todas las filas y luego marca la fila clicada
        $('#prodTable tbody tr').removeClass('selected');
        $(this).addClass('selected');
    });
});

// Variable global para almacenar el productID
var selectedProductID = "";
var selectedImageID = "";

// Abre el model de crear imagen nueva    
$(document).ready(function() {
    $('#prodTable tbody').on('click', 'tr', function() {
        selectedProductID = $(this).find('td:first-child').text();
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
    if (selectedProductID !== "") {
        $('#createProductID').val(selectedProductID).prop('readonly', true);

        $('#createImagen').modal('show');
    } else {
        swal("Atención!", "Primero debes seleccionar un producto de la lista", "error");
    }
});

});

// le asigna el nombre de la imagen con el archivo que se selecciona    
$('#createImagenUrl').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $('#createImagenName').val(fileName);
});

// le asigna el nombre de la imagen con el archivo que se selecciona    
$('#editImagenUrl').on('change', function() {
    var fileName = $(this).val().split('\\').pop();
    $('#editImagenName').val(fileName);
});


// Script para Descargar Imagen    
	function downloadFile(url) {
        var link = document.createElement('a');
        link.href = url;
        link.download = url.substring(url.lastIndexOf('/') + 1);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        }

//  Script para Cargar Imagen y guardar en BD       
$('#crearImagenButton').on('click', function() {

    var productID = $('#createProductID').val();
    var imageName = $('#createImagenName').val();
    var isPrincipal = $("input[name='createImagenPrincipal']:checked").val();
    var imageFile = $('#createImagenUrl').val();

    // Validación de campos
    if (productID === "" || imageName === "" || isPrincipal === undefined || imageFile === "") {
        swal("Error!", "Todos los campos deben estar completos.", "error");
        return;
    }


    var formData = new FormData($('#createImagenForm')[0]);

    $.ajax({
        url: 'crearImagen.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Verificar si la respuesta contiene la cadena 'Error'
            if (response.includes('Error')) {
                swal("Error!", "La imagen que intentas subir está duplicada. Intenta con otra imagen o cambia el nombre.", "error");
            } else {
                swal("Agregado!", "Se agregó la imagen con éxito!", "success");
                reloadTable();
                clearForm();
            }
        },
        error: function(error) {
            swal("Error!", "Ocurrió un error al procesar la solicitud. Por favor, inténtalo nuevamente.", "error");
        }
    });
});

// Funcion para recargar la tabla de las imagenes.
function reloadTable() {
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
}

// Funcion para limpiar el form de creacion de la imagen
function clearForm() {
    $('#createProductID').val('');
    $('#createImagenName').val('');
    $('#createImagenUrl').val('');
    $('#createImagenPrincipalSi').prop('checked', false);
    $('#createImagenPrincipalNo').prop('checked', true);
}

// Eliminar Imagen en S3 y Base de datos
$('#imageTable').on('click', '.btn-borrarImagen', function() {
    var imageID = $(this).data('bs-id');

    swal({
        title: "Seguro que quieres eliminarlo?",
        text: "Una vez eliminado no podrás volver a recuperar esta imagen!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Sí, Elimínalo!",
        closeOnConfirm: false
    }, function(confirmed) {
        if (confirmed) {
            // El usuario confirmó la eliminación, procede con la solicitud AJAX
            $.ajax({
                url: 'borrarImagen.php', 
                method: 'POST',
                data: { imageID: imageID },
                success: function(response) {
                    if (response.includes('Error')) {
                        swal("Error!", "No se pudo eliminar la imagen.", "error");
                    } else {
                        swal("Eliminado!", "La imagen se eliminó con éxito.", "success");
                        reloadTable();
                    }
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        } else {
            // El usuario canceló la eliminación, puedes hacer algo si lo deseas
            console.log("Eliminación cancelada");
        }
    });
});



// Carga en el modal de editImagen los valores necesarios
$(document).ready(function () {
    $(document).on("click", ".btn-editarImagen", function () {
        var imageID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getImageDetails.php",
            data: { imageID: imageID },
            dataType: "json",
            success: function (response) {
                $("#editImageProdID").val(response.IDPRODUCT);
                $("#editImagenName").val(response.IDIMAGE);                
                $("#editImagenNameoriginal").val(response.IDIMAGE);                

                if (response.IMGMAIN == 1) {
                    $("#editImagenPrincipalSi").prop("checked", true);
                } else {
                    $("#editImagenPrincipalNo").prop("checked", true);
                }

                $("#editImagenUrl").val('');

                // Abre el modal
                $("#editImagen").modal("show");
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});

// Editar Imagen
$('#editImagenButton').on('click', function() {

    var productID = $('#editImageProdID').val();
    var imageName = $('#editImagenName').val();
    var imageNameOriginal = $('#editImagenNameoriginal').val();
    var isPrincipal = $("input[name='editImagenPrincipal']:checked").val();
    var imageFile = $('#editImagenUrl').val();

    // Validación de campos
    if (productID === "" || imageName === "" || imageNameOriginal === "" || isPrincipal === undefined || imageFile === "") {
        swal("Error!", "Todos los campos deben estar completos.", "error");
        return;
    }

    var formData = new FormData($('#editImagenForm')[0]);
    var originalImageName = $('#editImagenNameoriginal').val();

    $.ajax({
        url: 'updateImagen.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.includes('Error')) {
                swal("Error!", "No se pudo editar la imagen.", "error");
            } else {
                // Crear fue exitoso, ahora eliminar la imagen antigua
                eliminarImagen(originalImageName);
            }
        },
        error: function(error) {
            swal("Error!", "Ocurrió un error al procesar la solicitud. Por favor, inténtalo nuevamente.", "error");
        }
    });
});

// Función para eliminar la imagen antigua
function eliminarImagen(imageID) {
    $.ajax({
        url: 'borrarImagen.php',
        type: 'post',
        data: { imageID: imageID },
        success: function(response) {
            if (response.includes('Error')) {
                swal("Error!", "No se pudo eliminar la imagen antigua.", "error");
            } else {
                swal("Editado!", "La imagen se editó con éxito.", "success");
                reloadTable();
                clearForm();
            }
        },
        error: function(error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
};





    
    
    
