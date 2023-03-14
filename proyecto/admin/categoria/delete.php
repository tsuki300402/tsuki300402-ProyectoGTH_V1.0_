<?php
 class Sub {
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
   
    function Del(){
        $enlace=$this->conectarDB();
        $id=$_POST['idBtnDel'];
        $sql="DELETE FROM `prueba` WHERE `prueba`.`id` = ".$id." ;";
        if ($enlace->query($sql) === TRUE) {  
                header('Location: /ProyectoGTH/proyecto/admin/categoria/categoriaAdmin.php');
		}        
    }
 }
    $sub = new Sub();
    $sub->Del();
?>