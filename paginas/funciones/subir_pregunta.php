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
        include "./redimension.php";
        $redimension = new RediM;
        // Verifica si $tipo_p está definida y no está vacía
        if (isset($_POST['pregun_tipo']) && !empty($_POST['pregun_tipo'])) {
            $tipo_p = $_POST['pregun_tipo'];
        } else {
            $tipo_p = '';
        }
        
        // Verifica si $preg está definida y no está vacía
        if (isset($_POST['pregunta_txt']) && !empty($_POST['pregunta_txt'])) {
            $preg = $_POST['pregunta_txt'];
        } else {
            $preg = '';
        }
        
        // Verifica si $imagen está definida y no está vacía
        $imagen = $redimension->Img_Guardar($_FILES['imagePreg'],$_POST['resp_tipo']); 
        
        // Verifica si $tipo_r está definida y no está vacía
        if (isset($_POST['resp_tipo']) && !empty($_POST['resp_tipo'])) {
            $tipo_r = $_POST['resp_tipo'];
        } else {
            $tipo_r = '';
        }
        
        // Verifica si $resp_c está definida y no está vacía
        if (isset($_POST['resp_c']) && !empty($_POST['resp_c'])) {
            $resp_c = $_POST['resp_c'];
        } else {
            $resp_c = '';
        }
        
        // Verifica si $resp_posible está definida y no está vacía
        if (isset($_POST['resp_posible']) && !empty($_POST['resp_posible'])) {
            $resp_posible = array_values($_POST['resp_posible']);
            $respuestas_posibles = serialize($resp_posible);
        } else {
            $respuestas_posibles = '';
        }
  
        $idprueba= $_POST['idQuest'];
        $sql = "INSERT INTO `preguntas` (`tipo_pregunta`, `pregunta`, `imagen`, `tipo_respuesta`, `respuesta_correcta`, `respuestas_posibles`, `idprueba`) VALUES ('".$tipo_p."', '".$preg."', '".$imagen."', '".$tipo_r."', '".$resp_c."', '".$respuestas_posibles."', '".$idprueba."')";

        if ($enlace->query($sql) === TRUE) {
           
                header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
        }
    }
}
$sub = new SubPreg();
$sub->SubirPregunta();
?>