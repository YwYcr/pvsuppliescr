console.log("Hello, world!");

// Function to execute reCAPTCHA
function executeRecaptcha() {
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b', { action: 'submit' }).then(function(token) {
            document.getElementById("recaptchaResponse").value = token;
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("register-form");
    const messageContainer = document.getElementById("message-container");

    // Initial execution of reCAPTCHA
    executeRecaptcha();

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();
        var firstName = document.getElementById("name").value;
        var lastName = document.getElementById("flastname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value; 
        var js_recaptcha_response = document.getElementById("recaptchaResponse").value;

        function isValidPassword(password) {
            // Clave 8 caracteres minimo, minimo 1 # y 1 mayuscula
            const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            return regex.test(password);
        }

        if (password !== confirmPassword) {
            displayMessage("Las claves son diferentes. Intente de nuevo", "error");
            
            return;
        }

        // Validate the password
        if (!isValidPassword(password)) {
            displayMessage("La clave debe ser al menos 8 caracteres. Debe contener al menos 1 número y una letra mayúscula.", "error");
            
            return;
        }


        // Include reCAPTCHA response in the form data
        var data = {
            nombre: firstName,
            primerApellido: lastName,
            email: email,
            password: password,
            recaptcha_response: js_recaptcha_response  // Use the reCAPTCHA token
        };

        console.log("VAR DATA:", data);

        // AJAX to save data
        $.ajax({
            type: "POST",
            url: "../Usuario/crearUsuario.php",
            data: data,
            success: function(response) {
                displayMessage(response, "success");
                registerForm.reset();
                executeRecaptcha(); // Refresh reCAPTCHA after a successful submission
            },
            error: function(xhr, status, error) {
                displayMessage("Error en la solicitud AJAX. Por favor, inténtelo de nuevo.", "error");
                registerForm.reset();
                executeRecaptcha(); // Refresh reCAPTCHA after a successful submission
                console.error(error);
            }
        });

    });

    function displayMessage(message, type) {
        var messageDiv = document.createElement("div");
        messageDiv.className = "message " + type;
        messageDiv.textContent = message;

        messageContainer.innerHTML = "";

        messageContainer.appendChild(messageDiv);
    }
});
