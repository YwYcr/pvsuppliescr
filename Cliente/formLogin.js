document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");

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
            }
        });
    });
});


