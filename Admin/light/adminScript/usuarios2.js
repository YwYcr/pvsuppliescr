$(document).ready(function () {
    // Tu código AJAX para cargar el contenido de la pestaña
    reloadUserList();
});

$('#createUser').on('shown.bs.modal', function (e) {
    $(this).one('hidden.bs.modal', function (e) {
        // Limpia el formulario
        $('#createUserForm')[0].reset();

        // Desactiva los estilos de validación
        $('#createUser').find('.was-validated').removeClass('was-validated');
        $('#createUser').find('.is-valid').removeClass('is-valid');
        $('#createUser').find('.is-invalid').removeClass('is-invalid');

    });
});

$('#editUser').on('shown.bs.modal', function (e) {
    $(this).one('hidden.bs.modal', function (e) {
        // Limpia el formulario
        $('#editUserForm')[0].reset();
        // Desactiva los estilos de validación
        $('#editUser').find('.was-validated').removeClass('was-validated');
        $('#editUser').find('.is-valid').removeClass('is-valid');
        $('#editUser').find('.is-invalid').removeClass('is-invalid');
    });
});

$('#editPass').on('shown.bs.modal', function (e) {
    $(this).one('hidden.bs.modal', function (e) {
        // Limpia el formulario
        $('#editPassUserForm')[0].reset();

        // Desactiva los estilos de validación
        $('#editPass').find('.was-validated').removeClass('was-validated');
        $('#editPass').find('.is-valid').removeClass('is-valid');
        $('#editPass').find('.is-invalid').removeClass('is-invalid');

    });
});

