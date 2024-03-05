document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    const errorContainer = document.getElementById("error-container");

    loginForm.addEventListener("submit", function(e){
        e.preventDefault()

        var email = document.getElementById("emailLogin").value;
        var password = document.getElementById("passwordLogin").value;

        var data = {
            email: email,
            password: password
        };

        $.ajax({
            type: "POST",
            url: "../tools/iniciosession2.php",
            data: data,
            success: function(response){
            console.log(response);
            loginForm.reset();
            if (response.redirect){
                window.location.href = response.redirect;
            }else{
                
                console.error("Error: No se recibió una URL de redirección válida");
            }
            
            },
            error: function(xhr, status, error){
                loginForm.reset();
                console.log(xhr.responseText); // Imprimir la respuesta completa devuelta por el servidor
                if (xhr.status === 401) {
                    errorContainer.innerHTML = "Contraseña incorrecta"; // Mensaje para el código de estado 401
                } else if (xhr.status === 404) {
                    errorContainer.innerHTML = "Usuario no encontrado"; // Mensaje para el código de estado 404
                } else if (xhr.status === 400) {
                    errorContainer.innerHTML = "Falta información de inicio de sesión"; // Mensaje para el código de estado 400
                } else {
                    errorContainer.innerHTML = "Error desconocido"; // Mensaje para otros códigos de estado
                }
            }


            // error: function(xhr, status, error){
            //     loginForm.reset();
            //     var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : "Error desconocido";
            //     errorContainer.innerHTML = errorMessage; // Mostrar el mensaje de error                     
            // }
        });
    });
});


