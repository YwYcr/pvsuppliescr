// Control de cargas del tab 
$(document).ready(function () {
    // Detectar cambio de pestaña
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var targetTab = $(e.target).attr("href"); // Pestaña activa
        loadTabContent(targetTab);
    });

    // Función para cargar el contenido de la pestaña
    function loadTabContent(tabId) {
        if (tabId === "#productTab") {
            // Cargar contenido de la pestaña de productos
            $.ajax({
                url: 'cargarContProducto.php', 
                type: 'GET',
                success: function (data) {
                    $('#productTab .body').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else if (tabId === "#categoryTab") {
            // Cargar contenido de la pestaña de categorías
            $.ajax({
                url: 'cargarContCategoria.php',
                type: 'GET',
                success: function (data) {
                    $('#categoryTab .body').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else if (tabId === "#imgTab") {
            // Cargar contenido de la pestaña de imágenes
            $.ajax({
                url: 'cargarContImagenes.php', 
                type: 'GET',
                success: function (data) {
                    $('#imgTab .body').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    }

    // Cargar contenido de la pestaña inicial al cargar la página
    loadTabContent($('.nav-tabs .active').attr("href"));
});


// <!-- Productos del inventario -->

// Función para llenar las opciones de categoría en el select
function llenarOpcionesCategoria1() {
    var selectCategoria = $("#createProductCategoria");

    // Limpiar opciones existentes
    selectCategoria.empty();

    // Hacer una solicitud AJAX para obtener las categorías desde el servidor
    $.ajax({
        url: 'getAllCategorias.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Llenar el select con las opciones de categoría
            data.forEach(function (categoria) {
                selectCategoria.append('<option value="' + categoria.idcategory + '">' + categoria.name + '</option>');
            });
        },
        error: function (error) {
            console.error('Error al obtener las categorías:', error);
        }
    });
}

// Función que devuelve una promesa que se resuelve cuando las opciones de categoría están llenas
function llenarOpcionesCategoria2() {
    return new Promise(function (resolve, reject) {
        var selectCategoria = $("#editProductCategoria");

        // Limpiar opciones existentes
        selectCategoria.empty();

        // Hacer una solicitud AJAX para obtener las categorías desde el servidor
        $.ajax({
            url: 'getAllCategorias.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Llenar el select con las opciones de categoría
                data.forEach(function (categoria) {
                    selectCategoria.append('<option value="' + categoria.idcategory + '">' + categoria.name + '</option>');
                });

                // Resolver la promesa
                resolve();
            },
            error: function (error) {
                console.error('Error al obtener las categorías:', error);

                // Rechazar la promesa en caso de error
                reject(error);
            }
        });
    });
}

function llenarOpcionesCategoria3() {
    return new Promise(function (resolve, reject) {
        var selectCategoria = $("#infoProductCategoria");

        // Limpiar opciones existentes
        selectCategoria.empty();

        // Hacer una solicitud AJAX para obtener las categorías desde el servidor
        $.ajax({
            url: 'getAllCategorias.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Llenar el select con las opciones de categoría
                data.forEach(function (categoria) {
                    selectCategoria.append('<option value="' + categoria.idcategory + '">' + categoria.name + '</option>');
                });

                // Resolver la promesa
                resolve();
            },
            error: function (error) {
                console.error('Error al obtener las categorías:', error);

                // Rechazar la promesa en caso de error
                reject(error);
            }
        });
    });
}


// Función que se ejecutará cuando el modal se muestre
$('#createProducto').on('show.bs.modal', function (e) {
    // Llamar a la función para llenar las opciones de categoría
    llenarOpcionesCategoria1();
});


// Funcion para limpiar el form de creacion de la imagen
function clearFormProduct() {
    $('#createProductName').val('');
    $('#createProductDescription').val('');
    $('#createProductMarca').val('');
    $('#createProductCantidad').val('1');
    $('#createProductPrecio').val('0');
    $('#createProductDescuento').val('0');
    $('#createProductCategoria').val('');
    $('#createproductoValidoSi').prop('checked', true);
    $('#createproductoValidoNo').prop('checked', false);
}

function clearFormCategoria() {
    $("#createCategoriaName").val('');
    $("#createCategoriaDescription").val('');
}

// Script para crear productos nuevos
$(document).ready(function () {
    $("#crearProductoButton").click(function () {
        var nombre = $("#createProductName").val();
        var descripcion = $("#createProductDescription").val();
        var marca = $("#createProductMarca").val();
        var cantidad = $("#createProductCantidad").val();
        var precio = $("#createProductPrecio").val();
        var categoria = $("#createProductCategoria").val();
        var descuento = $("#createProductDescuento").val();  // Obtener el valor del campo de descuento
        var valid = ($("#createproductoValidoSi").prop("checked")) ? $("#createproductoValidoSi").val() : $("#createproductoValidoNo").val();

        // Verificar si el valor es nulo o vacío y establecerlo en 0
        if (!cantidad || cantidad.trim() === "") {
            cantidad = 1;
        }
        if (!precio || precio.trim() === "") {
            precio = 0;
        }
        if (!descuento || descuento.trim() === "") {
            descuento = 0;
        }

        var data = {
            nombre: nombre,
            descripcion: descripcion,
            marca: marca,
            cantidad: cantidad,
            precio: precio,
            categoria: categoria,
            descuento: descuento,  // Incluir el valor del descuento en el objeto 'data'
            valid: valid
        };

        $.ajax({
            type: "POST",
            url: "crearProducto.php",
            data: data,
            success: function (response) {
                swal("Agregado!", "Se agrego el producto con éxito!", "success");
                clearFormProduct();
                $.ajax({
                    url: 'cargarContProducto.php', 
                    type: 'GET',
                    success: function (data) {
                        $('#productTab .body').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });



    });
});

// <!-- Script para ver productos -->
$(document).ready(function () {
    $(document).on("click", ".btn-infoProducto", function () {
        var productID = $(this).data("bs-id");

        // Llama a llenarOpcionesCategoria2 antes de iniciar la petición AJAX
        llenarOpcionesCategoria3().then(function () {
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
                $("#infoProductDescuento").val(response.DISCOUNT);
                // console.log("Valor de VALID:", response.VALID);

                if (response.VALID === 1) {
                    $("#infoproductoValidoSi").prop("checked", true);
                    $("#infoproductoValidoNo").prop("checked", false);
                } else {
                    $("#infoproductoValidoSi").prop("checked", false);
                    $("#infoproductoValidoNo").prop("checked", true);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
});

// <!-- Script para traer 1 producto a modificar  -->
$(document).ready(function () {
    $(document).on("click", ".btn-editarProducto", function () {
        var productID = $(this).data("bs-id");

        // Llama a llenarOpcionesCategoria2 antes de iniciar la petición AJAX
        llenarOpcionesCategoria2().then(function () {
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
                $("#editProductDescuento").val(response.DISCOUNT);
                if (response.VALID === 1) {
                    $("#editproductoValidoSi").prop("checked", true);
                    $("#editproductoValidoNo").prop("checked", false);
                } else {
                    $("#editproductoValidoSi").prop("checked", false);
                    $("#editproductoValidoNo").prop("checked", true);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
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
        var descuento = $("#editProductDescuento").val();  // Obtener el valor del campo de descuento
        var valid = ($("#editproductoValidoSi").prop("checked")) ? $("#editproductoValidoSi").val() : $("#editproductoValidoNo").val();

        // Verificar si el valor es nulo o vacío y establecerlo en 0
        if (!cantidad || cantidad.trim() === "") {
            cantidad = 1;
        }
        if (!precio || precio.trim() === "") {
            precio = 0;
        }
        if (!descuento || descuento.trim() === "") {
            descuento = 0;
        }

        var data = {
            productID: productID,
            nombre: nombre,
            descripcion: descripcion,
            marca: marca,
            cantidad: cantidad,
            precio: precio,
            descuento: descuento,
            categoria: categoria,
            valid: valid,
        };


        $.ajax({
            type: "POST",
            url: "updateProducto.php",
            data: data,
            success: function (response) {
                swal("Modificado!", "Se modificó el producto con éxito!", "success");
                $.ajax({
                    url: 'cargarContProducto.php',
                    type: 'GET',
                    success: function (data) {
                        $('#productTab .body').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
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

        swal({
            title: "Seguro que quieres eliminarlo?",
            text: "Una vez eliminado no podrás volver a recuperar este producto!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Usuario hizo clic en "Sí"
                $.ajax({
                    type: "POST",
                    url: "borrarProducto.php",
                    data: { productID: productID },
                    dataType: 'json', // Asegura que el resultado se interprete como JSON
                    success: function (response) {
                        if (response.success) {
                            swal("Eliminado!", "Producto eliminado con éxito", "success");
                            // Lógica después de recargar la lista
                            $.ajax({
                                url: 'cargarContProducto.php',
                                type: 'GET',
                                success: function (data) {
                                    $('#productTab .body').html(data);
                                    console.log("Producto eliminado: " + productID);
                                },
                                error: function (xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        } else {
                            // Mostrar error en SweetAlert
                            if (response.error.includes("PRODUCT_IMAGE")) {
                                // swal("Error", "Error al eliminar el producto: " + response.error, "error");
                                swal("Error", "Error al eliminar el producto: El producto tiene imagenes asociadas", "error");
                            } else if (response.error.includes("ORDERDETAIL")) {
                                swal("Error", "Error al eliminar el producto: El producto esta asociado a una orden", "error");
                            } else {
                                swal("Error", "Error al eliminar el producto: " + response.error, "error");
                            } 
                        }
                    },
                    error: function (xhr, status, error) {
                        // Mostrar error en SweetAlert
                        swal("Error", "Error al eliminar el producto", "error");
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
                swal("Agregado!", "Se agrego categoría con éxito!", "success");
                clearFormCategoria();
                $.ajax({
                    url: 'cargarContCategoria.php', // Reemplaza 'cargarCategorias.php' con el nombre de tu archivo PHP para cargar categorías
                    type: 'GET',
                    success: function (data) {
                        $('#categoryTab .body').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
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
                swal("Modificado!", "Se modificó la categoría con éxito!", "success");
                $.ajax({
                    url: 'cargarContCategoria.php', // Reemplaza 'cargarCategorias.php' con el nombre de tu archivo PHP para cargar categorías
                    type: 'GET',
                    success: function (data) {
                        $('#categoryTab .body').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
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

        swal({
            title: "Seguro que quieres eliminarlo?",
            text: "Una vez eliminado no podrás volver a recuperar esta categoría!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Usuario hizo clic en "Sí"
                $.ajax({
                    type: "POST",
                    url: "borrarCategoria.php",
                    data: { categoryID: categoryID },
                    dataType: 'json', // Asegura que el resultado se interprete como JSON
                    success: function (response) {
                        if (response.success) {
                            swal("Eliminado!", "Categoría eliminada con éxito", "success");
                            // Lógica después de recargar la lista
                            $.ajax({
                                url: 'cargarContCategoria.php',
                                type: 'GET',
                                success: function (data) {
                                    $('#categoryTab .body').html(data);
                                    console.log("Categoría eliminada: " + categoryID);
                                },
                                error: function (xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        } else {
                            // Mostrar error en SweetAlert
                            if (response.error.includes("PRODUCT")) {
                                // swal("Error", "Error al eliminar el producto: " + response.error, "error");
                                swal("Error", "Error al eliminar la categoría: Esta Categoría tiene productos asociadas", "error");
                            } else {
                                swal("Error", "Error al eliminar la categoría: " + response.error, "error");
                            } 
                        }
                    },
                    error: function (xhr, status, error) {
                        // Mostrar error en SweetAlert
                        swal("Error", "Error al eliminar la categoría " + error, "error");
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












