<?php
class SubPreg
{
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

    function SubirPregunta(){
        $enlace = $this->conectarDB();
        $preg = $_POST['Preg'];
        $idprueba= $_POST['idQuest'];
        $tipo= $_POST['pregun_tipo'];
        $sql = "INSERT INTO `preguntas` (`pregunta`, `idprueba`, `tipo`) VALUES ( '".$preg."','".$idprueba."','".$tipo."')";
        if ($enlace->query($sql) === TRUE) {
           
                header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/usuarios/categoriaUser.php');
        }
    }
}
$sub = new SubPreg();
$sub->SubirPregunta();
?>