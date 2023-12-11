// catalogo.js
document.addEventListener('DOMContentLoaded', function () {
    // Obtener el contenedor donde se insertarán los resultados
    var contenedor = document.querySelector('.shop-product-wrap');

    // Obtener el parámetro de búsqueda de la URL
    var urlParams = new URLSearchParams(window.location.search);
    var parametroBusqueda = urlParams.get('search');

    // Realizar una solicitud AJAX a getCatalogo.php con el parámetro de búsqueda
    if (!parametroBusqueda) {
    // Realizar una solicitud AJAX a getCatalogo.php con el parámetro null
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../Catalogo/getCatalogo.php', true);

    xhr.onload = function () {
        try {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Limpiar el contenido actual del contenedor
                contenedor.innerHTML = '';

                // Analizar la respuesta JSON
                var resultados = JSON.parse(xhr.responseText);

                // Insertar los resultados en el contenedor
                resultados.forEach(function (producto) {

                    var imageUrl = (producto.IMAGE !== null) ? producto.IMAGE : '../../assets/images/menu/logo/1.png';
                    var imgUrl = (producto.IMGURL !== null) ? producto.IMGURL : '../../assets/images/menu/logo/1.png';



                    var htmlProducto = '<div class="col-lg-4">' +
                    '<div class="slide-item">' +
                    '<div class="single_product">' +
                    '<div class="product-img">' +
                    '<a href="single-product.php?idprod=' + producto.IDPRODUCT + '"/>' +
                    '<img class="primary-img" src="' + imageUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                    '<img class="secondary-img" src="' + imgUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                    '</a>' +
                    '<div class="add-actions">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_cart" href="cart.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar al Carrito"><i class="ion-bag"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '<div class="hiraola-product_content">' +
                    '<div class="product-desc_info">' +
                    '<h6><a class="product-name" href="single-product.php?idprod=' + producto.IDPRODUCT + '">' + producto.NAME + '</a></h6>' +
                    '<div class="price-box">' +
                    '<span class="new-price">₡' + producto.PRICE + '</span>' +
                    '</div>' +
                    '<div class="additional-add_action">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_compare" href="wishlist.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar a Favoritos"><i class="ion-android-favorite-outline"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="list-slide_item">' +
                    '<div class="single_product">' +
                    '<div class="product-img">' +
                    '<a href="single-product.php?idprod=' + producto.IDPRODUCT + '">' +
                    '<img class="primary-img" src="' + imageUrl + '" style="object-fit: scale-down;" alt="Hiraola\'s Product Image">' +
                    '<img class="secondary-img" src="' + imgUrl + '" style="object-fit: scale-down;" alt="Hiraola\'s Product Image">' +
                    '</a>' +
                    '</div>' +
                    '<div class="hiraola-product_content">' +
                    '<div class="product-desc_info">' +
                    '<h6><a class="product-name" href="single-product.php?idprod=' + producto.IDPRODUCT + '">' + producto.NAME + '</a></h6>' +
                    '<div class="price-box">' +
                    '<span class="new-price">₡' + producto.PRICE + '</span>' +
                    '</div>' +
                    '<div class="product-short_desc">' +
                    '<p>' + producto.DESCRIPTION + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="add-actions">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_cart" href="cart.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Añadir al carrito">Añadir al carrito</a></li>' +
                    '<li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Ver"><i class="ion-eye"></i></a></li>' +
                    '<li><a class="hiraola-add_compare" href="wishlist.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Añadir a favoritos"><i class="ion-android-favorite-outline"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                    // Insertar el HTML del producto en el contenedor
                    contenedor.innerHTML += htmlProducto;
                });
            } 
            else {
                console.error('Error al obtener datos del catálogo. Código de estado:', xhr.status);
            }
        } 
        catch (error) {
            console.error('Error al procesar la respuesta JSON:', error);
        }
    };
}
    else {
            // Realizar una solicitud AJAX a getCatalogo.php con el parámetro null
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../Catalogo/getCatalogoBusqueda.php?search=' + encodeURIComponent(parametroBusqueda), true);

    xhr.onload = function () {
        try {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Limpiar el contenido actual del contenedor
                contenedor.innerHTML = '';

                // Analizar la respuesta JSON
                var resultados = JSON.parse(xhr.responseText);

                // Insertar los resultados en el contenedor
                resultados.forEach(function (producto) {

                    var imageUrl = (producto.IMAGE !== null) ? producto.IMAGE : '../../assets/images/menu/logo/1.png';
                    var imgUrl = (producto.IMGURL !== null) ? producto.IMGURL : '../../assets/images/menu/logo/1.png';



                    var htmlProducto = '<div class="col-lg-4">' +
                    '<div class="slide-item">' +
                    '<div class="single_product">' +
                    '<div class="product-img">' +
                    '<a href="single-product.php?idprod=' + producto.IDPRODUCT + '"/>' +
                    '<img class="primary-img" src="' + imageUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                    '<img class="secondary-img" src="' + imgUrl + '" style="object-fit: scale-down;" alt="Imagen del Producto"/>' +
                    '</a>' +
                    '<div class="add-actions">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_cart" href="cart.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar al Carrito"><i class="ion-bag"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '<div class="hiraola-product_content">' +
                    '<div class="product-desc_info">' +
                    '<h6><a class="product-name" href="single-product.php?idprod=' + producto.IDPRODUCT + '">' + producto.NAME + '</a></h6>' +
                    '<div class="price-box">' +
                    '<span class="new-price">₡' + producto.PRICE + '</span>' +
                    '</div>' +
                    '<div class="additional-add_action">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_compare" href="wishlist.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Agregar a Favoritos"><i class="ion-android-favorite-outline"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="list-slide_item">' +
                    '<div class="single_product">' +
                    '<div class="product-img">' +
                    '<a href="single-product.php?idprod=' + producto.IDPRODUCT + '">' +
                    '<img class="primary-img" src="' + imageUrl + '" style="object-fit: scale-down;" alt="Hiraola\'s Product Image">' +
                    '<img class="secondary-img" src="' + imgUrl + '" style="object-fit: scale-down;" alt="Hiraola\'s Product Image">' +
                    '</a>' +
                    '</div>' +
                    '<div class="hiraola-product_content">' +
                    '<div class="product-desc_info">' +
                    '<h6><a class="product-name" href="single-product.php?idprod=' + producto.IDPRODUCT + '">' + producto.NAME + '</a></h6>' +
                    '<div class="price-box">' +
                    '<span class="new-price">₡' + producto.PRICE + '</span>' +
                    '</div>' +
                    '<div class="product-short_desc">' +
                    '<p>' + producto.DESCRIPTION + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="add-actions">' +
                    '<ul>' +
                    '<li><a class="hiraola-add_cart" href="cart.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Añadir al carrito">Añadir al carrito</a></li>' +
                    '<li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Ver"><i class="ion-eye"></i></a></li>' +
                    '<li><a class="hiraola-add_compare" href="wishlist.php?idprod=' + producto.IDPRODUCT + '" data-bs-toggle="tooltip" data-placement="top" title="Añadir a favoritos"><i class="ion-android-favorite-outline"></i></a></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                    // Insertar el HTML del producto en el contenedor
                    contenedor.innerHTML += htmlProducto;
                });
            } 
            else {
                console.error('Error al obtener datos del catálogo. Código de estado:', xhr.status);
            }
        } 
        catch (error) {
            console.error('Error al procesar la respuesta JSON:', error);
        }
    };
    }

    xhr.send();
});