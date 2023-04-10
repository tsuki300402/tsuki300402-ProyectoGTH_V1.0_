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
        $llamado=$_POST['btnDel'];
        $enlace=$this->conectarDB();
        $id=$_POST['idBtnDel'];
       if($llamado=='usuario'){
            $sql="UPDATE `usuario` SET `estado` = 'inactivo' WHERE `usuario`.`idUsuario` = '$id'; ";
            if ($enlace->query($sql) === TRUE) {  
                    header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/admin_de_usuarios.php');
            }    
        } else if($llamado=='prueba'){
            $sql="UPDATE `prueba` SET `estado` = 'inactivo' WHERE `prueba`.`id` = '$id'; ";
            if ($enlace->query($sql) === TRUE) {  
                    header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
            }
        }
                
    }
 }
    $sub = new Sub();
    $sub->Del();
?>