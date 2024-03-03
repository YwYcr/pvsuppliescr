// <!-- Script para ver proveedores -->
document.getElementById('editProveedorCedJuridica').addEventListener('input', function (e) {
    // Obtén el valor actual del campo
    let inputValue = e.target.value;

    // Elimina cualquier caracter que no sea un número
    let numericValue = inputValue.replace(/\D/g, '');

    // Limita a un máximo de 10 números
    numericValue = numericValue.substring(0, 10);

    // Aplica el formato #-###-######
    let formattedValue = '';

    if (numericValue.length > 0) {
        formattedValue += numericValue.charAt(0) + '-';
    }
    if (numericValue.length > 1) {
        formattedValue += numericValue.substring(1, 4);
    }
    if (numericValue.length > 4) {
        formattedValue += '-' + numericValue.substring(4, 10);
    }

    // Actualiza el valor del campo
    e.target.value = formattedValue;
});

document.getElementById('editProveedorTelefono').addEventListener('input', function (e) {
    // Obtén el valor actual del campo
    let inputValue = e.target.value;

    // Elimina cualquier caracter que no sea un número
    let numericValue = inputValue.replace(/\D/g, '');

    // Limita a un máximo de 8 números
    numericValue = numericValue.substring(0, 8);

    // Aplica el formato ####-####
    let formattedValue = '';

    if (numericValue.length > 0) {
        formattedValue += numericValue.substring(0, 4);
    }

    if (numericValue.length > 4) {
        formattedValue += '-' + numericValue.substring(4, 8);
    }

    // Actualiza el valor del campo
    e.target.value = formattedValue;
});

document.getElementById('createProveedorCedJuridica').addEventListener('input', function (e) {
    // Obtén el valor actual del campo
    let inputValue = e.target.value;

    // Elimina cualquier caracter que no sea un número
    let numericValue = inputValue.replace(/\D/g, '');

    // Limita a un máximo de 10 números
    numericValue = numericValue.substring(0, 10);

    // Aplica el formato #-###-######
    let formattedValue = '';

    if (numericValue.length > 0) {
        formattedValue += numericValue.charAt(0) + '-';
    }
    if (numericValue.length > 1) {
        formattedValue += numericValue.substring(1, 4);
    }
    if (numericValue.length > 4) {
        formattedValue += '-' + numericValue.substring(4, 10);
    }

    // Actualiza el valor del campo
    e.target.value = formattedValue;
});

document.getElementById('createProveedorTelefono').addEventListener('input', function (e) {
    // Obtén el valor actual del campo
    let inputValue = e.target.value;

    // Elimina cualquier caracter que no sea un número
    let numericValue = inputValue.replace(/\D/g, '');

    // Limita a un máximo de 8 números
    numericValue = numericValue.substring(0, 8);

    // Aplica el formato ####-####
    let formattedValue = '';

    if (numericValue.length > 0) {
        formattedValue += numericValue.substring(0, 4);
    }

    if (numericValue.length > 4) {
        formattedValue += '-' + numericValue.substring(4, 8);
    }

    // Actualiza el valor del campo
    e.target.value = formattedValue;
});


