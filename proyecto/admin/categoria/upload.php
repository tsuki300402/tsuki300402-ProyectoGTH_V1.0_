<?php
 class Aña {
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
   
    function añadir(){
        $enlace=$this->conectarDB();
        $name=$_POST['title'];
        $desc=$_POST['desc'];
        $niv=$_POST['nivel'];
        $tem=$_POST['tema'];
        $img=$_POST['image'];
        
        $sql="INSERT INTO `prueba` (`id`,`titulo`, `descripcion`, `nivel`, `tema`, `imagen`) VALUES (NULL, '".$name."', '".$desc."', '".$niv."', '".$tem."', '".$img."' )";
        if ($enlace->query($sql) === TRUE) {  
                header('Location: /ProyectoGTH/proyecto/admin/categoria/categoriaUser.php');
		} else{
            echo "error";
        }
    }
 }
    $sub = new Aña();
    $sub->añadir();
?>