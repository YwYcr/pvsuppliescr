document.addEventListener('DOMContentLoaded', function () {
    // Obtener todos los enlaces con la clase 'brand-link'
    var brandLinks = document.querySelectorAll('.brand-link');

    // Manejar el clic en cada enlace
    brandLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            // Obtener el valor del atributo 'data-value' que contiene la categoría
            var brandValue = this.getAttribute('data-value');

            // Redirigir a la página de catálogo con el parámetro de búsqueda
            window.location.href = '../tools/shop-left-sidebar.php?brand=' + encodeURIComponent(brandValue);
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Obtener todos los enlaces con la clase 'category-link'
    var categoryLinks = document.querySelectorAll('.category-link');

    // Manejar el clic en cada enlace
    categoryLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            // Obtener el valor del atributo 'data-value' que contiene la categoría
            var categoryValue = this.getAttribute('data-value');

            // Redirigir a la página de catálogo con el parámetro de búsqueda
            window.location.href = '../tools/shop-left-sidebar.php?category=' + encodeURIComponent(categoryValue);
        });
    });
});

/*----- Price Slider Active --------------- */
document.addEventListener('DOMContentLoaded', function () {
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');

    // Función para obtener parámetros de la URL por nombre
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Realiza la petición AJAX para obtener los valores mínimo y máximo
    $.ajax({
        type: 'GET',
        url: '../Catalogo/getPriceRange.php',
        dataType: 'json',
        success: function (data) {
            // Inicializa el slider con los valores obtenidos
            sliderrange.slider({
                range: true,
                min: data.min,
                max: data.max + 1000,
                step: 1000,
                values: [
                    getParameterByName('minPrice') || data.min, // Usa el valor proporcionado o el mínimo predeterminado
                    getParameterByName('maxPrice') || data.max, // Usa el valor proporcionado o el máximo predeterminado
                ],
                slide: function (event, ui) {
                    amountprice.val('₡' + ui.values[0].toLocaleString() + ' - ₡' + ui.values[1].toLocaleString());
                },
            });

            amountprice.val(
                '₡' +
                sliderrange.slider('values', 0).toLocaleString() +
                ' - ₡' +
                sliderrange.slider('values', 1).toLocaleString()
            );
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });

    // Manejar el clic en el botón Filter
    $('#filterButton').on('click', function () {
        // Obtener los valores del rango de precios seleccionado
        var minPrice = sliderrange.slider('values', 0);
        var maxPrice = sliderrange.slider('values', 1);

        // Redirigir a la página de catálogo con los parámetros de búsqueda
        window.location.href = '../tools/shop-left-sidebar.php?minPrice=' + encodeURIComponent(minPrice) +
            '&maxPrice=' + encodeURIComponent(maxPrice);
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var contenedor = document.querySelector('.shop-product-wrap');
    var urlParams = new URLSearchParams(window.location.search);
    var parametroBusqueda = urlParams.get('search');
    var parametroMarca = urlParams.get('brand');
    var parametroCategoria = urlParams.get('category');
    var parametroPrecioMin = urlParams.get('minPrice');
    var parametroPrecioMax = urlParams.get('maxPrice');
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

        // Modificar la URL según los parámetros de filtro disponibles
        if (parametroBusqueda) {
            url = `../Catalogo/getCatalogoBusqueda.php?search=${encodeURIComponent(parametroBusqueda)}&page=${page}&perPage=${perPage}`;
        } else if (parametroMarca) {
            url = `../Catalogo/getProductsByBrand.php?brand=${encodeURIComponent(parametroMarca)}&page=${page}&perPage=${perPage}`;
        } else if (parametroCategoria) {
            url = `../Catalogo/getProductsByCategory.php?category=${encodeURIComponent(parametroCategoria)}&page=${page}&perPage=${perPage}`;
        } else if (parametroPrecioMin && parametroPrecioMax) {
            url = `../Catalogo/getProductsByPriceRange.php?minPrice=${encodeURIComponent(parametroPrecioMin)}&maxPrice=${encodeURIComponent(parametroPrecioMax)}&page=${page}&perPage=${perPage}`;
        } else {
            url = `../Catalogo/getCatalogo.php?page=${page}&perPage=${perPage}`;
        }

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
                // console.log(resultados);
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