$(document).ready(function () {
    $(document).on("click", ".btn-infoProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getProveedor.php",
            data: { proveedorID: proveedorID },
            dataType: "json",
            success: function (response) {

                $("#infoProveedorName").val(response.NAME);
                $("#infoProveedorEmail").val(response.EMAIL);
                $("#infoProveedorTelefono").val(response.PHONE);
                $("#infoProveedorPOC").val(response.POC);
                $("#infoProveedorCedJuridica").val(response.SOCIALID);
                $("#infoProveedorDireccion").val(response.ADDRESS);
                $("#infoProveedorProvincia").val(response.PROVINCE);
                $("#infoProveedorCanton").val(response.CANTON);
                $("#infoProveedorDistrito").val(response.DISTRICT);
                // $("#info").modal("show");

                // console.log("Email: " + response.EMAIL);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para agregar proveedores nuevos -->
$(document).ready(function () {
    $("#createProveedorButton").click(function () {
        var nombre = $("#createProveedorName").val();
        var email = $("#createProveedorEmail").val();
        var telefono = $("#createProveedorTelefono").val();
        var poc = $("#createProveedorPOC").val();
        var cedJuridica = $("#createProveedorCedJuridica").val();
        var direccion = $("#createProveedorDireccion").val();
        var provincia = $("#createProveedorProvincia").val();
        var canton = $("#createProveedorCanton").val();
        var distrito = $("#createProveedorDistrito").val();

        var data = {
            nombre: nombre,
            email: email,
            telefono: telefono,
            poc: poc,
            cedJuridica: cedJuridica,
            direccion : direccion,
            provincia : provincia,
            canton : canton,
            distrito : distrito
        };

        $.ajax({
            type: "POST",
            url: "crearProveedor.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                swal("Agregado!", "Se agrego el proveedor con éxito!", "success");
                fetch('refreshProveedor.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('supplierTableBody').innerHTML = data;
                    });
                } else {
                    // Mostrar error en SweetAlert
                    swal("Error", "Error al agregar el proveedor: " + response.error, "error");
                }
            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
    });
});




// <!-- Script para traer 1 proveedor a modificar  -->

$(document).ready(function () {
    $(document).on("click", ".btn-editarProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getProveedor.php",
            data: { proveedorID: proveedorID },
            dataType: "json",
            success: function (response) {
                $("#editProveedorID").val(response.IDSUPPLIER);
                $("#editProveedorEmail").val(response.EMAIL);
                $("#editProveedorName").val(response.NAME);
                $("#editProveedorTelefono").val(response.PHONE);
                $("#editProveedorPOC").val(response.POC);
                $("#editProveedorCedJuridica").val(response.SOCIALID);
                $("#editProveedorDireccion").val(response.ADDRESS);
                $("#editProveedorProvincia").val(response.PROVINCE);
                //  $("#editProveedorCanton").val(response.CANTON);
                $("#editProveedorCanton").append('<option value="' + response.CANTON + '" disabled selected>' + response.CANTON + '</option>');
                // $("#editProveedorDistrito").val(response.DISTRICT);
                $("#editProveedorDistrito").append('<option value="' + response.DISTRICT + '" disabled selected>' + response.DISTRICT + '</option>');

                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDSUPPLIER);

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para actualizar proveedor  -->
$(document).ready(function () {
    $(document).on("click", ".btn-actualizarProveedor", function () {
        var proveedorID = $("#editProveedorID").val();
        var email = $("#editProveedorEmail").val();
        var nombre = $("#editProveedorName").val();
        var telefono = $("#editProveedorTelefono").val();
        var poc = $("#editProveedorPOC").val();
        var cedJuridica = $("#editProveedorCedJuridica").val();
        var direccion = $("#editProveedorDireccion").val();
        var provincia = $("#editProveedorProvincia").val();
        var canton = $("#editProveedorCanton").val();
        var distrito = $("#editProveedorDistrito").val();

        var data = {
            proveedorID: proveedorID,
            email: email,
            nombre: nombre,
            telefono: telefono,
            poc: poc,
            cedJuridica: cedJuridica,
            direccion : direccion,
            provincia : provincia,
            canton : canton,
            distrito : distrito
        };


        $.ajax({
            type: "POST",
            url: "updateProveedor.php",
            data: data,
            success: function (response) {
                swal("Modificado!", "Se modificó el proveedor con éxito!", "success");
                // alert('Proveedor modificado con éxito');
                fetch('refreshProveedor.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('supplierTableBody').innerHTML = data;
                    });

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para borrar provveedor -->
$(document).ready(function () {
    $(document).on("click", ".btn-borrarProveedor", function () {
        var proveedorID = $(this).data("bs-id");

        swal({
            title: "Seguro que quieres eliminarlo?",
            text: "Una vez eliminado no podrás volver a recuperar este proveedor!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Usuario hizo clic en "Sí"
                $.ajax({
                    type: "POST",
                    url: "borrarProveedor.php",
                    data: { proveedorID: proveedorID },
                    dataType: 'json', // Asegura que el resultado se interprete como JSON
                    success: function (response) {
                        if (response.success) {
                            swal("Eliminado!", "Proveedor eliminado con éxito", "success");
                            // Lógica después de recargar la lista
                            fetch('refreshProveedor.php')
                                .then(response => response.text())
                                .then(data => {
                                    document.getElementById('supplierTableBody').innerHTML = data;
                                    console.log("Proveedor eliminado: " + proveedorID);
                                })
                                .catch(error => console.error(error));
                        } else {
                            // Mostrar error en SweetAlert
                            swal("Error", "Error al eliminar el proveedor: " + response.error, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Mostrar error en SweetAlert
                        swal("Error", "Error al eliminar el proveedor", "error");
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


// <!-- Buscar Proveedores -->

function searchSupplier() {
    var searchTerm = $('#searchSupplierInput').val();

    // Realizar la petición AJAX
    $.ajax({
        url: 'buscar_proveedores.php', // Ajusta la URL al archivo PHP que maneja la búsqueda
        method: 'GET',
        data: { searchTerm: searchTerm },
        dataType: 'json',
        success: function (data) {
            // Actualizar la tabla con los resultados
            updateTable(data);
        },
        error: function (xhr, status, error) {
            console.error('Error en la petición AJAX:', error);
            // Puedes mostrar un mensaje al usuario indicando el error
        }
    });
}

function updateTable(data) {
    // Limpiar la tabla Proveedores
    $('#supplierTableBody').empty();

    if (data.length === 0) {
        // Mostrar mensaje de que no se encontraron Proveedores
        $('#supplierTableBody').append('<tr><td colspan="6">No se encontraron proveedores.</td></tr>');
    } else {
        // Llenar la tabla con los nuevos resultados Proveedores
        $.each(data, function (index, suppliers) {
            var row = '<tr>' +
                '<td>' + suppliers.IDSUPPLIER + '</td>' +
                '<td>' + suppliers.NAME + '</td>' +
                '<td>' + suppliers.SOCIALID + '</td>' +
                '<td>' + suppliers.PHONE + '</td>' +
                '<td>' + suppliers.POC + '</td>' +
                '<td>' + suppliers.EMAIL + '</td>' +
                '<td>' + suppliers.ADDRESS + '</td>' + // Corrección aquí
                '<td>' +
                '<button type="button" class="btn btn-info btn-infoProveedor mb-2" data-bs-toggle="modal" data-bs-target="#infoProveedor" data-bs-id="' + suppliers.IDSUPPLIER + '"><i class="fa fa-info-circle"></i><span>Ver</span></button>' +
                '<button type="button" class="btn btn-editar btn-editarProveedor btn-warning mb-2" data-bs-toggle="modal" data-bs-id="' + suppliers.IDSUPPLIER + '" data-bs-target="#editProveedor"><i class="fa fa-pencil"></i><span>Editar</span></button>' +
                '<button type="button" class="btn btn-borrar btn-borrarProveedor btn-danger mb-2 js-sweetalert" data-type="confirm" data-bs-id="' + suppliers.IDSUPPLIER + '"><i class="fa fa-trash-o"></i><span>Eliminar</span></button>' +
                '</td>' +
                '</tr>';

            $('#supplierTableBody').append(row);
        });
    }
}

// Define un objeto con las opciones de distrito y cantón para cada provincia
var datosPorProvincia = {
    "San José": {
        "San José": ["Carmen", "Merced", "Hospital", "Catedral", "Zapote", "San Francisco de Dos Ríos", "Uruca", "Mata Redonda", "Pavas", "Hatillo", "San Sebastián"],
        "Escazú": ["Escazú", "San Antonio", "San Rafael"],
        "Desamparados": ["Desamparados", "San Miguel", "San Juan de Dios", "San Rafael Arriba", "San Antonio", "Frailes", "Patarrá", "San Cristobal", "Rosario", "Damas", "San Rafael Abajo", "Gravilias", "Los Guido"],
        "Puriscal": ["Santiago", "Mercedes Sur", "Barbacoas", "Grifo Alto", "San Rafael", "Candelarita", "Desamparaditos", "San Antonio", "Chires"],
        "Tarrazú": ["San Marcos", "San Lorenzo", "San Carlos"],
        "Aserrí": ["Aserrí", "Tarbaca", "Vuelta de Jorco", "San Gabriel", "Legua", "Monterrey", "Salitrillos"],
        "Mora": ["Colón", "Guayabo", "Tabarcia", "Piedras Negras", "Picagres", "Jaris", "Quitirrisí"],
        "Goicoechea": ["Guadalupe", "San Francisco", "Calle Blancos", "Mata de Plátano", "Ipís", "Rancho Redondo", "Purral"],
        "Santa Ana": ["Santa Ana", "Salitral", "Pozos", "Uruca", "Piedades", "Brasil"],
        "Alajuelita": ["Alajuelita", "San Josecito", "San Antonio", "Concepción", "San Felipe"],
        "Vázquez de Coronado": ["San Isidro", "San Rafael", "Dulce Nombre de Jesús", "Patalillo", "Cascajal"],
        "Acosta": ["San Ignacio", "Guaitil", "Palmichal", "Cangrejal", "Sabanillas"]
    },
    "Alajuela": {
        "Alajuela": ["Alajuela", "San José", "Carrizal", "San Antonio", "Guácima", "San Isidro", "Sabanilla", "San Rafael", "Río Segundo", "Desamparados", "Turrúcares", "Tambor", "Garita", "Sarapiquí"],
        "San Ramón": ["San Ramón", "Santiago", "San Juan", "Piedades Norte", "Piedades Sur", "San Rafael", "San Isidro", "Ángeles", "Alfaro", "Volio", "Concepción", "Zapotal", "Peñas Blancas", "San Lorenzo"],
        "Grecia": ["Grecia", "San Isidro", "San José", "San Roque", "Tacares", "Puente de Piedra", "Bolivar"],
        "San Mateo": ["San Mateo", "Desmonte", "Jesús María", "Labrador"],
        "Atenas": ["Atenas", "Jesús", "Mercedes", "San Isidro", "Concepción", "San José", "Santa Eulalia", "Escobal"],
        "Naranjo": ["Naranjo", "San Miguel", "San José", "Cirrí Sur", "San Jerónimo", "San Juan", "El Rosario", "Palmitos"],
        "Palmares": ["Palmares", "Zaragoza", "Buenos Aires", "Santiago", "Candelaria", "Esquipulas", "La Granja"],
        "Poás": ["San Pedro", "San Juan", "San Rafael", "Carrillos", "Sabana Redonda"],
        "Orotina": ["Orotina", "El Mastate", "Hacienda Vieja", "Coyolar", "La Ceiba"]
    },
    "Heredia": {
        "Heredia": ["Heredia", "Mercedes", "San Francisco", "Ulloa", "Varablanca"],
        "Barva": ["Barva", "San Pedro", "San Pablo", "San Roque", "Santa Lucía", "San José de la Montaña", "Puente Salas"],
        "Santo Domingo": ["Santo Domingo", "San Vicente", "San Miguel", "Paracito", "Santo Tomás", "Santa Rosa", "Tures", "Pará"],
        "Santa Bárbara": ["Santa Bárbara", "San Pedro", "San Juan", "Jesús", "Santo Domingo", "Purabá"],
        "San Rafael": ["San Rafael", "San Josecito", "Santiago", "Ángeles", "Concepción"],
        "San Isidro": ["San Isidro", "San José", "Concepción", "San Francisco"],
        "Belén": ["San Antonio", "La Ribera", "La Asunción"],
        "Flores": ["San Joaquín", "Barrantes", "Llorente"],
        "San Pablo": ["San Pablo", "Rincón de Sabanilla"],
        "Sarapiquí": ["Puerto Viejo", "La Virgen", "Las Horquetas", "Llanuras del Gaspar", "Cureña"]
    },
    "Guanacaste": {
        "Liberia": ["Liberia", "Cañas Dulces", "Mayorga", "Nacascolo", "Curubandé"],
        "Nicoya": ["Nicoya", "Mansión", "San Antonio", "Quebrada Honda", "Sámara", "Nosara", "Belén de Nosarita"],
        "Santa Cruz": ["Santa Cruz", "Bolsón", "Veintisiete de Abril", "Tempate", "Cartagena", "Cuajiniquil", "Diriá", "Cabo Velas", "Tamarindo"],
        "Bagaces": ["Bagaces", "La Fortuna", "Mogote", "Río Naranjo"],
        "Carrillo": ["Filadelfia", "Palmira", "Sardinal", "Belén"],
        "Cañas": ["Cañas", "Palmira", "San Miguel", "Bebedero", "Porozal"],
        "Abangares": ["Las Juntas", "Sierra", "San Juan", "Colorado"],
        "Tilarán": ["Tilarán", "Quebrada Grande", "Tronadora", "Santa Rosa", "Líbano", "Tierras Morenas", "Arenal", "Cabeceras"],
        "Nandayure": ["Carmona", "Santa Rita", "Zapotal", "San Pablo", "Porvenir", "Bejuco"],
        "La Cruz": ["La Cruz", "Santa Cecilia", "La Garita", "Santa Elena"],
        "Hojancha": ["Hojancha", "Monte Romo", "Puerto Carrillo", "Huacas", "Matambú"]
    },
    "Puntarenas": {
        "Puntarenas": ["Puntarenas", "Pitahaya", "Chomes", "Lepanto", "Paquera", "Manzanillo", "Guacimal", "Barranca", "Isla del Coco", "Cóbano"],
        "Esparza": ["Espíritu Santo", "San Juan Grande", "Macacona", "San Rafael", "San Jerónimo", "Caldera"],
        "Buenos Aires": ["Buenos Aires", "Volcán", "Potrero Grande", "Boruca", "Pilas", "Colinas", "Chánguena", "Biolley", "Brunka"],
        "Montes de Oro": ["Miramar", "La Unión", "San Isidro", "San José"],
        "Osa": ["Puerto Cortés", "Palmar", "Sierpe", "Bahía Ballena", "Piedras Blancas", "Bahía Drake"],
        "Quepos": ["Quepos", "Savegre", "Naranjito"],
        "Golfito": ["Golfito", "Guaycará", "Pavón"],
        "Coto Brus": ["San Vito", "Sabalito", "Aguabuena", "Limoncito", "Pittier"],
        "Parrita": ["Parrita"],
        "Corredores": ["Corredor", "La Cuesta", "Canoas", "Laurel"],
        "Garabito": ["Jacó", "Tárcoles", "Lagunillas"],
        "Monteverde": ["Monteverde"],
        "Puerto Jiménez": ["Puerto Jiménez"]
    },
    "Limón": {
        "Limón": ["Limón", "Valle La Estrella", "Río Blanco", "Matama"],
        "Pococí": ["Guápiles", "Jiménez", "Rita", "Roxana", "Cariari", "Colorado", "La Colonia"],
        "Siquirres": ["Siquirres", "Pacuarito", "Florida", "Germania", "El Cairo", "Alegría", "Reventazón"],
        "Talamanca": ["Bratsi", "Sixaola", "Cahuita", "Telire"],
        "Matina": ["Matina", "Batán", "Carrandí"],
        "Guácimo": ["Guácimo", "Mercedes", "Pocora", "Río Jiménez"]
    },
    "Cartago": {
        "Cartago": ["Oriental", "Occidental", "Carmen", "San Nicolás", "Agua Caliente", "Guadalupe", "Corralillo", "Tierra Blanca", "Dulce Nombre", "Llano Grande", "Quebradilla"],
        "Paraíso": ["Paraíso", "Santiago", "Orosi", "Cachí"],
        "La Unión": ["Tres Ríos", "San Diego", "San Juan", "San Rafael", "Concepción", "Dulce Nombre", "San Ramón", "Río Azul"],
        "Jiménez": ["Juan Viñas", "Tucurrique", "Pejibaye"],
        "Turrialba": ["Turrialba", "La Suiza", "Peralta", "Santa Cruz", "Santa Teresita", "Pavones", "Tuis", "Tayutic", "Santa Rosa", "Tres Equis", "La Isabel", "Chirripó"],
        "Alvarado": ["Pacayas", "Cervantes", "Capellades"],
        "Oreamuno": ["San Rafael", "Cot", "Potrero Cerrado", "Cipreses", "Santa Rosa"]
    }
};

// Cargar opciones para los dropdowns de las direcciones
$(document).ready(function () {
    // Al cambiar la provincia, actualiza las opciones del cantón y distrito
    $("#editProveedorProvincia").change(function () {
        var provinciaSeleccionada = $(this).val();
        var datos = datosPorProvincia[provinciaSeleccionada] || {};

        // Vacía los dropdowns de cantón y distrito
        $("#editProveedorCanton, #editProveedorDistrito").empty();
        $("#editProveedorCanton").append('<option value="" disabled selected>Selecciona un cantón</option>');
        // Agrega las nuevas opciones al dropdown de cantón
        $.each(datos, function (canton, distritos) {
           
            $("#editProveedorCanton").append('<option value="' + canton + '">' + canton + '</option>');
        });
    });

    // Al cambiar el cantón, actualiza las opciones del distrito
    $("#editProveedorCanton").change(function () {
        var provinciaSeleccionada = $("#editProveedorProvincia").val();
        var cantonSeleccionado = $(this).val();
        var distritos = datosPorProvincia[provinciaSeleccionada][cantonSeleccionado] || [];

        // Vacía el dropdown de distritos y agrega las nuevas opciones
        $("#editProveedorDistrito").empty();
        $("#editProveedorDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
        $.each(distritos, function (index, value) {
            $("#editProveedorDistrito").append('<option value="' + value + '">' + value + '</option>');
        });
    });
});

// Cargar opciones para los dropdowns de las direcciones
$(document).ready(function () {
    // Al cambiar la provincia, actualiza las opciones del cantón y distrito
    $("#createProveedorProvincia").change(function () {
        var provinciaSeleccionada = $(this).val();
        var datos = datosPorProvincia[provinciaSeleccionada] || {};

        // Vacía los dropdowns de cantón y distrito
        $("#createProveedorCanton, #createProveedorDistrito").empty();
        $("#createProveedorCanton").append('<option value="" disabled selected>Selecciona un cantón</option>');
        // Agrega las nuevas opciones al dropdown de cantón
        $.each(datos, function (canton, distritos) {
           
            $("#createProveedorCanton").append('<option value="' + canton + '">' + canton + '</option>');
        });
    });

    // Al cambiar el cantón, actualiza las opciones del distrito
    $("#createProveedorCanton").change(function () {
        var provinciaSeleccionada = $("#createProveedorProvincia").val();
        var cantonSeleccionado = $(this).val();
        var distritos = datosPorProvincia[provinciaSeleccionada][cantonSeleccionado] || [];

        // Vacía el dropdown de distritos y agrega las nuevas opciones
        $("#createProveedorDistrito").empty();
        $("#createProveedorDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
        $.each(distritos, function (index, value) {
            $("#createProveedorDistrito").append('<option value="' + value + '">' + value + '</option>');
        });
    });
});
