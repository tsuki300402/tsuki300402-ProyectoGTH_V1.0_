<?php
/*//Establecer la conexión a la base de datos
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gthumano";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("La conexión falló: " . $conn->connect_error);
}

// Obtener el correo electrónico proporcionado por el usuario
$email = $_POST["email"];

// Realizar una consulta a la base de datos para obtener la contraseña
$sql = "SELECT password FROM usuario WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Enviar un correo electrónico al usuario con su contraseña o proporcionar un enlace para restablecerla
  include_once("contraseñaC.php");
 // include_once("../../contraseñaR.php");
  $row = $result->fetch_assoc();
  $password = $row["password"];
  // Enviar correo electrónico con la contraseña
  header("location: ../../recuperar.php");
}else {
  // Informar al usuario que la dirección de correo electrónico proporcionada no existe en la base de datos
  echo "No se encontró ninguna cuenta con la dirección de correo electrónico proporcionada.";
  header("Location: ../../recuperar.php");
}

// Cerrar la conexión a la base de datos
$conn->close();*/
include_once ("../../configuracion/controller/conexion.php");
$conexion = new Conexion();
 $con = $conexion->conectarDB();
$email = $_POST['email'];

include ("contraseñaC.php");
//include_once("../../recuperar.php");
$correo = $_POST['email'];
//$sql=("SELECT * FROM usuario where email = '$correo' ");
$password = $_POST['password'];
if($mail){
  $con->query(" update usuario set email='$correo' , password='$password'") or die($con->error);
    echo "<script> alert ('".$correo."') ;window. location= '../../recuperar.php' </script>";
    //header("location: ../../recuperar.php");
}
?>
