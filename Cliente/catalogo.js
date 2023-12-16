document.addEventListener('DOMContentLoaded', function () {
    var contenedor = document.querySelector('.shop-product-wrap');
    var urlParams = new URLSearchParams(window.location.search);
    var parametroBusqueda = urlParams.get('search');
    var url;
    var page = 1; // Número de página inicial
    var perPage = 9; // Número de productos por página
    var loading = false; // Bandera para evitar solicitudes duplicadas
    var primerCarga = true; // Variable para controlar la primera carga

    function cargarProductos() {
        if (loading) {
            return;
        }

        loading = true;

        url = (!parametroBusqueda)
            ? `../Catalogo/getCatalogo.php?page=${page}&perPage=${perPage}`
            : `../Catalogo/getCatalogoBusqueda.php?search=${encodeURIComponent(parametroBusqueda)}&page=${page}&perPage=${perPage}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener datos del catálogo. Código de estado: ' + response.status);
                }
                return response.json();
            })
            .then(resultados => {
                if (resultados.length > 0) {
                    resultados.forEach(producto => {
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

                        contenedor.innerHTML += htmlProducto;
                        primerCarga = false; // Desactivar para futuras cargas
                    });
                } else {
                    // No hay más productos, puedes desactivar el evento scroll aquí si es necesario
                    window.removeEventListener('scroll', cargarMasProductosEnScroll);

                    if (primerCarga) {
                        // Mostrar mensaje solo en la primera carga cuando no hay productos
                        var htmlNoProductos = '<div class="col-lg-4">' +
                            '<div class="slide-item">' +
                            '<div class="single_product">' +
                            '<div class="product-img">' +
                            '<div class="hiraola-product_content">' +
                            '<div class="product-desc_info">' +
                            '<h6 style="padding-top: 1rem;">No hay productos que mostrar</h6>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="list-slide_item">' +
                            '<div class="single_product">' +
                            '<div class="hiraola-product_content">' +
                            '<div class="product-desc_info">' +
                            '<h6>No hay productos que mostrar</h6>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        contenedor.innerHTML += htmlNoProductos;
                        primerCarga = false; // Desactivar para futuras cargas
                    }
                }
            })
            .catch(error => {
                console.error('Error al procesar la respuesta JSON:', error);
            })
            .finally(() => {
                loading = false;
            });

        page++; // Incrementar el número de página para la próxima carga
    }

    function cargarMasProductosEnScroll() {
        if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 1000) {
            // Cuando el usuario se acerca al final de la página
            cargarProductos();
        }
    }

    // Cargar los primeros productos al inicio
    cargarProductos();

    // Agregar evento de scroll para cargar más productos
    window.addEventListener('scroll', cargarMasProductosEnScroll);
});
