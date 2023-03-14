<?php 

session_start();
class Configuracion{
        private $servidor;
        private $user;
        private $password;
    function conexion(){
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
    function conectarDB(){
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $database = "gthumano";
        $con = new mysqli($servidor, $user, $password,$database);

        if($con->connect_error){
            
            $_SESSION["ErrorDB"]="No ha sido posible establecer la conexion con la base de datos";
            header('Location: config.php');
        }else{
            $status=1;
        }
        return $con;
    }
    function CrearDB(){
        $con=$this->conexion();
        $sql = "CREATE DATABASE gthumano";
        if($con->query($sql) === TRUE){
            $_SESSION["Status"]="Se ha creado con la base de datos";
            header('Location: config.php');
        }else{
            $_SESSION["ErrorDB"]="Error creando la base de datos";
            header('Location: config.php');
        }
        $con->close();
        } 
        function crearTablas(){
            $con=$this->conectarDB();
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
                if($con->query($sql) === TRUE){
                    $status =1;
                }else{
                    $_SESSION["ErrorDB"]="Error creando la tabla en la base de datos";
                    header('Location: config.php');
                }
                $con->close();
        }
        function crearUsuario(){
            $con=$this->conectarDB();
            include 'seguridad.php';
            $limpieza = new Seguridad;
            $password= $limpieza->encriptarP($_POST["password"]); 
            $sql="INSERT INTO USUARIO (nombre,segnombre,apellido,segapellido,celular,email,password)
            VALUES('".$_POST["nombre"]."','".$_POST["segnombre"]."','".$_POST["apellido"]."','".$_POST["segapellido"]."','".$_POST["celular"]."','".$_POST["email"]."','".$password."');";

            if($con->query($sql) === TRUE){
                $_SESSION["status"]="Se ha creado un usuario en la base de datos";
            header('Location: config.php');
            }else{
                $_SESSION["ErrorDB"]="Error creando un usuario en la base de datos".$con->error;
                    header('Location: config.php');
            }
            $con->close();
        }
 
}
$conexion = new Configuracion();
//Linea para crear la base de datos del proyecto
$conexion->CrearDB();
//Crear usuario en la base de datos
$conexion->crearTablas();
$conexion->crearUsuario();
?>