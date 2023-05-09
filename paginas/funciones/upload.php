<?php
class Aña
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

    function añadir(){
                $enlace = $this->conectarDB();
                include "./redimension.php";
                $redimension = new RediM;
                
                // Llamamos a la función Img_Guardar y obtenemos la ruta de la nueva imagen guardada
                $img = $redimension->Img_Guardar($_FILES['image'],$_POST['tema']); 
                
                $name = $_POST['title'];
                $desc = $_POST['desc'];
                $niv = $_POST['nivel'];
                $tem = $_POST['tema'];
                
                // Utilizamos la variable $img que contiene la ruta de la nueva imagen guardada
                $sql = "INSERT INTO `prueba` (`id`,`titulo`, `descripcion`, `nivel`, `tema`, `imagen`,estado) VALUES (NULL, '" . $name . "', '" . $desc . "', '" . $niv . "', '" . $tem . "', '" . $img . "','activo')";
                if ($enlace->query($sql) === TRUE) {
                    header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
                } else {
                    echo "error";
                }
    }

}
$sub = new Aña();
$sub->añadir();
?>