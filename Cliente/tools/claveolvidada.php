<!DOCTYPE html>
<html>
<head>
    <title>Recuperar Contraseña</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="../FormResetClave.js"></script>
</head>

    <!-- Recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js?render=6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b"></script>
    <!-- Recaptcha -->

<body>

    <h2>Recuperar Contraseña</h2>
</p>
    <form id="FormResetClave">
        <label for="email">Digite su correo:
            </p>
            <input type="email" id="email" name="email" autocomplete="email" required>
        </label>
        </p>
        <label>Presione enviar para recibir un enlace para reestablecer su contraseña.
        </p>
        <div id="message-container"></div>
            <input type="hidden" id="recaptchaResponse" name="recaptcha_response" />
            <input type="hidden" id="token_reset" name="token_reset" />
        </p>
        <button type="submit">Enviar</button>
        </label>
    </form>
</body>
    <!-- Recaptcha initialization -->
    <script defer>
        grecaptcha.ready(function() {
            // console.log("grecaptcha is ready");
            // Your original script inside the grecaptcha.ready callback
            grecaptcha.execute('6LeXSA4pAAAAACX0zhbYo5f_gt9g6e_YlTZ8rw0b', { action: 'submit' }).then(function(recaptcha_token) {
                document.getElementById("recaptchaResponse").value = recaptcha_token;
            });
        });
    </script>
    <!-- Recaptcha -->

</html>