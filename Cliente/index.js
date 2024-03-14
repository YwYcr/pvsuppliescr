$(document).ready(function () {
    // Hacer la llamada AJAX al archivo PHP
    $.ajax({
        url: '../Producto/getProductIndex.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Procesa los resultados obtenidos
            if (data && data.length > 0) {
                // Itera sobre los resultados y genera el código HTML
                for (var i = 0; i < data.length; i++) {
                    var imageUrl = (data[i].IMAGE !== null) ? data[i].IMAGE : '../../assets/images/menu/logo/1.png';
                    var imgUrl = (data[i].IMGURL !== null) ? data[i].IMGURL : '../../assets/images/menu/logo/1.png';

                    var additionals = (data[i].DESCUENTO == 1) ? '<span class="sticker">Nuevo</span> <span class="sticker-2">Oferta</span>' : '<span class="sticker">Nuevo</span>';

                    var productoHTML = '<div class="slide-item">' +
                        '<div class="single_product">' +
                        '<div class="product-img">' +
                        '<a href="single-product.php?idprod=' + data[i].IDPRODUCT + '"/a>' +
                        '<img class="primary-img" src="' + imageUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                        '<img class="secondary-img" src="' + imgUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                        '</a>' +
                        additionals +
                        '<div class="add-actions">' +
                        '<ul>' +
                        '<li><a class="hiraola-add_cart" href="cart.php?idprod=' + data[i].IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar al Carrito"><i class="ion-bag"></i></a></li>' +
                        '</ul>' +
                        '</div>' +
                        '<div class="hiraola-product_content">' +
                        '<div class="product-desc_info">' +
                        '<h6><a class="product-name" href="single-product.php?idprod=' + data[i].IDPRODUCT + '">' + data[i].NAME + '</a></h6>' +
                        '<div class="price-box">' +
                        '<span class="new-price">₡' + data[i].PRICE + '</span>' +
                        '</div>' +
                        '<div class="additional-add_action">' +
                        '<ul>' +
                        '<li><a class="hiraola-add_compare" href="wishlist.php?idprod=' + data[i].IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar a Favoritos"><i class="ion-android-favorite-outline"></i></a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    // Agrega el código HTML al contenedor deseado
                    $('#contenedor-productos').append(productoHTML);
                } 
            } else {
                // Maneja el caso donde no hay resultados
                console.log('No se encontraron productos.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Maneja los errores de la llamada AJAX
            console.error('Error en la llamada AJAX:', textStatus, errorThrown);
        }
    });
});

