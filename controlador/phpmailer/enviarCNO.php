<?php
$dato = $_GET['CorreoA'];

include("../../configuracion/controller/conexion.php");
$conexion = new Conexion();
$con = $conexion->conectarDB();

$mostrar = $_GET['CorreoA'];

$sql = "SELECT usuario.* FROM usuario JOIN resultados ON usuario.idUsuario = resultados.id_usuario WHERE resultados.id_usuario = $mostrar";//SELECT clientes.* FROM clientes JOIN pedidos ON clientes.id = pedidos.cliente_id WHERE pedidos.id = $pedido_id

// Ejecutar la consulta
$resultado = mysqli_query($con, $sql);

// Obtener los datos del cliente
$correo = mysqli_fetch_assoc($resultado);

//echo "email: ". $correo['email']."<br>";

$texto = $correo['email'];

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
    $mail->Username = 'rooseveltrodriguez3004@gmail.com'; // Tu correo electrónico de Gmail
    $mail->Password = 'faovldohfvtmcgbs'; // Tu contraseña de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Port = 465;

    // Configurar el correo electrónico
    $mail->setFrom('rooseveltrodriguez3004@gmail.com', 'Proceso de contratacion finalizado');
    $mail->addAddress($texto, 'nombre del usuario');
    //$mail->addReplyTo('tu_correo@gmail.com', 'Responder a');
    $mail->isHTML(true);
    $mail->Subject = 'Le comunicamos que no ha pasado los requisitos minimos de la empresa';
    $mail->msgHTML('
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="../../css/custom.css"  rel="stylesheet">
	<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="../../js/bootstrap.bundle.min.js"></script>
    <style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }
    
    .button1 {
        background-color: white; 
        color: black; 
        border: 2px solid #4CAF50;
        border-radius: 12px;
    }
    
    .button1:hover {
        background-color: #4CAF50;
        color: white;
    }
        </style>
</head>
<body>
<h1>Si haz recibido este correo, es por el motivo de que no haz pasado satisfactoriamente todos los filtros de la empresa</h1>

<p>Bienvenido usuario del correo: "'.$texto.'", usted no ha sido contratado por no pasar los estandares de la empresa</p>
<p>Si quieres ver tus resultados dirigite al link que te dejamos para ingresar al inicio de nuestra pagina</p>
<button class="button button1"><a href="http://localhost/ProyectoGTH_V1.0_/">Haz click aqui</a></button>

</body>
</html>');

    // Enviar el correo electrónico
    $mail->send();
    echo 'Correo electrónico enviado correctamente';
    header("location: ../../paginas/admin/admin_de_resultados.php");
} catch (Exception $e) {
    echo 'Ocurrió un error al enviar el correo electrónico: ', $mail->ErrorInfo;
}
?>