document.getElementById('editUserPhone').addEventListener('input', function (e) {
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

document.getElementById('createUserPhone').addEventListener('input', function (e) {
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


// <!-- Script para ver usuarios -->
// <!-- Script para ver usuarios -->

$(document).ready(function () {
    $(document).on("click", ".btn-infoUsuarios", function () {
        var userID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getUsuario.php",
            data: { userID: userID },
            dataType: "json",
            success: function (response) {

                $("#infoUserEmail").val(response.EMAIL);
                $("#infoUserName").val(response.NAME);
                $("#infoUserFLASTNAME").val(response.FLASTNAME);
                $("#infoUserSLASTNAME").val(response.SLASTNAME);
                $("#infoUserPassword").val(response.PASSWORD);
                $("#infoUserPhone").val(response.PHONE);
                $("#infoUserAddress").val(response.ADDRESS);
                $("#infoUserProvincia").val(response.PROVINCE);
                $("#infoUserCanton").val(response.CANTON);
                $("#infoUserDistrito").val(response.DISTRICT);
                $("#infoUserCreation").val(response.CREATEDATE);
                $("#infoUserSuscrito").val(response.SUSCRIPTION === 1 ? 'Sí' : 'No');
                $("#infoUserRol").val(response.IDROL === 1 ? 'Administrador' : 'Cliente');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para agregar usuarios nuevos -->

$(document).ready(function () {
    // Continuar con la lógica de AJAX cuando se hace clic en el botón de agregar
    $("#crearUsuarioButton").click(function (event) {
        var form = document.getElementById("createUserForm");

        // Verificar la validez del formulario utilizando Bootstrap
        if (form.checkValidity() === false) {
            // Si el formulario no es válido, mostrar mensajes de validación
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Continuar con la lógica de AJAX si el formulario es válido
        var email = $("#createUserEmail").val();
        var nombre = $("#createUserName").val();
        var primerApellido = $("#createUserFLASTNAME").val();
        var segundoApellido = $("#createUserSLASTNAME").val();
        var password = $("#createUserPassword").val();
        var phone = $("#createUserPhone").val();
        var address = $("#createUserAddress").val();
        var province = $("#createUserProvincia").val();
        var canton = $("#createUserCanton").val();
        var district = $("#createUserDistrito").val();
        var suscription = $("#createUserSuscrito").val();
        var rol = $("#createUserRol").val();

        var data = {
            email: email,
            nombre: nombre,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            password: password,
            phone: phone,
            address: address,
            province: province,
            canton: canton,
            district: district,
            suscription: suscription,
            rol: rol
        };

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "crearUsuario.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Lógica de éxito
                    swal("Agregado!", "Se agregó el usuario con éxito!", "success");
                    $('#createUser').modal('hide');
                    reloadUserList();
                } else {
                    if (response.error.includes("El correo Electronico ya se encuentra asociado a un usuario")) {
                        swal("Error", "Error al crear el Usuario: " + response.error, "error");
                        $('#createUserEmail').addClass('is-invalid');
                    } else {
                        $('#createUserEmail').removeClass('is-invalid');
                        swal("Error", "Error al crear el Usuario: " + response.error, "error");
                        $('#createUserForm').addClass('was-validated');
                    }
                }
            },
            error: function (xhr, status, error) {
                // Mostrar error en SweetAlert
                swal("Error", "Error al crear el Usuario: " + error, "error");
                console.error(error);
            }
        });
    });
});


// <!-- Script para traer 1 usuario a modificar  -->
$(document).ready(function () {
    $(document).on("click", ".btn-editarUser", function () {
        var userID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getUsuario.php",
            data: { userID: userID },
            dataType: "json",
            success: function (response) {
                $("#editUserID").val(response.IDUSER);
                $("#editUserEmail").val(response.EMAIL);
                $("#editUserName").val(response.NAME);
                $("#editUserFLASTNAME").val(response.FLASTNAME);
                $("#editUserSLASTNAME").val(response.SLASTNAME);
                $("#editUserPhone").val(response.PHONE);
                $("#editUserAddress").val(response.ADDRESS);
                $("#editUserProvincia").val(response.PROVINCE);

                // Almacena los valores actuales en atributos de datos
                $("#editUserCanton").data("current-value", response.CANTON);
                $("#editUserDistrito").data("current-value", response.DISTRICT);

                // Limpia y carga las opciones de cantón y distrito
                loadCantonOptions(response.PROVINCE, response.CANTON);
                loadDistritoOptions(response.PROVINCE, response.CANTON, response.DISTRICT);

                $("#editUserCreation").val(response.CREATEDATE);
                $("#editUserSuscrito").val(response.SUSCRIPTION);
                $("#editUserRol").val(response.IDROL);

                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDUSER);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Función para cargar opciones de cantón
    function loadCantonOptions(province, currentCanton) {
        $("#editUserCanton").empty().append('<option value="" disabled selected>Selecciona un cantón</option>');
        var datos = datosPorProvincia[province] || {};

        $.each(datos, function (canton, distritos) {
            if (currentCanton === canton) {
                $("#editUserCanton").append('<option value="' + canton + '" selected>' + canton + '</option>');
            } else {
                $("#editUserCanton").append('<option value="' + canton + '">' + canton + '</option>');
            }
        });
    }

    // Función para cargar opciones de distrito
    function loadDistritoOptions(province, canton, currentDistrito) {
        $("#editUserDistrito").empty().append('<option value="" disabled selected>Selecciona un distrito</option>');
        var distritos = datosPorProvincia[province][canton] || [];

        $.each(distritos, function (index, value) {
            $("#editUserDistrito").append('<option value="' + value + '">' + value + '</option>');
        });

        // Selecciona automáticamente la opción actual del usuario
        $("#editUserDistrito").val(currentDistrito);
    }
});


// <!-- Script para traer 1 usuario a modificar  -->
$(document).ready(function () {
    $(document).on("click", ".btn-upPassUser", function () {
        var userID = $(this).data("bs-id");

        $.ajax({
            type: "GET",
            url: "getUsuario.php",
            data: { userID: userID },
            dataType: "json",
            success: function (response) {
                $("#editPassUserID").val(response.IDUSER)
                $("#editPassUserEmail").val(response.EMAIL);
                $("#editPassUserName").val(response.NAME);
                $("#editPassUserFLASTNAME").val(response.FLASTNAME);
                $("#editPassUserSLASTNAME").val(response.SLASTNAME);

                console.log("Email: " + response.EMAIL);
                console.log("ID a modificar: " + response.IDUSER);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});


// <!-- Script para actualizar usuarios  -->
$(document).ready(function () {

    // Continuar con la lógica de AJAX cuando se hace clic en el botón de agregar
    $("#editUsuarioButton").click(function (event) {
        var form = document.getElementById("editUserForm");

        // Verificar la validez del formulario utilizando Bootstrap
        if (form.checkValidity() === false) {
            // Si el formulario no es válido, mostrar mensajes de validación
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        var userID = $("#editUserID").val();
        var email = $("#editUserEmail").val();
        var nombre = $("#editUserName").val();
        var primerApellido = $("#editUserFLASTNAME").val();
        var segundoApellido = $("#editUserSLASTNAME").val();
        var phone = $("#editUserPhone").val();
        var address = $("#editUserAddress").val();
        var province = $("#editUserProvincia").val();
        var canton = $("#editUserCanton").val();
        var district = $("#editUserDistrito").val();
        var suscription = $("#editUserSuscrito").val();
        var rol = $("#editUserRol").val();

        var data = {
            userID: userID,
            email: email,
            nombre: nombre,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            phone: phone,
            address: address,
            province: province,
            canton: canton,
            district: district,
            suscription: suscription,
            rol: rol
        };

        console.log(data);

        $.ajax({
            type: "POST",
            url: "updateUsuario.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Lógica de éxito
                    swal("Modificado!", "Usuario modificado con éxito!", "success");
                    $('#editUser').modal('hide');
                    reloadUserList();
                } else {
                    if (response.error.includes("El correo Electronico ya se encuentra asociado a un usuario")) {
                        swal("Error", "Error al modificar el Usuario: " + response.error, "error");
                        $('#editUserEmail').addClass('is-invalid');
                    } else {
                        $('#editUserEmail').removeClass('is-invalid');
                        swal("Error", "Error al modificar el Usuario: " + response.error, "error");
                        $('#editUserForm').addClass('was-validated');
                    }
                }
            },
            error: function (xhr, status, error) {
                // Mostrar error en SweetAlert
                swal("Error", "Error al modificar el Usuario", "error");
                console.error(error);
            }
        });
    });
});

// <!-- Script para actualizar la contraseña del usuarios  -->
$(document).ready(function () {

    // Continuar con la lógica de AJAX cuando se hace clic en el botón de agregar
    $("#editPassUsuarioButton").click(function (event) {
        var form = document.getElementById("editPassUserForm");

        // Verificar la validez del formulario utilizando Bootstrap
        if (form.checkValidity() === false) {
            // Si el formulario no es válido, mostrar mensajes de validación
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        var userID = $("#editPassUserID").val();
        var password = $("#editPassUserPassword").val();

        var data = {
            userID: userID,
            password: password
        };

        $.ajax({
            type: "POST",
            url: "updatePassUsuario.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    swal("Modificado!", "La contraseña del usuario se modificó con éxito!", "success");
                    $('#editPass').modal('hide');
                } else {
                    swal("Error", "Error al modificar la contraseña del Usuario: " + response.error, "error");
                    $('#editPass').modal('hide');
                }
            },
            error: function (xhr, status, error) {
                swal("Error", "Error en la solicitud AJAX: " + error, "error");
                // Puedes agregar más detalles del error si es necesario
            }
        });
    });
});


$(document).ready(function () {
    $(document).on("click", ".btn-borrarUser", function () {
        var userID = $(this).data("bs-id");

        swal({
            title: "Seguro que quieres Eliminar/Desactivar el usuario?",
            text: "Una vez eliminado no podrás volver a recuperar este usuario!, si se desactiva se podrá volver a activar cuando se desee.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Usuario hizo clic en "Sí"
                $.ajax({
                    type: "POST",
                    url: "borrarUsuario.php",
                    data: { userID: userID },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            var actionType = response.result.includes('ELIMINADO') ? 'Eliminado' : 'Desactivado';
                            swal(actionType + "!", "Usuario " + actionType.toLowerCase() + " con éxito", "success");
                            reloadUserList();
                        } else {
                            // Mostrar error en SweetAlert
                            swal("Error", "Error al eliminar/desactivar el usuario: " + response.error, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Mostrar error en SweetAlert
                        swal("Error", "Error al eliminar/desactivar el usuario: " + error, "error");
                        console.error(error);
                    }
                });
            } else {
                // Usuario hizo clic en "Cancelar" o fuera del cuadro de diálogo
                swal("Eliminar/Desactivar cancelado");
            }
        });
    });
});


    $(document).ready(function () {
        $(document).on("click", ".btn-ActiveUser", function () {
            var userID = $(this).data("bs-id");

            swal({
                title: "Seguro que quieres Activar el usuario?",
                text: "Puedes desactivarlo nuevamente cuando se desee.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // Usuario hizo clic en "Sí"
                    $.ajax({
                        type: "POST",
                        url: "activarUsuario.php",
                        data: { userID: userID },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                swal("Activado!", "Usuario se activó con éxito!", "success");
                                reloadUserList();
                            } else {
                                // Mostrar error en SweetAlert
                                swal("Error", "Error al activar el usuario: " + response.error, "error");
                            }
                        },
                        error: function (xhr, status, error) {
                            // Mostrar error en SweetAlert
                            swal("Error", "Error al activar el usuario: " + error, "error");
                            console.error(error);
                        }
                    });
                } else {
                    // Usuario hizo clic en "Cancelar" o fuera del cuadro de diálogo
                    swal("Activación cancelada");
                }
            });
        });
    });

    // Define la función para recargar la lista de usuarios
function reloadUserList() {
    $.ajax({
        url: 'refreshUsuario.php',
        type: 'GET',
        success: function (data) {
            $('.body').html(data);
        },
        error: function (xhr, status, error) {
            swal("Error", "Error al recargar la lista de usuarios: " + error, "error");
            console.error(error);
        }
    });
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
        $("#editUserProvincia").change(function () {
            var provinciaSeleccionada = $(this).val();
            var datos = datosPorProvincia[provinciaSeleccionada] || {};

            // Vacía los dropdowns de cantón y distrito
            $("#editUserCanton, #editUserDistrito").empty();
            $("#editUserCanton").append('<option value="" disabled selected>Selecciona un cantón</option>');
            $("#editUserDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
            // Agrega las nuevas opciones al dropdown de cantón
            $.each(datos, function (canton, distritos) {

                $("#editUserCanton").append('<option value="' + canton + '">' + canton + '</option>');
            });
        });

        // Al cambiar el cantón, actualiza las opciones del distrito
        $("#editUserCanton").change(function () {
            var provinciaSeleccionada = $("#editUserProvincia").val();
            var cantonSeleccionado = $(this).val();
            var distritos = datosPorProvincia[provinciaSeleccionada][cantonSeleccionado] || [];

            // Vacía el dropdown de distritos y agrega las nuevas opciones
            $("#editUserDistrito").empty();
            $("#editUserDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
            $.each(distritos, function (index, value) {
                $("#editUserDistrito").append('<option value="' + value + '">' + value + '</option>');
            });
        });
    });

    // Cargar opciones para los dropdowns de las direcciones
    $(document).ready(function () {
        // Al cambiar la provincia, actualiza las opciones del cantón y distrito
        $("#createUserProvincia").change(function () {
            var provinciaSeleccionada = $(this).val();
            var datos = datosPorProvincia[provinciaSeleccionada] || {};

            // Vacía los dropdowns de cantón y distrito
            $("#createUserCanton, #createUserDistrito").empty();
            $("#createUserCanton").append('<option value="" disabled selected>Selecciona un cantón</option>');
            $("#createUserDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
            // Agrega las nuevas opciones al dropdown de cantón
            $.each(datos, function (canton, distritos) {

                $("#createUserCanton").append('<option value="' + canton + '">' + canton + '</option>');
            });
        });

        // Al cambiar el cantón, actualiza las opciones del distrito
        $("#createUserCanton").change(function () {
            var provinciaSeleccionada = $("#createUserProvincia").val();
            var cantonSeleccionado = $(this).val();
            var distritos = datosPorProvincia[provinciaSeleccionada][cantonSeleccionado] || [];

            // Vacía el dropdown de distritos y agrega las nuevas opciones
            $("#createUserDistrito").empty();
            $("#createUserDistrito").append('<option value="" disabled selected>Selecciona un distrito</option>');
            $.each(distritos, function (index, value) {
                $("#createUserDistrito").append('<option value="' + value + '">' + value + '</option>');
            });
        });
    });
