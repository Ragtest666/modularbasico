<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('control/conexion.php');

if (isset($_POST['recuperar'])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuarios']);
    $consulta = "SELECT * FROM Usuarios WHERE nombre_usuario='$usuario'";
    $resultados = mysqli_query($conexion, $consulta);

    if (!$resultados) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    $fila = mysqli_fetch_array($resultados);

    if ($fila && $fila["nombre_usuario"] == $usuario) {
        $para = $fila['correo'];
        $asunto = 'RECUPERACION DE CONTRASEÑA';
        $mensaje = 'Por medio del presente correo le hacemos llegar su contraseña registrada: ' . $fila["contrasena"];

        // Configuración de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lunapanaderia774@gmail.com'; // Coloca tu dirección de correo
            $mail->Password = 'jjsj kzmw uuyi fqoq '; // Coloca tu contraseña
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('lunapanaderia774@gmail.com', 'Luna Panadería');
            $mail->addAddress($para);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            $mail->send();
            echo "Se ha enviado la contraseña por correo electrónico. Por razones de seguridad, te recomendamos cambiar tu contraseña después de iniciar sesión.";
        } catch (Exception $e) {
            echo "Error al enviar el correo. Detalles del error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No hay ningún usuario con ese nombre.";
    }
}
?>

