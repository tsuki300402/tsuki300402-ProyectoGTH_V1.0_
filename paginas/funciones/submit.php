<?php
class Sub
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

    function Guardar()
    {
        $enlace = $this->conectarDB();
        $respuestas = array_values($_POST['valores']);
        $serial_respuestas = serialize($respuestas);
        $idQuest = $_POST['idQuest'];
        $idUser = $_POST['idUser'];
        $sql = "INSERT INTO `respuestas` (`idrespuesta`, `respuesta`, `idprueba`, `idusuario`) VALUES (NULL, '" . $serial_respuestas . "', '" . $idQuest . "', '" . $idUser . "')";
        if ($enlace->query($sql) === TRUE) {
            $sql1 = "INSERT INTO resultados (id,id_prueba,id_usuario) VALUES (NULL,'" . $idQuest . "', '" . $idUser . "')";
            if ($enlace->query($sql1) === TRUE){
                header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/usuarios/categoriaUser.php');
            }
        }
    }
}
$sub = new Sub();
$sub->Guardar();
?>