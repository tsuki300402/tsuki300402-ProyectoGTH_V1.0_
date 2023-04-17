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
<<<<<<< HEAD
   
    function Del(){
        $llamado=$_POST['btnDel'];
        $enlace=$this->conectarDB();
        $id=$_POST['idBtnDel'];
       if($llamado=='usuario'){
            $consulta="SELECT * FROM usuario WHERE idUsuario = '$id'; ";
             if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
                foreach($resultado as $value){
                    $estado_actual=$value["estado"];
                }
            }

            if($estado_actual=="activo"){
                $new_estado="inactivo";
            }else if($estado_actual=="inactivo"){
                $new_estado="activo";
            }

            $sql="UPDATE `usuario` SET `estado` = '$new_estado' WHERE `usuario`.`idUsuario` = '$id'; ";
            if ($enlace->query($sql) === TRUE) {  
                    header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/admin_de_usuarios.php');
            }    

        } else if($llamado=='prueba'){
            $consulta="SELECT * FROM prueba WHERE id = '$id'; ";
             if ($resultado = mysqli_query($enlace, $consulta)and($value = mysqli_fetch_assoc($resultado))) { 
                foreach($resultado as $value){
                    $estado_actual=$value["estado"];
                }
=======

    function Del()
    {
        $llamado = $_POST['btnDel'];
        $enlace = $this->conectarDB();
        $id = $_POST['idBtnDel'];
        if ($llamado == 'usuario') {
            $sql = "UPDATE `usuario` SET `estado` = 'inactivo' WHERE `usuario`.`idUsuario` = '$id'; ";
            if ($enlace->query($sql) === TRUE) {
                header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/admin_de_usuarios.php');
            }
        } else if ($llamado == 'prueba') {
            $sql = "UPDATE `prueba` SET `estado` = 'inactivo' WHERE `prueba`.`id` = '$id'; ";
            if ($enlace->query($sql) === TRUE) {
                header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
>>>>>>> 8f29181ad136baef6828ce51614ac09e9a605346
            }

            if($estado_actual=="activo"){
                $new_estado="inactivo";
            }else if($estado_actual=="inactivo"){
                $new_estado="activo";
            }

            $sql="UPDATE `prueba` SET `estado` = '$new_estado' WHERE `prueba`.`id` = '$id'; ";
                if ($enlace->query($sql) === TRUE) {  
                        header('Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php');
                }
        }

    }
}
$sub = new Sub();
$sub->Del();
?>