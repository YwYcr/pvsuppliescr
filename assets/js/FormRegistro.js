console.log("Hello, world!");

//JS para validar los datos del form y hacer el envio a la BD usando AJAX

document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("register-form");

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const firstName = document.getElementById("name").value;
        const lastName = document.getElementById("flastname").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;

        // Validation functions
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidName(name) {
            return /^[A-Za-z]+$/.test(name);
        }

        // Perform validations
        if (!isValidName(firstName)) {
            alert("Nombre Invalido. Utilice solamente letras.");
            return;
        }

        if (!isValidName(lastName)) {
            alert("Apellido Invalido. Utilice solamente letras.");
            return;
        }

        if (!isValidEmail(email)) {
            alert("Formato de correo incorrecto.");
            return;
        }

        if (password !== confirmPassword) {
            alert("Las claves son diferentes. Intente de nuevo");
            return;
        }

        var data = {
            nombre: firstName,
            primerApellido: lastName,
            email: email,
            password: password
        };

        alert("Registration successful! You can now log in.");

        console.log("DATOS:");
        console.log("Nombre:", firstName);
        console.log("Apellido:", lastName);
        console.log("Email:", email);
        console.log("Clave:", password);

        // Hash clave con bcrypt.js -- TODO
        // const saltRounds = 10;
        // bcrypt.hash(password, saltRounds, function (err, hash) {
        //     if (err) {
        //         console.error("Error hashing password");
        //         return;
        //     }

        // AJAX para guardar datos
        $.ajax({
            type: "POST",
            url: "../../FormRegistro.php",
            data: data,
            success: function(response) {
                // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                alert(response); // Puedes reemplazar esto con tu propia lógica de manejo de respuesta
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
        // });
    });
});