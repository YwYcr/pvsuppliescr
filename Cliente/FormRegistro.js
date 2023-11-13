console.log("Hello, world!");

//JS para validar los datos del form y hacer el envio a la BD usando AJAX

document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("register-form");

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();
        var firstName = document.getElementById("name").value;
        var lastName = document.getElementById("flastname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Funciones de validaciones
        // function isValidEmail(email) {
        //     return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        // }

        // function isValidName(name) {
        //     return /^[A-Za-z]+$/.test(name);
        // }

        function isValidPassword(password) {
            // Clave 8 caracteres minimo, minimo 1 # y 1 mayuscula
            const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            return regex.test(password);
        }

        // Perform validations
        // if (!isValidName(firstName)) {
        //     alert("Nombre Invalido. Utilice solamente letras.");
        //     return;
        // }

        // if (!isValidName(lastName)) {
        //     alert("Apellido Invalido. Utilice solamente letras.");
        //     return;
        // }

        // if (!isValidEmail(email)) {
        //     alert("Formato de correo incorrecto.");
        //     return;
        // }


        if (password !== confirmPassword) {
            alert("Las claves son diferentes. Intente de nuevo");
            return;
        }

        // Validate the password
        if (!isValidPassword(password)) {
            alert("La clave debe ser al menos 8 caracteres. Debe contener al menos 1 número y una letra mayúscula.");
            return;
        }

        var data = {
            nombre: firstName,
            primerApellido: lastName,
            email: email,
            password: password
        };

        console.log("VAR DATA:", data);

        // AJAX para guardar datos
        $.ajax({
            type: "POST",
            url: "../Usuario/crearUsuario.php",
            //Usuario/crearUsuario.php
            data: data,
            success: function(response) {
                // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta
                registerForm.reset();
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }            
        });

        // alert("Registro exitoso! Revise su correo para confirmar su cuenta.");
    });
});