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