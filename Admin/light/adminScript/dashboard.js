// Fetch para obtener datos desde el servidor
fetch('../light/admindashboard/CharCategoriaProducto.php')  // Utiliza la barra inclinada en lugar de la barra invertida
    .then(response => response.json())
    .then(data => {
        // Preparar los datos para C3.js
        console.log(data);
        var columns = [];
        var names = {};

        data.forEach(category => {
            columns.push([category.CATEGORYNAME, category.CANTIDAD_PRODUCTOS]);
            names[category.CATEGORYNAME] = category.CATEGORYNAME;
        });

        // Configurar el gráfico C3.js
        // Configurar el gráfico C3.js
var chart = c3.generate({
    bindto: '#Order_status',
    data: {
        columns: columns,
        type: 'donut',
        colors: {
            // Colores personalizados si es necesario
        },
        names: names
    },
    axis: {},
    legend: {
        show: true,
        position: 'right', // Puedes cambiar esto a 'inset', 'top', 'bottom', etc.
    },
    padding: {
        bottom: 20,
        top: 0
    },
});

    })
    .catch(error => console.error('Error al obtener datos:', error));
