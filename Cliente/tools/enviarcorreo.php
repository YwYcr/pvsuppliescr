<?php
// enviarcorreo.php

// require 'vendor/autoload.php';  Ajusta la ruta según tu estructura de archivos

use PHPMailer\src\PHPMailer;
use PHPMailer\src\Exception;

function correo_activacion($email, $nombre, $primerApellido, $codigo_act) {
    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP de Google
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@pvsuppliescr.com'; // Tu dirección de correo de Gmail
        $mail->Password = 'wjlmrkhbuflqabar'; // La contraseña de tu correo de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Resto de la configuración del correo
        $mail->setFrom('info@pvsuppliescr.com', 'Puerto Viejo Supplies');
        $mail->addAddress($email, $nombre . ' ' . $primerApellido);
        $mail->Subject = 'Activa tu cuenta en PV Supplies';

        // Cuerpo del correo con los campos del formulario
        $mail->Body = 'Hola ' . $nombre . ' ' . $primerApellido . ',<br><br>';
        $mail->Body .= 'Haz click en el siguiente link para activar tu cuenta: ' . $_SERVER['HTTP_HOST'] . '/activate.php?email=' . $email . '&code=' . $codigo_act;

        // Envío del correo
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
