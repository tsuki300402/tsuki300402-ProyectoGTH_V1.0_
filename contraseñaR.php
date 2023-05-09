<?php 
    $dato = $_GET['CorreoA'];
    setcookie("Correo",$dato,time()+3600*24*30);
if(isset($_POST['submit'])){

    $cookie = $_COOKIE['Correo'];
    $correo = $cookie;
    include("./configuracion/config/seguridad.php");
    $limpieza = new Seguridad;
    $password= $limpieza->encriptarP($_POST["password"]); 
    //$contraseña = $_POST['password'];
    $update = "UPDATE usuario SET password = '$password' WHERE email = '$correo' "; 

    include("./configuracion/controller/conexion.php");
    $conexion = new Conexion();
    $con = $conexion->conectarDB();

//$sql = "SELECT * FROM usuario where email = '$dato'";
//$resultado = mysqli_query($con, $sql);

if($con->query($update) === TRUE){
    echo "<script> alert ('su contraseña fue cambiada') ; </script>";
    header ("location: index.php");
}else{
    
}
}
?>
<html>
    <?php //echo $update; ?>
    <head>
    <title>Recuperar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="./css/custom.css"  rel="stylesheet">
	<link href="./libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="./js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include("./modules/menu/menu.php");     
        ?>
        <div class="container text-start bg-light mt-5">
            <div class="row mt-5">
                <div class="col-sm-6 mx-auto bg-white mt-3 mb-3">
                    <form class="mt-5" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label class="lead mb-3">Contraseña</label>
                        <div class="">
                            <input class="form-control form-control-lg mb-3" type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Restablecer</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>