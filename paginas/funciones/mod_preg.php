<?php
class UPD
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

    function update(){
                $enlace = $this->conectarDB();
                /*include "./redimension.php";
                $redimension = new RediM;
                
                // Llamamos a la función Img_Guardar y obtenemos la ruta de la nueva imagen guardada
                if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $img = $redimension->Img_Guardar($_FILES['image'], $_POST['tema']); 
                } else {
                    $img = $_POST['imgAct'];
                }*/
                $id=$_POST['idP'];         
                $name = $_POST['title'];
                
                // Utilizamos la variable $img que contiene la ruta de la nueva imagen guardada
                $sql = "UPDATE `preguntas` SET `pregunta` = '".$name."' WHERE `id` = ".$id.";";
                if ($enlace->query($sql) === TRUE) {
                    header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
                } else {
                    echo "error";
                }
    }

}
$sub = new UPD();
$sub->update();