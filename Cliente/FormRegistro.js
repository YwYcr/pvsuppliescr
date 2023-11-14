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

        var recaptcha_response = document.getElementById("recaptchaResponse").value;

        function isValidPassword(password) {
            // Clave 8 caracteres minimo, minimo 1 # y 1 mayuscula
            const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            return regex.test(password);
        }


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
            password: password,
            recaptcha_response: recaptcha_response
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
                
                // Get and log the reCAPTCHA score
                if (typeof grecaptcha !== 'undefined') {
                    var recaptchaScore = grecaptcha.getResponse(); // Assuming grecaptcha.getResponse() returns the score
                    console.log("reCAPTCHA Score:", recaptchaScore);
                } else {
                    console.error("reCAPTCHA client is not available");
                }
                
                registerForm.reset();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b').then(function(token) {
                    document.getElementById("recaptchaResponse").value = token;
                    });
                });
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);               
            }            
        });

        // alert("Registro exitoso! Revise su correo para confirmar su cuenta.");
    });
});