<?php
session_start();
$_SESSION["email"] = $_POST['email'];
class login
{
    private $email;
    private $password;
    function inicio()
    {
        $email = $_POST['email'];
        include '../config/seguridad.php';
        $encriptar = new Seguridad();
        $password = $encriptar->encriptarP($_POST['password']);
        include "./conexion.php";
        $conexion = new Conexion();
        $con = $conexion->conectarDB();

        $resultado = mysqli_query($con, "SELECT * FROM usuario WHERE email = '" . $email . "' AND password = '" . $password . "';");
        if (!$resultado) {
            exit();
        } else {
            $_SESSION["Error"] = "Porfavor verifique sus credenciales de acceso";
            header('Location:  http://localhost/ProyectoGTH_V1.0_\index.php');
        }
        while ($fila = mysqli_fetch_assoc($resultado)) {
            if ($fila['rol'] == "Administrador") {
                $_SESSION['Usuario'] = $fila['nombre'];
                $_SESSION['idUsuario'] = $fila['idUsuario'];
                header("Location: http://localhost/ProyectoGTH_V1.0_/paginas/admin/categoriaAdmin.php");
            } else {
                $_SESSION['Usuario'] = $fila['nombre'];
                $_SESSION['estado'] = $fila['estado'];
                $_SESSION['idUsuario'] = $fila['idUsuario'];
                header("Location: http://localhost/ProyectoGTH_V1.0_/paginas/usuarios/categoriaUser.php");
            }

        }

        mysqli_free_result($resultado);

        $resultado = mysqli_query($con, "UPDATE usuario SET ultimo_ingreso = NOW() WHERE email = '" . $email . "' AND password = '" . $password . "';");
        if (!$resultado) {
            echo "Error al ejecutar la consulta: " . mysqli_error($con);
            exit();
        }
    }
}
$init = new login();
$init->inicio();

?>