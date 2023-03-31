<?php
// Importar la biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las clases necesarias de PHPMailer
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);
try {
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elmasgamerdelmundo@gmail.com'; // Tu correo electrónico de Gmail
    $mail->Password = 'ddxbnolmjeitjmla'; // Tu contraseña de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    
    //correo
    require_once "../../recuperar.php";
    $correo = $_POST['email'];
    // Configurar el correo electrónico
    $mail->setFrom('elmasgamerdelmundo@gmail.com', 'Correo de registro');
    $mail->addAddress($correo, 'nombre del usuario');
    //$mail->addReplyTo('tu_correo@gmail.com', 'Responder a');
    $mail->isHTML(true);
    $mail->Subject = 'Registro Exitoso';
    $mail->msgHTML('
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
</head>
<body>
<h1>Si quieres restablecer tu contraseña porfavor dale click en le siguiente enlace</h1><br>
<a href="http//localhost/ProyectoGTH_V1.0_/paginas/funciones/restablecerC.php"></a>

</body>
</html>');

    // Enviar el correo electrónico
    $mail->send();
    echo 'Correo electrónico enviado correctamente';
} catch (Exception $e) {
    echo 'Ocurrió un error al enviar el correo electrónico: ', $mail->ErrorInfo;
}
?>