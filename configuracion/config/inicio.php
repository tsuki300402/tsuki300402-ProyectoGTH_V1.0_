<?php

session_start();
class Configuracion
{
    private $servidor;
    private $user;
    private $password;
    function conexion()
    {
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $con = new mysqli($servidor, $user, $password);
        /*if($con->connect_error){
        
        $_SESSION["ErrorDB"]="No ha sido posible la conexion con el sistema";
        header('Location: config.php');
        }/*else{
        $_SESSION["Status"]="Se ha conectado con la base de datos";
        header('Location: config.php');
        }*/
        return $con;
    }
    function conectarDB()
    {
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $database = "gthumano";
        $con = new mysqli($servidor, $user, $password, $database);

        if ($con->connect_error) {

            $_SESSION["ErrorDB"] = "No ha sido posible establecer la conexion con la base de datos";
            header('Location: config.php');
        } else {
            $status = 1;
        }
        return $con;
    }
    function CrearDB()
    {
        $con = $this->conexion();
        $sql = "CREATE DATABASE gthumano";
        if ($con->query($sql) === TRUE) {
            $_SESSION["Status"] = "Se ha creado con la base de datos";
            header('Location: http://localhost/ProyectoGTH_V1.0_/index.php');
        } else {
            $_SESSION["ErrorDB"] = "Error creando la base de datos";
            header('Location: config.php');
        }
        $con->close();
    }
    function crearTablas()
    {
        $con = $this->conectarDB();
        $sql = "CREATE TABLE USUARIO (
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                nombre varchar(50) NOT NULL,
                segnombre varchar(50) NOT NULL,
                apellido varchar(50) NOT NULL,
                segapellido varchar(50) NOT NULL,
                celular varchar(50) NOT NULL,
                email varchar(50) NOT NULL,
                password varchar(25) NOT NULL,
                fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON 
                UPDATE CURRENT_TIMESTAMP);";
        if ($con->query($sql) === TRUE) {
            $status = 1;
        } else {
            $_SESSION["ErrorDB"] = "Error creando la tabla en la base de datos";
            header('Location: config.php');
        }
        $con->close();
    }
    function crearUsuario()
    {
        $con = $this->conectarDB();
        include 'seguridad.php';
        $limpieza = new Seguridad;
        $password = $limpieza->encriptarP($_POST["password"]);

        $validar = "SELECT * FROM usuario where email = '" . $_POST['email'] . "' ";
        $validando = $con->query($validar);
        if ($validando->num_rows > 0) {
            echo "<script> alert('El usuario ya esta registrado con ese correo, utilize otro porfavor'); window.location = '../../paginas/admin/admin_de_usuarios.php'</script>";
        } else {
            echo "<script> alert('El usuario ha sido registrado'); window.location = '../../paginas/admin/admin_de_usuarios.php'</script>";
            $sql = "INSERT INTO USUARIO (nombre,apellido,email,password,rol,estado)
                    VALUES('" . $_POST["nombre"] . "','" . $_POST["apellido"] . "','" . $_POST["email"] . "','" . $password . "','" . $_POST["rol"] . "','activo');";
        }

        if ($con->query($sql) === TRUE) {
            header("location: ");
        } else {

        }
        $con->close();
    }

}
$conexion = new Configuracion();
//Linea para crear la base de datos del proyecto
//$conexion->CrearDB();
//Crear usuario en la base de datos
//$conexion->crearTablas();
$conexion->crearUsuario();
?>