console.log('Hello World. FormResetClave.js');


// Function to execute reCAPTCHA
function executeRecaptcha() {
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b', { action: 'submit' }).then(function(token) {
            document.getElementById("recaptchaResponse").value = token;
        });
    });
}

//Funcion bin2hex para creacion de codigo para reset
function bin2hex(buffer) {
    return Array.prototype.map.call(new Uint8Array(buffer), x => ('00' + x.toString(16)).slice(-2)).join('');
}

document.addEventListener("DOMContentLoaded", function () {
    const ResetPassForm = document.getElementById("FormResetClave");
    const messageContainer = document.getElementById("message-container");
    const token_resetInput = document.getElementById("token_reset");


    // Initial execution of reCAPTCHA
    executeRecaptcha();

    ResetPassForm.addEventListener("submit", function(e){
        e.preventDefault()

        var email = document.getElementById("email").value;        
        var js_recaptcha_response = document.getElementById("recaptchaResponse").value;       
        
        // Codigo de reset de la clave
        var jscodigo_reset = bin2hex(crypto.getRandomValues(new Uint8Array(16))); // 16 bytes para obtener 32 caracteres hexadecimales
        //

        // Asignar el código de reset al campo oculto
        token_resetInput.value = jscodigo_reset;
        //

        var data = {
            email: email,
            recaptcha_response: js_recaptcha_response,
            reset_token: jscodigo_reset, //cargar codigo de activacion en DB
        };

        console.log("VAR DATA:", data);

        $.ajax({
            type: "POST",
            url: "../tools/reset_clave.php",
            data: data,
            success: function(response) {
                displayMessage(response, "success");
                ResetPassForm.reset();
                executeRecaptcha(); // Refresh reCAPTCHA after a successful submission
            },
            error: function(xhr, status, error) {
                displayMessage("Error en la solicitud AJAX. Por favor, inténtelo de nuevo.", "error");
                ResetPassForm.reset();
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


