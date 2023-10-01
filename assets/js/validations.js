console.log("Hello, world!");

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

        // Hash clave con bcrypt.js -- TODO
        // const saltRounds = 10;
        // bcrypt.hash(password, saltRounds, function (err, hash) {
        //     if (err) {
        //         console.error("Error hashing password");
        //         return;
        //     }

            // AJAX para guardar data
            // $.ajax({
            //     type: "POST",
            //     url: "save_user.php",
            //     data: {
            //         firstName: firstName,
            //         lastName: lastName,
            //         email: email,
            //         hashedPassword: hash, // Use the hashed password
            //     },
            //     success: function (response) {
            //         // Handle the response from the server (e.g., success or error message)
            //     },
            // });
        // });
    });
});