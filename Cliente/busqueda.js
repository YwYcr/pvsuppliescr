document.addEventListener('DOMContentLoaded', function () {
    // Obtener el formulario y el input de búsqueda
    var form = document.getElementById('buscarProductForm');
    var searchInput = document.getElementById('searchInput');

    // Manejar el envío del formulario
    form.addEventListener('submit', function (event) {
        // Obtener el valor del input de búsqueda
        var searchTerm = searchInput.value;

        // Redirigir a la página de catálogo con el parámetro de búsqueda
        window.location.href = '../tools/shop-left-sidebar.php?search=' + encodeURIComponent(searchTerm);

        // Evitar el envío del formulario normal
        event.preventDefault();
    });
});