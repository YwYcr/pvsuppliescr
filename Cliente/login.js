console.log("Hello! I'm Login.js");

//Funcion para inicio sesion
document.addEventListener("DOMContentLoaded", function () {

    const loginFORM = document.getElementById("iniciosesionform");
                
        loginFORM.addEventListener("submit", function (e) {
                e.preventDefault();
                        
                var email = document.getElementById("correologin").value;
                var password = document.getElementById("passwordlogin").value;
                // var rememberMe = document.getElementById("remember_me").checked;              

                // VAR Data 
                var login_data = {
                    email: email,
                    password: password,
                    // rememberMe: remember_me
                };

                console.log("Login DATA:", login_data);

                // AJAX to save data
                $.ajax({
                    type: "POST",
                    url: "../Usuario/login.php",
                    data: login_data,
                    success: function(response) {
                        // console.log(response);
                        //
                        window.location.href = "../tools/my-account.php";
                    },
                    error: function(xhr, status, error) {
                        console.log("Error en la solicitud AJAX. Por favor, inténtelo de nuevo.", "error");                
                        
                        console.error(error);
                    }
                });

    });

});   
